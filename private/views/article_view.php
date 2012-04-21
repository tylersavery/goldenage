
<? if($this->article->get_slider_image()): ?>
<div id="slider">
        <div class="wrap">
            <ul>
                <li><img src="<?= $this->article->get_slider_image()->get_permalink();?>"></li>
            </ul>
        </div><!--/.wrap -->
    </div><!--/#slider-->
<? endif;?>
    
    <div id="page_content">
        <div class="wrap">
            <div id="outer_posts">
                
                <div class="inner_post">
                    <div class="content">
                        <div class="top">
                            <div class="date"><? if($this->show_date):?><?= $this->article->get_friendly_date(); ?><? endif;?></div>
                            <? if($this->show_comments):?><div class="comment_number"><?= $this->article->get_num_comments();?></div><? endif;?>
                        </div><!-- /.top -->
                        <div class="title"><?= $this->article->get_title(); ?></div>
                        <div class="comment">
                            <div class="postbody">
                           <?= $this->article->get_body(); ?>
                            </div>                            
                            
                        </div> <!--/.body -->
                        <div class="category"><?= ucwords($this->article->get_category()->get_title());?>
								<span class="tags">
								<? if($this->article->get_tags()): ?>
									<? foreach($this->article->get_tag_array() as $tag): ?>
										#<?= strtolower($tag) . " "; ?>
									<? endforeach; ?>
								</span>
								<? endif; ?>
						</div>
                    </div><!-- /.content -->
                    <div class="clear"></div>
                </div><!-- /.outer_post -->

<? if($this->comments && $this->show_comments): ?>         
<?php foreach($this->comments as $comment): ?>             
               
                 <div class="inner_post">
                    <div class="content">
                        <div class="separator"></div>
                        <div class="comment">
                            <div class="thumb">
                            <? if($comment->get_image()):?>
                                <img src="/images/uploads/comments/<?= $comment->get_image();?>" />
                            <? endif; ?>
                            </div>
                            <div class="date"><?= $comment->get_friendly_date();?></div>
                            <div class="name"><?= $comment->get_user_name();?></div>
                            <div class="body">
                               <?= $comment->get_user_comment();?>
                            </div>
                        </div>
                        <div class="category">&nbsp;</div>
                    </div><!-- /.content -->
                    <div class="clear"></div>
                </div><!-- /.inner_post -->

<?php endforeach; ?>
<?php endif; ?>



                <div class="inner_post">
                    <div class="content">
					<? if($this->show_comments):?>
                        <div class="comment">
                        <div class="body">
	                    
							    <div class="frmleft">
                                    
									<div class="frmpic">
                                        
                                        <? if($this->new_comment_image): ?>
                                            <img src="/images/uploads/comments/<?=$this->new_comment_image;?>" />
                                        <? endif; ?>
                                        
                                    </div>
                                    <form method="post" action="" enctype="multipart/form-data">
                                        <input type="file" name="imageupload" />
                                        <div><input id="bupload" type="submit" name="image_upload_submit" value="Upload picture"></div>
                                        
                                    </form>
                                    
                                </div>
					
								<form id="commentform" method="post" action="">
								<div class="frmright">
									<div>
										<label for="frmname">Name (required):</label>
										<input id="frmname" name="user_name" type="text"/>
									</div>
									<div>
										<label for="frmmail">E-mail (required):</label>
										<input id="frmmail" name="user_email" type="text"/>
									</div>
									<div>
										<label for="frmmail">Website:</label>
										<input id="frmmail" name="user_website" type="text" />
									</div>
									<div>
										<input id="frmcomment" name="user_comment" type="text" />
									</div>
									<div>
                                        <input type="hidden" name="image" value="<? if($this->new_comment_image){ echo $this->new_comment_image; }?>" />
                                        
										<input id="bsubmit" name="new_comment" type="submit" value="Submit Comment"/>
									</div>
								</div>
							</form>
                        </div>
                        </div> <!--/.body -->
                         <div class="category">&nbsp;</div>
                        <? endif;?>
                       
                    </div><!-- /.content -->
                    <div class="clear"></div>
                </div><!-- /.outer_post -->
             
            </div><!--/#outer_posts -->

        </div><!-- /.wrap -->
    </div><!-- /#page_content -->