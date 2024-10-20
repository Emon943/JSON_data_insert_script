<?php 
include 'config/config.php';
$dbobj = new DBUtility();
?>

<?php
  $jsondata = file_get_contents("data.json");
  $data = json_decode($jsondata ,true);
 // echo "<pre>";
  //print_r($data);
  ?>
 <table>
 <tr>
 <td>Name</td>
 <td>Email</td>
 <td>Password</td>
  
  </tr>
  <?php foreach($data["datas"] as $data){
   $sql="insert into tbl_json (name,email,password)value('".$data[name]."','".$data[email]."','".$data[password]."')";
    $result=$dbobj->insert($sql);

  ?>
  
	  <tr>
	 <td><?php echo $data["name"];?></td>
	 <td><?php echo $data["email"];?></td>
	 <td><?php echo $data["password"];?></td>
	  </tr>
	  
	
 <?php 
 }
 ?>
 </table>  
 <?php
  $sql="select * from tbl_json";
  $result= $dbobj->select($sql);
  $json=json_encode($result);
  echo $json;
  
 ?>