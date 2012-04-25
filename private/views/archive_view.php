<div id="page_content">
        <div class="wrap">
            <div id="outer_posts">
                <div class="inner_post">
                    <div class="content">
                        <div class="top">
                            <div class="date"></div>
                        </div><!-- /.top -->
                        <div class="title">Archive</div>
                        <div class="comment">
                            <div class="postbody">
                                
                                <ul class="archive_list">
                                <? foreach($this->articles as $article): ?>
                                    <li><a href="<?= $article->get_permalink();?>"><?= $article->get_friendly_date();?>: <?= $article->get_title();?></a></li>
                                <? endforeach; ?>
                                </ul>
                                
                            </div>                            
                        </div> <!--/.comment -->
                        <div class="category"></div>
                    </div><!-- /.content -->
                    <div class="clear"></div>
                </div><!-- /.outer_post -->




                <div class="inner_post">
                    <div class="content">
					                       
                    </div><!-- /.content -->
                    <div class="clear"></div>
                </div><!-- /.outer_post -->
             
            </div><!--/#outer_posts -->

        </div><!-- /.wrap -->
    </div><!-- /#page_content -->