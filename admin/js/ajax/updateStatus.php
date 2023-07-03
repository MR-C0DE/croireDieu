<?php

if (isset($_POST['id'])) {
    echo $_POST['id'];

    include_once '../../php/database.php';

    $predicationDataBase = (new DataBase())->predication();
    echo $predicationDataBase->updateStatus($_POST['id']);
}
