<?php
session_start();
if(isset($_SESSION['alogin'])){
$mail=$_SESSION['alogin'];


		echo "<script> alert($mail)
	
				</script>";

 $con=mysqli_connect("localhost","root","","db_event_mngmt")or die ("Couldn't connect");
 date_default_timezone_set('Asia/Kolkata');
 $current_date = date('Y-m-d');
if(isset($_POST['booking_button']))

{

$no_persons=$_POST['persons'];
$starter_item=$_POST['prod_cat'];
$main_item=$_POST['prod_cat2'];
$desert_item=$_POST['prod_cat4'];
$date=$_POST['date'];
//$sql="INSERT INTO `tbl_checkout`( `register_email`, `no.of.persons`, `starter_id`, `maincourse_id`, `desert_id`, `date`) vales('rasi@gmail.com','$no_persons',$starter_item,$main_item,$desert_item,$date)";
$sql="INSERT INTO `tbl_checkout` ( `register_email`, `no.of.persons`, `starter_id`, `maincourse_id`, `desert_id`, `date`) VALUES ( 'rasi@gmail.com', '$no_persons', '$starter_item', '$main_item', '$desert_item', '$date')";
if($sql){


											echo "<script> alert($date)
											
													</script>";
							//header("Location:add_sub_cat_prod.php");
						}
						else{
							echo "Data Submit Error!!";
						}
							 $ins=mysqli_query($con,$sql);
}

}
else
echo "not set";
?>