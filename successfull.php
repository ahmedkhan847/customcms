<?php include 'header/header.php';
$type = $_GET['types'];

?>
<div class="container-fluid">
     
    <!-- Stack the columns on mobile by making one full-width and the other half-width -->
<div class="row">
<?php 
 if($type == 'user')
 {
?>	
  <div class="col-xs-12 col-md-offset-4 col-md-6">New User has been successfully Registered</div>
  <?php
}
else
{
  ?>
<div class="col-xs-12 col-md-offset-4 col-md-6">Article Has been Uploaded Succesfully</div>
    <?php
}

?>
  </div>
    
</div>

<?php include 'footer/footer.php'; ?>