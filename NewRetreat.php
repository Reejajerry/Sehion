<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if (!isset($_SESSION["Login_id"])) 
{
  header('/mainproject/faith2/');
}
?>
<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Forms</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="/mainproject/faith2/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="/mainproject/faith2/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="/mainproject/faith2/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="/mainproject/faith2/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="/mainproject/faith2/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="/mainproject/faith2/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="/mainproject/faith2/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="/mainproject/faith2/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="/mainproject/faith2/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="/mainproject/faith2/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="/mainproject/faith2/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">
<style>
#doc_load
{
    overflow: hidden;
    border-radius:10px;
    border-style:none;
 
}
.form_error
{
  color: rgb(255, 13, 13);
}

.marginRow{
   margin-bottom:-45px !important; 
   }
</style>
</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <!-- <div class="section__content section__content--p30"> -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 mh-75">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title">
                                        <h3 class="text-center title-2">Add New Retreat</h3>
                                    </div>
                                    <hr>
                                    <form action="#" method="post" id="myform" novalidate="novalidate">

                                        <div class="form-group">
                                             <label for="cc-payment" class="control-label mb-1">Retreat Name</label>
                                              <input type="text" name="add_new" id="add" placeholder="" class="form-control" autocomplete="off">
                                        </div>



                                        <div>
                                            <button id="btn_req" type="submit" name="btn_submit"
                                                class="btn btn-lg btn-info btn-block">
                                                <span id="payment-button-amount">Add</span>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>


                    </div>

                </div>
                <!-- </div> -->
            </div>
        </div>

    </div>
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2'></script>
    <script src="//mozilla.github.io/pdf.js/build/pdf.js"></script>
    <!-- Jquery JS-->
    <script src="/mainproject/faith2/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="/mainproject/faith2/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="/mainproject/faith2/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="/mainproject/faith2/vendor/slick/slick.min.js">
    </script>
    <script src="/mainproject/faith2/vendor/wow/wow.min.js"></script>
    <script src="/mainproject/faith2/vendor/animsition/animsition.min.js"></script>
    <script src="/mainproject/faith2/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="/mainproject/faith2/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="/mainproject/faith2/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="/mainproject/faith2/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="/mainproject/faith2/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="/mainproject/faith2/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="/mainproject/faith2/vendor/select2/select2.min.js"></script>
     <script src="/mainproject/faith2/vendor/animationCounter.js"></script>
    
<!-- Main JS-->
<script src="js/main.js"></script>
<script>
 $(document).ready(function()
 {

$('form').submit(function () {
    var pattern = /^[a-zA-Z ._-]*$/;
var name = $('#add').val();


if (name  === '') 
{
    alert('Please Enter a Retreat Name');
    return false;
}
else if (pattern.test(name))
{

}
else
{
    alert('Invalid Type Name \n Please check your input');
    return false;  
}
});

 });   
</script>
 
</body>

</html>
<!-- end document-->

<?php
if(isset($_POST["btn_submit"]))
{
$db = mysqli_connect('localhost', 'root', '', 'sehion') or die ("Error connecting to Database".$db->connect_error);
$name=$_POST["add_new"];
$query="INSERT INTO `tbl_retreattype`(`rtype_Id`, `retreat_type`) VALUES (NULL,'$name')";
$result=mysqli_query($db,$query);
if($result)
{
    echo'<script>alert("Success \nNew Retreat Type Added");</script>';
}
else
{
    echo'<script>alert('.mysqli_error($db).');</script>';
}
}


?>