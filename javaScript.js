function checkUpdateVehicleType(form) {
    if(form.id.value === ""){
        alert("Musíte zadať id typu vozidla.");
        form.id.focus();
        return false;
    } else if(form.image.value === ""){
        alert("Musíte vybrat obrazok.");
        form.image.focus();
        return false;
    } else if(form.name.value === ""){
        alert("Musíte zadať nazov typu vozidiel.");
        form.name.focus();
        return false;
    } else if(form.description.value === ""){
        alert("Musíte zadať popis typou vozidiel.");
        form.description.focus();
        return false;
    } else {
        return true;
    }
}

function reg_kontrola(form){
    if(form.firstname.value === ""){
        alert("Musíte zadať vaše meno.");
        form.firstname.focus();
        return false;
    } else if(form.lastname.value === ""){
        alert("Musíte zadať vaše priezvisko.");
        form.lastname.focus();
        return false;
    } else if(form.email.value == ""){
        alert("Musíte zadať váš mail.");
        form.email.focus();
        return false;
    } else if(document.getElementById("email").innerHTML=="nespravny tvar"){
        alert("Nesprávny tvar emailuu!");
        form.email.focus();
        return false;
    } else if(form.driving_licence.value === "") {
        alert("Musíte zadať váš vodičský preukaz.");
        form.driving_licence.focus();
        return false;
    } else if(document.getElementById("driving_licence").innerHTML=="nespravny tvar"){
      alert("Nesprávny tvar vodicskeho preukazu!");
      form.driving_licence.focus();
      return false;
    } else if(form.password.value === "") {
        alert("Musíte zadať vaše heslo.");
        form.password.focus();
        return false;
    } else if(document.getElementById("password").style.color != "green") {
        alert("Skús silnejšie heslo (aby bolo krásne zelené)!");
        form.password.focus();
        return false;
    } else if(form.confirmPassword.value === "") {
        alert("Musíte znovu zadať vaše heslo.");
        form.confirmPassword.focus();
        return false;
    } else if(form.password.value != form.confirmPassword.value) {
        alert("Heslá sa nezhodujú, skús znovu1")
        return false;
    }
        else if(checkEmail() && checkDrivingLicence() && document.getElementById("password").style.color == "green" && form.password.value == form.confirmPassword.value) {
            return true
    }
    else {
        alert("Niekde nastala chyba!");
        return false;
    }
}

function vehicle_validation(form) {

    if (form.file.value === "") {
        alert("Musíte vybrať obrázok danej kategórie vozidiel.");
        form.file.focus();
        return false;
    } else if (form.nazov.value === "") {
        alert("Musíte zadať názov typu kategórie vozidiel.");
        form.nazov.focus();
        return false;
    } else if (form.popis.value === "") {
        alert("Musíte zadať popis typu kategórie vozidiel.");
        form.popis.focus();
        return false;
    }
    return true;
}

function vehicle_validationUpdate(form) {
    if (form.fileUpravovane.value === "") {
        alert("Musíte vybrať obrázok danej kategórie vozidiel.");
        form.fileUpravovane.focus();
        return false;
    } else if (form.nazovUpravovane.value === "") {
        alert("Musíte zadať názov typu kategórie vozidiel.");
        form.nazovUpravovane.focus();
        return false;
    } else if (form.popisUpravovane.value === "") {
        alert("Musíte zadať popis typu kategórie vozidiel.");
        form.popisUpravovane.focus();
        return false;
    }
    return true;
}

function car_validation(form) {
    if (form.spzCar.value === "") {
        alert("Musíte zadať ŠPZ auta.");
        form.spzCar.focus();
        return false;
    } else if (form.idCategoryCar.value === "") {
        alert("Musíte id typu kategórie vozidiel.");
        form.idCategoryCar.focus();
        return false;
    } else if(form.fileCar.value === "") {
        alert("Musíte vybrať obrázok auta.");
        form.fileCar.focus();
        return false;
    } else if (form.nazovCar.value === "") {
        alert("Musíte zadať názov/značku auta.");
        form.nazovCar.focus();
        return false;
    } else if (form.minCar.value === "") {
        alert("Musíte zadať minimálnu cenu auta.");
        form.minCar.focus();
        return false;
    } else if (form.maxCar.value === "") {
        alert("Musíte zadať maximálnu cenu auta.");
        form.maxCar.focus();
        return false;
    } else if (form.file1Car.value === "") {
        alert("Musíte ďaľší obrázok auta.");
        form.file1Car.focus();
        return false;
    } else if (form.file2Car.value === "") {
        alert("Musíte ďaľší obrázok auta.");
        form.file2Car.focus();
        return false;
    } else if (form.file3Car.value === "") {
        alert("Musíte ďaľší obrázok auta.");
        form.file3Car.focus();
        return false;
    } else if (form.yearCar.value === "") {
        alert("Musíte zadať rok výroby auta.");
        form.yearCar.focus();
        return false;
    } else if (form.typeCar.value === "") {
        alert("Musíte zadať typ, či je auto benzín, diesel alebo hybrid alebo full electric :D.");
        form.typeCar.focus();
        return false;
    }
    return true;
}

