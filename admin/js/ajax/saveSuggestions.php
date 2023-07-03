<?php


include_once '../../php/database.php';
include_once '../../php/suggestion.class.php';

$suggestionDataBase = (new DataBase())->suggestion();

if (isset($_POST['titre'])) {

    $suggestion = new Suggestion(
        $_POST['titre'],
        $_POST['url_about'],
        $_POST['description'],
        date('Y-m-d H:i:s')
    );

    $suggestionDataBase->create($suggestion);
    print_r($suggestion);
}
