<?php
class Core_Article_Model extends Core_Model {

	protected static $table_name = 'articles';
	protected static $db_fields = array(
		'id',
		'user_id',
		'category_id',
		'title',
		'subtitle',
		'body',
		'slug',
		'image_hash',
		'bitly',
		'facebook_id',
		'twitter_id',
		'facebook_message',
		'twitter_message',
		'time_create',
		'time_update',
		'time_publish',
		'status',
	);

    protected $id;
	protected $user_id;
	protected $category_id;
	protected $title;
	protected $subtitle;
	protected $body;
	protected $slug;
	protected $image_hash;
	protected $bitly;
	protected $facebook_id;
	protected $twitter_id;
	protected $facebook_message;
	protected $twitter_message;
	protected $time_create;
	protected $time_update;
	protected $time_publish;
	protected $status;
	
    
	function __construct() {
		parent::__construct();
	}

	public function get_id() {
		return $this->id;
	}

	public function get_user_id() {
		return $this->user_id;
	}

	public function set_user_id($user_id) {
		$this->user_id = $user_id;
	}

	public function get_category_id() {
		return $this->category_id;
	}

	public function set_category_id($category_id) {
		$this->category_id = $category_id;
	}
	
	public function get_title() {
		return $this->title;
	}

	public function set_title($title) {
		$this->title = $title;
	}

	public function get_subtitle() {
		return $this->subtitle;
	}

	public function set_subtitle($subtitle) {
		$this->subtitle = $subtitle;
	}

	public function get_body() {
		
		return $this->body;
	}

	public function set_body($body) {
		$this->body = $body;
	}

	public function get_slug() {
		return $this->slug;
	}

	public function set_slug($slug) {
		$this->slug = $slug;
	}
	
	public function get_image_hash() {
		return $this->image_hash;
	}

	public function set_image_hash($image_hash) {
		$this->image_hash = $image_hash;
	}
	
	public function get_bitly() {
		return $this->bitly;
	}

	public function set_bitly($bitly) {
		$this->bitly = $bitly;
	}
	
	public function get_facebook_id() {
		return $this->facebook_id;
	}

	public function set_facebook_id($facebook_id) {
		$this->facebook_id = $facebook_id;
	}
	
	public function get_twitter_id() {
		return $this->twitter_id;
	}

	public function set_twitter_id($twitter_id) {
		$this->twitter_id = $twitter_id;
	}
	
	public function get_facebook_message() {
		return $this->facebook_message;
	}

	public function set_facebook_message($facebook_message) {
		$this->facebook_message = $facebook_message;
	}
	
	public function get_twitter_message() {
		return $this->twitter_message;
	}

	public function set_twitter_message($twitter_message) {
		$this->twitter_message = $twitter_message;
	}
	
	public function get_time_create() {
		return $this->time_create;
	}

	public function set_time_create($time_create) {
		$this->time_create = $time_create;
	}

	public function get_time_update() {
		return $this->time_update;
	}

	public function set_time_update($time_update) {
		$this->time_update = $time_update;
	}

	public function get_time_publish() {
		return $this->time_publish;
	}

	public function set_time_publish($time_publish) {
		$this->time_publish = $time_publish;
	}

	public function get_status() {
		return $this->status;
	}

	public function set_status($status) {
		$this->status = $status;
	}
	
	

}
?>