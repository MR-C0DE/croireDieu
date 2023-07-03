<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/predication.css">
    <title>Prédications</title>
</head>

<body>


    <main>
        <?php include "./layout/header.php" ?>
        <div class="wrapper predication-container">

            <h2>Liste des prédications</h2>

            <table>
                <thead>
                    <tr>
                        <th>Titre</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="corps">

                </tbody>
            </table>

            <div class="form-container">
                <h2>Ajoutez une prédication</h2>

                <form method="POST">
                    <div class="error">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad incidunt sequi earum laboriosam, magni repudiandae ex excepturi possimus, iusto unde minima rem placeat perspiciatis minus tempora atque temporibus maiores necessitatibus!</p>
                    </div>
                    <label for="titre">Titre :</label>
                    <input type="text" id="titre" name="titre" required><br><br>
                    <label for="url_download">Lien telechargement :</label>
                    <input type="url" id="url_download" name="url_download" required><br><br>
                    <label for="url_play">Lien lecture :</label>
                    <input type="url" id="url_play" name="url_play" required><br><br>
                    <input type="button" name="envoyer" id="boutonEnvoyer" value="Ajouter">
                </form>
            </div>



        </div>

    </main>

    <footer>
        <p>&copy; 2023 - Croire en Dieu</p>
    </footer>
    <script src="./js/predication.js"></script>
</body>

</html>