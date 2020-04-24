<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if (!isset($_SESSION["Login_id"])) 
{
  header('/mainproject/faith2/');
}
$db = mysqli_connect('localhost', 'root', '', 'sehion') or die ("Error connecting to Database".$db->connect_error);
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
                                        <h3 class="text-center title-2">Add Retreat Details</h3>
                                    </div>
                                    <hr>
                                    <form action="details.php" method="POST" novalidate="novalidate">


                                    <div class="form-group">
                                                
                                         <label for="cc-payment" class="control-label mb-1">Select Retreat Type</label>
                                         <select name="r_type" id="r_type" class="form-control">
                                                     <option value="">Select Type</option>

                                                <?php
                                                $query="SELECT `rtype_Id`, `retreat_type` FROM `tbl_retreattype` WHERE 1";
                                                $result=mysqli_query($db,$query);
                                                if($result->num_rows>0)
                                                {
                                                 while($row=$result->fetch_assoc())
                                                 {
                                                     echo'<option value="'.$row["rtype_Id"].'">'.$row["retreat_type"].'</option>';
                                                 }
                                                }
                                                else
                                                {
                                                    echo'<option value="">No type found</option>';
                                                }

                                                ?>
                                         </select>
                                        </div>


                                        <div class="form-group">
                                                
                                                <label for="cc-payment" class="control-label mb-1">Select Speakers</label>
                                                <select name="speakers" id="speakers" class="form-control">
                                                <option value="">Select Speakers</option>
                                                </select>
                                        </div>
       
                                        <div class="form-group">
                                                
                                        <label for="cc-payment" class="control-label mb-1">Enter Available Seats</label>
                                       <input type="text" name="seats" id="seats" placeholder=""  class="form-control" value="0" >
                                       <span class="form_error" id="seats_error">Invalid Seat Number, Seat Number Should be between 10 and 500</span>
                                        </div>

                                   

                                             <div class="row form-group" id="rows">
                                                <div class="col col-sm-6">
                                                   <label for="cc-payment" class="control-label mb-1"> Date From</label>
                                                    <input type="date" name="date_from" id="date_from" placeholder=""  class="form-control" value="0" >
                                                    <span class="form_error" id="df_error">Invalid Date From</span>
                                                </div>
                                                <div class="col col-sm-6">
                                                   <label for="cc-payment" class="control-label mb-1">Date To</label>
                                                    <input type="date" name="date_to" id="date_to" placeholder="" class="form-control" value="0">
                                                    <span class="form_error" id="dt_error">Invalid Date To</span>
                                                </div>
                                            </div>


                                        <div>
                                            <button id="btn_req" type="submit" name="btn_submit"
                                                class="btn btn-lg btn-info btn-block">
                                             
                                                <span id="payment-button-amount">Add New Retreat</span>
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
$('.form_error').hide();

$('#r_type').on('change', function() {
  var id=this.value;
  $.ajax({
      url:"load.php",
      method:"POST",
      data:{id:id},
      success:function(response)
      {
       $("#speakers").html(response);

      }
  });
});





seat_error=true;
datefrom_error=true;
dateto_error=true;
$("#seats").bind('focusout', function () {
    
    var seats = $("#seats").val();
  
    var pattern=/^([1-8][0-9]|9[0-9]|[1-4][0-9]{2}|500)$/;
     if(seats == "" || seats == "0")
    {
        $("#seats_error").show();
        seat_error=true;
        return false;
    }
    else if(pattern.test(seats))
    {
        $("#seats_error").hide();
        seat_error=false;
        return true;
    }
    else
    {
        $("#seats_error").show();  
        seat_error=true;
        return false; 
    }
   });


   $("#date_from").bind('focusout', function () {

    var edate=new Date($("#date_from").val());
    var cdate=new Date();
    if(edate < cdate)
    {
        $("#df_error").show(); 
        alert("Entered date must be a date greater than current date");
        datefrom_error=true;
        $("#date_to").attr('disabled','disabled');
        return false;
    }
    else
    {
        $("#df_error").hide(); 
        datefrom_error=false;
        $("#date_to").attr('disabled',false);
        return true;
    }
   });



   $("#date_to").bind('focusout', function () {

var edate=new Date($("#date_to").val());
var fdate=new Date($("#date_from").val());
var cdate=new Date();
if(edate < cdate)
{
    $("#dt_error").show(); 
    alert("Entered date must be a date greater than current date");
    dateto_error=true;
    return false;
}
else if(edate < fdate)
{
    $("#dt_error").show(); 
    alert("Entered date must be a date greater than From Date");
    dateto_error=true;
    return false;
}
else 
{
    $("#dt_error").hide(); 
    dateto_error=false;
    return true;
}
});



$('form').submit(function (){
  if($("#r_type").val()=="" || $("#speakers").val()=="" || seat_error == true || datefrom_error == true || dateto_error == true)
  {
      alert("Validation Error \n Please Check All Fields");
      return false;
  }  

});

 });   
</script>
 
</body>

</html>
<!-- end document-->
