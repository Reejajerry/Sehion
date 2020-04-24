<?php
$db = mysqli_connect('localhost', 'root', '', 'sehion') or die ("Error connecting to Database".$db->connect_error);
$id=$_POST["id"];
$query="SELECT tbl_room.room_Id,tbl_room.amount,tbl_room.room_No, tbl_room_type.rtype_name, tbl_ac_type.actype_name FROM tbl_room JOIN tbl_room_type
 ON tbl_room.rtype_id = tbl_room_type.rtype_id JOIN tbl_ac_type ON tbl_room.actype_id = tbl_ac_type.actype_id AND tbl_room.room_Id='$id'";
$result=mysqli_query($db,$query);
if($result->num_rows>0)
{
echo '<ul>';
 while($row=$result->fetch_assoc())
{
echo'<li><h4>Room Number - '.$row["room_No"].'</h4></li>';
echo'<li><h4>Room Type - '.$row["rtype_name"].'</h4></li>';
echo'<li><h4>Ac - '.$row["actype_name"].'</h4></li>';
echo'<li><h4>Per Day Amount - '.$row["amount"].'</h4></li>';
}
 echo '</ul>';
}
 else
{
    echo '<ul><li><h4>No Rooms Details Found</h4></li></ul>';
}
