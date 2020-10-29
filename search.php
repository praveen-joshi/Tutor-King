<?php
include('conn.php');
session_start();
$q="select * from course;";
$result= mysqli_query($con,$q);

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Educational tutor form</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <style>
      html, body {
      min-height: 100%;
      }
      body, div, form, input, select, p {
      padding: 0;
      margin: 0;
      outline: none;
      font-family: Roboto, Arial, sans-serif;
      font-size: 16px;
      color: #eee;
      }
      body {
      background: url("sear.png") no-repeat center;
      background-size: cover;
      }
      h1, h2 {
      text-transform: uppercase;
      font-weight: 400;
      }
      h2 {
      margin: 0 0 0 8px;
      }
      .main-block {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      height: 100%;
      padding: 25px;
      background: rgba(0, 0, 0, 0.5);
      }
      .left-part, form {
      padding: 25px;
      }
      .left-part {
      text-align: center;
      }
      .fa-graduation-cap {
      font-size: 72px;
      }
      form {
      background: rgba(0, 0, 0, 0.7);
      }
      .title {
      display: flex;
      align-items: center;
      margin-bottom: 20px;
      }
      .info {
      display: flex;
      flex-direction: column;
      }
      input, select {
      padding: 5px;
      margin-bottom: 30px;
      background: transparent;
      border: none;
      border-bottom: 1px solid #eee;
      }
      input::placeholder {
      color: #eee;
      }
      option:focus {
      border: none;
      }
      option {
      background: black;
      border: none;
      }
      .checkbox input {
      margin: 0 10px 0 0;
      vertical-align: middle;
      }
      .checkbox a {
      color: #26a9e0;
      }
      .checkbox a:hover {
      color: #85d6de;
      }
      .btn-item, button {
      padding: 10px 5px;
      margin-top: 20px;
      border-radius: 5px;
      border: none;
      background: #26a9e0;
      text-decoration: none;
      font-size: 15px;
      font-weight: 400;
      color: #fff;
      }
      .btn-item {
      display: inline-block;
      margin: 20px 5px 0;
      }
      button {
      width: 100%;
      }
      button:hover, .btn-item:hover {
      background: #85d6de;
      }
      @media (min-width: 568px) {
      html, body {
      height: 100%;
      }
      .main-block {
      flex-direction: row;
      height: calc(100% - 50px);
      }
      .left-part, form {
      flex: 1;
      height: auto;
      }
      }
 .nav
{
   overflow:hidden;
   background-color:black;
   width :100%;
    margin-top:-8%;
   float:top;
}
.nav a
{
 text-decoration:none;
 float:right;
 display:block;
 color:#f2f2f2;
 text-align:center;
 padding: 3px 10px;
}

.nav a.a1:hover{
 background-color:grey;
 color:black;
}

    </style>
  </head>
  <body>
  <div class="nav">
<a href="index.html" style="float:left;margin-top:8%;"><img src="images/log.png" height=60px width=70px alt="not found"> </a>
<a href="index.html" style="float:left;margin-top:9%;font-size:150%; "><b>Tutorking</b></a>
<a href="index.html" style=" margin-top:9.5%;" class="a1">HOME</a>
</div>
    <div class="main-block" style=" margin-top:-5.5%;">
      <div class="left-part">
        <i class="fas fa-graduation-cap"></i>
        <h1>Find Tutors in your city</h1>
        <p>You can find affordable private tutors in your own city.You can view list of your already searched tutors
        by Login in your account. If you don't have an account then register now.</p>
        <div class="btn-group">
          <a class="btn-item" href="login_page.php">Login</a>
          <a class="btn-item" href="login_page.php">Register</a>
        </div>
      </div>
      <form >
        <div class="title">
          <i class="fas fa-pencil-alt"></i>
          <h2>Find Tutor</h2>
        </div>
        <div class="info">
          <select class="fname" type="text" name="name" id="name" placeholder="Subject to learn">
           <option value="course-type" selected>Subject to learn</option>
          <?php
            while($row=mysqli_fetch_row($result))
            {
           ?>
           <option value="<?php echo $row[1] ?>" ><?php echo $row[1] ?></option>
           <?php
            }
           ?>
           </select>
          <input type="text" name="ct" placeholder="City">
          <select name="pr">
            <option value="course-type" selected>Your Proficiency*</option>
            <option value="short-courses">Studing in School</option>
            <option value="featured-courses">Studing in Colledge</option>
            <option value="undergraduate">Graduate</option>
            <option value="diploma">Diploma</option>
            <option value="certificate">Certificate</option>
            <option value="masters-degree">Masters degree</option>
            <option value="postgraduate">Postgraduate</option>
          </select>
        </div>
        <button type="submit" name="sb" id="sb">Submit</button>
      </form>
    </div>
  </body>
</html>
<?php
if(isset($_REQUEST['sb']))
{
$sub=$_REQUEST['name'];
$ct=$_REQUEST['ct'];
$_SESSION['sub']=$sub;
$_SESSION['ct']=$ct;
echo "<script> window.location = 'stutor.php'</script>";
}
?>
