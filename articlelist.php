<?php 
session_start();
if(empty($_SESSION["username"]))
{
	
	header('Location: login.php');
                    return;
}


	include 'header/header3.php';
  include 'class/articles.php';
	$user = $_SESSION['username'];
    $articles = new Articles();
    $result = $articles->articlelist($user);


?>
<!-- Page Content -->

                <div class="row">
                    <div class="col-lg-10">
                        <legend><h1>Articles</h1></legend>
                          
                        <div class="table-responsive" id="tablelist">
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
                                                echo "<td><a target='_blank' href='articleview.php?aid=".$row['article_id']."'' class='btn btn-success'><span class='glyphicon glyphicon-folder-open'></span></a> <a target='_blank' href='articleupdate.php?aid=".$row['article_id']."' class='btn btn-success'><span class='glyphicon glyphicon-pencil'></span></a> <button class='btn btn-success'  id='".$row['article_id']."' onclick='req(id)'><span id='delete'class='glyphicon glyphicon-trash'></span></button></td>";
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

<script type="text/javascript">

function req(ids)
{
  var dataString = ids;

  $.ajax({
    url: "deletearticle.php",
    type: "post",
    async : true,
    cache: false,
    data: { 'ids' : dataString},
    success: function(data) {
     if(data == 'true')
     {

          // Let's check if the browser supports notifications
          if (!("Notification" in window)) {
              alert("Deleted Success Fully");
              $('#tablelist').load(document.URL +  ' #tablelist');
          }

          // Let's check whether notification permissions have already been granted
          else if (Notification.permission === "granted") {
            var options = {
                    body: "Deleted Success Fully"
                     }
            // If it's okay let's create a notification
            var notification = new Notification("Result",options);
              $('#tablelist').load(document.URL +  ' #tablelist');
          }

          // Otherwise, we need to ask the user for permission
          else if (Notification.permission !== 'denied') {
            Notification.requestPermission(function (permission) {
              // If the user accepts, let's create a notification
              if (permission === "granted") {
                var options = {
                    body: "Deleted Success Fully"
                     }
            // If it's okay let's create a notification
            var notification = new Notification("Result",options);
                  $('#tablelist').load(document.URL +  ' #tablelist');
              }
            });
          }

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
}

</script>      

<?php include 'footer/footer3.php';?>