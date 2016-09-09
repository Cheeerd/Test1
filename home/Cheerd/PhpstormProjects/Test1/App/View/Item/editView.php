<link rel="stylesheet" type="text/css" href="/css/form.css" />
<h1>Edit item</h1>
<img src="<?php echo $data[0]['image'] ?>" />
<form action="edit" enctype="multipart/form-data" method="post">
    <div class="form" style="width: 400px">
        <input type="hidden" name="id" value="<?php echo $data[0]['id'] ?>">
        <p>
            Название:
            <input type="text" name="name" required value="<?php echo $data[0]['name'] ?>">
        </p>
        <p>
            Количество:
            <input type="number" name="qty" required value="<?php echo $data[0]['qty'] ?>">
        </p>
        <p>
            Новое изображение:
            <input type="file" name="image">
        </p>
        <p>
            Владелец: <span><?php echo $data[0]['user_name'] ?></span>
        </p>
        <input type="submit" value="Save">
    </div>
</form>
<form action="delete">
    <input type="submit" value="Delete">
</form>
