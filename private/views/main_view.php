<div id="slider">
    <div class="wrap">
        <?= $this->slides; ?>
    </div><!--/.wrap -->
</div><!--/#slider-->

<div id="page_content">
    <div class="wrap">
        <div id="outer_posts">
            
            <? foreach($this->articles as $article): ?>
            
            <div class="outer_post">
                <div class="photo">
                <? if($article->get_thumbnail_image()): ?>
                    <img src="<?= $article->get_thumbnail_image()->get_permalink_blur();?>" class="blur">
                    <img src="<?= $article->get_thumbnail_image()->get_permalink();?>" class="focus" style="display: none">
                <? endif; ?>
                </div>
                <div class="content">
                    <div class="top">
                        <div class="date"><?= $article->get_friendly_date(); ?></div>
                        <div class="comment_number"><?= $article->get_num_comments();?></div>
                    </div><!-- /.top -->
                    <div class="title"><a href="<?= $article->get_permalink();?>"><?= $article->get_title(); ?></a></div>
                    <div class="body">
                        <?= $article->get_excerpt(); ?>
                        <div class="more"><a href="<?= $article->get_permalink();?>">Read More</a></div>
                    </div> <!--/.body -->
                    <div class="category">music</div>
                </div><!-- /.content -->
                <div class="clear"></div>
            </div><!-- /.outer_post -->
            
            <? endforeach; ?>    
            
            
        </div><!--/#outer_posts -->
    </div><!-- /.wrap -->
</div><!-- /#page_content -->