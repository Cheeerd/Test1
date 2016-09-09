<link rel="stylesheet" type="text/css" href="/css/form.css" />
<h1>Create item</h1>
<form action="create" enctype="multipart/form-data" method="post">
    <div class="form" style="width: 300px">
        <p>
            Название:
            <input type="text" name="name" required value="<?php echo $data[0]['name'] ?>">
        </p>
        <p>
            Количество:
            <input type="number" name="qty" required value="<?php echo $data[0]['qty'] ?>">
        </p>
        <p>
            Изображение:
            <input type="file" name="image" required>
        </p>
        <p>
            Владелец: <span><?php echo \App\Controllers\AccountController::getUserName() ?></span>
        </p>
        <input type="submit" value="Save">
    </div>
</form>