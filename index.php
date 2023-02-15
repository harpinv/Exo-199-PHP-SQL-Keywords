<?php
$server = 'localhost';
$user = 'root';
$pwd = '';
$db = 'exercice_requette';

try {
    $maConnexion = new PDO("mysql:host=$server;dbname=$db;charset=utf8", $user, $pwd);

    $table = $maConnexion->prepare("
             SELECT prenom, nom, pays FROM users
    ");

    $liste = $table->execute();

    echo "<p><strong>Requette n°1</strong></p>";

    if($liste) {
        foreach ($table->fetchAll() as $text) {
            echo "<p>Prenom: " . $text['prenom'] . ", Nom: " . $text['nom'] . ", Pays: " . $text['pays'] . "</p>";
        }
    }

    $table = $maConnexion->prepare("
             SELECT DISTINCT pays from users
    ");

    $liste = $table->execute();

    echo "<br><p><strong>Requette n°2</strong></p>";

    if($liste) {
        foreach ($table->fetchAll() as $text) {
            echo "<p>Pays: " . $text['pays'] . "</p>";
        }
    }

    $table = $maConnexion->prepare("
             SELECT * from users ORDER BY nom ASC
    ");

    $liste = $table->execute();

    echo "<br><p><strong>Requette n°3</strong></p>";

    if($liste) {
        foreach ($table->fetchAll() as $text) {
            echo "<p>Nom: " . $text['nom'] . "</p>";
        }
    }

    $table = $maConnexion->prepare("
             SELECT * from users ORDER BY nom DESC
    ");

    $liste = $table->execute();

    echo "<br><p><strong>Requette n°4</strong></p>";

    if($liste) {
        foreach ($table->fetchAll() as $text) {
            echo "<p>Nom: " . $text['nom'] . "</p>";
        }
    }

    $table = $maConnexion->prepare("
             SELECT MIN(argent) from users
    ");

    $liste = $table->execute();

    echo "<br><p><strong>Requette n°5</strong></p>";

    if($liste) {
        $min = $table->fetch();
        echo "<p>";
        print_r($min);
        echo "</p>";
    }

    $table = $maConnexion->prepare("
             SELECT MAX(argent) from users
    ");

    $liste = $table->execute();

    echo "<br><p><strong>Requette n°6</strong></p>";

    if($liste) {
        $max = $table->fetch();
        echo "<p>";
        print_r($max);
        echo "</p>";
    }

    $table = $maConnexion->prepare("
             SELECT MIN(argent) as argentMin from users where 1
    ");

    $liste = $table->execute();

    echo "<br><p><strong>Requette n°7</strong></p>";

    if($liste) {
        $min = $table->fetch();
        echo "<p>La valeur minimum de la colonne argent est " . $min['argentMin'] . "</p>";

    }

    $table = $maConnexion->prepare("
             SELECT count(*) from users where argent < 50000
    ");

    $liste = $table->execute();

    echo "<br><p><strong>Requette n°8</strong></p>";

    if($liste) {
        $count = $table->fetch();
        echo "<p>";
        print_r($count);
        echo "</p>";
    }

    $table = $maConnexion->prepare("
             SELECT avg(argent) from users
    ");

    $liste = $table->execute();

    echo "<br><p><strong>Requette n°9</strong></p>";

    if($liste) {
        $average = $table->fetch();
        echo "<p>";
        print_r($average);
        echo "</p>";
    }

    $table = $maConnexion->prepare("
             SELECT sum(argent) from users
    ");

    $liste = $table->execute();

    echo "<br><p><strong>Requette n°10</strong></p>";

    if($liste) {
        $sum = $table->fetch();
        echo "<p>";
        print_r($sum);
        echo "</p>";
    }

    $table = $maConnexion->prepare("
             SELECT * FROM users WHERE prenom LIKE 'j%'
    ");

    $liste = $table->execute();

    echo "<br><p><strong>Requette n°11</strong></p>";

    if($liste) {
        foreach ($table->fetchAll() as $text) {
            echo "<p>Prenom: " . $text['prenom'] .", Nom: " . $text['nom'] . ", Pays: " . $text['pays'] . ",Argent:" . $text['argent'] . "</p>";
        }
    }

    $table = $maConnexion->prepare("
             SELECT * FROM users WHERE prenom like '%s'
    ");

    $liste = $table->execute();

    echo "<br><p><strong>Requette n°12</strong></p>";

    if($liste) {
        foreach ($table->fetchAll() as $text) {
            echo "<p>Prenom: " . $text['prenom'] .", Nom: " . $text['nom'] . ", Pays: " . $text['pays'] . ",Argent:" . $text['argent'] . "</p>";
        }
    }

    $table = $maConnexion->prepare("
             SELECT * FROM users WHERE prenom like '%a%'
    ");

    $liste = $table->execute();

    echo "<br><p><strong>Requette n°13</strong></p>";

    if($liste) {
        foreach ($table->fetchAll() as $text) {
            echo "<p>Prenom: " . $text['prenom'] .", Nom: " . $text['nom'] . ", Pays: " . $text['pays'] . ",Argent:" . $text['argent'] . "</p>";
        }
    }
}
catch (PDOException $exception) {
    echo "Erreur de connexion: " . $exception->getMessage();
}








