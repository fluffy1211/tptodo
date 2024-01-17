<?php
// CONNEXION DATABASE

$dsn = "mysql:dbname=todolist;host=localhost"; 
$username = "root";
$password = "";

try {
    $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);
    
    $pdo = new PDO($dsn, $username, $password, $options);

} catch (PDOException $error) {
    echo "Il y a une erreur : $error";
}


// INSERT INTO DATABASE

if(isset($_POST['submit'])){
}
    if (!empty($_POST['title'])) {
        $title=htmlspecialchars($_POST['title']);
        $sql = "INSERT INTO todo (title) VALUES (?)";
        $stmt = $pdo->prepare($sql)->execute([$title]);
    } else {
        $error = "Veuillez remplir le champ";
    }


// AFFICHAGE DE LA LISTE TODO

$sql = "SELECT * FROM todo";
$todos = $pdo->query($sql)->fetchAll();
?>


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

<form method="POST">
  <div>
    <input type="text" name="title"/>
    <input type="submit" name="submit" value="submit" />
  </div>
</form>   

<?php if(!empty($todos)) : ?>

<div class="todos">   

    <?php foreach($todos as $item) : ?>
        <div>
            <h2><?= $item['title'] ?></h2>
            <p>x</p>
            <input type="checkbox" name="check" id="check">
        </div>
    <?php endforeach ?>

</div> 

<?php endif ?>

</body>
</html>





