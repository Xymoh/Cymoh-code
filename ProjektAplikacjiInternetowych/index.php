<!DOCTYPE html>
<html>
    <head>
        <title>Projekt na Aplikacje Internetowe</title>
        <link rel="stylesheet" type="text/css" href="css/styl.css">
    </head>
    <body>
        <?php require_once 'config.php';?>
        <?php require_once 'process.php';?>
        <?php
        if (isset($_SESSION['wiadomosc'])){
            echo $_SESSION['wiadomosc'];
            unset($_SESSION['wiadomosc']);
        }
        ?>
        <div class="container">
            <h1 align="center">Projekt Aplikacje Internetowe</h1>
            <br/><br/>
            <form action="process.php" method="post">              
                <button type="submit" class="btn btn-primary button-update" name="exportcsv">CSV Export</button>
                <button type="submit" class="btn btn-primary button-update" name="exportrtf">RTF Export</button>
            </form>
        <?php            
            $result = $mysqli->query("SELECT * FROM Studenci") or die($mysqli->error);
            ?>
            
            <div class="row justify-content-center">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Imię</th>
                            <th>Nazwisko</th>
                            <th>Email</th>
                            <th>Wiek</th>
                            <th>Adres</th>
                            <th colspan="2">Akcje</th>
                        </tr>
                    </thead>
            <?php
                 while ($row = mysqli_fetch_array($result))
                 {
                     echo "<tr>";
                     echo "<td>".$row['Imie']."</td>";
                     echo "<td>".$row['Nazwisko']."</td>";
                     echo "<td>".$row['Email']."</td>";
                     echo "<td>".$row['Wiek']."</td>";
                     echo "<td>".$row['Adres']."</td>";          
                     echo "<td style='text-align: center;''><a href=process.php?usun=".$row['ID']."><button class='button-delete'>Usuń</button></a></td>";
                     echo "<td style='text-align: center;''><a href=index.php?edytuj=".$row['ID']."><button class='button-update'>Edytuj</button></a></td>";
                     echo "</tr>";
                 }
            ?>
             
                </table>
            </div>
            <?php

            function pre_r($array) {
                echo '<pre>';
                print_r($array);
                echo '</pre>';
            }
        ?>
        <div class="row justify-content-center">
        <form action="process.php" method="POST">
            <input type="hidden" name="id" value=<?php echo $id; ?>
            <div class="form-group">
            <label>Imię:</label>
            <input type="text" name="imie" class="form-control" value="<?php echo $imie; ?>" placeholder="Wprowadź imię">
            </div>
            <div class="form-group">
            <label>Nazwisko:</label>
            <input type="text" name="nazwisko" class="form-control" value="<?php echo $nazwisko; ?>" placeholder="Wprowadź nazwisko">
            </div>
            <div class="form-group">
            <label>Email:</label>
            <input type="text" name="email" class="form-control" value="<?php echo $email; ?>" placeholder="Wprowadź email">
            </div>
            <div class="form-group">
            <label>Wiek:</label>
            <input type="text" name="wiek" class="form-control" value="<?php echo $wiek; ?>" placeholder="Wprowadź wiek">
            </div>
            <div class="form-group">
            <label>Adres:</label>
            <input type="text" name="adres" class="form-control" value="<?php echo $adres; ?>" placeholder="Wprowadź adres">
            </div>
            <div class="form-group">
            <?php
            if ($edytuj == true):
            ?>
                <button type="submit" class="btn btn-primary button-update" name="aktualizuj">Aktualizuj</button>
            <?php else: ?>
                <button type="submit" class="btn btn-primary button-save" name="zapisz">Zapisz</button>
            <?php endif; ?>
            </div>
        </form>
        </div>
        </div>
    </body>
</html>