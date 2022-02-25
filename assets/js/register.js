function checkIfExist(input) {
    //Instanciation de l'objet XMLHttpRequest permettant de faire de l'AJAX
    var request = new XMLHttpRequest();
    //Les données sont envoyés en POST et c'est le controlleur qui va les traiter
   
    //Au changement d'état de la demande d'AJAX
    request.onreadystatechange = function () {
        if (request.readyState === 4) {
            console.log(this.responseText);
            if (request.responseText == 1) {
                input.classList.add('is-invalid');
                input.parentNode.classList.add('has-danger');
                if (input.name == 'mail') {
                    var text = document.createTextNode('Un compte avec cette adresse mail existe déjà');
                } else if (input.name == 'name') {
                    var text = document.createTextNode('Un compte avec ce nom d\'utilisateur existe déjà');
                }
                input.nextElementSibling.removeChild();
                input.nextElementSibling.appendChild(text);
            }
        } 
    }
    request.open('GET', '../../controllers/registerCTRL.php?fieldValue=' + input.value + '&fieldName=' + input.name, true);
    // Pour dire au serveur qu'il y a des données en POST à lire dans le corps
   // request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    //Les données envoyées en POST. Elles sont séparées par un &
    request.send();
}

let mail1 = document.getElementById('mail');
let name1 = document.getElementById('name');

mail1.addEventListener('keyup', () => {
    alert('mail');
    checkIfExist(mail1);
});

name1.addEventListener('keyup', () => {
    alert('name');
    checkIfExist(name1);
});





/****************************/
/* function passwordDiff (){
    let mdp = document.getElementById('password');
    let mdpVerif = document.getElementById('passwordVerify');

    mdp.addEventListener('keyup')
    mdpVerif.addEventListener('Keyup')
} */