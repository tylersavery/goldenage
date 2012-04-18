
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
				<th>Edit</th>
				<th>Delete</th>
			</thead>
			<tbody>
			<?php if($this->comments): ?>
				<?php foreach($this->comments as $comment): ?>
					<tr id="comment_<?php echo $comment->get_id();?>">
						<td class="id"><?php echo $comment->get_id();?></td>
						<td class="article_id"><?php echo $comment->get_article_id();?></td>
						<td class="user_name"><?php echo $comment->get_user_name();?></td>
						<td class="user_email"><?php echo $comment->get_user_email();?></td>
						<td class="user_comment"><?php echo $comment->get_user_comment();?></td>
						<td class="user_webiste"><?php echo $comment->get_user_webiste();?></td>
						<td class="image"><?php echo $comment->get_image();?></td>
						<td class="entry_datetime"><?php echo $comment->get_entry_datetime();?></td>
						<td class="edit"><a href="/admin/comment/edit/<?php echo $comment->get_id();?>" class="btn primary">Edit</a></td>
						<td class="delete"><a href="/admin/comment/delete/<?php echo $comment->get_id();?>" class="btn danger">Delete</a></td>
					</tr>
				<?php endforeach; ?>
			<?php endif; ?>
			</tbody>
		</table>
	</div>
	<div class="actions">
		<div class="action_buttons">
			<a href="/admin/" class="btn">Back</a>
			<a href="/admin/comment/add" class="btn primary">Create New Comment</a>
		</div>
	</div>

