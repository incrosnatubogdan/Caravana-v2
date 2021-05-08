<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Section core
 */
class Section_Core
{
  /**
   * Section model
   *
   * @var Model_Section
   */
  protected $model;

  /**
   * Page
   *
   * @var integer
   */
  protected $page = 1;

  /**
   * Rows count
   *
   * @var integer
   */
  protected $rowsCount = 0;

  /**
   * List of articles
   *
   * @var Model_Article[]
   */
  protected $articles = [];

  /**
   * Number of items per page
   *
   * @var integer
   */
  protected $itemsPerPage = 6;

  /**
   * Hide pagination
   *
   * @var boolean
   */
  protected $hidePagination = false;

  /**
   * Make a section
   *
   * @param  int $id
   *
   * @return Section_Core
   */
  public static function make($id)
  {
    $section = new self;
    $section->model  = Model_Section::make($id);

    return $section;
  }

  /**
   * Set the page
   * @param int $page
   */
  public function setPage($page)
  {
    $this->page = $page;

    return $this;
  }

  /**
   * Hide the pagination
   * @param  boolean $flag
   * @return $this
   */
  public function hidePagination($flag = false){
    $this->hidePagination = $flag;
    return $this;
  }

  /**
   * Get the articles
   *
   * @return $this;
   */
  public function getArticles()
  {
    $sectionsSubQuery = DB::select('section_articles.article_id')
		              ->from('section_articles')
					  ->where('section_articles.section_id', '=', (int)$this->model->id);

    $articles = Model_Article::make()
    ->where('id', 'IN', $sectionsSubQuery)
    ->where('active', '=', 1)
    ;

    $this->rowsCount  = $articles->count_all();

    $this->articles = $articles
    ->where('id', 'IN', $sectionsSubQuery)
    ->where('active', '=', 1)
    ->offset(($this->page-1)*$this->itemsPerPage)
    ->limit($this->itemsPerPage)
    ->order_by('date', 'desc')
    ->order_by('id', 'desc')
    ->find_all();

    return $this;
  }

  /**
   * Render the template
   *
   * @return string
   */
  public function render($view = 'section/list')
  {
    $view = new View($view);

    return $view
    ->set('section', $this->model)
    ->set('articles', $this->articles)
    ->set('pagination', $this->getPagination())
    ;
  }

  protected function getPagination()
  {
    if($this->hidePagination)
    {
      return NULL;
    }

    return Pagination::factory(array (
                          'total_items'    => $this->rowsCount,
                          'current_page'   => [
                            'page'   => $this->page,
                            'source' => 'replace',
                            'key'    => '%page%',
                            'url'    => 'categorie/' . URL::title($this->model->name) . '/%page%'
                          ],
                          'items_per_page' => $this->itemsPerPage,
                          'view'           => 'pagination/form',
                          'auto_hide'      => TRUE,
                        ));
  }


}
