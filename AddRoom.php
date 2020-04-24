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
                    <div class="col-lg-4" >
                        <div class="card"  style="min-height:560px;">
                            <div class="card-body">
                             <div class="card-title">
                                 <h3>Existing Rooms</h3>
                             </div>
                             <div id="list">

                             </div>
                            </div>
                         </div>
                         </div>
                        <div class="col-lg-8 mh-75">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title">
                                        <h3 class="text-center title-2">Add New Room</h3>
                                    </div>
                                    <hr>
                                    <form action="add.php" method="POST" novalidate="novalidate">


                                    <div class="form-group">
                                                
                                         <label for="cc-payment" class="control-label mb-1">Select Floor Number</label>
                                         <select name="floor" id="floor" class="form-control">
                                                     <option value="">Select Type</option>
                                                <?php
                                                $query="SELECT `floor_Id`, `floor_name`, `status` FROM `tbl_floor` WHERE status='1'";
                                                $result=mysqli_query($db,$query);
                                                if($result->num_rows>0)
                                                {
                                                 while($row=$result->fetch_assoc())
                                                 {
                                                     echo'<option value="'.$row["floor_Id"].'">'.$row["floor_name"].'</option>';
                                                 }
                                                }
                                                else
                                                {
                                                    echo'<option value="">No floor found</option>';
                                                }

                                                ?>
                                         </select>
                                        </div>


                                        <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1"> Enter Room Number</label>
                                        <input type="text" name="room" id="room" placeholder=""  class="form-control" autocomplete="off">
                                       <span class="form_error" id="room_error">Invalid Room Number</span>
                                        </div>
       
                                        <div class="form-group">
                                                
                                                <label for="cc-payment" class="control-label mb-1">Select Room Type</label>
                                                <select name="room_type" id="room_type" class="form-control">
                                                    <option value="">Select Type</option>
       
                                                       <?php
                                                       $query="SELECT `rtype_id`, `rtype_name` FROM `tbl_room_type` WHERE 1";
                                                       $result=mysqli_query($db,$query);
                                                       if($result->num_rows>0)
                                                       {
                                                        while($row=$result->fetch_assoc())
                                                        {
                                                            echo'<option value="'.$row["rtype_id"].'">'.$row["rtype_name"].'</option>';
                                                        }
                                                       }
                                                       else
                                                       {
                                                           echo'<option value="">No Type found</option>';
                                                       }
       
                                                       ?>
                                                </select>
                                               </div>
                                       
                                               <div class="form-group">
                                                
                                                <label for="cc-payment" class="control-label mb-1">Select AC Type</label>
                                                <select name="ac" id="ac" class="form-control">
                                                    <option value="">Select Type</option>
       
                                                       <?php
                                                       $query="SELECT `actype_id`, `actype_name` FROM `tbl_ac_type` WHERE 1";
                                                       $result=mysqli_query($db,$query);
                                                       if($result->num_rows>0)
                                                       {
                                                        while($row=$result->fetch_assoc())
                                                        {
                                                            echo'<option value="'.$row["actype_id"].'">'.$row["actype_name"].'</option>';
                                                        }
                                                       }
                                                       else
                                                       {
                                                           echo'<option value="">No Type found</option>';
                                                       }
       
                                                       ?>
                                                </select>
                                               </div>
                                               <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1"> Enter Expected Amount</label>
                                                <input type="text" name="amount" id="amount" placeholder=""  class="form-control" autocomplete="off" >
                                                 <span class="form_error" id="amount_error">Invalid Amount</span>
                                        </div>
                                   

                                           


                                        <div>
                                            <button id="btn_req" type="submit" name="btn_submit"
                                                class="btn btn-lg btn-info btn-block">
                                             
                                                <span id="payment-button-amount">Add New Room</span>
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

$('#floor').on('change', function() {
  var id=this.value;
  $.ajax({
      url:"load.php",
      method:"POST",
      data:{id:id},
      success:function(response)
      {
       $("#list").html(response);

      }
  });
});





room_error=true;
amount_error=true;

$("#room").bind('focusout', function () {
    
    var room = $("#room").val();
  
    var pattern=/^[0-9A-Za-z\s\-]+$/;
     if(room == "" || room == "0")
    {
        $("#room_error").show();
        alert("Please Enter A Room Number");
        room_error=true;
        return false;
    }
    else if(pattern.test(room))
    {
        $("#room_error").hide();
       
        room_error=false;
        return true;
    }
    else
    {
        $("#room_error").show();  
        alert("Please Enter A Valid Room Number");
        room_error=true;
        return false; 
    }
   });

   $("#amount").bind('focusout', function () {
    
    var amount = $("#amount").val();
  
    var pattern=/^(0|[1-9][0-9]*)$/;
     if(amount == "" || amount == "0")
    {
        $("#amount_error").show();
        alert("Please Enter An Amount");
        amount_error=true;
        return false;
    }
    else if(pattern.test(amount))
    {
        $("#amount_error").hide();
       
        amount_error=false;
        return true;
    }
    else
    {
        $("#amount_error").show();  
        alert("Please Enter A Valid Amount \n Only Numbers are allowed in Amount Field");
        amount_error=true;
        return false; 
    }
   });




$('form').submit(function (){
  if($("#floor").val()=="" || $("#room_type").val()=="" ||$("#ac").val()=="" || room_error == true || amount_error == true)
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
