<?php
class Article_Model extends Core_Article_Model {
	
	protected $user;
	protected $category;
	
    function __construct() {
		parent::__construct();	
	}
	
	
	protected static function instantiate($record) {
		$article = parent::instantiate($record);
        $image_hash = $article->get_image_hash();
		if (! empty($image_hash)) {
			$article->set_original_image(
				Image_Model::find_by_attributes(
					array(
						'image_crop_id' => 1,
						'image_hash'    => $image_hash
					)
				)
			);
			$article->set_main_image(
				Image_Model::find_by_attributes(
					array(
						'image_crop_id' => 2,
						'image_hash'    => $image_hash
					)
				)
			);
			$article->set_thumbnail_image(
				Image_Model::find_by_attributes(
					array(
						'image_crop_id' => 3,
						'image_hash'    => $image_hash
					)
				)
			);
			
		}
		
		
		$article->user = User_Model::find_by_id($article->user_id);
		$article->category = Category_Model::find_by_id($article->category_id);

		return $article;
	}
	
	
	public static function find_by_slug($slug) {
		$result = static::find_by_sql("SELECT * FROM " . static::$table_name . " WHERE slug = '". $slug . "' LIMIT 1");
		return !empty($result) ? array_shift($result) : false;
		
	}
	
	protected function create(){
		$this->set_time_create(time());
		parent::create();
	}
	
	
	public function get_user(){
		return $this->user;
	}
	
	public function get_category(){
		return $this->category;
	}

	public function get_friendly_status() {
		switch ($this->get_status()){
			case 'a':
				return 'Active';
				break;
			case 'p':
				return 'Draft';
				break;
			case 'd':
				return 'Deleted';
			break;
		}
		return '';
	}
	
	public function get_permalink($absolute = false) {
		if($absolute){
			return URL . 'article/' . $this->slug;
		}
		
		return '/article/' . $this->slug;
	}
	
	
	public function get_excerpt($num = 16) {
		
		return word_trim($this->get_body(), $num);
	}
	
	
	public function get_all_image_hashes() {
		global $database;
		$sql = "SELECT DISTINCT images.image_hash FROM images INNER JOIN article_image_hashes ON images.image_hash = article_image_hashes.image_hash WHERE article_image_hashes.article_id = ".$this->get_id();
		
		$result = $database->query($sql);
		$rows = $database->affected_rows($result);
		for ($i = 0; $i < $database->affected_rows($result); $i++) {
			$row = $database->fetch_array($result);
			$image_hashes[] = $row[0];
		}
		return $image_hashes;
	}
	
	
	
	public function get_original_image() {
		return $this->original_image;
	}
	
	public function set_original_image($original_image) {
		$this->original_image = $original_image;
	}
	
	public function get_main_image() {
		return $this->main_image;
	}
	
	public function set_main_image($main_image) {
		$this->main_image = $main_image;
	}
	
	public function get_thumbnail_image() {
		return $this->thumbnail_image;
	}
	
	public function set_thumbnail_image($thumbnail_image) {
		$this->thumbnail_image = $thumbnail_image;
	}

}
?>