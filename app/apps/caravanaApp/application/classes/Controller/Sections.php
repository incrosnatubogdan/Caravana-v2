<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Sections extends Controller_Base {

	public function action_show(){

    $sectionName = $this->request->param('id');
    $page = $this->request->param('page') ? : 1;

    $section = Model_Section::make()
    ->where('name', 'LIKE', str_replace('-', '_', $sectionName))
    ->where('active', '=', 1)
    ->find();

    if (empty($section->id))
    {
      throw new Http_Exception_404();
    }

    $section = Section_Core::make($section->id)
    ->setPage($page)
    ->getArticles();

    $this->template->content = view::factory('front_page/index')
    ->set('section', $section->render());



    $this->meta->setTitle('Caravana cu medici - caravanacumedici.ro')
           ->setDescription('')
           ->setKeywords('')
           ->set('canonical', url::link())
    ;

	}

} // End Welcome
