<div id="slider">
    <div class="wrap">
        <ul>
            <li><img src="/images/temp/slider1.jpg"></li>
            <li><img src="/images/temp/slider1.jpg"></li>
            <li><img src="/images/temp/slider1.jpg"></li>
        </ul>
    </div><!--/.wrap -->
</div><!--/#slider-->

<div id="page_content">
    <div class="wrap">
        <div id="outer_posts">
            
            <? foreach($this->articles as $article): ?>
            
            <div class="outer_post">
                <div class="photo"><img src="/images/temp/photo1.jpg"></div>
                <div class="content">
                    <div class="top">
                        <div class="date">January 12th, 2012</div>
                        <div class="comment_number">12 Comments</div>
                    </div><!-- /.top -->
                    <div class="title"><?= $article->get_title(); ?></div>
                    <div class="body">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce id mi dui, sit amet pulvinar nisi. Integer ullamcorper orci urna, non ultricies neque. Aliquam erat volutpat. Nullam vehicula, neque bibendum imperdiet semper, risus enim vehicula lorem, sed pellentesque ipsum dolor a nisl.
                        <div class="more"><a href="#">Read More</a></div>
                    </div> <!--/.body -->
                    <div class="category">music</div>
                </div><!-- /.content -->
                <div class="clear"></div>
            </div><!-- /.outer_post -->
            
            <? endforeach; ?>    
            
            
        </div><!--/#outer_posts -->
    </div><!-- /.wrap -->
</div><!-- /#page_content -->