<?php
include('conn.php');
$query="select * from student";
$res=mysqli_query($conn,$query) or die("problem wiht query");
?>

<html>
  <head>
  <title>TutorCity</title>
  <link rel="stylesheet" href="css/bootstrap.css">

  <style>
  body {
    font-family: "Lato", sans-serif;
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

  .ele
  {
    width: 100%;
    height: 30%;
    position: relative;
    background-color: snow;
    border-radius : 5px;
    overflow :auto;
    box-shadow : 5px 5px 5px 0px grey;
    margin : 10px 10px 10px 10px;
    padding : 10px 10px 10px 10px;
    border : solid lightgray;
    display: flex;
  }
  .mynav
  {
    background-color: lightgray;
    border-radius: 5px;deletetutor.php
    box-shadow: 5px 5px 5px;
    margin: 10px 10px 10px 10px;
  }

  .fx
  {
      position : fixed;
      background : white;
      width : 100%;
      top: 0;
  }

  .sea
  {
    width: 80%;
    margin-top: 10px;
    margin: 10px 10px 10px 10px;
  }
  .sh
  {
    box-shadow: 1px 1px 1px 1px;
    margin: 10px 10px 10px 10px;
  }
  .box
  {
    width : 99%;
    overflow : auto;
    height: 80%;
    margin : 150px 10px 10px 10px;
    padding: 10px 10px 10px 10px;
    background: white;
    word-wrap: break-word;
  }

  .details
  {
    float: right;
    background-color: snow;
    width: 70%;

  }
  .imgg
  {
    height: 100%;
    width: 20%;
    float: left;
  }



  .delbtn
  {
    background-color: snow;
    width: 20%;
    height: 100%;
    border-radius: 5px;

  }

  </style>

  </head>

  <body>

  </button>


    <div class="fx">

      <div>
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

      </div>



    </div>

    <div class="box">


      <?php
        $name="rpavv";
        while($row=mysqli_fetch_row($res))
        {
          $name=$row[1];
          $email=$row[3];
          $address=$row[5];
          $city=$row[4];
          $sno=$row[0];

        ?>
          <form class="ele">


             <div class="imgg">
             <img src=<?php echo $row[7];?> style="display:inline;" height=100% width="100%">
           </div>

           <div class="details">
             <table>
             <tr> <td>Name:</td>   <td><?php echo $name; ?></td></tr>
             <tr> <td>City: </td>   <td><?php echo $city; ?></td></tr>
             <tr> <td>Address: </td>   <td><?php echo $address; ?></td></tr>
             <tr> <td>Email:</td>   <td><?php echo $email; ?></td></tr>
           </table>
          </div>

          <button class="delbtn" type="submit" name="delete" value="<?php echo$email ?>">Delete</button>

        </form>
      <?php
        }
      ?>


  </body>
</html>


<?php
if(isset($_REQUEST['delete']))
{
  $dell=$_REQUEST['delete'];
  $query="delete from student where eid='$dell' ";
  $res=mysqli_query($conn,$query) or die("query execution failed!!! ");
  if($res)
  {
    echo "<script>alert('deleted successfully')</script> ";
    echo "<script> window.location = 'admin.html'</script>";
  }
  else {
    echo "<script>alert('unsuccess')</script> ";
  }
}
?>
