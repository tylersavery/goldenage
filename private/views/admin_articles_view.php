<h1 class="title">Manage Articles</h1>
<div class="list_all">
	<form method="get" name="search" class="search_form">
		<input type="text" name="q" placeholder="search" id="search" value="<?php echo $this->search_query; ?>" />
		<input type="submit" class="btn" value="Search">
	</form>
	<table>
		<thead>
			<th>Image</th>
			<th>
				Title
				<div class="sorting">
					<a href="?page=1&order=title&direction=desc<?php if($this->search_query): echo "&q=" . $this->search_query; endif; ?>"><span class="label">^</span></a>
					<a href="?page=1&order=title&direction=asc<?php if($this->search_query): echo "&q=" . $this->search_query; endif; ?>"><span class="label">v</span></a>
				</div>
			</th>
			<th>User
				<div class="filtering">
					<select id="filter-author" rel="user_id">
						<option value="">Filter</option>
						<?php foreach($this->users as $user): ?>
						<?php
							$selected = '';
							if(isset($_GET['user_id']) && $_GET['user_id'] == $user->get_id()){
								$selected = ' selected="selected" ';
							}
						?>
						<option value="<?php echo $user->get_id(); ?>" <?php echo $selected; ?> ><?php echo $user->get_full_name(); ?></option>
						<?php endforeach; ?>  
					</select>
				</div>
			</th>
			<th>
				Category
				<div class="filtering">
					<select id="filter-category" rel="category_id">
						<option value="">Filter</option>
						<?php foreach($this->categories as $category): ?>
						<?php
							$selected = '';
							if (isset($_GET['category_id']) && $_GET['category_id'] == $category->get_id()) {
								$selected = ' selected="selected" ';
							}
						?>
						<option id="trip_<?php echo $category->get_id(); ?>" value="<?php echo $category->get_id(); ?>"<?php echo $selected; ?> ><?php echo $category->get_title(); ?></option>
						<?php endforeach; ?>  
					</select>
				</div>
			</th>

		
			<th width="90">Create Time
				<div class="sorting">
					<a href="?page=1&order=time_create&direction=desc<?php if($this->search_query): echo "&q=" . $this->search_query; endif; ?>"><span class="label">^</span></a>
					<a href="?page=1&order=time_create&direction=asc<?php if($this->search_query): echo "&q=" . $this->search_query; endif; ?>"><span class="label">v</span></a>
				</div>
			</th>
			<th width="90">Publish Time
				<div class="sorting">
					<a href="?page=1&order=time_publish&direction=desc"><span class="label">^</span></a>
					<a href="?page=1&order=time_publish&direction=asc"><span class="label">v</span></a>
				</div>
			</th>
			<th>Status
				<div class="sorting">
					<a href="?page=1&order=status&direction=desc"><span class="label">^</span></a>
					<a href="?page=1&order=status&direction=asc"><span class="label">v</span></a>
				</div>
			</th>
			<th width="100">Options</th>
			<th>Publish</th>
		</thead>
		<tbody>
		<?php $odd = false; ?>
		<?php foreach($this->articles as $article): ?>
			<tr class="<?php if ($odd) { echo 'odd'; $odd = false; } else { echo 'even'; $odd = true; }; ?>">
				<td class="image"></td>			    
				<td class="title"><?php echo $article->get_title();?></td>
				<td class="user_id">
					<? if($article->get_user()): ?>
						<?= $article->get_user()->get_full_name();?>
					<? endif; ?>
				</td>
				<td class="category_id">
					<?php
						if ($article->get_category()) {
							echo $article->get_category()->get_title();
						} else {
							echo '--';
						}
					 ?>
					</td>
				
			
				<td class="time_create"><?php echo time_to_friendly_date($article->get_time_create());?></td>
				<td class="time_publish"><?php echo time_to_friendly_date($article->get_time_publish());?></td>
				<td class="status"><?php echo $article->get_friendly_status();?></td>
				<td class="view options">
					<a class="btn" href="<?php echo $article->get_permalink();?>" target="_blank">View</a>
					<a class="btn" href="/admin/article/edit/<?php echo $article->get_id();?>">Edit</a>
					<a class="btn danger delete" href="/admin/article/delete/<?php echo $article->get_id();?>">Delete</a>
				</td>
				<td class="view options">
					<a class="btn disabled" href="#">Website</a><br />
					<a class="btn" href="<?php if($article->get_facebook_id() == ''):?>/admin/publish/facebook/article/<?php echo $article->get_id();?><?php endif;?>#" <?php if($article->get_facebook_id() != ''): echo 'disabled="disabled"'; endif;?>>Facebook</a><br />
					<a class="btn" href="<?php if($article->get_twitter_id() == ''):?>/admin/publish/twitter/article/<?php echo $article->get_id();?><?php endif;?>#" <?php if($article->get_twitter_id() != ''): echo 'disabled="disabled"'; endif;?>>Twitter</a>
				</td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
<div class="pagination">
	<ul>	
	<?php echo $this->pagination_markup ?>
	</ul>
</div>
</div>
<div class="actions">
	<div class="action_buttons">
		<a href="/admin/" class="btn">Back</a>
		<a href="/admin/article/add" class="btn primary">Create New Article</a>
	</div>
</div>

