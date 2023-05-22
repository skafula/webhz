<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
	</head>
	<body>
<?php

    $rendben = true;

	if(!isset($_POST['nev']) || strlen($_POST['nev']) < 8 || strlen($_POST['nev']) > 30)
	{
        echo "Név: " . $_POST['nev'] . " Hibás!". "<br>";
        $rendben = false;
	} else {
        echo "Név: " . $_POST['nev'] . " Helyes". "<br>";
    }

	$re = '/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/';
	if(!isset($_POST['email']) || !preg_match($re,$_POST['email']))
	{
        echo "E-mail: " . $_POST['email'] . " Hibás!". "<br>";
        $rendben = false;
    } else {
        echo "E-mail: " . $_POST['email'] . " Helyes". "<br>";
	}

	if(!isset($_POST['darab']) || intval($_POST['darab']) < 1 || intval($_POST['darab']) > 10)
	{
        echo "Darab: " . $_POST['darab'] . " Hibás!". "<br>";
        $rendben = false;
    } else {
        echo "Darab: " . $_POST['darab'] . " Helyes". "<br>";
	}

    if(!isset($_POST['nap']) || empty($_POST['nap']))
    {
        echo "Nap: " . $_POST['nap'] . " Hibás!". "<br>";
        $rendben = false;
    } else {
        echo "Nap: " . $_POST['nap'] . " Helyes". "<br>";
    }

if($rendben == true) {

    try {
        // Kapcsolódás
        $connect = new PDO('mysql:host=localhost;dbname=aruhaz', 'root', '',
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        $connect->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');

        // Adatok beszúrása az adatbázisba
            $sqlInsert = "insert into rendeles(id, nev, email, darab, nap)
                              values(0, :nev, :email, :darab, :nap)";
            $stmt = $connect->prepare($sqlInsert);
            $stmt->execute(array(':nev' => $_POST['nev'], ':email' => $_POST['email'],
                ':darab' => $_POST['darab'], ':nap' => $_POST['nap']));


    } catch (PDOException $e) {
        echo "Hiba: " . $e->getMessage();
    }
}
?>
	</body>
</html>
