<?php

include_once '../../php/database.php';
include_once '../../php/predication.class.php';

$predicationDataBase = (new DataBase())->predication();

$items = $predicationDataBase->getAll();

foreach ($items as $res) {
    echo '
    <tr>
        <td>' . $res->getTitre() . '</td>
        <td class="' . $res->getStatus() . '">
            <a style="cursor:pointer;"><button  class="status id_' . $res->getId() . '">' . ($res->getStatus() == 'desactive' ? 'Active' : 'Desactive') . '</button></a> |
            <a href="' . $res->getLienLecture() . '"><button>Ecouter</button></a> |
            <a href="' . $res->getLienTelecharger() . '"><button>Telecharger</button></a> |
            <a href="#"><button  class="btn-del del_' . $res->getId() . '">Supprimer</button></a>
        </td>
    </tr>
    ';
}
