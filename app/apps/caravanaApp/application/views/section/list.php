<section class="container">

    <? if (!empty($section->id)): ?>
      <h2 class="bar orange bebas"><?=$section->name?></h2>
    <? endif; ?>

    <div class="row">

      <? foreach($articles as $article):
         $picture  = Model_Picture::make()
         ->where('id', '=', $article->picture_id)
         ->where('active','=',1)
         ->find();

         $link	  = url::link('articol/'.URL::title($article->title, '-', true) . '-' . $article->id . '.html');
         $title 	  = HTML::chars($article->title);
      ?>
        <article class="col-md-4 col-sm-6 col-xs-12">
              <a title="<?=$title?>" class="article-box" href="<?=$link?>">

                <? if(!empty($picture->id)):
                    $resize   = url::link('pictures/resize');
                    $small    = $resize.'/470/290/1/';
                ?>
                  <div class="photo" style="background-image:url('<?=$small.$picture->path?>')"></div>
                <? endif; ?>

                <div class="infoWrapper">

                    <div class="info clear">
                        <div class="title bebas">
                          <?=$article->title?>
                        </div>
                    </div>

                  <div class="moreWrapper">
                      <?=$article->teaser?>
                      <div class="space-bottom-xsmall options">
                          <span class="pull-left date"><span class="glyphicon glyphicon-calendar"></span> <?=date('d.m.Y', strtotime($article->date))?></span>
                          <span class="btn pull-right btn-default">Detalii</span>
                      </div>
                  </div>

                </div>
            </a>
        </article>
      <? endforeach;?>

    </div>

    <?=(!empty($pagination)) ? $pagination : ''?>
</section>
