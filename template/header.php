

<?php
session_start();

require_once __DIR__.'/../config/app.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

?>
<!DOCTYPE html>
<html dir="<?php echo $config['dir'] ?>"  lang="<?php echo $config['lang']?>"  >
<head>
<title><?php echo $config['app_name'] ." | " .$title ?> </title>
<meta charset="UTF-8/">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<link rel="stylesheet" href="../style.css">
</head>

<body>

    <div class="container">
     <?php isset($_SESSION['visitor_name']) ? $sender = $_SESSION['visitor_name'] : $sender = '' ?>
       <p>Hello <?php echo $sender ?></p>