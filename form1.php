<?php
//initialiser variable (message à vide par défaut)
$msg = "";
$REQUEST_METHODE = $_SERVER['REQUEST_METHOD'];

//vérifier si formulaire a été soumis
if (($_SERVER)['REQUEST_METHOD'] == "POST") {
    // Étape 3 : Vérifie si les champs email et password sont définis et non vides
    if (isset($_POST['email']) && isset($_POST['password']) && !empty($_POST['email']) && !empty($_POST['password'])) {
        // Étape 4 : Tableau des couples email/mot de passe valides
        $valid_credentials = array(
            "jean_valjean@academie.net" => "hugo",
            "steve_ostin@lesseries.org" => "3md",
            "david_banner@marvel.com" => "hulk"
        );
    } // Vérifie si les identifiants soumis correspondent à ceux dans le tableau
    if (array_key_exists($_POST['email'], $valid_credentials) && $valid_credentials[$_POST['email']] === $_POST['password']) {
        // Si l'identification réussit, redirige vers form2.php
        header("Location: form2.php");
        setcookie("form1_cookie", "autentificated", time() + 3600, "/");
        exit(); // Assure que le script s'arrête après la redirection
    } else {
        // Si les identifiants sont incorrects, définis un message d'erreur
        $msg = "Identifiants incorrects";
    }
} else {
    // Si tous les champs ne sont pas remplis, définis un message d'erreur
    $msg = "Saisie obligatoire";
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Fredericka+the+Great" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css" />

    <title>Form1</title>
</head>

<body>
    <!-- Étape 5 : Formulaire HTML -->
    <form method=" post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br>
        <input type="submit" value="Valider">
    </form>

    <!-- Affichage du message d'erreur ou de succès -->
    <?php echo $msg; ?>
</body>

</html>

?>