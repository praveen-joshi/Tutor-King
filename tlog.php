<?php
include('conn.php');
?>
<?php
session_start();
if(!(isset($_SESSION['eml'])))
{
echo "<script>window.location='tutor_login.php'</script>";
}
else
{
if(isset($_SESSION['eml']))
{
$name= $_SESSION['eml'];
}
} 
?>


<html>
<head>
	<link rel="stylesheet" href="login.css">
	<script type="text/javascript" src="jquery-3.4.1.js"></script>
    <script type="text/javascript" src="jquery.validate.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body >
<div class="nav" style="margin-top:-43%;">
<a href="index.html" style="float:left;"><img src="images/log.png" height=60px width=70px alt="not found"> </a>
<a href="index.html" style="float:left;font-size:150%;margin-top:2.5%;"><b>Tutorking</b></a>
<a href="index.html" class="a1" style="margin-top:2.5%;"><?php echo"$name" ?></a>
</div>
<div>
<?php

  if(isset($_SESSION['eml']))
 {
  $name= $_SESSION['eml'];
 }

  $q="select * from book where tutor_eml='$name'"; 
  $r= mysqli_query($con,$q);
?>   
<form>
<center>
<table>
<thead>
<tr><th>Student-name</th><th>SUBJECT</th><th>Status</th>
</thead>
<?php
while($row=mysqli_fetch_row($r))
{
	if($row[6]=='NO')
	{
?>
<tbody>
<tr><td><?php echo $row[5] ?></td><td><?php echo$row[4] ?></td><td><?php echo $row[6] ?></td><td><a href="tlog.php?so=<?php echo $row[0]?>"><b style="color:#ff00ff;">Accept</b></a></td><td><a href="tlog.php?del=<?php echo $row[0]?>"><b style="color:#ff00ff;">Reject</b></a></td>
</tbody>
<?php
}
else{
?>
<tbody>
<tr><td><?php echo $row[5] ?></td><td><?php echo$row[4] ?></td><td><?php echo $row[6] ?></td><td><a href="tlog.php?so=<?php echo $row[0]?>"><b style="color:#ff00ff;">Accept</b></a></td>
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
</body>
</html>
<?php
if(isset($_REQUEST['so']))
{	
$sno=$_REQUEST['so'];
$q= "update book set status='Accepted' where sno=$sno;";  
$result= mysqli_query($con,$q);

}

if(isset($_REQUEST['del']))
{	
$s=$_REQUEST['del'];
$q= "delete from book where sno=$s;";  
$result= mysqli_query($con,$q);

}
?>