<?php
include 'header/header.php';
include 'class/sendmail.php';
//$user = $_SESSION["username"];
$send = new SendMail();
$errors = [
        'u_name' => null,
        'u_email' => null,
        'u_subject' => null,
        'u_message' => null,
        'form' => null
    ];

    $conne='';
    $form = true;
    $target_dir = "articleimage/";
    $target_file = null;
    $imageFileType = null;
if(!empty($_POST))
{ 
  
  if(empty($_POST['u_name']))
  {
    $errors['u_name'] = "Please Enter Your Name";
    $form = false;
  }

  if(empty($_POST['u_email']))
  {
    $errors['user_email'] = "Please Enter Your email";
    $form = false;
  }
  elseif(!filter_var($_POST['u_email'],FILTER_VALIDATE_EMAIL))
  {
    $errors['user_email'] = "Enter Valid Email";
    $form = false;
  }
  
  
  if(empty($_POST['u_subject']))
  {
    $errors['u_subject'] = "Please Enter Subject";
    $form = false;
  }

  if(empty($_POST['u_message']))
  {
    $errors['u_message'] = "Please Enter Message";
    $form = false;
  }

if($form)
{
  

  $name = $_POST['u_name'];
  $email = $_POST['u_email'];
  $message = $_POST['u_message'];
  $subject = $_POST['u_subject'];
  $headers = "From: ahmedkhangaditek@gmail.com" . "\r\n";

  if ($send->mails($name,$email, $subject, $message) === true) {
      $errors['form'] = "Message Sent Successfully";
  }
  else
  {
    $errors['form'] = "Unable To Send Message This Time";
  }
  
}

}
else
{
  //$errors['form'] = "Kindly Fill All the Fields";
}


?>
<!--<script type="text/javascript" src="tinymce/tinymce.min.js"></script>-->
<script type="text/javascript" src="style/js/nicEdit.js"></script>
    <script type="text/javascript">
        // tinymce.init({
        //     selector: "#article_content"
        // });

bkLib.onDomLoaded(function() {
  new nicEditor().panelInstance('article_content');
  
});
    </script>

<form class="form-horizontal" method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<fieldset>

<!-- Form Name -->
<legend>Article</legend>

<!-- Text input-->
<div class="form-group col-md-10">
  <label class="control-label" for="a_name">Name</label>  
  
  <input id="u_name" name="u_name" type="text" placeholder="Enter Your Name" class="form-control input-md"  value="<?php if($form === false){ if(isset($_POST['u_name'])){echo $_POST['u_name'];} } ?>" required>
    <p class="text-danger"><?php echo $errors['u_name']?></p>
  
</div>

<!-- Select Basic -->
<div class="form-group col-md-10">
  <label class="control-label" for="a_category">Email</label>
  
<input id="u_email" name="u_email" type="email" placeholder="Enter Your Email" class="form-control input-md"  value="<?php if($form === false){ if(isset($_POST['u_email'])){echo $_POST['u_email'];} } ?>" required>
    <p class="text-danger"><?php echo $errors['u_email']?></p>

</div>

<!-- File Button --> 
<div class="form-group col-md-10">
  <label class="control-label" for="article_img">Subject</label>
  
    <input id="u_subject" name="u_subject" type="text" placeholder="Enter Your Email" class="form-control input-md"  value="<?php if($form === false){ if(isset($_POST['u_subject'])){echo $_POST['u_subject'];} } ?>" required>
     <p class="text-danger"><?php echo $errors['u_subject']?></p>
  
</div>

<!-- Textarea -->
<div class="form-group col-md-10" >
  <label class="control-label" for="article_content">Message</label>
                      
    <textarea class="form-control" id="u_message" name="u_message" rows="13"><?php if($form === false){ if(isset($_POST['u_message'])){echo $_POST['u_message'];} } ?></textarea>
    <p class="text-danger"><?php echo $errors['u_message'];?></p>
  
</div>

<!-- Button -->
<div class="form-group col-md-10">
  <label class="control-label" for="submit"></label>
 
    <button id="submit" name="submit" type="submit" class="btn btn-success">Publish</button>
    <p class="text-danger"><?php echo $errors['form'];?></p>
  
</div>

</fieldset>
</form>


<?php include 'footer/footer.php';?>