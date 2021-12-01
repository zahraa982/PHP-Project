

<?php

$title = 'Contact';
require_once 'template/header.php';
require_once('includes/uploader.php');

if(isset( $_SESSION['contact_form'])){
print_r($_SESSION['contact_form']);}

setcookie('is_admin' , '1' ,time()-3600 );

if(isset($_COOKIE['is_admin']) && $_COOKIE['is_admin'] == 1 )
echo "<a href='/admin'>go to admin</a>"
?>
  
<h1>Contact us</h1>

<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data"> 
    <div class="form-group">
        <label for='name'> Your name</label>
        <input type="text" name="name" value="<?php if(isset($_SESSION['contact_form']['name'])) echo  $_SESSION['contact_form']['name'] ?>" class="form-control" placeholder="Your name">
    <span class="text-danger"><?php echo $nameError ?></span>
    </div>
    <div class="form-group">
        <label for='email'> Your email</label>
        <input type="email" name="email" value="<?php if(isset($_SESSION['contact_form']['email'])) echo $_SESSION['contact_form']['email'] ?>" class="form-control" placeholder="Your email">
        <span class="text-danger"><?php echo $emailError ?></span>
    </div>
    <div class="form-group">
        <label for='name'> Your document</label>
        <input type="file" name="document">
        <span class="text-danger"><?php echo $documentError ?></span>

    </div>
    <div class="form-group">
        <label for='message'> Your message</label>
        <textarea  name="message"  class="form-control" placeholder="Your message"><?php if(isset($_SESSION['contact_form']['message'])) echo $_SESSION['contact_form']['message'] ?></textarea>
        <span class="text-danger"><?php echo $messageError ?></span>

    </div>
    <button class="btn btn-primary">Send</button>
</form>

<?php require_once 'template/footer.php';


/*
XSS 
$input = "<script>$('body').html('<h1>You are hacked</h1>')</script>";
echo $input;*/

?>

