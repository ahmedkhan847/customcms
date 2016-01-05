 <?php 
 error_reporting(E_ERROR | E_PARSE);
 session_start();
if(isset($_SESSION["username"]))
{
  
  header('Location: dashboard.php');
                    return;
}
include 'header/header.php';
include 'class/users.php'; 
$login = new user();
$form = true;
 $errors = [
        'name' => null,
        'pwd' => null,
        'login' => null,
        
    ];
     
if(!empty($_POST))
{

        if (!isset($_POST['u_name'])) 
        {
            $errors['name'] = 'enter valid username';
            $form =false;
        } 
         if (!isset($_POST['pwd'])) 
        {
            $errors['pwd'] = 'enter valid password';
            $form =false;
        }

        if($form)
        {
          $name = $_POST['u_name'];
          $pwd = $_POST['pwd'];
          $result = $login->verifyuserpsw($name,$pwd);
                  if($result == "true")
                  {
                    $_SESSION["username"] = $name;
                    $_SESSION["password"] = $pwd;
                    header('Location: dashboard.php');
                    return;
                  }
                  else
                  {
                      $errors['login'] = $result;
                  }

          }
}
else
{
    $errors['login'] = "Fill The Form";
}



 ?> 
<form class="form-horizontal" method="POST" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<fieldset>

<!-- Form Name -->
<legend>User Login</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="u_name">Username</label>  
  <div class="col-md-4">
  <input id="u_name" name="u_name" placeholder="Enter Username" class="form-control input-md" required value="<?php if(isset($_POST['u_name'])){echo $_POST['u_name'];}  ?>" type="text">
   <p class="text-danger"><?php echo $errors['name']?></p> 
  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="pwd">Password</label>
  <div class="col-md-4">
    <input id="psw" name="pwd" placeholder="Enter Password" class="form-control input-md" required type="password" value="<?php if(isset($_POST['pwd'])){echo $_POST['pwd'];}  ?>">
    <p class="text-danger"><?php echo $errors['pwd']?></p>
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="submit"></label>
  <div class="col-md-4">
    <button id="submit" name="submit" class="btn btn-block btn-primary btn-primary"><span class="glyphicon glyphicon-send"></span> Submit</button>
    
  </div>
</div>

</fieldset>
</form>


<?php include 'footer/footer.php'; ?> 