<?php 
  require_once 'header.php';

  if (!$loggedin) die();

 echo <<<_END
   <table>
   <tr>
    <th>Presentation Number</th>
    <th>Topic</th>
    <th>Speaker</th>
	<th>Date</th>
	<th>Time</th>
	<th>Preference</th>
   </tr>
_END;
  
  $result = queryMysql("SELECT presentation_id, topic, speaker, DATE(date), TIME(date) FROM presentations");
  if (!$result) die ("Database access failed. ");
  
  $rows = $result->num_rows;
for ($j = 0 ; $j < $rows ; ++$j)
{
$result->data_seek($j);
$row = $result->fetch_array(MYSQLI_NUM);

$resultPref = queryMysql("SELECT preference FROM preferences WHERE user='$user' AND presentation_id='$row[0]'");
  if (!$resultPref) die ("Database access failed. ");
 
if ($resultPref->num_rows) 
{
	$resultPref->data_seek(0);
	$rowPref = $resultPref->fetch_array(MYSQLI_NUM);
	$preference = $rowPref[0];

echo <<<_END
 <tr>
    <td>$row[0]</td>
	<td>$row[1]</td>
	<td>$row[2]</td>
	<td>$row[3]</td>
	<td>$row[4]</td>
	<td><select class="status" id="$row[0]">
_END;
	 echo "<option value='none' ";
	 if($preference == 'none')
		echo("selected");
	 echo ">No value</option>";
	 
	 echo "<option value='interesting' ";
	 if($preference == 'interesting')
		echo("selected");
	 echo ">Interesting</option>";
	 
	 echo "<option value='maybe' ";
	 if($preference == 'maybe')
		echo("selected");
	 echo ">Maybe going</option>";
	 
	 echo "<option value='going' ";
	 if($preference == 'going')
		echo("selected");
	 echo ">Going</option>";
	 
	 echo "</select>";
	 echo "</td>";
     echo "</tr>";
	 
  }
}
echo "</table>";
?>  
  
  </body>
</html>
