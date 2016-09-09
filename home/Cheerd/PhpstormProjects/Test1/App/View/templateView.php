<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title>НАРУТО</title>
    <link rel="stylesheet" type="text/css" href="/css/template.css" />
    <!--<script src="/js/jquery-1.6.2.js" type="text/javascript"></script>-->
</head>
<body>
<ul class="menu">
	<li class="menu" class="menu"><a href="/Test/">Home</a></li>
	<li class="menu"><a href="/Item/">Items</a></li>
	<li class="menu"><a href="/Test/contact">Contact</a></li>
	<li class="menu"><a href="/Test/about">About</a></li>
	<?php include 'App/View/loginView.php'; ?>
</ul class="menu">
	<?php include 'App/View/'.$content_view; ?>
</body>
</html>