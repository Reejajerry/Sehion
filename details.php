
<?php
require $_SERVER["DOCUMENT_ROOT"].'/mainproject/faith2/phpmailer/PHPMailerAutoload.php'; 
if (isset($_POST["btn_submit"])) {
    $db = mysqli_connect('localhost', 'root', '', 'sehion') or die("Error connecting to Database" . $db->connect_error);
    $retreat_type = $_POST["r_type"];
    $speaker_id = $_POST["speakers"];
    $seatnum = $_POST["seats"];
    $fromdate = $_POST["date_from"];
    $todate = $_POST["date_to"];

    $query = "INSERT INTO `tbl_retreatdetails`(`retreat_id`, `speakers_Id`, `rtype_Id`, `starting_Date`, `ending_Date`, `avl_seats`)
        VALUES (NULL,'$speaker_id','$retreat_type','$fromdate','$todate','$seatnum')";
    $result = mysqli_query($db, $query);
    if ($result) 
    {
     
    $sq="SELECT a.email,b.speakers_Name from tbl_login a JOIN tbl__speakers b ON a.login_Id=b.login_Id AND b.speakers_Id='$speaker_id'";
    $sqres=mysqli_query($db,$sq);
    if($sqres)
    {
       while($row=$sqres->fetch_assoc())
           {
               $email=$row["email"];
               $sname=$row["speakers_Name"];
           }
    }
    else
    {
   echo mysqli_error($db);
    }
    $maild='faith@gmail.com';
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->Host='smtp.gmail.com';
    $mail->Port=587;
    $mail->SMTPAuth=true;
    $mail->SMTPsecure='tls';
    $mail->Username='arjuna@mca.ajce.in';//send cheyyunna mail id
    $mail->Password='arjuna1234';//ayinte password
    $mail->setFrom($maild);
    $mail->addAddress($email);//receiverinte mail
    $mail->addReplyTo($maild);//thirich reply theranam engil a mail
 
    $mail->isHTML(true);//html code mail ayakkan true akki iduka
    $mail->Subject='You Have Been Invited to Speak at a new retreat';//mail subject
    $mail->Body="<h1>Hai ".$sname."</h1><h2>Hou have been invited to speak at the retreat staring from '.$fromdate.' For Further details please check your sehion account</h2>";//body
   if(!$mail->send())
   {
    echo '<script>
    alert("Success \n New Retreat Added \n Mail Unable to be deliverd");
    window.location.href="/mainproject/faith2/Admin/AddRetreatDetails/AddDetails.php";
    </script>';
   }
    else
     {
        echo '<script>
        alert("Success \n New Retreat Added \n Mail Sent to Speaker");
        window.location.href="/mainproject/faith2/Admin/AddRetreatDetails/AddDetails.php";
        </script>';
    }

    }
     else {
        echo '<script>alert(' . mysqli_error($db) . ');</script>';
    }
}


?>