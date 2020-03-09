<?php 
  require_once 'functions.php';

  if (isset($_POST['user']))
  {
    $user   = $_POST['user'];
	$id = $_POST['id'];
	$choice = $_POST['choice'];
    $result = queryMysql("SELECT * FROM preferences WHERE user='$user' AND presentation_id='$id'");

    if ($result->num_rows){
	  if($choice != 'none')
        queryMysql("UPDATE preferences SET preference='$choice' WHERE user='$user' AND presentation_id='$id'");
	  else
		queryMysql("DELETE FROM preferences WHERE user='$user' AND presentation_id='$id'");  
    }else{ 
	  if($choice != 'none')
        queryMysql("INSERT INTO preferences VALUES('$user','$id','$choice')");
	}
  }
?>
