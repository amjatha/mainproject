<?php
session_start();
$mail=$_SESSION['alogin'];
$con=mysqli_connect("localhost","root","","db_event_mngmt")or die ("Couldn't connect");
                                    
if(isset($_GET['check_out_id']))

						{
	
									
						//$sql3=mysqli_query($con,"UPDATE `tbl_booking_order` SET status='CANCEL' WHERE check_out_id=".$_GET['check_out_id']);
							 //echo 'Deleted successfully.';
							// echo"<script> alert('booking cancel successfully');
							//	window.location='customer_view_order.php'; </script>";	
									
									
//$ctype=$_POST["ctype"];
//$name_on_card=$_POST["name_on_card"];
//$cnumber=$_POST["cnumber"];
//$cvv=$_POST["cvv"];
//$edate=$_POST["edate"];
//$total=$_POST["advance_payment"];
//$check_out_id=$_SESSION['checkout_id'];
 

									
				
										
									
                                   				

$d_bank_info=mysqli_query($con,"select tbl_booking_order.advance_payment,tbl_bank.balance from tbl_booking_order cross join tbl_bank  WHERE `tbl_bank.register_email`='$mail'");
									
//$row=mysqli_fetch_array($d_del_adrs);


$rowcount = mysqli_num_rows($d_bank_info); 

if($rowcount==1)
	{
						

	echo "<script>
	alert('hiiiiii');
	
		</script>";

	}
	else
	{
			$row_customer=mysqli_fetch_array($d_bank_info);
			$old_balance=$row_customer['balance'];
	        $total=$row_customer['advance_payment'];
		//$total=$_POST['$total'];


					$new_balance=$old_balance+$total;

					$sql2=mysqli_query($con,"UPDATE `tbl_bank` SET `balance`=$new_balance WHERE   `register_email`='$mail' ");			

					if($sql2)
							{
							$admin_bank_info=mysqli_query($con,"SELECT * FROM `tbl_bank` WHERE `register_email`='admin@gmail.com'");
							$row_admin=mysqli_fetch_array($admin_bank_info);
							$admin_old_bal=$row_admin['balance'];
							$admin_new_bal=$admin_old_bal-$total;

						
							$sql3=mysqli_query($con,"UPDATE `tbl_bank` SET `balance`=$admin_new_bal WHERE `register_email`='admin@gmail.com' ");

							if($sql3)
									{
										$sql4=mysqli_query($con,"UPDATE `tbl_booking_order` SET status='CANCEL' WHERE check_out_id=".$_GET['check_out_id']);
										
												if($sql4)
																
																{
																echo "<script>
																			alert('$total');
																			window.location='customer_view_orders.php';
																			</script>";
																			
																}
																else
																{
																	echo "<script>
																			alert('Payment failed');
																			window.location='payment.php';
																			</script>";
																}
									
									}
							
							}
					
						}
	
						
									
						}
//end payment


?>
