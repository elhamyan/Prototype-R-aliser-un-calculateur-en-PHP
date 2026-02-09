<?php
$fichier = "livreor.txt";
$erreur = "";

// Traitement du formulaire
if (isset($_POST['envoyer']) ) {
    $nom = trim($_POST['nom']);
    $prenome = trim($_POST['prenome']);
    $email = trim($_POST['email']);
    $message = trim($_POST['message']);
    
    if (empty($nom) || empty($prenome) || empty($email) || empty($message)) {
        $erreur = "Tous les champs sont obligatoires.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erreur = "Email invalide.";
    } else {
        $date = date("d/m/y H:i:s");
        $ligne = $nom . "|" . $prenome . "|" . $email . "|" . $date . "|" . $message . PHP_EOL;
        file_put_contents($fichier, $ligne, FILE_APPEND);
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Livre d’or</title>
</head>
<body>

<h2>Livre d’or</h2>

<?php if ($erreur != "") echo "<p style='color:red;'>$erreur</p>"; ?>

<form method="post">
    <input type="text" name="nom" placeholder="Nom"><br><br>
    <input type="text" name="prenome" placeholder="Prénom"><br><br>
    <input type="email" name="email" placeholder="Email"><br><br>
    <textarea name="message" placeholder="Votre avis"></textarea><br><br>
    <input type="submit" name="envoyer" value="Envoyer">
</form>

<hr>

<h3>Les 5 derniers avis</h3>

<?php
if (file_exists($fichier)) {
    $lignes = file($fichier, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $lignes = array_reverse($lignes);
    $lignes = array_slice($lignes, 0, 5);

    foreach ($lignes as $ligne) {
        list($nom,$prenome, $email, $date, $message) = explode("|", $ligne);
        echo "<strong>$nom $prenome</strong> ($email)<br>";
        echo "<em>$date</em><br>";
        echo "<p>$message</p><hr>";
    }
}
?>

</body>
</html>
