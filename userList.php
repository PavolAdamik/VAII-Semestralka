<?php
include 'header.php';

if(isset($_POST['del_user']) && $_POST['del_user'] > 0){
    include 'database.php';
    //mysqli_query($db,"delete from vypozicka where id_osoby = ".$_POST['del_user']);
    mysqli_query($db,"delete from person where id= ".$_POST['del_user']);
    mysqli_close($db);
    $_POST['del_user']==null;

}

include 'database.php';
$query = "select id,firstname,lastname,driving_licence,email from person  where isAdmin = 0 ";
$table = mysqli_query($db, $query);

mysqli_close($db);
?>

    <h3 class="nadpisH1">Zoznam používateľov</h3>
    <div class="tabulka" >
        <table id="users" >
            <tr>
                <th>Meno</th>
                <th>Priezvisko</th>
                <th>Vodičský preukaz</th>
                <th>Email</th>
                <th>Zmazať používateľa</th>
            </tr>

            <?php
/*            while($row = mysqli_fetch_row($table)){
                print "\t<tr>\n";
                for($i = 1; $i < 5; $i++){
                    print "\t\t<td>$row[$i]</td>\n";
                }
                //echo "<td>"."<input type = button value = Delete onclick = deleteCurrentRow(this);/>"."</td>";
                echo "<td>"."<input type=button id =deleteDep value=Delete onclick = deleteRow(this);/>"."</td>";
            }
            */?>

            <?php
            while($row = mysqli_fetch_row($table)){
                print "\t<tr>\n";
                for($i = 1; $i < 5; $i++){
                    print "\t\t<td>$row[$i]</td>\n";
                }
                print "\t\t<td class='tlacidla kurzor' onclick=\"redirect('del_user',$row[0],'');
                    \"><img src='pictures/delete.png' class='tlacidla' alt='vymazat riadok'></td>\n";
            }
            ?>

           <!-- --><?php
/*
            if( $table->num_rows > 0 ) {

                while( $row = $table->fetch_assoc() ) {

                    echo "<tr>";
                    echo "<td>" . $row["firstname"] . "</td>";
                    echo "<td>" . $row["lastname"] . "</td>";
                    echo "<td>" . $row["driving_licence"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";

                    echo "<td><input type=button value=Update></td>";
                    echo "<td><form method='POST'>
                <input type=hidden name=id value=".$row["id"]." >
                <input type=submit value=Delete name=delete >
                </form>
                </td>";
                    echo "</tr>";
                }

            } else {
                die("0 results");
            }
            */?>
        </table>

    </div>

<?php
include 'footer.php';
?>
