<?php

require dirname(__DIR__) . '/vendor/autoload.php';
use Ramsey\Uuid\uuid;

function generateToken():string {
    $cipher = "aes-256-gcm";
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($cipher));
    $requestId = Uuid::uuid1();

    return openssl_encrypt($requestId, $cipher, gethostname(), OPENSSL_ZERO_PADDING, $iv, $tag);
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $token = generateToken();
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        @import url('https://fonts.googleapis.com/css?family=Sedgwick+Ave+Display');
        body{
            padding-top: 2em;
        }
        .title-design{
            font-family: 'Sedgwick Ave Display', cursive;
        }
        .cc{
            display: flex;
            justify-content: center;
        }

    </style>
    <title>Add a project</title>
</head>
<body class="container">
<h1 class="title-design">Add a project:</h1>
<form method="get" action="addpage.php">
    <div class="form-group">
        <label for="addProject_title">Write a title for your project</label>
        <input class="form-control" type="text" name="addProject_title">
    </div>
    <div class="form-group">
        <label for="addProject_description">Define a description for your project</label>
        <textarea class="form-control" name="addProject_description"></textarea>
    </div>
    <div class="form-group">
        <label for="addProject_image">Choose an image for your project</label>
        <input class="form-control" type="file" name="addProject_image">
    </div>
    <input type="hidden" name="addProject_csrf_token" value="<?php echo $token?? ''; ?>">
    <div class="form-group cc">
        <button class="btn btn-default" type="submit">Submit</button>
    </div>
</form>
</body>
</html>
