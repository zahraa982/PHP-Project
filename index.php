

<?php
$title = 'Contact';
require_once './template/header.php';

//24 hours
setcookie('is_admin' , '1' ,time()+30*24*60*60 );

if(isset($_COOKIE['username']))
echo "Hello ". $_COOKIE['username'];
?>

<?php require_once './template/footer.php'?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read me</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
</head>
<body>
<section class="showcase">
			<div class="video-container">
				<video src="https://traversymedia.com/downloads/video.mov" autoplay muted loop></video>
			</div>
			<div class="content">
			<div class="container">
         <?php isset($_SESSION['visitor_name']) ? $sender = $_SESSION['visitor_name'] : $sender = '' ?>
           <p>Hello <?php echo $sender ?></p>
			</div>
				<h1>Read till the stars fall</h1>
				<h3>let us read togther</h3>
				<a href="#about" class="btn">Read  book</a>
        <a href="#about" class="btn">Or Listen </a>
			</div>
		</section>

		<section id="about">
			<h1>Why we are here?</h1>
			<p>
				Simlpy to make you enjoy reading and listing to books that take your brain on a lovely dreamy charming world.
			</p>

			<h2>Follow Me On Social Media</h2>

			<div class="social">
			<a href="https://twitter.com/whosuorm/status/1406969327828492290?s=21" target="_blank"><i class="fab fa-twitter fa-3x"></i></a>
            <a href="https://www.instagram.com/i___5z/"><i class="fab fa-instagram fa-3x" aria-hidden="true"></i></a>
				<a href="https://github.com/zahraa982" target="_blank"><i class="fab fa-github fa-3x"></i></a>
				<a href="https://www.linkedin.com/in/bradtraversy" target="_blank"><i class="fab fa-linkedin fa-3x"></i></a>
			</div>
		</section> 
</body>
</html>




