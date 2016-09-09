<link rel="stylesheet" type="text/css" href="/css/form.css" />
<h1>Sign up</h1>
<form action="signup" method="post">
    <div style="width: 260px" class="form" >
        <p>
            Имя пользователя:
            <input type="text" name="name" required>
        </p>
        <p>
            Пароль:
            <input type="password" name="password" required>
        </p>
        <input type="submit" value="Sign up">
    </div>
</form>
<?php
if ($data) {
    echo '<p class="error">Ошибка: пользователь с таким именем уже существует.</p>';
}
?>
