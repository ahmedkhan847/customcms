<!-- jQuery library -->
<script src="/customcms/style/js/jquery.min.js"></script>

<script type="text/javascript">
Notification.requestPermission();
function spawnNotification(theBody,theIcon,theTitle) {
 var options = {
body: theBody
 }
var n = new Notification(theTitle,options);
 }
</script>
<!-- Latest compiled JavaScript -->
<script src="/customcms/style/js/bootstrap.min.js"></script>
</div>
  </div>
</div>


        <footer class="container-fluid"> 
    <p class="gont">All Rights Reserved &copy; <?php echo date("Y")?></p>
    </footer>
        
</body>
</html>