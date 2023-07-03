<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/citation.css">
    <title>Connexion - Admin</title>
</head>

<body>


    <main>
        <?php include "./layout/header.php" ?>

        <div class="wrapper citation-container">

            <div class="search">
                <form>
                    <input type="text" id="search" placeholder="Chercher...">
                    <button id="btx-search"><i class='bx bx-search'>Recherche</i></button>
                </form>

            </div>

            <div>


                <div class="list-quote">
                    <h2>Liste des citations</h2>




                </div>


            </div>



            <div class="form-container">
                <h2>Ajoutez une citation</h2>

                <form id="loadForm" method="POST">
                    <div class="error">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad incidunt sequi earum laboriosam, magni repudiandae ex excepturi possimus, iusto unde minima rem placeat perspiciatis minus tempora atque temporibus maiores necessitatibus!</p>
                    </div>
                    <label for="titre">Titre :</label>
                    <input type="text" id="titre" name="titre" required><br><br>
                    <label for="url_download">Lien telechargement :</label>
                    <input type="url" id="url_download" name="url_download" required><br><br>
                    <label for="url_play">Lien lecture :</label>
                    <input type="url" id="url_play" name="url_play" required><br><br>
                    <label for="citation">Citation :</label>
                    <textarea name="citation" id="citation" cols="30" rows="10"></textarea>
                    <br><br>
                    <input type="button" name="envoyer" id="boutonEnvoyer" value="Ajouter">
                </form>
            </div>



        </div>


    </main>

    <footer>
        <p>&copy; 2023 - Croire en Dieu</p>
    </footer>
    <script src="./js/citation.js"></script>
</body>

</html>