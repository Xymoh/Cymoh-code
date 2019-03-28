<?php require_once 'config.php';?>
<?php

session_start();

$id = 0;
$edytuj = false;
$imie = '';
$nazwisko = '';
$email = '';
$wiek = '';
$adres = '';

if (isset($_POST['zapisz'])){
    $imie = $_POST['imie'];
    $nazwisko = $_POST['nazwisko'];
    $email = $_POST['email'];
    $wiek = $_POST['wiek'];
    $adres = $_POST['adres'];

    $mysqli->query("INSERT INTO Studenci (Imie, Nazwisko, Email, Wiek, Adres) VALUES ('$imie', '$nazwisko', '$email', '$wiek', '$adres')") or die($mysqli->error);

    $_SESSION['wiadomosc'] = "Rekord został zapisany!";

    header("location: index.php");
}

if (isset($_GET['usun'])){
    $id = $_GET['usun'];
    $mysqli->query("DELETE FROM Studenci WHERE ID=$id") or die($mysqli->error());

    $_SESSION['wiadomosc'] = "Rekord został usunięty!";

    header("location: index.php");
}

if (isset($_GET['edytuj'])){
    $id = $_GET['edytuj'];
    $edytuj = true;
    $result = $mysqli->query("SELECT * FROM Studenci WHERE ID=$id") or die($mysqli->error());
    if (mysqli_num_rows($result)){
        $row = $result->fetch_array();
        $imie = $row['Imie'];
        $nazwisko = $row['Nazwisko'];
        $email = $row['Email'];
        $wiek = $row['Wiek'];
        $adres = $row['Adres'];
    }
}

if (isset($_POST['aktualizuj'])){
    $id = $_POST['id'];
    $imie = $_POST['imie'];
    $nazwisko = $_POST['nazwisko'];
    $email = $_POST['email'];
    $wiek = $_POST['wiek'];
    $adres = $_POST['adres'];
    
    $mysqli->query("UPDATE Studenci SET Imie='$imie', Nazwisko='$nazwisko', Email='$email', Wiek='$wiek', Adres='$adres' WHERE ID=$id") or die($mysqli->error);

    $_SESSION['wiadomosc'] = "Rekord został zaktualizowany!";

    header("location: index.php");
}

if (isset($_POST["exportcsv"])){
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=data.csv');
    $output = fopen("php://output", "w");
    fputcsv($output, array('ID', 'Imie', 'Nazwisko', 'Email', 'Wiek', 'Adres'));
    $result = $mysqli->query("SELECT * FROM Studenci") or die($mysqli->error);
    while ($row = mysqli_fetch_assoc($result))
    {
        fputcsv($output, $row);
    }
    fclose($output);
}

if (isset($_POST["exportrtf"])){
    header('Content-Type: text/rtf; charset=utf-8');
    header('Content-Disposition: attachment; filename=data.rtf');
    $output = fopen("php://output", "w");
    fputcsv($output, array('ID', 'Imie', 'Nazwisko', 'Email', 'Wiek', 'Adres'));
    $result = $mysqli->query("SELECT * FROM Studenci") or die($mysqli->error);
    while ($row = mysqli_fetch_assoc($result))
    {
        fputcsv($output, $row);
    }
    fclose($output);
}