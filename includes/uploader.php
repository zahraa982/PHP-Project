<?php


$uploadDir = 'uploads';

function fileString($filed){
    //to be clear text...
$filed = filter_var(trim($filed), FILTER_SANITIZE_STRING);
if(empty($filed)){
return false;
} else{
    return true;
}

 
return $filed;
}

function filterEmail($filed){

$filed = filter_var(trim($filed),FILTER_SANITIZE_EMAIL);

if(filter_var($filed, FILTER_SANITIZE_EMAIL)){
return $filed;
} else{
    return false;
   }
 }


   function canUpload($file){
       //allowad file types
    $allowd =[
        'jpg' =>'image/jpeg',
        'png' =>'image/png',
        'gif' =>'image/gif'

         ];
        $filetype = $file['type'];

        $maxFileSize = 100* 1024;

        $fileMineType = mime_content_type($file['tmp_name']);

        $fileSize = $file['size'];

    //cheak the mainType for the files
        if(!in_array($fileMineType, $allowd)){
        return 'File type not allowed';
        }
        //cheak the fileSize
        if($fileSize > $maxFileSize){
          return 'File size is not allowed';
        }
          return true;
   }

$nameError = $emailError = $messageError = $documentError ='';
$name = $email = $message = '';


if($_SERVER['REQUEST_METHOD'] == 'POST'){

   $name = fileString($_POST['name']);
   if(!$name){
     $_SESSION['contact_form']['name'] = '';
      $nameError = 'Your name is requierd';
   }else{
    $_SESSION['contact_form']['name'] = '$name';
   }
   $email = filterEmail($_POST['email']);
   if(!$email){
    $_SESSION['contact_form']['email'] = '';
     $emailError = 'Your email is invalid';
   }else{
    $_SESSION['contact_form']['email'] = '$email';

   }

   $message = fileString($_POST['message']);
    if(!$message){
      $_SESSION['contact_form']['message'] = '';

    $messageError = 'You must enter a message';
}else{
  $_SESSION['contact_form']['message'] = '$message';
 
}

if(isset($_FILES['document']) && $_FILES['document']['error'] ==0){
  $canUpload =canUpload($_FILES['document']);

if($canUpload ===true){
//makeDir in PHP
if(!is_dir($uploadDir)){
    umask(0);
   mkdir($uploadDir , 0775);
}
$fileName = time().$_FILES['document']['name'];

if(file_exists($uploadDir. '/'.$fileName)){
$documentError = 'File already exists';
}else{
  move_uploaded_file($_FILES['document']['tmp_name'], $uploadDir. '/'.$fileName);

}

}else{
    $documentError = $canUpload;
    }
 }

   /*
     //send email if everzthing correct

 if(!$emailError && !$nameError && !$emailError && !$documentError){
  $headers = 'MIME-Version: 1.0' . "\r\n";
 $headers .= 'Content-type: text/html; charset=UFT-8' . "\r\n"; 
 $headers .= 'From: '.$email."\r\n".
  'Reply-To: '.$email."\r\n" .
  'X-Mailer: PHP/' . phpversion();

  $htmlMessage = "<html><body>";
        $htmlMessage .= "<p style='color : #ff0000'; >'.$message'</p>";
        $htmlMessage .= "</body></html>";

  if(mail($config['admin_email'], 'You have new message', $message, $headers)){
      session_destroy();
      header('Location: contact.php');
      die();
      }else{
      echo "Error sending your email";
     }*/
   }
  