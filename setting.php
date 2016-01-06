<?php 
session_start();
if(empty($_SESSION["username"]))
{
	
	header('Location: login.php');
                    return;
}

include 'class/users.php';
include 'header/header3.php';;

	$users = $_SESSION['username'];
    $user = new User();
    $result = $user->getUser($users);
    $userinfo = array('userid' => null, 
    					'username' => null,
    					'u_fname' => null,
    					'u_lname' => null,
    					'u_email' => null,
    					'u_pass'=>$_SESSION["password"],
    					'city' => null,
    					'country' => null,
    					'u_img' => null,);
    $form = true;
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

    while ($row = $result->fetch_assoc()) {

    		$userinfo['userid'] = $row['user_id'];
    		$userinfo['username'] = $row['user_name'];
    		//$userinfo['u_psw'] = $row['user_psw'];
    		$userinfo['u_fname'] = $row['u_fname'];
    		$userinfo['u_lname'] = $row['u_lname'];
    		$userinfo['u_email'] = $row['user_email'];
    		$userinfo['city'] = $row['user_city'];
    		$userinfo['country'] = $row['user_country'];
    		$userinfo['u_img'] = $row['img'];
    }

    if(!empty($_POST))
    { 
          $target_dir = "images/";
          $target_file = $target_dir . basename($_FILES["u_img"]["name"]);
          $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
          $check = getimagesize($_FILES["u_img"]["tmp_name"]);
          $upload = false;
          if ($check === true)
              {
                
                $upload = true;
                
              if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"&& $imageFileType != "gif" ) 
              {
                $errors['user_img'] = 'Sorry, only JPG, JPEG, PNG & GIF files are allowed.';
                $form =false;
              }
            }
          if($_POST['u_fname'] != $userinfo['u_fname'])
          {
            $userinfo['u_fname'] = $_POST['u_fname'];
          }
           if($_POST['u_lname'] != $userinfo['u_lname'])
          {
            $userinfo['u_lname'] = $_POST['u_lname'];
          }
          if($_POST['city'] != $userinfo['city'])
          {
            $userinfo['city'] = $_POST['city'];
          }
          if($_POST['country'] != $userinfo['country'])
          {
            $userinfo['country'] = $_POST['country'];
          }

          if($_POST['psw'] != $userinfo['u_pass'])
          {
            if($_POST['psw'] === $_POST['cpsw'])
            {
              $userinfo['u_pass'] = $_POST['psw'];
            }
            else
            {
              $form = false;
              $errors['user_psw'] = 'Password must match';
            }
            
          }


          if($form)
          {
            
          


          } 


    }

 ?>
 <div class="row" style="padding-top: -20px;">
<form class="form-horizontal" role="form" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
 
  <h1 class="page-header">Edit Profile</h1>
  <div class="row">
    <!-- left column -->
    <div class="col-md-4 col-sm-6 col-xs-12">
      <div class="text-center">
        <img src="userimages/<?php echo $userinfo['u_img']; ?>" class="img-circle img-responsive" alt="avatar">
        <input type="file" name='u_img' class="text-center center-block well well-sm">
        <p class="text-danger"><?php echo $errors['user_img']?></p>
      </div>
    </div>
    <!-- edit form column -->
    <div class="col-md-8 col-sm-6 col-xs-12 personal-info">

      <h3>Change Your User Setting</h3>
      
        <div class="form-group">
          <label class="col-lg-3 control-label">First name:</label>
          <div class="col-lg-8">
            <input class="form-control" name='u_fname' value="<?php if(isset($userinfo['u_fname'])){echo $userinfo['u_fname'];}  ?>" type="text">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Last name:</label>
          <div class="col-lg-8">
            <input class="form-control" name='u_lname' value="<?php if(isset($userinfo['u_lname'])){echo $userinfo['u_lname'];}  ?>" type="text">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">City:</label>
          <div class="col-lg-8">
            <input class="form-control" name='city' value="<?php if(isset($userinfo['city'])){echo $userinfo['city'];}  ?>" type="text">
          </div>
        </div>
               <div class="form-group">
          <label class="col-lg-3 control-label">Country</label>
          <div class="col-lg-8">
            <input class="form-control" name='country' value="<?php if(isset($userinfo['country'])){echo $userinfo['country'];}  ?>" type="text">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Email:</label>
          <div class="col-lg-8">
            <input class="form-control" value="<?php if(isset($userinfo['u_email'])){echo $userinfo['u_email'];}  ?>" type="text" disabled="disabled">
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label">Username:</label>
          <div class="col-md-8">
            <input class="form-control" value="<?php if(isset($userinfo['username'])){echo $userinfo['username'];}  ?>" type="text" disabled="disabled">
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label">Password:</label>
          <div class="col-md-8">
            <input class="form-control" name='psw' value="<?php if(isset($userinfo['u_psw'])){echo $userinfo['u_psw'];}  ?>" type="password">
            <p class="text-danger"><?php echo $errors['user_psw']?></p>
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label">Confirm password:</label>
          <div class="col-md-8">
            <input class="form-control" name='cpsw' value="" type="password">
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label"></label>
          <div class="col-md-8">
            <input class="btn btn-primary" value="Save Changes" type="button">
            <span></span>
            <input class="btn btn-default" value="Cancel" type="reset">
          </div>
        </div>
      
    </div>
  </div>
</form>

</div>
 <?php include 'footer/footer3.php'; ?>