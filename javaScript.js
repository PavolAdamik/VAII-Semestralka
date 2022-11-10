function reg_kontrola(form){
    if(form.firstname.value === ""){
        alert("Musíte zadať vaše meno.");
        form.firstname.focus();
        return false;
    } else if(form.lastname.value === ""){
        alert("Musíte zadať vaše priezvisko.");
        form.lastname.focus();
        return false;
    } else if(form.email.value === ""){
        alert("Musíte zadať váš mail.");
        form.email.focus();
        return false;
    } else if(document.getElementById("vypis").innerHTML===" nespravny tvar"){
        alert("Nesprávny tvar emailu!");
        form.email.focus();
        return false;
    } else if(form.driving_licence.value === "") {
        alert("Musíte zadať váš vodičský preukaz.");
        form.driving_licence.focus();
        return false;
    }else if(form.password.value === "") {
        alert("Musíte zadať vaše heslo.");
        form.password.focus();
        return false;
    }else if(form.confirmPassword.value === "") {
        alert("Musíte znovu zadať vaše heslo.");
        form.confirmPassword.focus();
        return false;
    } else {
        return true;
    }
}

function correctEmail(e) {
    var filter = /^\s*[\w\-\+_]+(\.[\w\-\+_]+)*\@[\w\-\+_]+\.[\w\-\+_]+(\.[\w\-\+_]+)*\s*$/;
    filter = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    return filter.test(e);
}

function checkEmail() {
    if (correctEmail(document.getElementById("kontrolaMail").value)) {
        document.getElementById("vypis").innerHTML=" OK";
        document.getElementById("vypis").style.color = "green";
        return true;
    } else {
        document.getElementById("vypis").innerHTML=" nespravny tvar";
        document.getElementById("vypis").style.color = "red";
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