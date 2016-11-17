<?php
include 'header/header.php';
include 'class/articles.php';

$view   = new Articles();
$result = $view->viewarticles();
$rows   = $result->num_rows;
$count  = 0;
//echo print_r($result);
//echo "<br>".$rows;
?>
  <div class="jumbotron">
    <h1>Custom Testing CMS</h1>
    <p>Bootstrap is the most popular HTML, CSS, and JS framework for developing
    responsive, mobile-first projects on the web.</p>
  </div>
<div class='container'>
<div class='row'>
<?php
while ($row = $result->fetch_assoc()) {
    if ($count == 3) {
        echo "</div></div><div class='container'><div class='row'><br>";
        $count = 0;
    }
    ?>
<div class="col-sm-4">
      <div class="panel panel-primary">
        <div class="panel-heading home links"><?php echo $row['article_name'];?></div>
        <div class="panel-body"><img src="articleimage/<?php echo $row['img'];?>" class="img-responsive img-circle" style="width:100%" alt="Image">
          <p> <?php
$aid = $row['url'];
    echo $view->limit_text($row['article_content']) . " " . "<a href='$aid'>read more...</a>";

    //echo $row['article_content'];
    ?> </p>
        </div>
        <div class="panel-footer"><p> Post by <?php echo ucwords($row['u_fname']) . " " . ucwords($row['u_lname']) . "," . $row['dates'];?>.
        <br><span class="label label-danger"><?php echo $row['category_name'];?></span></p></div>
      </div>
    </div>

<?php
$count++;
}
?>
</div>
</div>
<?php include 'footer/footer.php';?>
