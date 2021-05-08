<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Articles extends Controller_Base {

	public function action_show($id = 0){
		$id = $this->request->param('id', $id);

		$article = Model_Article::make($id);

		if(empty($article->id))
		{
			throw new Http_Exception_404();
		}

		$link	 		= url::link('articol/'.URL::title($article->title).'-'.$article->id.'.html');
		$picture  = Model_Picture::make()->where('id', '=',(int) $article->picture_id)->where('active', '=', 1)->find();
		$pictures = Model_Picture::make()->where('item_id', '=', (int) $article->id)->where('item_type', '=', 0)->where('active', '=', 1)->find_all();

		$this->meta->setTitle($article->title . ' - caravanacumedici.ro')
				   ->setDescription($article->teaser)
				   ->setKeywords('')
				   ->set('canonical', $link)
		;

		$content = view::factory('articles/show');
		$content->set('link', $link);
		$content->set('picture', $picture);
		$content->set('pictures', $pictures);

		$content->set('article', $article);
		$this->template->content = $content;
	}

} // End Welcome
