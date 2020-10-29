<?php
include('conn.php');
session_start();
if(isset($_REQUEST['sn']))
{
  $sno=$_REQUEST['sn'];
  $_SESSION['sno']=$sno;
}
?>
<html>
<head>

	<link rel="stylesheet" href="login.css">
	<script type="text/javascript" src="jquery-3.4.1.js"></script>
    <script type="text/javascript" src="jquery.validate.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.gender input {
      width: auto;
      }
.gender label {
      padding: 0 5px 0 0;
      }

</style>
</head>
<body >
<div class="nav">
<a href="index.html" style="float:left;margin-top:3.9%;"><img src="images/log.png" height=60px width=70px alt="not found"> </a>
<a href="index.html" style="float:left;margin-top:5%;font-size:150%; "><b>Tutorking</b></a>
<a href="index.html" style=" margin-top:5.5%;" class="a1">HOME</a>
</div>

<script>
$(document).ready(function(){
 $("#frm1").validate({
     rules:{
      eid:{
          "required":true
         },
      pwd:{
          "required":true,
           minlength:6,
         },
       }
      });
     });
$(document).ready(function(){
 $("#frm2").validate({
     rules:{
      nm:{
          "required":true
         },
      ct:{
          "required":true
         },
      br:{
          "required":true
         },
      gender:{
          "required":true
         },
      eid:{
          "required":true
         },
      pwd:{
          "required":true,
           minlength:6,
         },
      cpwd:{
          "required":true,
           minlength:6,
         },
      ad:{
          "required":true,
           minlength:6,
         },
       }
      });
     });

</script>
<br>
<b style="text-align:center;font-size:150%;">Student Account</b>
<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form action="#" id="frm2">
			<h3>Create Account</h3>
			<input type="text" placeholder="Name" name="nm"/>
			<div class="gender">
                Gender:
                <input type="radio" value="male" id="male" name="gender" required/>
                <label for="male" class="radio">Male</label>
                <input type="radio" value="female" id="female" name="gender" required/>
                <label for="female" class="radio">Female</label>
              </div>
			<input type="email" placeholder="Email" name="eid"/>
			<input type="text" placeholder="Enter your city name" name="ct"/>
			<input type="text" placeholder="Address" name="ad"/>
			<input type="password" placeholder="Password" name="pwd"/>
			<input type="password" placeholder="Confirm Password" name="cpwd"/>
			<button name="sub" id="sub">Sign Up</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
		<form action="#" id="frm1">
			<h1>Sign in</h1>
			<input type="email" placeholder="Email" name="eid" id="eid"/>
			<input type="password" placeholder="Password" name="pwd" id="pwd"/>
			<a href="#">Forgot your password?</a>
			<button name="login">Sign In</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
				<p>To keep connected with us please login with your personal info</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hello, Student..!</h1>
				<p>Enter your personal details and start journey with us</p>
				<button class="ghost" id="signUp">Sign Up</button>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
		const signUpButton = document.getElementById('signUp');
		const signInButton = document.getElementById('signIn');
		const container = document.getElementById('container');

		signUpButton.addEventListener('click', () => {
		container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
	container.classList.remove("right-panel-active");
});
	</script>
</body>
</html>

<?php
include('conn.php');
if(isset($_REQUEST['sub']))
{

$nm=$_REQUEST['nm'];
$gender=$_REQUEST['gender'];
$eid=$_REQUEST['eid'];
$ct=$_REQUEST['ct'];
$ad=$_REQUEST['ad'];
$pwd=$_REQUEST['pwd'];
$cpwd=$_REQUEST['cpwd'];

$q="select * from student where eid='$eid'";
$r= mysqli_query($con,$q);
if($row=mysqli_fetch_row($r))
  {
    echo "<script> window.location = 'Booklogin.php'</script>";
  }
else
  {

  $query= "insert into student(nm,gender,eid,ct,ad,pwd) values('$nm','$gender','$eid','$ct','$ad','$pwd')";

  $result= mysqli_query($con,$query);

  if($result)
	{
		$_SESSION['eml']=$eid;
    echo "<script> window.location = 'exp.php'</script>";
	}
	else
		{
		echo "<script> window.location = 'Booklogin.php'</script>";
	}
}
}
if(isset($_REQUEST['login']))
{
$eid=$_REQUEST['eid'];
$pwd=$_REQUEST['pwd'];
   $q= "select * from student where eid='$eid' and pwd='$pwd'";

  $result= mysqli_query($con,$q);

  if($row=mysqli_fetch_row($result))
  {
  $_SESSION['eml']=$eid;
  echo "<script> window.location = 'exp.php'</script>";
  }
 else
 { echo "<h1>Login Failure</h1>";
}
}


?>
