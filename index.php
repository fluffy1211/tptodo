<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>todo</title>
</head>
<body>

<h1>Ma TODO en PHP</h1>

<!-- TO DO LIST -->

<form method="POST" action="index.php">
  <div>
    <input id="example" type="text" name="title"/>
    <input type="submit" name="submit" value="submit" />
  </div>
</form>   

</body>
</html>


<?php


// CONNEXION DATABASE

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


// INSERT INTO DATABASE

if(isset($_POST['title'])){
    $title = $_POST['title'];
} else die;

$sql = "INSERT INTO todo (title) VALUES ('$title')";

$stmt = $pdo->prepare($sql);
$result = $stmt->execute($title);

if($result) {
    echo "Tâche ajoutée";
} else {
    echo "Erreur, tâche non ajoutée." . $result->errorInfo();
}

?>
