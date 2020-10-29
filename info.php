<?php
include('conn.php');
session_start();
?>
<?php
if(isset($_REQUEST['sno']))
{
$sno=$_REQUEST['sno'];
$query="select * from tutor where sno='$sno' ";
$res=mysqli_query($con,$query);
$row=mysqli_fetch_array($res);
}
?><!DOCTYPE html>
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
    <a href="stutor.php" class="nav-link lin">Go back</a>
  </li>
</ul>
</nav>

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
  </p>
  </div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab"><br>
	<h5>Home Town</h5><hr class="style11">
	<p><em><?php echo $row[3] ?></em></p><br>
	<h5>Subject Teaches</h5><hr class="style11">
  <?php
  $query="select * from course where tutor='$row[5]'";
  $cres=mysqli_query($con,$query);
  while($subrow=mysqli_fetch_row($cres))
  {
  ?>
	<p><em><?php echo $subrow[1] ?></em> <a href="watchvideo.php?videosrc=<?php echo $subrow[2] ?>">View demo lecture</a></p>
  <?php
  }
  ?>
  </div>
  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab"><br>
	<h5>E-mail</h5>
	<hr class="style11">
	<p><em><?php echo $row[5] ?></em></p>
  </div>
 </div><br>

  <a href="Booklogin.php?sn=<?php echo $row[0]?>"><button class="button" ><span>BOOK Now </span></button></a>
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



</body>
</html>
