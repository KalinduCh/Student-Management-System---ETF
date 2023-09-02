<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Teacher Forms</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet"  href="http://localhost/management/bootstrap/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css?family=Courgette" rel="stylesheet">
<script src="http://localhost/management/bootstrap/bootstrap.min.js"></script>
<style>
body{
    font-family: Courgette;
}
.submit{
  background-color: purple;
  color:white;
  text-size:24px;
  padding: 6px;
  border-radius: 5px;
  border:1px solid white;
  font-size: 24px;
}
.submit:hover{
  background-color: white;
  color: purple;
  box-shadow: 0px 0px 20px white;
}
h1{
	font-size: 14px;
}

td,th{
  padding: 4px;
  text-align: center;
}
</style>
</head>
<?php
$servername = "localhost";
$username="root";
$password="";
$dbname="jack";
$id="";
$name="";
$email="";
$phone="";
$state="";
$qualification="";
$branch="";
$gender="";


mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

//connect to mysql database
try{
	$conn =mysqli_connect($servername,$username,$password,$dbname);
}catch(MySQLi_Sql_Exception $ex){
	echo("error in connecting");
}
//get data from the form
function getData()
{
	$data = array();

	$data[1]=$_POST['name'];
	$data[2]=$_POST['email'];
	$data[3]=$_POST['phone'];
  $data[4]=$_POST['state'];
  $data[5]=$_POST['qualification'];
  $data[6]=$_POST['branch'];
  $data[7]=$_POST['gender'];
	return $data;
}
//search
if(isset($_POST['search']))
{
	$info = getData();
	$search_query="SELECT * FROM slack WHERE id = '$info[0]'";
	$search_result=mysqli_query($conn, $search_query);
		if($search_result)
		{
			if(mysqli_num_rows($search_result))
			{
				while($rows = mysqli_fetch_array($search_result))
				{
					$id = $rows['id'];
					$name = $rows['name'];
					$email = $rows['email'];
					$phone = $rows['phone'];
          $state = $rows['state'];
          $qualification = $rows['qualification'];
          $branch = $rows['branch'];
          $gender = $rows['gender'];

				}
			}else{
				echo("no data are available");
			}
		} else{
			echo("result error");
		}

}
//insert
if(isset($_POST['insert'])){
	$info = getData();
	$insert_query="INSERT INTO `slack`(`name`,`email`, `phone`,`state`,`qualification`,`branch`,`gender`) VALUES ('$info[1]','$info[2]','$info[3]','$info[4]','$info[5]','$info[6]','$info[7]')";
	try{
		$insert_result=mysqli_query($conn, $insert_query);
		if($insert_result)
		{
			if(mysqli_affected_rows($conn)>0){
				echo("data inserted successfully");

			}else{
				echo("data are not inserted");
			}
		}
	}catch(Exception $ex){
		echo("error inserted".$ex->getMessage());
	}
}
//delete
if(isset($_POST['delete'])){
	$info = getData();
	$delete_query = "DELETE FROM `slack` WHERE id = '$info[0]'";
	try{
		$delete_result = mysqli_query($conn, $delete_query);
		if($delete_result){
			if(mysqli_affected_rows($conn)>0)
			{
				echo("data deleted");
			}else{
				echo("data not deleted");
			}
		}
	}catch(Exception $ex){
		echo("error in delete".$ex->getMessage());
	}
}
//edit
if(isset($_POST['update'])){
	$info = getData();
	$update_query="UPDATE `slack` SET `name`='$info[1]',email='$info[2]',phone='$info[3]',state='$info[4]',qualification='$info[5]',branch='$info[6]',rollno='$info[7]' WHERE id = '$info[0]'";
	try{
		$update_result=mysqli_query($conn, $update_query);
		if($update_result){
			if(mysqli_affected_rows($conn)>0){
				echo("data updated");
			}else{
				echo("data not updated");
			}
		}
	}catch(Exception $ex){
		echo("error in update".$ex->getMessage());
	}
}

?>
<body>
	<div class="container-fliud">
        <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#nav">
       <span class="icon-bar"></span>
       <span class="icon-bar"></span>
       <span class="icon-bar"></span>
     </button>
      <a class="navbar-brand" href="http://localhost/management/">Management System</a>
    </div>
     <div class="collapse navbar-collapse" id="nav">
    <ul class="nav navbar-nav">
      <li class="active"><a href="http://localhost/management">Home</a></li>
      <li><a href="http://localhost/management/studentform.php">Enter Student Data </a></li>
      <li><a href="http://localhost/management/teacher.php">Enter Teacher Data </a></li>
      <li><a href="http://localhost/management/updatestudentdata.php">Update Student Data </a></li>
      <li><a href="http://localhost/management/updateteacherdata.php">Update Teacher Data </a></li>
   </ul>
  </div>
</div>
</nav>
      </div>
	<div class="container-fluid">
	  <div class="row">
	    <div class="col-lg-4">

