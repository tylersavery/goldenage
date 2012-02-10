	<h1 class="title">Manage Categories</h1>

	<div class="list_all">
		<table>
			<thead>
				<th width="10%">id</th>
				<th width="70%">Title</th>
				<th width="10%">Status</th>
				<th width="10%">Options</th>
			</thead>
			<tbody>
			<?php foreach($this->categories as $category): ?>
				<tr id="category_<?php echo $category->get_id();?>">
					<td class="id"><?php echo $category->get_id();?></td>
					<td class="title"><?php echo $category->get_title();?></td>
					<td class="status"><?php echo $category->get_status();?></td>
					<td class="options"><a class="btn" href="/admin/category/edit/<?php echo $category->get_id();?>">Edit</a><a class="btn danger delete" href="/admin/category/delete/<?php echo $category->get_id();?>">Delete</a></td>
				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
	</div>
	<div class="actions">
		<div class="action_buttons">
			
			<a href="/admin/" class="btn">Back</a>
			<a href="/admin/category/add" class="btn primary">Add New Category</a>
		</div>
	</div>
