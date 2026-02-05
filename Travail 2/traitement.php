<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Résultat</title>
</head>
<body>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $adresse = $_POST['adresse'];
    $ville = $_POST['ville'];
    $code_postal = $_POST['code_postal'];

    echo "<h3>Adresse client</h3>";

    echo "<table border='1' cellpadding='8'>
            <tr>
                <th>Champ</th>
                <th>Valeur</th>
            </tr>
            <tr>
                <td>Nom</td>
                <td>$nom</td>
            </tr>
            <tr>
                <td>Prénom</td>
                <td>$prenom</td>
            </tr>
            <tr>
                <td>Adresse</td>
                <td>$adresse</td>
            </tr>
            <tr>
                <td>Ville</td>
                <td>$ville</td>
            </tr>

             <tr>
                <td>Code postal</td>
                <td>$code_postal</td>
            </tr>
    
          </table>";
}
?>

</body>
</html>

