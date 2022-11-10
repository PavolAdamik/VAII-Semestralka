<?php
include 'database.php';
$table = mysqli_query($db,"select id,firstname,last_name,driving_licence,email from person
                                where isAdmin = 0 ORDER by firstname ASC");
mysqli_close($db);
?>


<tr>
    <th>Meno</th>
    <th>Priezvisko</th>
    <th>Vodičský preukaz</th>
    <th>Email</th>
    <th>Zmazať používateľa</th>
</tr>

<?php
while($row = mysqli_fetch_row($table)){
    print "\t<tr>\n";
    for($i = 1; $i < 5; $i++){
        print "\t\t<td>$row[$i]</td>\n";
    }
    print "\t\t<td class='tlacidla kurzor' onclick=\"redirect('del_user',$row[0],'');\"><img src='pictures/delete.png' class='tlacidla' alt='vymazat riadok' /></td>\n";
}
?>
