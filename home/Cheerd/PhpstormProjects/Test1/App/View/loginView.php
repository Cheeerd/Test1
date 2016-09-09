<?php
/**
 * Created by PhpStorm.
 * User: Cheerd
 * Date: 09.09.16
 * Time: 12:10
 */
$user = App\Controllers\AccountController::getUserName();
if ($user):
?>
    <li class="menu login"><a href="/Account/logout">Log out</a></li>
<?php
    echo "<li class=\"menu login\">Hello, $user!</li>";
else:
?>
    <li class="menu login"><a href="/Account/signin">Sign in</a></li>
    <li class="menu login"><a href="/Account/signup">Sign up</a></li>
<?php
endif
?>