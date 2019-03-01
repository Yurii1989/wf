<?php

$db = "dbnew";
$host = "127.0.0.1";
$username = "root";
$password = "";

try {
    $connection = new PDO("mysql:dbname=$db;host=$host", $username, $password);
} catch (\PDOException $exception) {
    print_r("[ERROR] % Impossible connection to the DB %");
    print_r($exception);
}

$articles = $connection->query('SELECT * FROM article');

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Articles</title>
    <style>
        body {
            width: 80%;
            margin: 0 auto;
        }
        article {
            border: 1px solid black;
            margin: 10px auto;
            padding: 10px;
            border-radius: 10px;
        }
        article:hover {
            box-shadow: 2px 2px 7px black;
            transform: scale(1.03);
        }
    </style>
</head>
<body>
  <?php
      foreach ($articles as $article) { ?>
           <article>
           <h1> <?php echo $article['title']; ?></h1>
           <img src="<?php echo $article['img']; ?>">
          <p> <?php echo $article['description']; ?></p>
           </article>
  <?php } ?>


</body>
</html>