function car_validationUpdate(form) {
    if (form.spzCarUpravovane.value === "") {
        alert("Musíte zadať ŠPZ auta.");
        form.spzCarUpravovane.focus();
        return false;
    } else if (form.idCategoryCarUpravovane.value === "") {
        alert("Musíte id typu kategórie vozidiel.");
        form.idCategoryCarUpravovane.focus();
        return false;
    } else if(form.fileCarUpravovane.value === "") {
        alert("Musíte vybrať obrázok auta.");
        form.fileCarUpravovane.focus();
        return false;
    } else if (form.nazovCarUpravovane.value === "") {
        alert("Musíte zadať názov/značku auta.");
        form.nazovCarUpravovane.focus();
        return false;
    } else if (form.minCarUpravovane.value === "") {
        alert("Musíte zadať minimálnu cenu auta.");
        form.minCarUpravovane.focus();
        return false;
    } else if (form.maxCarUpravovane.value === "") {
        alert("Musíte zadať maximálnu cenu auta.");
        form.maxCarUpravovane.focus();
        return false;
    } else if (form.file1CarUpravovane.value === "") {
        alert("Musíte ďaľší obrázok auta.");
        form.file1CarUpravovane.focus();
        return false;
    } else if (form.file2CarUpravovane.value === "") {
        alert("Musíte ďaľší obrázok auta.");
        form.file2CarUpravovane.focus();
        return false;
    } else if (form.file3CarUpravovane.value === "") {
        alert("Musíte ďaľší obrázok auta.");
        form.file3CarUpravovane.focus();
        return false;
    } else if (form.yearCarUpravovane.value === "") {
        alert("Musíte zadať rok výroby auta.");
        form.yearCarUpravovane.focus();
        return false;
    } else if (form.typeCarUpravovane.value === "") {
        alert("Musíte zadať typ, či je auto benzín, diesel alebo hybrid alebo full electric :D.");
        form.typeCarUpravovane.focus();
        return false;
    }
    return true;
}

function correctEmail(e) {
    //var filter = /^\s*[\w\-\+_]+(\.[\w\-\+_]+)*\@[\w\-\+_]+\.[\w\-\+_]+(\.[\w\-\+_]+)*\s*$/;
    var filter = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    return filter.test(e);
}

function checkEmail() {
    if (correctEmail(document.getElementById("email").value)) {
        document.getElementById("email").innerHTML="OK";
        document.getElementById("email").style.color = "green";
        document.getElementById("email").style.fontWeight = "bold";
        return true;
    } else {
        document.getElementById("email").innerHTML="nespravny tvar";
        document.getElementById("email").style.color = "red";
        return false;
    }
}

function correctDrivingLicence(licence) {
    var licenceForm = /^[A-Z]\w{7}$/;
    return licenceForm.test(licence);
}

function checkDrivingLicence() {

    if (correctDrivingLicence(document.getElementById("driving_licence").value)) {
            document.getElementById("driving_licence").innerHTML="OK";
            document.getElementById("driving_licence").style.color = "green";
            return true;
        } else {
            document.getElementById("driving_licence").innerHTML="nespravny tvar";
            document.getElementById("driving_licence").style.color = "red";
            return false;
    }
}

function redirect(akcia,id1,id2){
    var s = id1;
    var r;
     if(akcia==='del_user'){
        r = confirm("Určite si prajete odstrániť tohto používateľa?");
        if (r==true){
            post_to_url('userList.php', {'del_user':s}, 'post');
        }
        return true;
    } else if(akcia=='edituj_profil') {
         post_to_url('profile.php', {'edituj_profil': s}, 'post');
         return true;
     }
         return false;
}

function post_to_url(path, params, method) {
    method = method || "post";

    var form = document.createElement("form");
    form.setAttribute("method", method);
    form.setAttribute("action", path);

    for(var key in params) {
        if(params.hasOwnProperty(key)) {
            var hiddenField = document.createElement("input");
            hiddenField.setAttribute("type", "hidden");
            hiddenField.setAttribute("name", key);
            hiddenField.setAttribute("value", params[key]);

            form.appendChild(hiddenField);
        }
    }
    document.body.appendChild(form);
    form.submit();
}


function lengthOfPassword(password){
    var xhttp;
    if(password.length == 0){
        document.getElementById("password").innerHTML = "";
        return;
    }
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        if(xhttp.readyState == 4 && xhttp.status == 200){
            document.getElementById("password").innerHTML = xhttp.responseText;
        }
        if(password.length > 4 && password.length < 9){
            document.getElementById("password").style.color = "orange";
        }
        if(password.length < 5){
            document.getElementById("password").style.color = "red";
        }
        if(password.length > 8){
            document.getElementById("password").style.color = "green";
        }
    };
    xhttp.open("GET", "check.php?q="+password.length, true);
    xhttp.send();
}