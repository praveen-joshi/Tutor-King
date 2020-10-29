<?php
include('conn.php');
session_start();
?>
<?php
if(!(isset($_SESSION['sno'])))
{
echo "<h1>N data</h1>";
}

if(!(isset($_SESSION['eml'])))
{
echo "<script>window.location='login_page.php'</script>";
}
else
{
if(isset($_SESSION['eml']))
{
$name= $_SESSION['eml'];
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
    $tutor=$row[6]; 
    $nm=$row[1];
    $sub=$row[5];
    $qr="insert into book(student_eml,tutor_eml,name,subject,sname,status)values('$name','$tutor','$nm','$sub','$ro[1]','NO');";
    $result= mysqli_query($con,$qr);
  } 
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
<?php
  if(isset($_SESSION['eml']))
 {
  $name= $_SESSION['eml'];
 }

  $q="select * from book where student_eml='$name'"; 
  $r= mysqli_query($con,$q);
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
  echo "name=".$row[3]."    "."subject=".$row[4]."    "."Phone No:".$p."<br>";
 }  
?>

</body>
</html>
