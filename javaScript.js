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
    }

    else if(form.driving_licence.value === "") {
        alert("Musíte zadať váš vodičský preukaz.");
        form.driving_licence.focus();
        return false;
    }
        /*  }else if(document.getElementById("driving_licence").innerHTML="nespravny tvar"){
              alert("Nesprávny tvar vodicskeho preukazu!");
              form.driving_licence.focus();
              return false;
          }*/

    else if(form.password.value === "") {
        alert("Musíte zadať vaše heslo.");
        form.password.focus();
        return false;
    }
    else if(form.confirmPassword.value === "") {
        alert("Musíte znovu zadať vaše heslo.");
        form.confirmPassword.focus();
        return false;
    }
        else if(checkEmail() && checkDrivingLicence()) {
            return true
    }
    else {
        alert("Zlý formát emailu alebo vodičského preukazu!");
        return false;
    }
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

function zotried_uzivatelov(){
    $.post("vytriedeni.php", {op:"zotried"}, function(data){
        $('#uzivatelia').html(data);
    });
}

/*function deleteRiadok(row){
    var d = row.parentNode.parentNode.rowIndex;
    document.getElementById('dsTable').deleteRow(d);
}

function deleteRow(btn) {
    var row = btn.parentNode.parentNode;
    row.parentNode.removeChild(row);
}

function deleteCurrentRow(whatrow)
{
    //deletes the approriate row according to what button was pressed
    if (hasLoaded) {
        var delRow = whatrow.parentNode.parentNode;
        deleteRows(delRow);//sends the row for deletion to the function to be deleted
    }
}*/

/*function deleteRow(btn) {
    var row = btn.parentNode.parentNode;
    row.parentNode.removeChild(row);
}


function Geeks() {
    document.getElementById("row1").remove();
}*/


function redirect(akcia,id1,id2){
    var s = id1;
    var r;
    if(akcia=='edit'){
        post_to_url('editovanie.php', {'edituj_auto':s}, 'post');  //nastavovanie premennych na inej stranke
        return true;
    }else if(akcia=='delete'){
        r = confirm("Určite si prajete odstrániť toto auto?");
        if (r===true){
            post_to_url('zoznam_aut.php', {'zmaz_auto':s}, 'post');
        }
        return true;
    }else if(akcia=='pozicaj'){
        r = confirm("Určite si prajete požičať toto auto?");
        if (r==true){
            post_to_url('zoznam_aut.php', {'pozicaj':s}, 'post');
        }
        return true;
    }else if(akcia=='zrus_vypozicku'){
        r = confirm("Určite si prajete zrušiť túto výpožičku?");
        if (r==true){
            post_to_url('moje_prenajate.php', {'zrus_vypozicku_kniha':s, 'zrus_vypozicku_osoba':id2}, 'post');
        }
        return true;
    }else if(akcia=='edit_pozicane'){
        post_to_url('editovanie.php', {'edituj_vypozicku_auto':s, 'edituj_vypozicku_osoba':id2}, 'post');
        return true;
    }else if(akcia=='delete_pozicane'){
        r = confirm("Určite si prajete zrušiť túto výpožičku?");
        if (r==true){
            post_to_url('pozicane_auta.php', {'delete_pozicane_auto':s, 'delete_pozicana_osoba':id2}, 'post');
        }
        return true;
    }else if(akcia==='del_user'){
        r = confirm("Určite si prajete odstrániť tohto používateľa?");
        if (r==true){
            post_to_url('userList.php', {'del_user':s}, 'post');
        }
        return true;
    }else if(akcia=='edituj_profil'){
        post_to_url('profil.php', {'edituj_profil':s}, 'post');
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