<?php
include_once '../../php/database.php';
include_once '../../php/citation.class.php';

$citationDataBase = (new DataBase())->citation();
$items = $citationDataBase->getAll();

if (isset($_GET['recherche'])) {
    $recherche = $_GET['recherche'];
    $citations = $items;

    // Filtrer les citations en fonction des mots ou des phrases recherchés
    $items = array_filter($citations, function ($citation) use ($recherche) {
        $recherche = strtolower($recherche);
        $titre = strtolower($citation->getTitre());
        $citationTexte = strtolower($citation->getCitation());

        // Vérifier si la citation contient la recherche
        if (strpos($titre, $recherche) !== false || strpos($citationTexte, $recherche) !== false) {
            return true;
        }

        // Vérifier si chaque mot de recherche est présent dans la citation
        $motsRecherches = explode(' ', $recherche);
        foreach ($motsRecherches as $mot) {
            if (strpos($titre, $mot) === false && strpos($citationTexte, $mot) === false) {
                return false;
            }
        }

        return true;
    });
}

foreach ($items as $res) {
    $btx = '<img  class="lien numero_' . $res->getId() . '" width="50" height="50" src="https://img.icons8.com/glyph-neue/64/006464/toggle-off.png" alt="toggle-on"/>';
    if ($res->getStatus() == 'active') {
        $btx = str_ireplace('off', 'on', $btx);
    }
    echo '
    <div class="quote-content ">
        <h2>' . $res->getTitre() . '</h2>
        <p>' . $res->getCitation() . '</p>
        <div class="action">
            <ul>
                <li>' . $btx . '</li>
                <li><a href="' . $res->getLienLecture() . '"><img width="30" height="30" src="https://img.icons8.com/ios-glyphs/500/0062cc/play--v1.png" alt="play--v1" /></a></li>
                <li><a href="' . $res->getLienTelecharger() . '"><img width="30" height="30" src="https://img.icons8.com/ios-glyphs/500/0062cc/download--v1.png" alt="download--v1" /></a></li>
                <li><img class="btx-del numero_' . $res->getId() . '" width="30" height="30" src="https://img.icons8.com/ios-glyphs/500/cc0000/filled-trash.png" alt="filled-trash" /></li>
            </ul>
        </div>
    </div>
    ';
}
