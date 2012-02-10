<h2>
<?php if ($this->article->get_category()): ?>
    <?= $this->article->get_category()->get_title();?>:
<? endif; ?>
<?= $this->article->get_title(); ?></h2>
<p><?= $this->article->get_body(); ?></p>
<cite>By: <?= $this->article->get_body(); ?> at <?= $this->article->get_time_publish();?></cite>