<?php
session_start();
if(empty($_SESSION["username"]))
{
  
  header('Location: login.php');
                    return;
}


include 'header/header2.php';
include 'class/articles.php';
$user = $_SESSION["username"];
$crud = new Articles();
$errors = [
        'article_name' => null,
        'article_category' => null,
        'article_content' => null,
        'article_img' => null,
        'form' => null
    ];

    $conne='';
    $form = true;
    $target_dir = "articleimage/";
    $target_file = null;
    $imageFileType = null;
if(!empty($_POST))
{	
	
	$target_file = $target_dir . basename($_FILES["article_img"]["name"]);
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	$check = getimagesize($_FILES["article_img"]["tmp_name"]);
	if(empty($_POST['a_name']))
	{
		$errors['article_name'] = "Please Enter Your Title";
		$form = false;
	}
	if ($check === false)
	{
	$errors['article_img'] = 'Image is required';
	$form =false;
	}elseif($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"&& $imageFileType != "gif" ) 
	{
	$errors['article_img'] = 'Sorry, only JPG, JPEG, PNG & GIF files are allowed.';
	$form =false;
	}
	
	if(empty($_POST['a_category']))
	{
		$errors['article_category'] = "Please Select Category";
		$form = false;
	}

	if(empty($_POST['article_content']))
	{
		$errors['article_content'] = "Please Fill Your Content";
		$form = false;
	}

if($form)
{
  

  $articlename = $_POST['a_name'];
  $articlecont = $_POST['article_content'];
  $articlecat = $_POST['a_category'];
  $image = rand(1,100);
  $imgname = $image .".".$imageFileType;
  $result = $crud->insertarticle($articlename,$articlecont,$articlecat,$user,$imgname);

  if($result == 'true')
  {
  	move_uploaded_file($_FILES["article_img"]["tmp_name"], $target_dir.$imgname);
              header('Location: articlelist.php');
                   return;
  }
  else
  {
  	$errors['form'] = $result;
  }
	
}

}
else
{
	$errors['form'] = "Kindly Fill All the Fields";
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

<form class="form-horizontal" method="post" enctype="multipart/form-data" action="">
<fieldset>

<!-- Form Name -->
<legend>Article</legend>

<!-- Text input-->
<div class="form-group col-md-10">
  <label class="control-label" for="a_name">Title</label>  
  
  <input id="a_name" name="a_name" type="text" placeholder="Enter Title For Your Article" class="form-control input-md"  value="<?php if(isset($_POST['a_name'])){echo $_POST['a_name'];}  ?>" required>
    <p class="text-danger"><?php echo $errors['article_name']?></p>
  
</div>

<!-- Select Basic -->
<div class="form-group col-md-10">
  <label class="control-label" for="a_category">Category</label>
  
    <select id="a_category" name="a_category" class="form-control" required>
    	<option value=''></option>
    	<?php 
    		$result = $crud->getcategories();

			while($row = $result->fetch_assoc())
				{
					$category = $row['category_name'];
          $id = $row['category_id'];
					echo "<option value='$id'>$category</option>";
				}
		?>
      
    </select>
    <p class="text-danger"><?php echo $errors['article_category']?></p>

</div>

<!-- File Button --> 
<div class="form-group col-md-10">
  <label class="control-label" for="article_img">Upload Image</label>
  
    <input id="article_img" name="article_img" class="input-file" type="file" required>

     <p class="text-danger"><?php echo $errors['article_img']?></p>
  
</div>

<!-- Textarea -->
<div class="form-group col-md-10" >
  <label class="control-label" for="article_content">Content</label>
                      
    <textarea class="form-control" id="article_content" name="article_content" rows="13"><?php if(isset($_POST['article_content'])){echo $_POST['article_content'];}  ?></textarea>
    <p class="text-danger"><?php echo $errors['article_content']?></p>
  
</div>

<!-- Button -->
<div class="form-group col-md-10">
  <label class="control-label" for="submit"></label>
 
    <button id="submit" name="submit" class="btn btn-success">Publish</button>
    <p class="text-danger"><?php echo $errors['form']?></p>
  
</div>

</fieldset>
</form>


<?php include 'footer/footer2.php';?>