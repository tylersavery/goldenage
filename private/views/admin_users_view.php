<h1 class="title">Manage Users</h1>

<div class="list_all">
	<form method="get" name="search" class="search_form">
		<input type="text" name="q" placeholder="search" id="search" value="<?php echo $this->search_query; ?>" />
		<input type="submit" class="btn" value="Search">
	</form>
	<table>
		<thead>
			<th width="10%">
                ID
                <div class="sorting">
					<a href="?page=1&order=id&direction=desc<?php if($this->search_query): echo "&q=" . $this->search_query; endif; ?>"><span class="label">^</span></a>
					<a href="?page=1&order=id&direction=asc<?php if($this->search_query): echo "&q=" . $this->search_query; endif; ?>"><span class="label">v</span></a>
				</div>
            </th>
			<th width="30%">
                Email
                <div class="sorting">
					<a href="?page=1&order=email&direction=desc<?php if($this->search_query): echo "&q=" . $this->search_query; endif; ?>"><span class="label">^</span></a>
					<a href="?page=1&order=email&direction=asc<?php if($this->search_query): echo "&q=" . $this->search_query; endif; ?>"><span class="label">v</span></a>
				</div>
            </th>
			<th width="15%">
                First Name
                <div class="sorting">
					<a href="?page=1&order=first_name&direction=desc<?php if($this->search_query): echo "&q=" . $this->search_query; endif; ?>"><span class="label">^</span></a>
					<a href="?page=1&order=first_name&direction=asc<?php if($this->search_query): echo "&q=" . $this->search_query; endif; ?>"><span class="label">v</span></a>
				</div>
            </th>
			<th width="15%">
                Last Name
                <div class="sorting">
					<a href="?page=1&order=last_name&direction=desc<?php if($this->search_query): echo "&q=" . $this->search_query; endif; ?>"><span class="label">^</span></a>
					<a href="?page=1&order=last_name&direction=asc<?php if($this->search_query): echo "&q=" . $this->search_query; endif; ?>"><span class="label">v</span></a>
				</div>
            </th>
			<th width="10%">
                Status
                <div class="sorting">
					<a href="?page=1&order=status&direction=desc<?php if($this->search_query): echo "&q=" . $this->search_query; endif; ?>"><span class="label">^</span></a>
					<a href="?page=1&order=status&direction=asc<?php if($this->search_query): echo "&q=" . $this->search_query; endif; ?>"><span class="label">v</span></a>
				</div>  
            </th>
			<th width="10%">Options</th>
		</thead>
		<tbody>
		<?php foreach($this->users as $user): ?>
			<tr id="user_<?php echo $user->get_id();?>">
				<td class="id"><?php echo $user->get_id();?></td>
				<td class="email"><?php echo $user->get_email();?></td>
				<td class="first_name"><?php echo $user->get_first_name();?></td>
				<td class="last_name"><?php echo $user->get_last_name();?></td>
				<td class="status"><?php echo $user->get_friendly_status();?></td>
				<td class="options"><a class="btn" href="/admin/user/edit/<?php echo $user->get_id();?>">Edit</a><a class="btn danger" href="#" data-controls-modal="modal_delete_user" data-backdrop="static" data-keyboard="false">Delete</a></td>	
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
    <div class="pagination">
        <ul>	
            <?php echo $this->pagination_markup; ?>
        </ul>
    </div>
</div>
<div class="actions">
	<div class="action_buttons">
	<a href="/admin/" class="btn">Back</a>
		<a href="/admin/user/add" class="btn primary">Create New User</a>
		
	</div>
</div>		
	
