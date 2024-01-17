<?php

$dsn = "mysql:dbname=todolist;host=localhost"; 
$username = "root";
$password = "";

try {
    $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);
    
    $pdo = new PDO($dsn, $username, $password, $options);

    // echo 'Connexion réussie !';

} catch (PDOException $error) {
    echo "Il y a une erreur : $error";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>todo</title>
</head>
<body>
    
</body>
</html>

<h1>Ma TODO en PHP</h1>

<form method="post">
  <div>
    <input id="example" type="text" name="text"/>
    <input type="submit" value="Envoyer" />
  </div>
</form>
