<?php
include('conn.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Add additional info</title>

    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-dark p-t-100 p-b-50">
        <div class="wrapper wrapper--w900">
            <div class="card card-6">
                <div class="card-heading">
                    <h2 class="title">Add additional Info</h2>
                </div>
                <div class="card-body">
                    <form method="POST">
                        <div class="form-row">
                            <div class="name">Highest Qualification</div>
                            <div class="value">
                                <input class="input--style-6" type="text" name="hc" id="hc">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">College/Institute</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" type="text" name="coln" id="coln">
                                </div>
                            </div>
                        </div>
                         <div class="form-row">
                            <div class="name">Upload photo</div>
                            <div class="value">
                                <div class="input-group js-input-file">
                                    <input class="input-file" type="file" name="file_cv" id="file">
                                    <label class="label--file" for="file">Choose file</label>
                                    <span class="input-file__info">No file chosen</span>
                                </div>
                                <div class="label--desc">Upload your photo or any other relevant file. Max file size 50 MB</div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Upload video</div>
                            <div class="value">
                                <div class="input-group js-input-file">
                                    <input class="input-file" type="file" name="file_cv" id="file">
                                    <label class="label--file" for="file">Choose file</label>
                                    <span class="input-file__info">No file chosen</span>
                                </div>
                                <div class="label--desc">Upload your video or any other relevant file. Max file size 500 MB</div>
                            </div>
                        </div>
                        <div class="card-footer">
                    <button class="btn btn--radius-2 btn--blue-2" type="submit" name="sub" id="sub">Send Application</button>
                </div>
            
                    </form>
                </div>
                <!--<div class="card-footer">
                    <button class="btn btn--radius-2 btn--blue-2" type="submit" name="sub" id="sub">Send Application</button>
                </div>-->
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>


    <!-- Main JS-->
    <script src="js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<?php
if(isset($_REQUEST['sub']))
{
$eml=$_SESSION['eml'];
$hc=$_REQUEST['hc'];
$coln=$_REQUEST['coln'];
$query= "update tutor set hq='$hc',coll='$coln' where eid = '$eml';";
$res=mysqli_query($con,$query);
if($res)
{
    
    echo("Done");
}
else
{
    echo("No data");

}
}
?>