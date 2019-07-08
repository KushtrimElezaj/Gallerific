<?php

require "dbconnect.php";
 

if ($_FILES['upFile']['size']==0) { die("No file selected"); }
if (exif_imagetype($_FILES['upFile']['tmp_name'])===false) { die("Not an image"); }
$title = $_POST['name'];
$desc = $_POST['description'];
$filenam =$_FILES['upFile']['tmp_name'];
$file =  addslashes(file_get_contents($filenam));

$sql = "INSERT INTO gallery(title,imageData,description) VALUES('$title','$file','$desc')";
$query = $pdo->prepare($sql);
        if($query->execute()) {
          header("Location: webi.php");
      } else {
         echo "A problem occurred ";
      }
   
?>
