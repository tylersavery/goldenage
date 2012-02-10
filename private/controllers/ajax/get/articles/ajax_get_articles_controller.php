<?php
class Ajax_Get_Articles_Controller extends Ajax_Get_Controller {

	protected $html;
	protected $more;
	protected $error;

	function __construct($uri, $data) {
		parent::__construct($uri, $data);
		
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$limit = (isset($_GET['limit'])) ? $_GET['limit'] : 10;
			$offset = (isset($_GET['offset'])) ? $_GET['offset'] : 0;
			$sql = 'SELECT id, title, image_hash, category_id, sub_category_id FROM articles ORDER BY time_update DESC LIMIT '.$limit.' OFFSET '.$offset;
			$articles = Article_Model::find_by_sql($sql);
			$count = sizeof($articles);
			$sql = 'SELECT COUNT(*) FROM articles';
			$total_count = Article_Model::count_all_by_sql($sql);
			if ($count == 0 || ($count + $offset) >= $total_count) {
				$this->more = false;
			} else {
				$this->more = true;
			}
			
			$this->html = '';			
			foreach ($articles as $article) {
				$this->html .= '<tr id="article_'.$article->get_id().'">';
				$image = $article->get_image('dailycable');
				if (!empty($image)) {
					$this->html .= '<td class="image"><img src="'.$image.'" /></td>';
				} else {
					$this->html .= '<td class="image"><span class="label warning">no image</span></td>';
				}
				$this->html .= '<td class="title">'.$article->get_title().'</td>';
				if ($article->get_category()) {
					if ($article->get_subcategory()) {
						$this->html .= '<td class="category">'.$article->get_category()->get_title().' &raquo; '.$article->get_subcategory()->get_title().'</td>';
					} else {
						$this->html .= '<td class="category">'.$article->get_category()->get_title().'</td>';
					}
				} else {
					$this->html .= '<td class="category"><span class="label warning">no category</span></td>';
				}
				$this->html .= '<td class="options"><a class="add_article_button btn" href="#" article_id="'.$article->get_id().'">Add</a><a class="btn" href="/admin/article/edit/'.$article->get_id().'">Edit</a></td>';
				$this->html .= '</tr>';
			}
			if (!isset($this->error)) { $this->error = false; }
		} else {
			$this->error = true;
		}
	}

	function content_view() {
		if (!$this->error) { return json_encode(array('more'=>$this->more,'html'=>$this->html)); }
		return 'error';
	}

}
?>