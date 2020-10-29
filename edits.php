<?php
include("conn.php");
$id=$_GET["email"];
$query="select * from student where eid='$id'";
$res=mysqli_query($conn,$query);
//echo $query;
$row=mysqli_fetch_row($res)

 ?>

<html>
<head>
<title>Add new tutor</title>
<link rel="stylesheet" href="css/bootstrap.css">
<style>

body
{
  background-color: #F3EBF6;
}

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
label
{
    font-style: oblique;
    font-weight: bold;
    color:black;
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
      <a class="nav-link lin" href="#">About us</a>
    </li>
  </ul>
  </nav>
<br>
<br>

<div class=cont>
<h1 class="head">Edit Student</h1>
<hr>
<form class="addform" action="#!" >

  <table width=90%>
        <tr>
            <td><label for="n">Name</label></td>
            <td><input type="text" id='n' name="name" class="fi" placeholder="Name" value="<?php echo $row[1];?>"></td>
        </tr>
        <tr>
            <td><label for="eml">Email</label></td>
            <td><input type="text" class="fi" id="email" name="email" placeholder="E-mail" value="<?php echo $row[3];?>"></td>
        </tr>
        <tr>
            <td><label for="address">Address</label></td>
            <td><input type="text" class="fi" id="address" name="address" placeholder="address" value="<?php echo $row[5];?>"></td>
        </tr>

        <tr>
            <td><label for="cty">City</label></td>
            <td><input type="text" class="fi" id="cty" name="city" placeholder="city" value="<?php echo $row[4];?>"></td>
        </tr>
        <tr>
            <td><label for="pass">Password</label></td>
            <td><input type="password" class="fi" id="pass" name="pass" placeholder="Password" value="<?php echo $row[6];?>"></td>
        </tr>
        <tr>
            <td colspan="2"><button class="fb" name="submit" type="submit">Edit</button></td>
        </tr>
    </table>

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
  $address=$_REQUEST['address'];
  $city=$_REQUEST['city'];
  $pass=$_REQUEST['pass'];
  $oemail=$row[3];

	 //$query="insert into tutor values(0,'$name','$email','$qualification');";
   $query="update student set nm='$name',eid='$email',ct='$city',ad='$address',pwd='$pass' where eid='$oemail';";
	 $res=mysqli_query($conn,$query);
	 if($res)
	 {
	 	echo "Successfull added";
	 	echo "<script> window.location='admin.html'</script>";
	 }
	 else
	 {
     echo $query;
	 	echo "unable to add";
	 }
}
?>
