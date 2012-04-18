<h2>Articles</h2>
<? foreach($this->articles as $article): ?>

<article>
    <h3>
        <?php if ($article->get_category()): ?>
            <?= $article->get_category()->get_title();?>:
        <?php endif; ?>
        <a href="<?= $article->get_permalink(); ?>"><?= $article->get_title(); ?></a>
    </h3>
    <p><?= $article->get_body(); ?></p>
    <cite>By: <?= $article->get_body(); ?> at <?= $article->get_time_publish();?></cite>
</article>

<?php if($article->get_facebook_id() != ''): ?>
    
    <?php
    
        $fb = new Facebook(array(
			'appId'  => FACEBOOK_APP_ID,
			'secret' => FACEBOOK_SECRET
		));
        
        
        $url = 'https://graph.facebook.com/' . $article->get_facebook_id();
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        
        $object = json_decode($output, false);
    
    
        foreach($object->comments->data as $comment){
            
            $html = '<div class="comment">';
            $html .= '<img src="http://graph.facebook.com/' . $comment->from->id . '/picture" width=50" />';
            $html .= $comment->from->name . "<br />";
            $html .= $comment->message;
            $html .= '</div>';
            
            echo $html;
            
        }
        
       
    
    ?>

<?php endif; ?>

<?php if($article->get_twitter_id() != ''):?>

<?php

$twitter = new TwitterOAuth(OAUTH_KEY, OAUTH_SECRET, OAUTH_TOKEN, OAUTH_TOKEN_SECRET);

$result = $twitter->get('statuses/show/'. $article->get_twitter_id());

$retweets = $result->retweet_count;

echo "Retweets: ". $retweets;



?>

<?php endif; ?>

<? endforeach; ?>