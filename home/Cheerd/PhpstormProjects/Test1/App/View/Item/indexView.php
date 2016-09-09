<link rel="stylesheet" type="text/css" href="/css/item.css" />

<ul class="submenu">
    <li class="submenu"><a href="/Item/create">New item</a></li>
</ul>

<?php
foreach($data as $row)
{
    echo '<a class="item" href="/Item/edit?id='.$row['id'].'"><div class="item"><img class="item" src="'.$row['image'].'""><br>Name: '.$row['name'].'<br>Quantity: '.$row['qty'].'<br>Owner: '.$row['user_name'].'</div></a>';
}

?>
