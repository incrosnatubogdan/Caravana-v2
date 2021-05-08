<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Administration_Articles extends Controller_Admin
{
	var $modelName = 'Model_Article';

	public function action_index()
	{
		$this->template->content = $this->getGrid();
	}

	public function changeProperties()
	{
		$this->properties

			->edit('picture_id', 'hidden', TRUE)
			->edit('picture_id', 'editable', false)

			->edit('date', 'searchoptions', 'JS_FUNCTION_DATEPICKER')
			->edit('date', 'editoptions', 'JS_FUNCTION_DATEPICKER')

			->edit('active', 'stype', 'select')
			->edit('active', 'editoptions', $this->activeStatuses)
			->edit('active', 'edittype', 'select')

			->edit('language', 'hidden', TRUE)
			->edit('language', 'editable', false)
			->edit('views', 'editable', false)

			->edit('teaser', 'search', FALSE)
			->edit('teaser', 'search_type', 'like')
			->edit('teaser', 'export', FALSE)
			->edit('teaser', 'sortable', FALSE)
			->edit('teaser', 'editable', FALSE)

			->edit('text', 'search', FALSE)
			->edit('text', 'search_type', 'like')
			->edit('text', 'export', FALSE)
			->edit('text', 'sortable', FALSE)
			->edit('text', 'editable', FALSE)
			->edit('text', 'buttons', array (
				             array (
					             'key'    => 'id',
					             'url'    => 'administration/articles/edit_text/',
					             'icon'   => 'wrench',
					             'ajax'   => FALSE,
					             'reload' => FALSE,
				             ),
			             )
			)

			->edit('affiliate_id', 'hidden', true)
			->edit('affiliate_id', 'editable', false)


			;

	}

	public function action_set_main($id = 0, $picture_id = 0)
	{
		$id         = $this->request->param('id', $id);
		$picture_id = $this->request->param('id2', $picture_id);

		$this->autoRender = FALSE;
		$article          = ORM::factory('article', $id);
		if ($article->id)
		{
			$article->picture_id = $picture_id;
			$article->save();
		}
	}

	public function action_edit_text($id = FALSE)
	{
		$id = $this->request->param('id', $id);

		$item = ORM::factory('article', $id);

		if ($this->request->post('save'))
		{
			$post = $this->request->post('item');

			if (!empty($post))
			{

				foreach ($post as $key => $value)
				{
					$item->$key = $value;
				}

				$item->save();
			}
		}

		$this->template->content = View::factory('admin/articles/edit')->set('item', $item);
	}

	public function action_edit_sections($id = FALSE)
	{
		$id = $this->request->param('id', $id);

		$item = ORM::factory('article', $id);


		$this->template->content = View::factory('admin/articles/sections')->set('item', $item);

	}

	/**
	 * Edit sections
	 *
	 * @param null $language
	 */
	public function action_sections($language = NULL, $articleId = NULL)
	{
		$language = $this->request->param('id', $language);
		$articleId = $this->request->param('id2', $articleId);

		$article = ORM::factory('Article', $articleId);

		$query    = $this->request->query('term');
		$results  = ORM::factory('Section')
						->where('language', '=', $language)
						->where('name', 'like', $query.'%')
						->where('affiliate_id','=', (int) $article->affiliate_id)
						->limit(20)
						->find_all()
		;

		$return = [];
		foreach($results as $item)
		{
			$return[] = array('id' => $item->section_id, 'name' => $item->name, 'label' => $item->name );
		}

		echo json_encode($return);

		exit;
	}

	/**
	 * Add article and section association
	 *
	 * @param null $sectionId
	 * @param null $articleId
	 */
	public function action_add_section($sectionId = NULL, $articleId = NULL)
	{
		$this->autoRender = false;

		$sectionId = (int) ($sectionId) ?  : $this->request->param('id');
		$articleId = (int) ($articleId) ? : $this->request->param('id2');

		$association = ORM::factory('SectionArticle')
						->where('section_id', '=', $sectionId)
						->where('article_id', '=', $articleId)
						->find()
		;

		$section = ORM::factory('Section')
					->where('section_id', '=', $sectionId)
					->find()
		;

		$association->section_id = $sectionId;
		$association->article_id = $articleId;
		$association->save();

		if($section->parent_id!=0)
		{
			$this->action_add_section($section->parent_id, $articleId);
		}
	}

	/**
	 * Delete article and section association
	 *
	 * @param null $sectionId
	 * @param null $articleId
	 */
	public function action_delete_section($sectionId = NULL, $articleId = NULL)
	{
		$sectionId = (int) $this->request->param('id', $sectionId);
		$articleId = (int) $this->request->param('id2', $articleId);

		$association = ORM::factory('SectionArticle')
		                  ->where('section_id', '=', $sectionId)
		                  ->where('article_id', '=', $articleId)
		                  ->find()
		;

		$association->delete();

		exit;
	}

	/**
	 * Delete article and interval association
	 *
	 * @param null $intervalId
	 * @param null $articleId
	 */
	public function action_delete_interval($intervalId = NULL, $articleId = NULL)
	{
		$intervalId = (int) $this->request->param('id', $intervalId);
		$articleId  = (int) $this->request->param('id2', $articleId);

		$association = ORM::factory('articleInterval')
		                  ->where('interval_id', '=', $intervalId)
		                  ->where('article_id', '=', $articleId)
		                  ->find()
		;

		$association->delete();

		exit;
	}

	public function action_list_sections($id = NULL)
	{
		$id = (int) $this->request->param('id', $id);
		$article = ORM::factory('Article', $id);

		$results = ORM::factory('Section')
		              ->select('*')
		              ->join('section_articles')
		              ->on('section_articles.section_id','=','section.section_id')
		              ->where('section.language','=', $article->language)
					  ->where('section_articles.article_id','=', $article->id)
		              ->find_all();

		$list = [];
		foreach($results as $item)
		{
			$list[$item->type][] = $item;
		}

		echo View::factory('admin/articles/sections_list')
				->set('list', $list)
				->set('types', ORM::factory('Section')->getTypes())
				->render()
		;

		exit;
	}

}
