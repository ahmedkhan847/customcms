<?php 
session_start();
if(empty($_SESSION["username"]))
{
	
	header('Location: login.php');
                    return;
}
else
{
     include 'class/users.php';
	include 'header/headerd.php';

	$users = $_SESSION['username'];
    $user = new User();
    $result = $user->getUserarticles($users);
    $userinfo = array(  'tarticle' => null,
                        'u_fname' => null,
                        'u_lname' => null,                        
                        'city' => null,
                        'country' => null,
                        'u_img' => null,);
    
    while ($row = $result->fetch_assoc()) {

          
            $userinfo['tarticle'] = $row['tarticle'];          
            $userinfo['u_fname'] = $row['u_fname'];
            $userinfo['u_lname'] = $row['u_lname'];           
            $userinfo['city'] = $row['user_city'];
            $userinfo['country'] = $row['user_country'];
            $userinfo['u_img'] = $row['img'];
    }
   
}

?>
<!-- Page Content -->

                <div class="row" style="padding-top: 60px;">
  <h1 class="page-header">Welcome <?php echo ucwords($userinfo['u_fname']) .' '.ucwords($userinfo['u_lname']) ?></h1>
  <div class="row">

    <!-- left column -->
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="text-center">
        <img src="userimages/<?php echo $userinfo['u_img']; ?>" class="img-circle img-responsive" alt="avatar">
        
      </div>
    </div>
    <!-- edit form column -->
    <div class="col-md-8 col-sm-6 col-xs-12 personal-info" style="padding-top: 30px;">
        <ul class="list-group">
        <li class="list-group-item list-group-item-success">First name: <?php if(isset($userinfo['u_fname'])){echo $userinfo['u_fname'];}  ?></li>
        <li class="list-group-item list-group-item-success">Last name: <?php if(isset($userinfo['u_lname'])){echo $userinfo['u_lname'];}  ?></li>
            <li class="list-group-item list-group-item-success">City: <?php if(isset($userinfo['city'])){echo $userinfo['city'];}  ?></li>
        <li class="list-group-item list-group-item-success">Country: <?php if(isset($userinfo['country'])){echo $userinfo['country'];}  ?></li>
        <li class="list-group-item list-group-item-success">Total Articles: <?php if(isset($userinfo['tarticle'])){echo $userinfo['tarticle'];}  ?></li>
      
        </ul>
  
      
        
        
        </div>
      
    </div>
  </div>
</div>

       

<?php include 'footer/footerd.php';?>