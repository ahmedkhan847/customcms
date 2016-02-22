<?php
include 'header/header.php';
include 'class/articles.php';
include 'class/comment.php';
$urls = null;
if (!empty($_GET['aid'])) {
   // if ($_GET['aid'] != $_SESSION["id"]) {
        $urls            = $_GET['aid'];
        $_SESSION["id"] = $urls;
       // echo $_SESSION["id"];
    //}
} else {
    $urls = $_SESSION["id"];
    //echo $_SESSION["id"];
}

$article = new Articles();
$coments = new comment();

$result  = $article->getarticle($urls);
$id      = $article->getid($urls);
$result2 = $coments->viewcomments($id);
$count   = $coments->countcoments($id);
$errors  = [
    'u_name'    => null,
    'u_email'   => null,
    'u_website' => null,
    'u_message' => null,
    'form'      => null,
];

$conne         = '';
$form          = true;
$target_dir    = "articleimage/";
$target_file   = null;
$imageFileType = null;
if (!empty($_POST)) {

    if (empty($_POST['u_name'])) {
        $errors['u_name'] = "Please Enter Your Name";
        $form             = false;
    }

    if (empty($_POST['u_email'])) {
        $errors['uemail'] = "Please Enter Your email";
        $form             = false;
    } elseif (!filter_var($_POST['u_email'], FILTER_VALIDATE_EMAIL)) {
        $errors['uemail'] = "Enter Valid Email";
        $form             = false;
    }

    if (!empty($_POST['u_website'])) {

        if (!filter_var($_POST['u_website'], FILTER_VALIDATE_URL)) {
            $errors['u_website'] = "Enter Valid Website";
            $form                = false;
        }
    }

    if (empty($_POST['u_message'])) {
        $errors['u_message'] = "Please Enter Comment";
        $form                = false;
    }

    if ($form) {

        $res = $coments->addcomment($id, $_POST['u_name'], $_POST['u_email'], $_POST['u_website'], $_POST['u_message']);
        if ($res === true) {
            header("Location: $urls");
            return;

        } else {
            $errors['form'] = $res;
        }

    }

} else {
    //$errors['form'] = "Kindly Fill All the Fields";
}
?>
<div class='row'>
<?php
while ($row = $result->fetch_assoc()) {
    ?>
  <div class="panel panel-default">
  <div class="panel-heading back">
    <h2> <?php echo $row['article_name'];?> </h2>
    <h5><span class="glyphicon glyphicon-time"></span> Post by <?php echo ucwords($row['u_fname']) . " " . ucwords($row['u_lname']) . "," . $row['dates'];?>.</h5>
      <h5><span class="label label-danger"><?php echo $row['category_name'];?></span></h5>
  </div>
  <div class="panel-body">
    <div class="col-md-3 pull-right">
    <img class='img-responsive img-rounded center' src="/blog2/articleimage/<?php echo $row['img'];?>">
    </div>
   <?php echo $row['article_content'];?>
  </div>
</div>
<?php
}
?>
</div>

<div class="row">
  <div class=="col-md-8">
<!-- Form Name -->
<legend>Total Comments <?php echo $count;?></legend>
<section class="comment-list">
<?php
if ($count != 0) {
    while ($row = $result2->fetch_assoc()) {
        ?>
            <!-- First Comment -->
          <article class="row">
            <div class="col-md-2 col-sm-2 hidden-xs">
              <figure class="thumbnail">
                <img class="img-responsive" src="http://www.keita-gaming.com/assets/profile/default-avatar-c5d8ec086224cb6fc4e395f4ba3018c2.jpg" />
                <figcaption class="text-center"><?php if (empty($row['cweb'])) {echo $row['cname'];} else {echo "<a href='" . $row['cweb'] . "'>" . $row['cname'] . "</a>";}
        ?></figcaption>
                <figcaption class="text-center"><time class="comment-date" datetime="16-12-2014 01:05"><i class="fa fa-clock-o"></i> <?php echo $row['dates'];?></time></figcaption>
              </figure>
            </div>
            <div class="col-md-10 col-sm-10">
              <div class="panel panel-default arrow left">
                <div class="panel-body">

                  <div class="comment-post">
                    <p>
                      <?php echo $row['comment'];?>
                    </p>
                  </div>

                </div>
              </div>
            </div>
          </article>
<?php
}}
?>

</section>
</div>
</div>

<div class="row">
  <div class=="col-md-6">
<form class="form-horizontal" method="POST" action ="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">


<!-- Form Name -->
<legend>Add Comment</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="name">Name</label>
  <div class="col-md-4">
  <input id="name" name="u_name" type="text" placeholder="Your Name" class="form-control input-md" required="">
    <p class="text-danger"><?php echo $errors['u_name'];?></p>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="u_email">Email</label>
  <div class="col-md-4">
  <input id="email" name="u_email" type="email" placeholder="Your Email" class="form-control input-md" required="">
    <p class="text-danger"><?php echo $errors['u_email'];?></p>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="u_website">URL</label>
  <div class="col-md-4">
  <input id="url" name="u_website" type="url" placeholder="Your Website" class="form-control input-md">
    <p class="text-danger"><?php echo $errors['u_website'];?></p>
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="u_message">Message</label>
  <div class="col-md-4">
    <textarea class="form-control" id="message" name="u_message">Your Comment</textarea>
  </div>
  <p class="text-danger"><?php echo $errors['u_message'];?></p>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="submit"></label>
  <div class="col-md-4">
    <button id="submit" name="submit" class="btn btn-info" >Add Comment</button>
  </div>
</div>


</form>



</div>
</div>

  <?php
include 'footer/footer.php';
?>