<?php
// Étape 1 : Vérifie si le cookie est présent
if (isset($_COOKIE['form1_cookie'])) {
    // Le cookie est présent, affiche un message de bienvenue
    $message = "Bienvenue sur form2.php ! Vous êtes identifié avec succès.";
} else {
    // Le cookie n'est pas présent, redirige vers form1.php
    header("Location: form1.php");
    exit(); // Assure que le script s'arrête après la redirection
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form2</title>
</head>

<body>
    <h1>Page Form2</h1>
    <p><?php echo $message; ?></p>
</body>

</html>