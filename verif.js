/*// la recuperation des elements 
const form = document.querySelector('#form');
const NameInput = document.querySelector('#name');
const EmailInput = document.querySelector('#email');
const SubjectInput = document.querySelector('#subject');
const MessageInput = document.querySelector('#message');

// Evenements

form.addEventListener('submit',e=>{
    e.preventDefault();

    form_verify();
})

//fonctions
function  form_verify() {
    //obtenir toutes les valeurs des inputs
   const userValue = NameInput.value.trim(); //enlever les espaces de debut et fin
   const emailValue = EmailInput.value.trim();
   const SubjectValue = SubjectInput.value.trim();
   const messageValue = MessageInput.value.trim();

   // verfier cas par cas 
   if(userValue == ""){
    let error="inserer un nom valide !"
    setError(NameInput,error);
   }else if(!userValue.match(/^[a-zA-Z]/)){
    let message ="Username doit commencer par une lettre";
    setError(username,message)
}else{
    let letterNum = userValue.length;
    if (letterNum < 3) {
        let message ="Username doit avoir au moins 3 caractères";
        setError(NameInput,message)
    } else {
        setSuccess(NameInput);
    }
}
   // email verify
if (emailValue === "") {
    let message = "Email ne peut pas être vide";
    setError(EmailInput,message);
}else if(!email_verify(emailValue)){
    let message = "Email non valide";
    setError(EmailInput,message);
}else{
    setSuccess(EmailInput)
}

if(Subjectvalue == ""){
    let error="champ manquant !"
    setError(SubjectInput,error);
}
else{
    setSuccess(SubjectInput)
}

if(messageValue== ""){
    let error="champ manquant !"
    setError(messageInput,error);
}
else{
    setSuccess(messageValueInput)
}
}
function setError(element,error){
 const formControl = element.parentElement; // recuperer la class (div class)
 const  small =formControl.querySelector('small');//recuperer l'ellement qui affiche l'erreur 
 small.innerText = error ; //Ajout du message d'erreur
 formControl.className = "form-control error" //Ajout de las classe d'erreur
 
}
function setSuccess(elem) {
const formControl = elem.parentElement;
formControl.className ='form-control success'
}

function email_verify(email) {
/*
* r_rona.22-t@gmail.com
    /^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/
return /^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/.test(email);
}*/
function form_verify() {
    // récupération des éléments du formulaire
    var name = document.getElementById("name");
    var email = document.getElementById("email");
    var subject = document.getElementById("subject");
    var description = document.getElementById("description");
    
    // messages d'erreur
    var nameErr = document.getElementById("nameEr");
    var emailErr = document.getElementById("emailEr");
    var subjectErr = document.getElementById("subjectEr");
    var descriptionErr = document.getElementById("descriptiontEr"); 

    // initialisation des variables de validation
    var valid = true;
    var emailValid = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email.value); // expression régulière pour valider l'adresse email
    var lettersvalid = /^[A-Za-z]+$/.test(name.value);

    // validation du nom
    if (name.value.trim() == "") {
      nameErr.innerHTML = "Veuillez saisir votre nom";
      valid = false;
    } else if (!lettersvalid) {
      nameErr.innerHTML = "Veuillez saisir un nom valide";
      valid =false;
    } else {
     nameErr.innerHTML = "<p style='color:green'> Correct </p>";
    }
    
    // validation de l'email
    if (email.value.trim() == "") {
      email.setCustomValidity("Veuillez saisir votre adresse email");
      emailErr.innerHTML = "Veuillez saisir votre adresse email";
      valid = false;
    } else if (!emailValid) {
      emailErr.innerHTML = "Veuillez saisir une adresse email valide";
      valid = false;
    } else {
        emailErr.innerHTML =
        "<p style='color:green'> Correct </p>";
    }
    
    // validation du sujet
    if (subject.value.trim() == "") {
      subject.setCustomValidity("Veuillez saisir le sujet de votre message");
      subjectErr.innerHTML = "Veuillez saisir le sujet de votre message";
      valid = false;
    } else {
      subjectErr.innerHTML = "<p style='color:green'> Correct </p>";
    }
    
    // validation de la description
    if (description.value.trim() == "") {
      description.setCustomValidity("Veuillez saisir votre message");
      descriptionErr.innerHTML="Veuillez saisir votre message";
      valid = false;
    } else {
      description.setCustomValidity("");
      descriptionErr.innerHTML="<p style='color:green'> Correct </p>";
    }
    
    // si le formulaire est valide, soumission
    if (valid) {
        /*alert("formulaire envoyé");*/
      document.getElementById("form").submit();
    }
    else {alert("formulaire non envoyé");}
  }
  