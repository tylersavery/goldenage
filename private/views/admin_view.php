<?php $type = $this->user->get_type(); ?>

<div class="alert-message info">
  <a class="close" href="#">x</a>
  <p><strong>Welcome!</strong> This is Pigeon's Backend</p>
</div>
<h1>Dashboard</h1><hr />
<? if ($type >= 3): ?><p><a class="btn large" href="/admin/articles">Manage Articles</a></p><? endif; ?>
<? if ($type == 10): ?><p><a class="btn large " href="/admin/users">Manage Users</a></p><? endif; ?>
