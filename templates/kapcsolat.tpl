<form action="" name="register" method="post" class="login col-xs-10 col-sm-10 col-md-5 col-lg-5">
    <h2>{$szotar->fordit('Kapcsolat')}</h2>
    <label>{$szotar->fordit('Az Ön e-mail címe')}:</label><input type="text" name="email" value="" />
    <label>{$szotar->fordit('Üzenet')}:</label><textarea name="uzenet"></textarea>
    <input name="send" type="submit" value="{$szotar->fordit('Elküldés')}" />
</form>