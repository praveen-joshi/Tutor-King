<?php
include('conn.php');
session_start();
if(!(isset($_SESSION['tsno'])))
{
	echo "<script>window.location='tutor_login.php'</script>";
}
else
{
	//if(isset($_SESSION['eml']))
	//{
		$tsno=$_SESSION['tsno'];
		$tq="select eid from tutor where sno='$tsno'";
		$rt= mysqli_query($con,$tq) or die("query execution failed...");
	  $temail=mysqli_fetch_row($rt);
		$name=$temail[0];
//	}
}
?>


<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/bootstrap.css">
<style>

body {
	background-image:url("svvv.jpg") ;
  }
  .con{
    background-color: black;
  }

  .lin
  {
      border-bottom:solid #27006597;
  }

  .dis
  {
    padding-right:20px;

  }
  table, th, td {
  border: 1px solid black;
}

th, td {
  padding: 10px;
}




  .dropbtn {
  background-color: #000000;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

.dropbtn:hover, .dropbtn:focus {
  background-color: #696969;
}

.dropdown {
  float: right;
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  overflow: auto;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  right: 0;echo "dfdfdf";
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown a:hover {background-color: #ddd;}

.show {display: block;}

</style>
</head>
<body >

<nav class="navbar con" navbar-toggleble >
  <a class="navbar-brand" href="index.html">
    <img src="images/log.png" height=60px width=70px alt="not found">
    TutorKing.com
  </a>
<ul class="nav justify-content-end">
  <li class="nav-item dis">
    <div class="dropdown">
    <button onclick="myFunction()" class="dropbtn"><?php echo"$name" ?></button>
   <div id="myDropdown" class="dropdown-content">
    <a href="tutorinfo.php">My info</a>
    <a href="logout.php" name="out">Log out</a>
   </div>
   </div>
    <!--<a class="nav-link lin" href=""><?php #echo"$name" ?></a>-->
  </li>
</ul>
</nav>
<div>
<?php
$q="select * from book where tutor_eml='$name'";
$r= mysqli_query($con,$q);
?>
<form>
<center>
<h1> Student Request</h1>
<table>
<thead>
<tr><th>Student-name</th><th>City</th><th>Status</th>
</thead>
<?php
while($row=mysqli_fetch_row($r))
{
	if($row[6]=='NO')
	{
?>
<tbody>
<tr><td><?php echo $row[5] ?></td><td><?php echo$row[4] ?></td><td><?php echo $row[6] ?></td><td><a href="exp2.php?so=<?php echo $row[0]?>"><b style="color:#ff00ff;">Accept</b></a>
</td><td><a href="exp2.php?del=<?php echo $row[0]?>"><b style="color:#ff00ff;">Reject</b></a></td>
</tbody>
<?php
}
else{
?>
<tbody>
<tr><td><?php echo $row[5] ?></td><td><?php echo$row[4] ?></td><td><?php echo $row[6] ?></td><!--<td><a href="exp2.php?so=<?php #echo $row[0]?>"><b style="color:#ff00ff;">Accept</b></a></td>-->
</tbody>

<?php
 }
}
?>
</tr>
</table>

</center>
</form>

</div>

<script>
/* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>
</body>
</html>
<?php
if(isset($_REQUEST['so']))
{
	$sno=$_REQUEST['so'];
	$q= "update book set status='Accepted' where sno=$sno;";
	$result= mysqli_query($con,$q);
}

if(isset($_GET['del']))
{
	$s=$_GET['del'];
	$q= "delete from book where sno=$s;";
	$result= mysqli_query($con,$q);
}
?>
