const getSermons = () => {
   
    // Effectuer la requête GET
    fetch("./php/sermons.php")
      .then((response) => response.text())
      .then((data) => {
        // Manipuler les données récupérées ici
        if(data){
            data = JSON.parse(data);
            document.getElementById('titre').textContent = data.titre;
            document.getElementById('play').setAttribute('href', data.lienLecture);
            document.getElementById('download').setAttribute('href', data.lienTelecharger);
        }
        
      })

      .catch((error) => {
        // Gérer les erreurs éventuelles
        console.error("Une erreur s'est produite :", error);
      });
  };

  getSermons();