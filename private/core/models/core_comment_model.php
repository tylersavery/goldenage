<?php
class Core_Comment_Model extends Core_Model {

	protected static $table_name = 'comments';
	protected static $db_fields = array(
		'id',
		'article_id',
		'user_name',
		'user_email',
		'user_comment',
		'user_webiste',
		'image',
		'entry_datetime'
	);

	protected $id;
	protected $article_id;
	protected $user_name;
	protected $user_email;
	protected $user_comment;
	protected $user_webiste;
	protected $image;
	protected $entry_datetime;

	function __construct() {
		parent::__construct();
	}

	public function get_id() {
		return $this->id;
	}

	public function set_id($id) {
		$this->id = $id;
	}

	public function get_article_id() {
		return $this->article_id;
	}

	public function set_article_id($article_id) {
		$this->article_id = $article_id;
	}

	public function get_user_name() {
		return $this->user_name;
	}

	public function set_user_name($user_name) {
		$this->user_name = $user_name;
	}

	public function get_user_email() {
		return $this->user_email;
	}

	public function set_user_email($user_email) {
		$this->user_email = $user_email;
	}

	public function get_user_comment() {
		return $this->user_comment;
	}

	public function set_user_comment($user_comment) {
		$this->user_comment = $user_comment;
	}

	public function get_user_webiste() {
		return $this->user_webiste;
	}

	public function set_user_webiste($user_webiste) {
		$this->user_webiste = $user_webiste;
	}

	public function get_image() {
		return $this->image;
	}

	public function set_image($image) {
		$this->image = $image;
	}

	public function get_entry_datetime() {
		return $this->entry_datetime;
	}

	public function set_entry_datetime($entry_datetime) {
		$this->entry_datetime = $entry_datetime;
	}

}
?>