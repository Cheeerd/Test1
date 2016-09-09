<link rel="stylesheet" type="text/css" href="/css/form.css" />
<h1>Watch item</h1>
<img src="<?php echo $data[0]['image'] ?>" />
<div class="form" style="width: 400px">
    <p>
        Название: <span><?php echo $data[0]['name'] ?></span>
    </p>
    <p>
        Количество: <span><?php echo $data[0]['qty'] ?></span>
    </p>
    <p>
        Владелец: <span><?php echo $data[0]['user_name'] ?></span>
    </p>
</div>