<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Welcome extends Controller_Base {

	/**
	 * Index method
	 */
	public function action_index()
	{

		$section = Section_Core::make(1)
		->hidePagination(true)
		->getArticles();

		$this->template->content = view::factory('front_page/index')
		->set('section', $section->render());



		$this->meta->setTitle('Caravana cu medici - caravanacumedici.ro')
				   ->setDescription('')
				   ->setKeywords('')
				   ->set('canonical', url::link())
		;
	}

	public function action_test()
	{
		$this->template->content = view::factory('front_page/test');
	}

	public function action_contact()
	{
		 $content = view::factory('front_page/contact');

		if ($this->request->post('contact'))
		{

			$valid = Validation::factory($this->request->post('contact'));
			$valid->rule('name', 'not_empty')
						->rule('name', 'max_length', array (':value', 200))
						->rule('email', 'not_empty')
						->rule('email', 'email')
						->rule('email', 'max_length', array (':value', 200))
						->rule('phone', 'not_empty')
						->rule('phone', 'phone')
						->rule('phone', 'max_length', array (':value', 20))
						->rule('subject', 'not_empty')
						->rule('subject', 'max_length', array (':value', 255))
						->rule('message', 'not_empty')
						->rule('subject', 'max_length', array (':value', 800))
			;

			if ($valid->check())
			{
				$content->set('messageSent', true);
				$values = $valid->data();


				Model_Contact_Message::make()->addMessage($valid->data());

				$message =
					'Nume: ' . $values['name'] . '<br>'
					.'Email: ' . $values['email'] . '<br>'
					.'Telefon: ' . $values['phone'] . '<br>'
					.'Mesaj: ' . $values['message'] . '<br>'
					;

						if ( ! $this->isDevelopment()) {
							mail('contact@caravanacumedici.ro', $values['subject'], $message);
						}
			}
			else
			{
					$content->set('errors', $valid->errors());
					$content->set('values', $valid->data());
			}
		}

		$this->template->content = $content;
	}

} // End Welcome
