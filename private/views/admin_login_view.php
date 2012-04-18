<? if ($this->notices): ?>
<div class="alert-message info">
    <? foreach($this->notices as $notice): ?>
        <?= $notice.'<br />'; ?>
    <? endforeach; ?>
</div>
<? endif; ?>
<div class="wrapper login_view">
<div class="logo">Login to Y'Backend</div>
<br />
    <form id="login_form" action="/admin/login" method="post">
        <p>Email:</p><input type="text" name="email" /><br />
        <p>Password:</p><input type="password" name="password" /><br /><br />
        <input type="submit" class="submit btn primary" value="Submit" />
        <div class="clear"></div><br />
        <a href="#">Forgot your password?</a>
    </form>
</div>