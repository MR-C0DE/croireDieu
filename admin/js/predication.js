const error = document.querySelector('.error');
const drawTab = () => {
  // Effectuer la requête GET
  fetch("./js/ajax/drawTab.php")
    .then((response) => response.text())
    .then((data) => {
      // Manipuler les données récupérées ici
      document.querySelector(".corps").innerHTML = data;
    })
    .then(() => {
      const liens = document.querySelectorAll(".status");
      liens.forEach((lien) => {
        lien.addEventListener("click", uptateStatus);
      });

      const btns = document.querySelectorAll(".btn-del");
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
  fetch("./js/ajax/updateStatus.php", {
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
      drawTab();
    })
    .catch(function (error) {
      console.log("Error:", error);
    });
}

function deleteElement(e) {
    id = e.target.getAttribute("class").split("_")[1];
 
    fetch("./js/ajax/deleteSermons.php", {
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
        drawTab();
      })
      .catch(function (error) {
        console.log("Error:", error);
      });
  }
  

drawTab();

const sendForm = () => {
  const button = document.querySelector("#boutonEnvoyer");

  button.addEventListener("click", (event) => {
    event.preventDefault();

    const form = document.querySelector("form");
    const formData = new FormData(form);

    // Vérification des champs
    const titre = formData.get("titre");
    const urlDownload = formData.get("url_download");
    const urlPlay = formData.get("url_play");

    if (!titre || !urlDownload || !urlPlay) {
        error.innerHTML = "<p>Veuillez remplir tous les champs du formulaire.</p>";
        error.style.display = 'block';
      console.error("Veuillez remplir tous les champs du formulaire.");
      return;
    }

    fetch("./js/ajax/saveSermons.php", {
      method: "POST",
      body: formData,
    })
      .then((response) => response.text())
      .then((data) => {
        // Manipuler la réponse du serveur ici
        if (data) {
          drawTab();
          // Réinitialisation des champs du formulaire
          form.reset();
          error.style.display = 'none';
        }
      })
      .catch((error) => {
        // Gérer les erreurs éventuelles
        console.error("Une erreur s'est produite :", error);
      });
  });
};

sendForm();
