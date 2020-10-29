<?php
include('conn.php');
session_start();
if(!isset($_SESSION['tsno']))
{
  echo "<script> window.location = 'tutor_login.php'</script>";
  echo "NO Data";
}
else
{
  $sno=$_SESSION['tsno'];
  $query="select * from tutor where sno='$sno'";
  $res=mysqli_query($con,$query);
  $row=mysqli_fetch_array($res);
  $eml=$row[5];
  $email=$row[5];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
    crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ"
    crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <title>Tutor King</title>
  <style>
  .button {
  border-radius: 4px;
  background-color: #f4511e;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 28px;
  padding: 20px;
  width: 200px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 30px;
}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}


.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
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


  .myForm
  {
    height: 100vh;
    width: 100%;
    display: none;
    position: absolute;
    z-index: 9;
    background-color: #aaa;
    justify-content: center;
    align-items: center;
  }


  /* Add styles to the form container */
.form-container {
  height: 100%;
  width: 100%;
  padding: 5% 35%;
  background-color: snow;
  margin-left: auto;
  margin-right: auto;

}

/* Full-width input fields */
.form-container input[type=text], .form-container input[type=file] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
}
.form-container .btn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  margin-bottom:10px;
  opacity: 0.8;
}


.open-button
{
  margin: 2% 40% 5%;
  outline:none;
  padding: 0 3%;
  color:#ea7;
  background-color: rgba(11,11,11,0.8);
  border-radius: 2px;

}


  </style>
</head>
<body>


  <nav class="navbar con" navbar-toggleble >
  <a class="navbar-brand" href="index.html">
    <img src="images/log.png" height=60px width=70px alt="not found">
    TutorKing.com
  </a>
<ul class="nav justify-content-end">
  <li class="nav-item dis">
    <a href="exp2.php" class="nav-link lin">Go back</a>
    <a href="tr/addinfo.php" class="nav-link lin">Upload data</a>

  </li>
</ul>
</nav>

<div class="myForm" id="myForm">
  <form class="form-container" width=100% method="post" enctype="multipart/form-data">
    <h1 align="center" style="margin-bottom:5%;">Add New Subject </h1>

    <label for="sname"><b>Subject Name</b></label>
    <input type="text" placeholder="Enter Subject Name" name="sname" required>

    <label for="subvideo"><b>Choose a demo video file</b></label>
    <input type="file" name="subvideo"  name="subvideo">
    <button type="submit" name="adds" class="btn">Add subject</button>
    <button type="button" class="btn cancel" onclick="closeForm()">Cancel</button>
  </form>
</div>

  <div class="jumbotron bg-light" id="details">
    <div class="container">
		<div class="card shadow-lg mb-2">
            <div class="card-body text-center">
              <img src="<?php echo $row[9] ?>" class="img-fluid" style="border-radius: 100px;height:200px;width:200px">
              <h4 class="card-title"><?php echo $row[1] ?></h4>

			  <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" class="card-text text-left">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Education</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
  </li>
</ul>
<div class="tab-content text-left" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab"><br><h6><?php echo $row[7] ?></h6>
  <p><em><?php echo $row[8] ?></em><br>
  <small><em class="text-muted">2017-Present</em></small></p>
  </div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab"><br>
	<h5>Home Town</h5><hr class="style11">
	<p><em><?php echo $row[3] ?></em></p><br>



  <h5>Subject Teaches</h5><hr class="style11">

  <table>
  <?php
  $query="select * from course where tutor='$row[5]'";
  $cres=mysqli_query($con,$query);
  while($subrow=mysqli_fetch_row($cres))
  {
  ?>

	<p><tr><td width="50%"><em><?php echo $subrow[1] ?></em> </td> <td><a href="watchvideo.php?videosrc=<?php echo $subrow[2] ?>">View demo lecture</a></td></tr></p>
  <?php
  }
  ?>
  </table>
  <button class="open-button" onclick="openForm()">Add more Subjects</button>
    <h5>Phone-number</h5><hr class="style11">
	<p><em><?php echo $row[4] ?></em></p>

  </div>
  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab"><br>
	<h5>E-mail</h5>
	<hr class="style11">
	<p><em><?php echo $row[5]?></em></p>
  </div>
 </div><br>

  <a href="tutor-edit.php?email=<?php echo $email?>"><button class="button" ><span>Edit Profile</span></button></a>
  </div>
            </div>
          </div>
        </div>
  </div>




  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
    crossorigin="anonymous"></script>






<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
  document.getElementById("myForm").style.position = "absolute";
  document.getElementById("details").style.height = "100vh";
  document.getElementById("details").style.overflow = "hidden";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none ";
  document.getElementById("myForm").style.position = "block";
  document.getElementById("details").style.height = "none";
  document.getElementById("details").style.overflow = "none";
  window.location='tutorinfo.php';
}
</script>

</body>
</html>

<?php
if(isset($_REQUEST['adds']))
{

  $sname=$_REQUEST['sname'];
  $tmp_file_location=$_FILES["subvideo"]["tmp_name"];
  $file_name="tvideo/".$_FILES["subvideo"]["name"];
  move_uploaded_file($tmp_file_location,$file_name) or die ("uable to upload your video file");
  $query="insert into course values('$eml','$sname','$file_name')";
  mysqli_query($con,$query) or die("Umable to add ew Subject");
  echo"<style>alert('New sub added Successfully'); </style>";
  echo "<script> window.location = 'tutorinfo.php'</script>";
}
else
{
  //echo "<script> window.location = 'admin.html'</script>";
}


?>
