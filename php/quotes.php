<?php

include_once '../admin/php/database.php';
include_once '../admin/php/citation.class.php';

$citationDataBase = (new DataBase())->citation();

$quote = $citationDataBase->getActiveElement();


echo $quote->getCitation();
