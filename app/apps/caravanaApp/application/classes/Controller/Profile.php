<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Class Controller_Profile
 */
class Controller_Profile extends Controller_Base
{

  /**
   * The auth core
   *
   * @var Auth
   */
  protected $auth;

  /**
   * Login action
   */
  public function action_login()
  {
    $this->autoRender = FALSE;
    $ret              = new stdClass();
    $ret->errors      = 1;

    $this->auth = Auth::instance();

    $valid = Validation::factory($this->request->post());
    $valid->rule('username', 'not_empty')
          ->rule('password', 'max_length', array (':value', 100))
          ->rule('password', 'not_empty')
          ->rule('password', 'min_length', array (':value', 6))
          ->rule('password', 'max_length', array (':value', 100));

    if ($valid->check())
    {
      $values = $valid->data();

      $remember = $this->request->post('auto_login') ? TRUE : FALSE;

      $this->auth->login($values['username'], $values['password'], $remember);
      $this->user = $this->auth->get_user();

      if (!empty($this->user->id) && $this->user->isFrontendUser())
      {
        $ret->errors = 0;
        // user is logged in
      }
    }

    echo json_encode($ret);
  }

  public function checkAccess()
  {
    if (!($this->user &&  $this->user->isFrontendUser()))
    {
      $this->redirect('/');
    }
  }

  /**
   * Logout action
   */
  public function action_logout()
  {
    $this->autoRender = FALSE;
    $this->auth       = Auth::instance();
    $this->auth->logout(TRUE);
  }

  /**
   * Action patients
   * NOTE: this is used by the doctors team, it has multiple filters and pagination
   */
  public function action_patients()
  {
    $this->checkAccess();

    $eventId = (int) $this->request->query('eventId') ?: $this->request->param('id');
    $event = $eventId ? Model_Event::make($eventId) : Model_Event::make()->where('active','=', 1)->order_by('id', 'desc')->find();
    $eventId = (int) $event->id;

    $page    = $this->request->param('page', 1);
    $filters = $this->request->query();
    $pagesCount =  Model_Patient::make()->setWhere($filters)->where('event_id', '=', $eventId)->count_all();
    $pagination = $this->getPagination($pagesCount, $page, 15, url::link('profile/patients/' . $eventId . '/%page%') . URL::query());

    $patients = Model_Patient::make()
                             ->setWhere($filters)
                             ->order_by('id', 'desc')
                             ->where('event_id', '=', (int) $eventId)
                             ->offset($pagination->offset)
                             ->limit($pagination->items_per_page)
                             ->find_all();
    //echo debug::vars($patients);
    $this->template->set('content', view::factory('profile/patients')
                                        ->set('pagination', $pagination)
                                        ->set('patients', $patients)
                                        ->set('event', $event)
                                        ->set('filters', $filters)
                                        ->set('events', $this->getEvents())
																				->set('filterFields', $this->getFilterFields())
    );

  }

 /**
  * Get the list of fields to use as filters
  *
  * @return Field[]
  */
 protected function getFilterFields()
 {
	 $form = CustomForm::make();
	 $form->addFields(Model_Field::make()->where('filter', '=', 1)->find_all());
	 return $form->getFields();
 }

  /**
  * Get the list of events
  *
  * @return Model_Event[]
  */
  protected function getEvents()
  {
    return Model_Event::make()
    ->where('active', '=', 1)
    ->limit(10)
    ->order_by('id', 'desc')
    ->find_all()
    ->as_array('id', 'name');
  }

  /**
   * Add a patient
   */
  public function action_addPatient()
  {
    $this->checkAccess();

    $eventId = $this->request->param('id');

    $form = CustomForm::makeFirstPage();

    $post = $this->request->post('form');

    if ($post)
    {
      $form->populateValues($post, TRUE);

      if (!$form->hasErrors())
      {
        $form->loadOtherFields();
        $form->insert($eventId);

         //echo View::factory('profiler/stats')->render();  die();

        (!$this->request->post('redirect')) ? $this->redirect('profile/patients/' . $eventId) : $this->redirect('profile/editPatient/' . $form->getPatientId() . '/2');
      }

    }

    $this->template->set('content', view::factory('profile/addPatient')->set('form', $form)->set('eventId', $eventId));
  }

  /**
   * Print patient data
   *
   * @return [type] [description]
   */
  public function action_printPatient() {
      $this->template = new View('print_template');

      $id = $this->request->param('id');
      $form = CustomForm::makeForPrint($id);

      $this->template->set('content', view::factory('profile/printPatient')
                                          ->set('form', $form)
      );
  }

  /**
   * Edit data for a patient
   */
  public function action_editPatient()
  {
    $this->checkAccess();
    $page       = $this->request->param('page', 1);
    $id         = $this->request->param('id');
    $form       = CustomForm::makeFromPatient($this->request->param('id'), $page);
    $pagesCount = $form->getPatient()->getPagesCount();

    $post = $this->request->post('form');

    if ($post)
    {
      $form->populateValues($post, TRUE);

      if (!$form->hasErrors())
      {
        $form->save();

        if (!$this->request->post('redirect'))
        {
          $this->redirect('profile/patients/' . $form->getPatientEventId());
        }

        $this->redirect('profile/editPatient/' . $id . '/' . min($pagesCount, ($page + 1)));
      }
    }

    $pagination = $this->getPagination($pagesCount, $page, 1, url::link('profile/editPatient/' . $id . '/%page%'));


    $this->template->set('content', view::factory('profile/editPatient')
                                        ->set('form', $form)
                                        ->set('pagination', $pagination)
    );
  }

  /**
   * The patient details action method
   */
  public function action_details()
  {
      $this->checkAccess();

      $id = $this->request->param('id');
      $form = CustomForm::makeFromPatientFilters($id);
      echo view::factory('profile/details')
          ->set('form', $form);

      exit;
  }

  /**
   * Return pagination object
   *
   * @param     $totalItems
   * @param     $page
   * @param int $itemsPerPage
   * @param     $url
   *
   * @return Pagination
   */
  protected function getPagination($totalItems, $page, $itemsPerPage = 15, $url)
  {
    return Pagination::factory(array (
                          'total_items'    => $totalItems,
                          'current_page'   => [
                            'page'   => $page,
                            'source' => 'replace',
                            'key'    => '%page%',
                            'url'    => $url
                          ],
                          'items_per_page' => $itemsPerPage,
                          'view'           => 'pagination/form',
                          'auto_hide'      => TRUE,
                        ));
  }
}
