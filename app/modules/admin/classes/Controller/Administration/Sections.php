<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Administration_Sections extends Controller_Admin {
	var $modelName = 'Model_Section';
	/**
	 * Type of arrays see Model_Section::$types
	 *
	 * @var array
	 */
	protected $types;
	/**
	 * The parent id for the displayed sections
	 *
	 * @var int
	 */

	protected $parent_id = 0;

	public function action_index()
	{
		$this->template->content = $this->getGrid();
	}

	public function action_get_items()
	{

		$this->model->where('parent_id', '=', $this->parent_id);

		parent::action_get_items();

		//echo View::factory('profiler/stats');
	}

	public function action_duplicate( $id = null)
	{
		$this->autoRender = false;

		$id = ($id!==null)?$id:$this->request->param('id',null);

		$section = ORM::factory('Section', $id);

		$post = $this->request->post();
		if(!empty($post['save']))
		{
			$sectionExists = ORM::factory('Section')
							->where('section_id','=',$section->section_id)
							->where('language','=',$post['language'])
							->find()
			;

			if($sectionExists->loaded())
			{
				echo 'Section already exists on:'.$post['language'];
				die();
			}
			else
			{
				$section->language = $post['language'];
				$section->name     .= ' '.$post['language'];
				$values = $section->as_array();
				unset($values['id']);

				$newSection = ORM::factory('Section');
				$section = $newSection->values($values)->save();
			}
		}


		$view = new View('admin/sections/duplicate');
		$view->section = $section;
		$view->languages = ORM::factory('Language')->find_all()->as_array('code','name');

		echo $view->render();
	}

	public function changeProperties()
	{

		$this->properties

			->edit('language','hidden', true)
			->edit('language','editable', false)

			->edit('parent_id','hidden', true)
			->edit('parent_id','editable', false)

			->edit('active','stype', 'select')
			->edit('active','editoptions', $this->activeStatuses)
			->edit('active','edittype', 'select')

			->edit('section_id','title','Actions')
			->edit('section_id','search',true)
			->edit('section_id','export', false)
			->edit('section_id','sortable',true)
			->edit('section_id','editable',false)

			->edit('type','hidden', true)
			->edit('type','editable', false)

			->edit('affiliate_id','hidden', true)
			->edit('affiliate_id','editable', false)

		;
	}

	public function action_edit( $post = NULL )
	{
		$post      = $this->request->post();
		$operation = $post['oper'];
		$prefix    = strtolower($this->modelName).$this->colIndicator;

		$post[$prefix.'parent_id'] = $this->parent_id;

		if (in_array($operation, array (self::OPERATION_ADD)))
		{
			$item = ORM::factory('Section')->order_by('section_id', 'desc')->find();
			$post[$prefix.'section_id'] = $item->section_id + 1;
		}

		parent::action_edit($post);
	}

}
