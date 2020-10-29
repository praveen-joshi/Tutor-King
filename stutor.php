<?php
include('conn.php');
session_start();
?>
<?php
if(!(isset($_SESSION['sub'])))
{
echo "No data";
}
else{
if(isset($_SESSION['sub']))
{
$sub=$_SESSION['sub'];
$ct=$_SESSION['ct'];
$q="select sno,nm,subject,ct from tutor inner join course where course.tutor=tutor.eid and course.subject='$sub' and tutor.ct='$ct'";
$result=mysqli_query($con,$q);
}
}
?>
<html>
<head>
	<link rel="stylesheet" href="samp.css">

<style>
.nav1
{
   overflow:hidden;
   background-color:black;
   width :100.5%;
   margin-top:-4%;

}
.nav1 a
{
 text-decoration:none;
 float:right;
 display:block;
 color:#f2f2f2;
 text-align:center;
 padding: 3px 10px;
}
body{
	background-image:url("back.jpg") ;
}
.nav1 a.a1:hover{
 background-color:yellow;
 color:black;
}

</style>

</head>
</body>
<div class="nav1">
<a href="index.html" style="float:left;margin-top:3.9%;"><img src="images/log.png" height=60px width=70px alt="not found"> </a>
<a href="index.html" style="float:left;margin-top:5%;font-size:150%; "><b>Tutorking</b></a>
<a href="index.html" style=" margin-top:5.5%;" class="a1">HOME</a>
</div>

<h1> <span class="yellow"><b>Results of tutor Search</b></pan></h1>
<h2><b>To book tutor</b><a href="login_page.php" target="_blank"> <b>LOGIN now</b></a></h2>
<form>
<center>
<table class="container">
<thead>
<tr><th>NAME</th><th>SUBJECT</th><th>CITY</th><th>Information</th>
</thead>

<?php
while($row=mysqli_fetch_row($result))
{
?>
<tbody>
<tr><td><?php echo $row[1] ?></td><td><?php echo$row[2] ?></td><td><?php echo $row[3] ?></td><td><a href="info.php?sno=<?php echo $row[0]?>"><b style="color:#ff00ff;">VIEW</b></a></td>
</tbody>
<?php
}
?>
</tr>
</table>
</center>
</form>
</body>
</html>

<!--?sno=<?php #echo $row[0]?>-->
