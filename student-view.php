<?php
include('conn.php');
$id=$_GET['id'];
$query="select * from student where eid='$id'";
$res=mysqli_query($conn,$query) or die($query);
$row=mysqli_fetch_row($res);
?>

<html>
<head>
<title>About-TutorKing</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/style.css"><!-- here is css -->
<style>
body
{
 background-repeat: no-repeat;
 background-size: cover;
 height: 100vh;
 font-size: 18px;
 margin: 0px;
 padding: 0px;
 box-sizing: border-box;
 font-family: Lato;
 background-color: #f1f2f6;
}
</style>
<body>
</head>
<body>

  <nav>
    <img src="images/log.png" height=60px width=70px alt="not found">
    <ul class='r'>

      <li><a href="searchstudent.php">back</a></li>
      <li>
        <a href="index.html">Logout</a>
      </li>
      <li>
        <a href="aboutus.html">About us</a>
      </li>
    </ul>


  </nav>

<div class="sview-head">
<img src="<?php echo "$row[7]"; ?>" class="sviewimg">
<h1><?php echo "$row[1]"; ?></h1>
<hr>
</div>


<div class=" row stu-content">

  <div class="col">
    <p class="p-label"> Email</p>
    <p class="p-val"> <?php echo "$row[3]"; ?></p>

    <p class="p-label"> Gender</p>
    <p class="p-val"><?php echo "$row[2]"; ?> </p>
  </div>

  <div class="col">
    <p class="p-label"> City</p>
    <p class="p-val"> <?php echo "$row[4]"; ?></p>


    <p class="p-label">Address </p>
    <p class="p-val"> <?php echo "$row[5]"; ?></p>
  </div>


</div>

<div class="btn-cont row">
  <div class="col">
    <a  href="edits.php?email=<?php echo $row[3]; ?>"class="p-btn">Edit Student</a>
  </div>
  <div class="col">
      <a  href="edits.php?email=<?php echo $row[3]; ?>"class="p-btn">Delete Student</a>
  </div>
</div>




</body>

</html>
