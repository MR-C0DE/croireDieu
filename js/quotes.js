const getQuotes = () => {
   
    // Effectuer la requête GET
    fetch("./php/quotes.php")
      .then((response) => response.text())
      .then((data) => {
        // Manipuler les données récupérées ici
        if(data){
        

            console.log(data);
            document.getElementById('quote').innerHTML= data;
        }
        
      })

      .catch((error) => {
        // Gérer les erreurs éventuelles
        console.error("Une erreur s'est produite :", error);
      });
  };

  getQuotes();