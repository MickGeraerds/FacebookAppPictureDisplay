<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
</head>
<body>
    <?php
   require("includes/faceBookHandler.php");
   
    $faceBookHandler = new faceBookHandler;
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if(count($_POST) ==  1) {
            $faceBookHandler->logIn();
        }
        
    }
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        if(isset($_GET["code"])) {
            echo $faceBookHandler->verifyLoggin($_GET["code"]);
        }
    }

    ?>
    <form action="" method="post" id="login">
        <input type="submit" name="login" value="login">
    </form>
</body>
</html>