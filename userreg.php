<?php
error_reporting(E_ERROR | E_PARSE);
session_start();
if(isset($_SESSION["username"]))
{
  
  header('Location: dashboard.php');
                    return;
}
include 'header/headerh.php';
include 'class/users.php';

$register = new User();

$errors = [
        'user_name' => null,
        'user_fname' => null,
        'user_lname' => null,
        'user_psw' => null,
        'user_cpsw' => null,
        'user_email' => null,
        'user_img' => null,
        'user_city' => null,
        'user_country' => null,
        'form' => null
    ];

    $conne='';
    $form = true;

if(!empty($_POST))
{	
  
	$target_dir = "images/";
	$target_file = $target_dir . basename($_FILES["u_img"]["name"]);
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
  $check = getimagesize($_FILES["u_img"]["tmp_name"]);
	if(empty($_POST['u_name']))
	{
		$errors['user_name'] = "Please Enter Your Username";
		$form = false;
	}
  if(empty($_POST['f_name']))
  {
    $errors['user_fname'] = "Please Enter Your First name";
    $form = false;
  }
   if(empty($_POST['u_city']))
  {
    $errors['user_city'] = "Please Enter Your City";
    $form = false;
  }
   if(empty($_POST['u_country']))
  {
    $errors['user_country'] = "Please Enter Your Country";
    $form = false;
  }
  if(empty($_POST['l_name']))
  {
    $errors['user_lname'] = "Please Enter Your Last name";
    $form = false;
  }
	if(empty($_POST['u_email']))
	{
		$errors['user_email'] = "Please Enter Your email";
		$form = false;
	}
	elseif(!filter_var($_POST['u_email'],FILTER_VALIDATE_EMAIL))
	{
    $errors['form'] = "here";
		$errors['user_email'] = "Enter Valid Email";
		$form = false;
	}
	if ($check === false)
	{
	$errors['user_img'] = 'Image is required';
	$form =false;
	}elseif($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"&& $imageFileType != "gif" ) 
	{
	$errors['user_img'] = 'Sorry, only JPG, JPEG, PNG & GIF files are allowed.';
	$form =false;
	}
	
	if(empty($_POST['psw']))
	{
		$errors['user_psw'] = "Please Enter Password";
		$form = false;
	}elseif(empty($_POST['c_psw']))
	{
		$errors['user_cpsw'] = "Please Enter Conform Password";
		$form = false;
	}elseif ($_POST['psw'] !== $_POST['c_psw']) {
		$errors['user_cpsw'] = "Password Must be matched";
		$form = false;
	}

if($form)
{
	$fname = $_POST['f_name'];
  $lname = $_POST['l_name'];
  $user = $_POST['u_name'];
  $email = $_POST['u_email'];
  $county = $_POST['u_country'];
  $city = $_POST['u_city'];
  $psw = $_POST['psw'];
  $target_dir = "userimages/";
  $image = rand(1,100);
  $target_file = $target_dir . basename($_FILES["u_img"]["name"]);  
  $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
  $imgname = $image .".".$imageFileType;
  $result = $register->verifyuser($user);
  if($result)
  {
    $result = $register->createuser($fname,$lname,$user,$psw,$email,$imgname,$county,$city);
  if($result)
  {
    $_SESSION["username"] = $user;
    $_SESSION["password"] = $psw;
    move_uploaded_file($_FILES["u_img"]["tmp_name"], $target_dir.$imgname);
              header('Location: dashboard.php');
                   return;
  }
  else
  {
    $errors['form'] = $result;
  }

  }
  else
  {
    $errors['user_name'] = 'Username Already Exist';
  }
  
}

}
else
{
	$errors['form'] = "Kindly Fill All the Fields";
}
?>
<form class="form-horizontal" method="POST" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<fieldset>

<!-- Form Name -->
<legend>User Registration</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="f_name">First name</label>  
  <div class="col-md-4">
  <input id="f_name" name="f_name" placeholder="Enter First Name" class="form-control input-md" value="<?php if(isset($_POST['f_name'])){echo $_POST['f_name'];}  ?>" required type="text">
  
  <p class="text-danger"><?php echo $errors['user_fname']?></p>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="l_name">Last name</label>  
  <div class="col-md-4">
  <input id="l_name" name="l_name" placeholder="Enter Last Name" class="form-control input-md" value="<?php if(isset($_POST['l_name'])){echo $_POST['l_name'];}  ?>" required type="text">
    
  <p class="text-danger"><?php echo $errors['user_lname']?></p>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="u_city">Your City</label>  
  <div class="col-md-4">
  <input id="u_city" name="u_city" placeholder="Enter Your City" class="form-control input-md" value="<?php if(isset($_POST['u_city'])){echo $_POST['u_city'];}  ?>" required type="text">
  
  <p class="text-danger"><?php echo $errors['user_city']?></p>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="u_country">Your Country</label>  
  <div class="col-md-4">
  <input id="u_country" name="u_country" placeholder="Enter Your Country" class="form-control input-md" value="<?php if(isset($_POST['u_country'])){echo $_POST['u_country'];}  ?>" required type="text">
  
  <p class="text-danger"><?php echo $errors['user_country']?></p>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="u_name">Username</label>  
  <div class="col-md-4">
  <input id="u_name" name="u_name" placeholder="Enter Username" class="form-control input-md" value="<?php if(isset($_POST['u_name'])){echo $_POST['u_name'];}  ?>" required type="text">
  <span class="help-block">Enter Username Without Space</span>  
  <p class="text-danger"><?php echo $errors['user_name']?></p>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="u_email">Email</label>  
  <div class="col-md-4">
  <input id="u_email" name="u_email" placeholder="Enter Email Address" class="form-control input-md" value="<?php if(isset($_POST['u_email'])){echo $_POST['u_email'];}  ?>" required type="email">
   <p class="text-danger"><?php echo $errors['user_email']?></p> 
  </div>
</div>

<!-- File Button --> 
<div class="form-group">
  <label class="col-md-4 control-label" for="u_img"> User Image</label>
  <div class="col-md-4">
    <input id="u_img" name="u_img" class="input-file" type="file" value="<?php if(isset($_POST['u_img'])){echo $_POST['u_img'];}  ?>" required>
    <p class="text-danger"><?php echo $errors['user_img']?></p>
  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="psw">Password</label>
  <div class="col-md-4">
    <input id="psw" name="psw" placeholder="Enter Password" class="form-control input-md" required type="password" value="<?php if(isset($_POST['psw'])){echo $_POST['psw'];}  ?>">
    <p class="text-danger"><?php echo $errors['user_psw']?></p>
  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="c_psw">Conform Password</label>
  <div class="col-md-4">
    <input id="c_psw" name="c_psw" placeholder="Conform Password" class="form-control input-md" value="<?php if(isset($_POST['c_psw'])){echo $_POST['c_psw'];}  ?>" required type="password">
    <p class="text-danger"><?php echo $errors['user_cpsw']?></p>
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="submit"></label>
  <div class="col-md-4">
    <button id="submit" name="submit" class="btn btn-block btn-primary btn-primary"><span class="glyphicon glyphicon-send"></span> Submit</button>
    <span class="help-block"><?php echo $errors['form']?></span>


  </div>
</div>

</fieldset>
</form>


<?php include 'footer/footerh.php'; ?>