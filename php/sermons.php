<?php

include_once '../admin/php/database.php';
include_once '../admin/php/predication.class.php';

$predicationDataBase = (new DataBase())->predication();

$sermon = $predicationDataBase->getActiveElement();


echo '{"titre":"' . $sermon->getTitre() . '","lienLecture":"' . $sermon->getLienLecture() . '","lienTelecharger":"' . $sermon->getLienTelecharger() . '"}';
