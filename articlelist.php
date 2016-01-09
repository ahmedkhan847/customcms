<?php 
session_start();
if(empty($_SESSION["username"]))
{
	
	header('Location: login.php');
                    return;
}


	include 'header/headerd.php';
  include 'class/articles.php';
	$user = $_SESSION['username'];
    $articles = new Articles();
    $result = $articles->articlelist($user);


?>
<!-- Page Content -->

                <div class="row">
                    <div class="col-lg-10">
                        <legend><h1>Articles</h1></legend>
                          
                        <div class="table-responsive">
                          <table class="table">
                                <thead>
                                  <tr>
                                    <th>Title</th>
                                   <!-- <th>Content</th>-->
                                    <th>Category</th>
                                    <th>Edit</th>
                                  </tr>
                                </thead>
                                 <tbody>
                                    <?php 
                                    if($result != "No articles")
                                    {
                                        while($row = $result->fetch_assoc())
                                            {
                                                $content = $articles->limit_text( $row['article_content'], 300);
                                               echo '<tr>';
                                                echo "<td>".$row['article_name']."</td>";
                                               // echo "<td>".$content."</td>";
                                                echo "<td>".$row['category_name']."</td>";
                                                echo "<td><a target='_blank' href='articleview.php?aid=".$row['article_id']."'' class='btn btn-success'><span class='glyphicon glyphicon-folder-open'></span></a> <a target='_blank' href='articleupdate.php?aid=".$row['article_id']."' class='btn btn-success'><span class='glyphicon glyphicon-pencil'></span></a> <button class='btn btn-success'  id='delete' value='".$row['article_id']."'><span class='glyphicon glyphicon-trash'></span></button></td>";
                                                echo '</tr>'; 
                                            }
                                      }
                                      else
                                      {
                                        echo "<tr><p> Currently User Have Not Any Article</p></tr>";
                                      }
                                    ?>
                                 </tbody>
                          </table>
                        </div>
                    </div>
                </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>       
<script type="text/javascript">
$("button").on("click", function(e) {
  e.preventDefault();
  var dataString = $(this).val();
  

  $.ajax({
    url: "deletearticle.php",
    type: "post",
    async : true,
    cache: false,
    data: { 'ids' : dataString},
    success: function(data) {
     if(data == 'true')
     {
        location.reload();
     }
     else
     {
       alert("Couldn't delete data ");
     }
    },
    error: function() {
     // alert('Error while request..');
    }
  });
});

</script>
<?php include 'footer/footerd.php';?>