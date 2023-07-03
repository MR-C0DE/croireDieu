<?php


include_once '../../php/database.php';
include_once '../../php/citation.class.php';

$citationDataBase = (new DataBase())->citation();



if (isset($_POST['titre'])) {

    $citation = new Citation(
        $_POST['titre'],
        $_POST['url_play'],
        $_POST['url_download'],
        $_POST['citation'],
        'desactive',
        date('Y-m-d H:i:s')
    );

    $citationDataBase->create($citation);
    print_r($citation);
}
