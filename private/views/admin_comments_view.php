
	<h2>Manage Comments</h2>

	<div class="list_all">
		<table>
			<thead>
				<th>id</th>
				<th>Article</th>
				<th>Name</th>
				<th>Email</th>
				<th>Comment</th>
				<th>Website</th>
				<th>Image</th>
				<th>Date</th>
				<th>Delete</th>
			</thead>
			<tbody>
			<?php if($this->comments): ?>
				<?php foreach($this->comments as $comment): ?>
					<?php if($comment->get_article()): ?>
						<tr id="comment_<?php echo $comment->get_id();?>">
							<td class="id"><?php echo $comment->get_id();?></td>
							<td class="article_id">
							<a href="<?= $comment->get_article()->get_permalink();?>" target="_blank"><?php echo $comment->get_article()->get_title();?></a>
							</td>
							<td class="user_name"><?php echo $comment->get_user_name();?></td>
							<td class="user_email"><?php echo $comment->get_user_email();?></td>
							<td class="user_comment"><?php echo $comment->get_user_comment();?></td>
							<td class="user_webiste"><?php echo $comment->get_user_webiste();?></td>
							<td class="image"><? if($comment->get_image()):?><img width="75" src="/images/uploads/comments/<?= $comment->get_image();?>" /><? endif; ?></td>
							<td class="entry_datetime"><?php echo time_to_friendly_date($comment->get_entry_datetime(),'Y-m-d g:i a');?></td>
							<td class="delete"><a href="/admin/comment/delete/<?php echo $comment->get_id();?>" class="btn danger">Delete</a></td>
						</tr>
					<? endif;?>
				<?php endforeach; ?>
			<?php endif; ?>
			</tbody>
		</table>
	</div>
	<div class="actions">
		<div class="action_buttons">
			<a href="/admin/" class="btn">Back</a>
		
		</div>
	</div>

