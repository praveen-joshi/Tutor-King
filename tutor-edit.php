<?php
include("conn.php");
$id=$_GET["email"];
$query="select * from tutor where eid='$id'";
$res=mysqli_query($conn,$query);
$row=mysqli_fetch_row($res);
?>

<html>
<head>
<title>Editing tutor via admin</title>
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/mystyle2.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<style>

.cona{
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


.addform
{
  border-radius: 5px;
  padding: 20px;
  background-color: white;
  opacity: 0.9;
}

.fi
{
  width: 80%;
  padding: 12px 20px;
  margin: 10px 10px 10px 100px;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  outline: none;
  background: rgba(136, 126, 126, 0.04);
  border-radius: 50px;
}
.fb
{
  width: 100%;
  background-color: dodgerblue;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  color: #fff;
  background: linear-gradient(to right, #9C27B0, #E040FB);

}
label
{
  font-family: sans-serif;
  font-size: 30px;
}

.head
{
  color: white;
  align-items: center;
  background-color: white ;
  text-align: center;
  opacity: 0.5px;
  color: blueviolet ;

}

.cont
{
  background-color: white;
  margin-left: auto;
  margin-right: auto;
  width: 80%;
  border-radius: 50px;
  overflow: hidden;
  background-color: #FFFFFF;
  box-shadow: 0px 11px 35px 2px rgba(0, 0, 0, 0.14);
}


</style>


</head>
<body>

  <nav class="navbar cona" navbar-toggleble >
    <a class="navbar-brand" href="#">
      <img src="images/log.png" height=60px width=70px alt="not found">
      TutorKing.com
    </a>
  <ul class="nav justify-content-end">
    <li class="nav-item dis">
      <a class="nav-link lin" href="index.html">Logout</a>
    </li>
    <li class="nav-item dis">
      <a class="nav-link lin" href="aboutus.html">About us</a>
    </li>
    <li class="nav-item dis">
      <a class="nav-link lin" href="exp2.php">Home</a>
    </li>
  </ul>
  </nav>

<br>

<div class="cont">
<img src="<?php echo$row[9];?>" class='pview'>
<h1 class="head"> <?php echo"$row[1]"; ?></h1>
<hr>
<form class="addform" action="#!" >

  <table width=90%>
        <tr>
            <td><label for="sno">Sno</label></td>
            <td><input type="text" id='n' name="sno" class="fi" placeholder="sno" value="<?php echo $row[0];?>"></td>
        </tr>
        <tr>
            <td><label for="n">Name</label></td>
            <td><input type="text" id='n' name="name" class="fi" placeholder="Name" value="<?php echo $row[1];?>"></td>
        </tr>
        <tr>
            <td><label for="eml">Email</label></td>
            <td><input type="text" class="fi" id="eml" name="email" placeholder="E-mail" value="<?php echo $row[5];?>"></td>
        </tr>
        <tr>
            <td><label for="coll">Collage</label></td>
            <td><input type="text" class="fi" id="coll" name="coll" placeholder="Collage" value="<?php echo $row[8];?>"></td>
        </tr>
        <tr>
            <td><label for="qual">Qualification</label></td>
            <td><input type="text" class="fi" id="qual" name="qualification" placeholder="Qualification" value="<?php echo $row[7];?>"></td>
        </tr>
        <tr>
            <td><label for="cty">City</label></td>
            <td><input type="text" class="fi" id="cty" name="city" placeholder="city" value="<?php echo $row[3];?>"></td>
        </tr>
        <tr>
            <td><label for="phone">Mobile NO</label></td>
            <td><input type="text" class="fi" id="phone" name="phone" placeholder="Mobile no" value="<?php echo $row[4];?>"></td>
        </tr>
        <tr>
            <td><label for="pass">Password</label></td>
            <td><input type="text" class="fi" id="pass" name="pass" placeholder="Password" value="<?php echo $row[6];?>"></td>
        </tr>

        <tr>
          <td><h3>Gender<h3></td>
          <td>
            <label for="male" class="radio">Male</label> <input type="radio" value="male" id="male" name="gender">
            <label for="female" class="radio">Female</label> <input type="radio" value="female" id="female" name="gender">
          </td>
        </tr>

        <tr>
            <td colspan="2"><button class="fb" name="submit" type="submit">Edit</button></td>
        </tr>
    </table>

</form>
</div>

<div class="pedit">
  <form action="#" method="post" enctype="multipart/form-data">
    <input type="file" name="newphoto" placeholder="Select yout profile photo" id="newphoto"/>
    <button type='submit' name="changephoto" value="change photo" placeholder="Sele" id="changephoto">change Profie Picture</button>
  </form>
</div>
</body>
</html>

<?php
include("conn.php");
if(isset($_REQUEST['submit']))
{
  $name=$_REQUEST['name'];
  $email=$_REQUEST['email'];
  $qualification=$_REQUEST['qualification'];
  $phone=$_REQUEST['phone'];
  $city=$_REQUEST['city'];
  $pass=$_REQUEST['pass'];
  $gender=$_REQUEST['gender'];
  $coll=$_REQUEST['coll'];
  $sno=$_REQUEST['sno'];
	 //$query="insert into tutor values(0,'$name','$email','$qualification');";
   $query="update tutor set nm='$name',eid='$email',hq='$qualification',ct='$city',coll='$coll',ph='$phone',pwd='$pass',gender='$gender' where sno='$sno';";
	 $res=mysqli_query($conn,$query);
	 if($res)
	 {
	 	echo "Successfull edited";
     echo $query;

	 	echo "<script> window.location='tutorinfo.php'</script>";
	 }
	 else
	 {
     echo $query;
	 	echo "unable to add";
	 }
}

if(isset($_REQUEST['changephoto']))
{
  $tmp_file_location=$_FILES["newphoto"]["tmp_name"];
  $newfile_name="tphoto/".$_FILES["newphoto"]["name"];
  move_uploaded_file($tmp_file_location,$newfile_name) or die("<script>alert('Photo change not Successfull');</script>");
  $query="update tutor set profile='$newfile_name' where eid='$id';";
  $res=mysqli_query($conn,$query) or die("Problem occured................");
  if($res)
  {
   echo"<script>alert('Photo change Successfull');</script>";
  }
  else
  {
    echo"<script>alert('Photo change not Successfull');</script>";
  }
}

?>
