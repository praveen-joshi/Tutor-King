<html>
<head>
<title>Add new tutor</title>
<link rel="stylesheet" href="css/bootstrap.css">
<style>
body
{
  background-color: lavenderblush;
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
  background-color: Sand;
  padding: 20px;
  margin: 10px 20px 20px 20px;
  border-radius: 30px;
  box-shadow: 1px 2px 2px 2px ivory;
  width: 60%;
  margin-left: auto;
  margin-right: auto;
  background-color: white;
}

.fi
{
  width: 80%;
  padding: 12px 20px;cho "<script>alert('deleted successfully')</script> ";
  margin: 10px 10px 10px 10px;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 500px;
  box-sizing: border-box;
  background-color: snow;
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

}
label
{
  font-family: sans-serif;
  font-size: 30px;
}

.head
{
  color: orange;
  text-decoration: underline;
  align-items: center;
  background-color: crimson;
  text-align: center;
  border: solid;
  border-radius: 100px;
  margin-left: auto;
  margin-right: auto;
  width: 60%;
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



<h1 class="head">Add Tutor</h1>

<form class="addform" action="#!" >

  <table width=90%>
        <tr>
            <td><label for="n">Name</label></td>
            <td><input type="text" id='n' name="name" class="fi" placeholder="Name"></td>
        </tr>
        <tr>
            <td><label for="eml">Email</label></td>
            <td><input type="text" class="fi" id="eml" name="email" placeholder="E-mail"></td>
        </tr>
        <tr>
            <td><label for="qual">Qualification</label></td>
            <td><input type="text" class="fi" id="qual" name="qualification" placeholder="Qualification"></td>
        </tr>
        <tr>
            <td><label for="cty">City</label></td>
            <td><input type="text" class="fi" id="cty" name="city" placeholder="city"></td>
        </tr>
        <tr>
            <td><label for="cty">Password</label></td>
            <td><input type="text" class="fi" id="pass" name="pswd" placeholder="password"></td>
        </tr>
        <tr>
            <td><label for="cty">Collage</label></td>
            <td><input type="text" class="fi" id="coll" name="coll" placeholder="Collage"></td>
        </tr>
        <tr>
            <td><label for="cty">Mobile NO</label></td>
            <td><input type="text" class="fi" id="phone" name="phone" placeholder="mobile no"></td>
        </tr>
        <tr>
            <td><label for="cty">Gender</label></td>
            <td>

              <label for="male" class="radio">Male</label> <input type="radio" value="male" id="male" name="gender">
              <label for="female" class="radio">Female</label> <input type="radio" value="female" id="female" name="gender">

            </td>
        </tr>
        <tr>
            <td colspan="2"><button class="fb" name="submit" type="submit">Add</button></td>
        </tr>
    </table>

</form>

</body>
</html>

<?php
include("conn.php");
if(isset($_REQUEST['submit']))
{
  $name=$_REQUEST['name'];
  $email=$_REQUEST['email'];
  $hq=$_REQUEST['qualification'];
  $city=$_REQUEST['city'];
  $gender=$_REQUEST['gender'];
  $pswd=$_REQUEST['pswd'];
  $phone=$_REQUEST['phone'];
  $coll=$_REQUEST['coll'];
  //---------------------------------------------------------------------------------------------remove ite later



	// $query="insert into tutor values(0,'$name','$email','$qualification');";
  //$query= "insert into student(nm,gender,eid,ct,ad,pwd,cpwd,profile) values('$name','$gender','$email','$city','$ad','$pswd','$pswd','$ad')";
  $query= "insert into tutor values(0,'$name','$gender','$city','$phone','$email','$pswd','$hq','$coll','na');";
  echo $query;
	 $res=mysqli_query($conn,$query);
	 if($res)
	 {
	 	echo "Successfull added";
	 	echo "<script> window.location='admin.html'</script>";
	 }
	 else
	 {
	 	echo "unable to add";
	 }
}
?>
