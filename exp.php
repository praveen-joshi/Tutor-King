<?php
session_start();
include('conn.php');
//$_SESSION['eml']=$_GET['eid'];
if(!isset($_SESSION['steml']))
{
  header("Location: login_page.php?sended due to on session");
}
else
{
  if(isset($_SESSION['steml']))
  {
    //becoz session is not working as expected
    //$_SESSION['eml']=$_GET['eid'];
    $name= $_SESSION['steml'];
    $que="select * from student where eid='$name';";
    $rs= mysqli_query($con,$que);
    $ro=mysqli_fetch_row($rs);
  }
  if(isset($_SESSION['sno']))
   {
    $sno= $_SESSION['sno'];
    $q="select * from tutor where sno='$sno'";
    $r= mysqli_query($con,$q);
    if($row=mysqli_fetch_row($r))
    {
      $tutor=$row[5];
      $nm=$row[1];
      $sub=$row[3];
      $qr="insert into book(student_eml,tutor_eml,name,subject,sname,status)values('$name','$tutor','$nm','$sub','$ro[1]','NO');";
      $result= mysqli_query($con,$qr);
    }
    unset($_SESSION['sno']);
  }
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
  right: 0;
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

table, th, td {
  border: 1px solid black;
}

th, td {
  padding: 10px;
}
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
    <a href="myinfo.php">My info</a>
    <a href="logout.php">Log out</a>
   </div>
   </div>
  </li>
</ul>
</nav>
<center>
<h1> Requested List of tutors</h1>
<table>
<thead>
<tr><th>Tutor-name</th><th>SUBJECT</th><th>Contact</th>
</thead>
 <?php
  if(isset($_SESSION['steml']))
 {
  $name= $_SESSION['steml'];
 }

  $q="select * from book where student_eml='$name'";
  $r= mysqli_query($con,$q);
?>
<?php
 while($row=mysqli_fetch_row($r))
 {
  if ($row[6]=="Accepted")
  {
    $qr="select * from tutor where eid='$row[2]'";
    $rr= mysqli_query($con,$qr);
    $rw=mysqli_fetch_row($rr);
    $p=$rw[4];
  }
  else{
    $p="Not available";
  }
  #echo "name=".$row[3]."    "."subject=".$row[4]."    "."Phone No:".$p."<br>";
?>
<tbody>
<tr><td><?php echo $row[3] ?></td><td><?php echo$row[4] ?></td><td><?php echo $p ?></td></tr>
</tbody>
<?php
 }
?>
</table>
<center>
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
