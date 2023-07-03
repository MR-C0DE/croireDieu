const error = document.querySelector(".error");
const getQuotes = () => {
  // Effectuer la requête GET
  fetch("./js/ajax/getQuotes.php")
    .then((response) => response.text())
    .then((data) => {
      // Manipuler les données récupérées ici
      document.querySelector(".list-quote").innerHTML = data;
    })
    .then(() => {
      const liens = document.querySelectorAll(".lien");
      liens.forEach((lien) => {
        lien.addEventListener("click", uptateStatus);
      });

      const btns = document.querySelectorAll(".btx-del");
      btns.forEach((btn) => {
        btn.addEventListener("click", deleteElement);
      });
    })
    .catch((error) => {
      // Gérer les erreurs éventuelles
      console.error("Une erreur s'est produite :", error);
    });
};

function uptateStatus(e) {
  id = e.target.getAttribute("class").split("_")[1];
  fetch("./js/ajax/statusQuotes.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
    body: "id=" + encodeURIComponent(id),
  })
    .then(function (response) {
      return response.text();
    })
    .then(function (data) {
      console.log(data);
      getQuotes();
    })
    .catch(function (error) {
      console.log("Error:", error);
    });
}

function deleteElement(e) {
  id = e.target.getAttribute("class").split("_")[1];

  fetch("./js/ajax/deleteQuotes.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
    body: "id=" + encodeURIComponent(id),
  })
    .then(function (response) {
      return response.text();
    })
    .then(function (data) {
      getQuotes();
    })
    .catch(function (error) {
      console.log("Error:", error);
    });
}

getQuotes();

const sendForm = () => {
  const button = document.querySelector("#boutonEnvoyer");

  button.addEventListener("click", (event) => {
    event.preventDefault();

    const form = document.querySelector("#loadForm");
    const formData = new FormData(form);

    // Vérification des champs
    const titre = formData.get("titre");
    const urlDownload = formData.get("url_download");
    const urlPlay = formData.get("url_play");
    const citation = formData.get("citation");

    if (!titre || !urlDownload || !urlPlay || !citation) {
      error.innerHTML =
        "<p>Veuillez remplir tous les champs du formulaire.</p>";
      error.style.display = "block";
      console.error("Veuillez remplir tous les champs du formulaire.");
      return;
    }

    fetch("./js/ajax/saveQuotes.php", {
      method: "POST",
      body: formData,
    })
      .then((response) => response.text())
      .then((data) => {
        console.log(data);
        // Manipuler la réponse du serveur ici
        if (data) {
          getQuotes();
          // Réinitialisation des champs du formulaire
          form.reset();
          document.querySelector("header").scrollIntoView();
          console.log(data);
          error.style.display = "none";
        }
      })
      .catch((error) => {
        // Gérer les erreurs éventuelles
        console.error("Une erreur s'est produite :", error);
      });
  });
};

const searchQuotes = (e, element = null) => {
    e.preventDefault();
    
    const value = document.querySelector('#search').value;
    if(element !== null){
        value = element;
    }
    const url = `./js/ajax/searchQuotes.php?recherche=${encodeURIComponent(value)}`;

    // Effectuer la requête GET

   
    fetch(url)
      .then((response) => response.text())
      .then((data) => {
        // Manipuler les données récupérées ici
        document.querySelector(".list-quote").innerHTML = data;
      })
      .then(() => {
        const liens = document.querySelectorAll(".lien");
        liens.forEach((lien) => {
          lien.addEventListener("click", uptateStatus);
        });
  
        const btns = document.querySelectorAll(".btx-del");
        btns.forEach((btn) => {
          btn.addEventListener("click", deleteElement);
        });
      })
      .catch((error) => {
        // Gérer les erreurs éventuelles
        console.error("Une erreur s'est produite :", error);
      });
  };
sendForm();

document.querySelector('#btx-search').addEventListener('click', searchQuotes);
