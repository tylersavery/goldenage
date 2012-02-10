<?php $type = $this->user->get_type(); ?>
<section id="navigation">
    <div class="topbar-wrapper" style="z-index: 5;">
        <div class="topbar" data-dropdown="dropdown" >
            <div class="topbar-inner">
            <div class="container">
                    
                    <ul class="nav">
                        <li <?php if($this->active_link == 'articles'): echo ' class="active" '; endif;?>><a href="/admin/articles">Articles</a></li>
                        <li <?php if($this->active_link == 'users'): echo ' class="active" '; endif;?>><a href="/admin/users">Users</a></li>
                        <li <?php if($this->active_link == 'categories'): echo ' class="active" '; endif;?>><a href="/admin/categories">Categories</a></li>
                    
                    </ul>
                    
                    <form class="pull-left" action="/admin/articles">
                        <input type="text" class="header_search" placeholder="Search Articles" name="q" />
                    </form>
                    
                    <ul class="nav secondary-nav">
                    <li class="dropdown">
                    <a href="#" class="dropdown-toggle"><?php echo $this->user->get_full_name(); ?></a>
                    <ul class="dropdown-menu">
                        <li><a href="/" target="_blank">View Site In New Tab</a></li>
                        <li><a href="/admin/user/edit/<?php echo $this->user->get_id(); ?>">My Account</a></li>
                        <li class="divider"></li>
                        <li><a href="/admin/logout">Logout</a></li>
                    </ul>
                    </li>
                </ul>
            </div>
        </div><!-- /topbar-inner -->
      </div><!-- /topbar -->
    </div><!-- /topbar-wrapper -->
</section>
<div class="logo nonlogin"></div>
<? if ($this->notices): ?>
    <? foreach($this->notices as $notice): ?>
        <?= '<br /><p>'.$notice.'</p>'; ?>
    <? endforeach; ?>
<? endif; ?>
<div class="wrapper admin full">
    <?php if($this->message): ?>
        
    <div class="alert-message <?php echo $this->message['type'];?>">
        <a class="close" href="#">x</a>
        <p><?php echo $this->message['value']; ?></p>
    </div>
    
    <?php endif; ?>
    
    <?php if($this->breadcrums): ?>
    <ul class="breadcrumb">
        <?php foreach($this->breadcrums as $key => $value): ?>
        <?php if($value != ''): ?>
          <li><a href="<?php echo $value; ?>"><?php echo $key; ?></a> <span class="divider">/</span></li>
        <?php else: ?>
            <li class="active"><?php echo $key;?></li>
        <?php endif; ?>
        <?php endforeach; ?>
    </ul>
    <?php endif; ?>


