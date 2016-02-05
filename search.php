<?php  
include 'header/header.php';
include 'class/searchelastic.php';

$search = new searchelastic();
$va = $_GET['search'];
$query = htmlspecialchars($va);
$result = $search->Search($query);
//print_r($result);
?>

<div class="container">

    <hgroup class="mb20">
		<h1>Search Results</h1>
		<h2 class="lead"><strong class="text-danger"><?php echo $result['searchfound']; ?></strong> results were found for the search for <strong class="text-danger"><?php echo $query; ?></strong></h2>								
	</hgroup>

    <section class="col-xs-12 col-sm-6 col-md-12">
    	<?php for($i=0;$i<$result['searchfound'];$i++){ ?>
		<article class="search-result row">
			<div class="col-xs-12 col-sm-12 col-md-3">
				<a href="#" title="Lorem ipsum" class="thumbnail"><img src="articleimage/<?php echo $result['result'][$i]['article_img'];?>" alt="Lorem ipsum" /></a>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-2">
				<ul class="meta-search">
					<li><i class="glyphicon glyphicon-calendar"></i> <span><?php echo $result['result'][$i]['article_img'];?></span></li>
					<li><i class="glyphicon glyphicon-time"></i> <span><?php echo $result['result'][$i]['date'];?></span></li>
					<li><i class="glyphicon glyphicon-tags"></i> <span><?php echo $result['result'][$i]['category_name'];?></span></li>
				</ul>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-7 excerpet">
				<h3><a href="<?php echo "articleview.php?aid=".$result['result'][$i]['article_url']; ?>" title=""><?php echo $result['result'][$i]['article_name'];?></a></h3>
				<p><?php echo $search->limit_text($result['result'][$i]['article_content']);?></p>						
                
			</div>
			<span class="clearfix borda"></span>
		</article>
		<?php }?>

</section>
</div>		
<?php include 'footer/footer.php'; ?>