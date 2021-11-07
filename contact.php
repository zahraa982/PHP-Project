


<?php

$title = 'Contact';
require_once 'template/header.php';

function fileString($filed){
    //to be clear text...
$filed = filter_var(trim($filed), FILTER_SANITIZE_STRING);
if(empty($filed)){
return $filed;
} else{
    return false;
}


return $filed;
}

function filterEmail($filed){

$filed = filter_var(trim($filed),FILTER_SANITIZE_EMAIL);

if(filter_var($filed, FILTER_SANITIZE_EMAIL)){
return $filed;
} else{
    return false;
   }  }


$nameError = $emailError = $messageError = $documentError ='';
$name = $email = $message = '';

//cheak the mainType for the files
if($_SERVER['REQUEST_METHOD'] == 'POST'){

   $name = fileString($_POST['name']);
   if(!$name){
      $nameError = 'Your name is requierd';
   }

   $email = filterEmail($_POST['email']);
   if(!$email){
     $emailError = 'Your email is invalid';
   }

   $message = fileString($_POST['message']);
    if(!$message){
    $messageError = 'You must enter a message';
}

if(isset($_FILES['document']) && $_FILES['document']['error'] ==0){
 $allowd =[
'jpg' =>'image/jpeg',
'png' =>'image/png',
'gif' =>'image/gif'

 ];
$filetype = $_FILES['document'] ['type'];

$maxFileSize = 10* 1024;

$fileMineType = mime_content_type($_FILES['document'] ['tmp_name']);

$fileSize = $_FILES['document']['size'];

if(!in_array($fileMineType, $allowd)){
$documentError = 'File type not allowed';
}
//cheak the fileSize
if($fileSize > $maxFileSize){ 
  $documentError = 'File size is not allowed';
}

              }
           }
      ?>

<h1>Contact us</h1>

<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data"> 
    <div class="form-group">
        <label for='name'> Your name</label>
        <input type="text" name="name" value="<?php echo $name ?>" class="form-control" placeholder="Your name">
    <span class="text-danger"><?php echo $nameError ?></span>
    </div>
    <div class="form-group">
        <label for='email'> Your email</label>
        <input type="email" name="email" value="<?php echo $email ?>" class="form-control" placeholder="Your email">
        <span class="text-danger"><?php echo $emailError ?></span>
    </div>
    <div class="form-group">
        <label for='name'> Your document</label>
        <input type="file" name="document">
        <span class="text-danger"><?php echo $documentError ?></span>

    </div>
    <div class="form-group">
        <label for='message'> Your message</label>
        <textarea  name="message"  class="form-control" placeholder="Your message"><?php echo $message ?></textarea>
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

