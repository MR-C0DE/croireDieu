<?php

if (isset($_POST['id'])) {
    echo $_POST['id'];

    include_once '../../php/database.php';

    $citationDataBase = (new DataBase())->citation();
    echo $citationDataBase->updateStatus($_POST['id']);
}
