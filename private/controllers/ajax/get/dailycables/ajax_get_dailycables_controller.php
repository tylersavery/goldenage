<?php
class Ajax_Get_Dailycables_Controller extends Ajax_Get_Controller {

	protected $html;
	protected $count;
	protected $error;

	function __construct($uri, $data) {
		parent::__construct($uri, $data);
		
		if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['date'])) {
			$sql = 'SELECT * FROM dailycables WHERE date = "'.$_GET['date'].'" ORDER BY display_order ASC';
			$dailycables = Dailycable_Model::find_by_sql($sql);
			$this->count = sizeof($dailycables);
			$this->html = '';
			$i = 0;
			
			if ($_GET['output'] == 'widget') {
				
				$this->html .= '<li>';
				foreach ($dailycables as $dailycable) {
					$i++;
					$article = Article_Model::find_by_id($dailycable->get_article_id());
					$this->html .= '<div class="cable">';					
					$this->html .= '<div class="left">';					
					$this->html .= '<a href="'.$article->get_permalink().'"><img src="'.$article->get_image('dailycable').'" height="75" width="75" /></a>';
					$this->html .= '</div>';
					$this->html .= '<div class="right">';
					$this->html .= '<div class="cable_title"><a href="'.$article->get_permalink().'">'.$article->get_title().'</a></div>';
					$this->html .= '<div class="cable_description">';
					if ($article->get_category()) {
						$this->html .= '<a href="'.$article->get_category()->get_permalink().'" class="category">'.$article->get_category()->get_title().'</a>';
					}
					if ($article->get_subcategory()) {
						$this->html .= ': <a href="'.$article->get_subcategory()->get_permalink().'" class="category">'.$article->get_subcategory()->get_title().'</a>';
					}
					$this->html .= '<a href="'.$article->get_permalink().'" class="desc">'.$article->get_excerpt(14).'</a>';
					$this->html .= '</div>';
					$this->html .= '</div>';
					$this->html .= '</div>';
					$this->html .= '<div class="clear"></div>';
					if (!$dailycable || !$article) {
						$this->error = true;
					}
				}
				$this->html .= '<li>';
				
			} else {
				
				foreach ($dailycables as $dailycable) {
					$i++;
					$this->html .= '<tr id="dailycable_'.$i.'" dailycable_id="'.$dailycable->get_id().'" display_order="'.$dailycable->get_display_order().'">';
					$article = Article_Model::find_by_id($dailycable->get_article_id());
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
					$this->html .= '<td class="order"><input type="button" class="btn move_dailycable_up_button" value="Up" /><input type="button" class="btn move_dailycable_down_button" value="Down" /></td>';
					$this->html .= '<td class="options"><a class="btn" href="/admin/article/edit/'.$article->get_id().'">Edit</a><input type="button" class="btn danger delete" value="Delete" /></td>';
					$this->html .= '</tr>';
					if (!$dailycable || !$article) {
						$this->error = true;
					}
				}
				
			}

			if (!isset($this->error)) { $this->error = false; }
		} else {
			$this->error = true;
		}
	}

	function content_view() {
		if (!$this->error) { return json_encode(array('count'=>$this->count,'html'=>$this->html)); }
		return 'error';
	}

}
?>