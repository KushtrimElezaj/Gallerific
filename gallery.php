<?php
include('header.php');
$stmt = $pdo->query("SELECT * FROM gallery");
   $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $count = count($results);
?>
<form action="upload.php" method="post" enctype="multipart/form-data">
    <input type="file" name="upFile" id="upFile" accept=".png,.gif,.jpg,.webp" required>
    Name<input type="text" name="name" required>
    Description<input type="text" name="description" required>
    <input type="submit" name="submit" value="Upload Image">
  </form>
  <div class='flex'>
  <?php
  if($count!=0){
    foreach ($results as $value) {
      echo '<div>';
      echo '<h4>Title:'.$value['title'].'</h4>';
      echo '<p>Description:'.$value['description'].'</p>';
      echo '<a href="delete_gallery.php?id='.$value['id'].'"class="btn btn-danger">Delete</a>';
      echo '</div>';
    }
    
  ?>
</div>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
  
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
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
    echo'<div class="item"><div>
  <img src="data:image/png;base64,'.base64_encode($results[$i]["imageData"]).'" />
  <h1>'.$results[$i]['title'].'</h1>
  <p>'.$results[$i]['description'].'</p>
  </div>
</div> ';
  } ?>
      


    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
</div>
 
</div>
<?php
  }
include('footer.php');
?>