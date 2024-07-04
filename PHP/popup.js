// Créer une fonction pour afficher la fenêtre contextuelle
function afficherPopup() {
    // Créer un élément de fenêtre contextuelle
    var popup = document.createElement('div');
    popup.className = 'popup';
    
    // Créer un élément de message
    var message = document.createElement('p');
    message.textContent = 'Le profil de l\'utilisateur a été modifié avec succès.';
    
    // Ajouter le message à la fenêtre contextuelle
    popup.appendChild(message);
    
    // Créer un bouton OK
    var okButton = document.createElement('button');
    okButton.textContent = 'OK';
    
    // Attacher un gestionnaire d'événements pour supprimer la fenêtre contextuelle lorsque le bouton est cliqué
    okButton.addEventListener('click', function() {
        document.body.removeChild(popup);
        location.reload(); // Rafraîchir la page
    });
    
    // Ajouter le bouton OK à la fenêtre contextuelle
    popup.appendChild(okButton);
    
    // Ajouter la fenêtre contextuelle à la page
    document.body.appendChild(popup);
    
    // Supprimer la fenêtre contextuelle après quelques secondes
    setTimeout(function() {
        document.body.removeChild(popup);
        location.reload(); // Rafraîchir la page
    }, 3000);
}

// Appeler la fonction pour afficher la fenêtre contextuelle
afficherPopup();
