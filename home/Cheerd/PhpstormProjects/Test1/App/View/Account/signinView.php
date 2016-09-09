<link rel="stylesheet" type="text/css" href="/css/form.css" />
<h1>Sign in</h1>
<form action="signin" method="post">
    <div class="form" style="width: 260px">
        <p>
            Имя пользователя:
            <input type="text" name="name">
        </p>
        <p>
            Пароль:
            <input type="password" name="password">
        </p>
        <input type="submit" value="Sign in">
    </div>
</form>
<?php
    if ($data) {
    echo '<p class="error">Ошибка: неверные имя пользователя и/или пароль.</p>';
    }
?>
