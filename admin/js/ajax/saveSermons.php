<?php


include_once '../../php/database.php';
include_once '../../php/predication.class.php';

$predicationDataBase = (new DataBase())->predication();

if (isset($_POST['titre'])) {

    $predication = new Predication(
        $_POST['titre'],
        $_POST['url_play'],
        $_POST['url_download'],
        'desactive',
        date('Y-m-d H:i:s')
    );

    $predicationDataBase->create($predication);
    print_r($predication);
}
