<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="create.php">
        <label>Nom <input type="text" name="user_name"></label>
        <label>E-mail<input type="text" name="user_email"></label>
        <label>Téléphone<input type="text" name="user_phone"></label>
        <label>Mot de passe<input type="text" name="user_password"></label>
        <label>Rue<input type="text" name="user_street"></label>
        <label>Ville<input type="text" name="user_city"></label>
        <label>Code postal<input type="text" name="user_zipcode"></label>
        <input hidden type="text" name="user_profile" value=0>
        <input type="submit" name="sublit" value="Créer">
    </form>
</body>
</html>