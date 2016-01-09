<?php
include 'header/headerh.php';
include 'class/articles.php';

$id = $_GET['aid'];

$article = new Articles();

$result = $article->getarticle($id);

?>
<div class='row'>
	
</div>

<?php 
while($row = $result->fetch_assoc())
                                            {
?>
	<div class="panel panel-default">
  <div class="panel-heading back">
    <h2> <?php echo $row['article_name']; ?> </h2>
    <h5><span class="glyphicon glyphicon-time"></span> Post by <?php echo  ucwords($row['u_fname'])." " .ucwords($row['u_lname'])."," . $row['dates']; ?>.</h5>
      <h5><span class="label label-danger"><?php echo $row['category_name']; ?></span></h5>
  </div>
  <div class="panel-body">
  	<div class="col-md-3 pull-right">
		<img class='img-responsive img-rounded center' src="articleimage/<?php echo $row['img']; ?>">
    </div>
   <?php echo $row['article_content']; ?>
  </div>
</div>
	<?php
}
include 'footer/footerh.php';

?>