<form method ="post"   action="">
	<h1>ID Number (Use to Search Teachers data)</h1>
  <input type="number" name="id"  class="form-control" placeholder="ID No. /Automatic Number Genrates" value="<?php echo($id);?>" disabled>
		<h1>Teacher Name</h1>
	<input type="text" name="name" class="form-control" placeholder="Enter Teacher Name" value="<?php echo($name);?>"required>
<h1>Email</h1>
	<input type="email" name="email" class="form-control" placeholder="Enter Email" value="<?php echo($email);?>" required>
  <div class="form-group row">
  <div class="col-xs-6">
	<h1>Phone (10-digit)</h1>
	<input type="tel" pattern="^\d{10}$" class="form-control" name="phone"  placeholder="10 digit Phone number" value="<?php echo($phone);?>" required>
</div>
  <div class="col-xs-6">
		<h1>Select State</h1>
  <select name="state" class="form-control" value="<?php echo($state);?>">
    <option value="JAMMU and KASHMIR">JAMMU and KASHMIR</option>
    <option value="HIMACHAL PRADESH">HIMACHAL PRADESH</option>
    <option value="PUNJAB">PUNJAB</option>
    <option value="UTTARAKHAND">UTTARAKHAND</option>
    <option value="HARYANA">HARYANA</option>
    <option value="UTTAR PRADESH">UTTAR PRADESH</option>
      <option value="RAJASTHAN">RAJASTHAN</option>
      <option value="GUJRAT">GUJRAT</option>
      <option value="MADHYA PRADESH">MADHYA PRADESH</option>
      <option value="BIHAR">BIHAR</option>
      <option value="JHARKHAND">JHARKHAND</option>
      <option value="GANGTOK">GANGTOK</option>
        <option value="KOLKATA">KOLKATA</option>
        <option value="ARUNACHAL PRADESH">ARUNACHAL PRADESH</option>
        <option value="ASSAM">ASSAM</option>
        <option value="MEGHALAYA">MEGHALAYA</option>
        <option value="NAGALAND">NAGALAND</option>
        <option value="MANIPUR">MANIPUR</option>
          <option value="MIZORAM">MIZORAM</option>
          <option value="AIZAWL">AIZAWL</option>
          <option value="AGARTALA">AGARTALA</option>
          <option value="CHHATTISGARH">CHHATTISGARH</option>
          <option value="MAHARASHTRA">MAHARASHTRA</option>
          <option value="ODISHA">ODISHA</option>
          <option value="GOA">GOA</option>
          <option value="KARNATAKA">KARNATAKA</option>
          <option value="ANDHARA PRADESH">ANDHARA PRADESH</option>
          <option value="KERALA">KERALA</option>
          <option value="TAMIL NADU"></option>

  </select>
</div>
</div>
<div class="form-group row">
<div class="col-xs-6">
	<h1>Qualification</h1>
<select name="qualification" class="form-control" value="<?php echo($qualification);?>">
    <option value="Diploma">Diploma</option>
    <option value="B.Tech">B.Tech</option>
    <option value="M.Tech">M.Tech</option>
    <option value="P.H.D">P.H.D</option>
  </select>
</div>
<div class="col-xs-6">
	<h1>field</h1>
 <select name="branch" class="form-control" value="<?php echo($branch);?>">
    <option value="CSE">CSE</option>
    <option value="EEE">EEE</option>
    <option value="ME">ME</option>
    <option value="CE">CE</option>
  </select>
</div>

</div>

	<h1>Gender</h1>
  <select name="gender" class="form-control" value="<?php echo($gender);?>">
      <option value="Male">Male</option>
      <option value="Female">Female</option>
    </select>

</br>
		<input type="submit" class="btn btn-success btn-block btn-lg" name="insert" value="Add">
    <a href="http://localhost/management/updateteacherdata.php"<button class="btn btn-info btn-block btn-lg">Update | Delete | Find</button></a>

</form>
</div>

    <div class="col-lg-8">
			<h2>Teacher Data</h2>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jack";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id,name,email,phone,state,qualification,branch,gender FROM slack";
$result = $conn->query($sql);

echo "<table border='1'>
<tr>
<th>Search ID</th>
<th>Name</th>
<th>Email</th>
<th>Phone</th>
<th>State</th>
<th>Qualification</th>
<th>branch</th>
<th>gender</th>


</tr>";

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

      echo "<tr>";
echo "<td>" . $row['id'] . "</td>";
echo "<td>" . $row['name'] . "</td>";
echo "<td>" . $row['email'] . "</td>";
echo "<td>" . $row['phone'] . "</td>";
echo "<td>" . $row['state'] . "</td>";
echo "<td>" . $row['qualification'] . "</td>";
echo "<td>" . $row['branch'] . "</td>";
echo "<td>" . $row['gender'] . "</td>";


echo "</tr>";


    }
} else {
    echo "0 results";
}

$conn->close();
?>
</div>
</div>
</body>
</html>
