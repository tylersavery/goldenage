<?php
class Feed_Controller extends Static_Base_Controller {
    
    function __construct($uri, $data) {
        parent::__construct($uri, $data);
        $this->capture_view->format = strtoupper($data['format']);
    }
    
    protected function content_view() {

        require_once LIBRARY_ROOT . "feedcreator.class.php";
        define("FEEDCREATOR_VERSION", "Pigeon RSS Generator");
        
        $supported_formats = array(
            'RSS0.91',
            'RSS1.0',
            'RSS2.0',
            'PIE0.1',
            'MBOX',
            'OPML',
            'ATOM',
            'ATOM1.0',
            'ATOM0.3',
            'HTML',
            'JS'
        );
        if (in_array($this->capture_view->format, $supported_formats)) {
            $format = $this->capture_view->format;
        } else {
            $format = 'RSS2.0';
        }
        
        $recent_articles = Article_Model::find_all();
        
        $rss = new UniversalFeedCreator();
        $rss->useCached();
        $rss->title=$this->title;
        $rss->description="Feed";
        $rss->link= URL;
        $rss->syndicationURL=URL;
        
        foreach ($recent_articles as $article) {
            // Channel items/entries
            $item              = new FeedItem();
            $item->title       = $article->get_title();
            $item->link        = $article->get_permalink();
            $item->description = $article->get_subtitle();
            $item->date        = $article->get_time_publish();
            $item->author      = $article->get_user()->get_full_name();
            
            // Optional enclosure support
          
          /*$item->enclosure         = new EnclosureItem();
            $item->enclosure->url    = 'http://' . ENVIROMENT . $article->get_image('thumbnail');
            $item->enclosure->length = "65905";
            $item->enclosure->type   = 'image/jpeg';
          */  
            $rss->addItem($item);
        }
        
        //Valid parameters are RSS0.91, RSS1.0, RSS2.0, PIE0.1 (deprecated),
        // MBOX, OPML, ATOM, ATOM1.0, ATOM0.3, HTML, JS
        
        $rss->outputFeed($format); 
        die('');
    }
    
}
?>