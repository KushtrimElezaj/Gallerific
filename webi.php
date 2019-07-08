
	<?php 
	include("header.php");
	if(!isset($_SESSION['user_id'])){
		header("Location: login.php");
	}
	$stmt = $pdo->query("SELECT * FROM gallery");
   $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $count = count($results);
	?>

	<div class="flex bordt">
			<img alt="SLIDE" src="img715x400.png">
		
			<?php
			if($count!=0){
				?>
		  <div id="myCarousel" class="carousel slide" data-ride="carousel">
				
					<ol class="carousel-indicators">
					<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
					<li data-target="#myCarousel" data-slide-to="1"></li>
					<li data-target="#myCarousel" data-slide-to="2"></li>
					</ol>

					<div class="carousel-inner" role="listbox">
					<div class="item active">
					<div>
					<?php
   echo '<img src="data:image/png;base64,'.base64_encode($results[0]['imageData']).'"/>';
   echo '<h1>'.$results[0]['title'].'</h1>';
   echo '<p>'.$results[0]['description'].'</p>';
  
  ?>
					</div>     
			</div>
	  <?php for($i=1;$i<$count;$i++){
	echo'<div class="item">
	<div>
    <img src="data:image/png;base64,'.base64_encode($results[$i]["imageData"]).'" />
     <h1>'.$results[$i]['title'].'</h1>
     <p>'.$results[$i]['description'].'</p>
  </div>
</div> ';
  } ?>
      
    </div>


    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
</div>
<?php
			}
				?>
		</div>
	<div class = 'webd'>
		<div>
		<h1>CURSUS PENATI SACCUM UT CARABITUR NULLA</h1>
		<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
		</p>
		</div>
		 <div class="grid9">
			  <div><img src='img300x210.png' alt=''></div>	
			  <div><img src='img300x210.png' alt=''></div>	
			  <div><img src='img300x210.png' alt=''></div>	
			  <div><img src='img300x210.png' alt=''></div>	
			  <div><img src='img300x210.png' alt=''></div>	
			  <div><img src='img300x210.png' alt=''></div>	
			  <div><img src='img300x210.png' alt=''></div>	
			  <div><img src='img300x210.png' alt=''></div>	
			  <div><img src='img300x210.png' alt=''></div>			
	 </div>
	 <div class='center'>
	 <a href ='gallery.php' class='btn btn-primary'>VIEW THE FULL GALLERY ></a>
		</div>
</div>
</div>
	<?php
	include("footer.php");
	?>