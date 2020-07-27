<?php
session_start();
if(isset($_SESSION['alogin'])){
  $mail=$_SESSION['alogin'];
//	$checkout_id=$_SESSION['checkout_id'];

	//$register_email=$_SESSION['register_email'];
	//$fname = $_POST['fname'];
  $_SESSION['page1']="homepage";
  $con=mysqli_connect("localhost","root","","db_event_mngmt")or die ("Couldn't connect");
    $disp="SELECT  * from tbl_register WHERE register_email= '$mail'";

  $disp_result=mysqli_query($con,$disp);
  date_default_timezone_set('Asia/Kolkata');
  $current_date = date('Y-m-d');

  if(isset($_POST["place_order"]))
	
	{
		


//new code
$checkout_id=$_POST["checkout_id"];
$_SESSION['checkout_id']=$checkout_id;
$advance_payment=$_POST["advance_payment"];
$date_event=$_POST["date_event"];
$event_address=$_POST["event_address"];

$ins_booking=mysqli_query($con,"INSERT INTO `tbl_booking_order`(`check_out_id`, `advance_payment`, `date_of_event`, `address_of_event`, `status`) VALUES ($checkout_id,$advance_payment,'$date_event','$event_address','PROCESSING')");



if($ins_booking)
{
	echo"<script>alert('ineserted');
	window.location='payment.php';
	</script>";
	
	
}
	

//end new code
	
	}

?>

 <!doctype html>
  <!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
  <!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
  <!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
  <!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ela Admin - HTML5 Admin Template</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/weathericons@2.1.0/css/weather-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" rel="stylesheet" />

    <style>
     {
      box-sizing: border-box;
    }

    input[type=text], select, textarea {
      width: 100%;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 4px;
      resize: vertical;
    }

    label {
      padding: 12px 12px 12px 0;
      display: inline-block;
    }

    input[type=submit] {
      background-color: #4CAF50;
      color: white;
      padding: 12px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      float: right;
    }

    input[type=submit]:hover {
      background-color: #45a049;
    }

    .container {
      border-radius: 5px;
      background-color: #f2f2f2;
      padding: 20px;
    }

    .col-25 {
      float: left;
      width: 25%;
      margin-top: 6px;
    }

    .col-75 {
      float: left;
      width: 75%;
      margin-top: 6px;
    }

    /* Clear floats after the columns */
    .row:after {
      content: "";
      display: table;
      clear: both;
    }

    /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
    @media screen and (max-width: 600px) {
      .col-25, .col-75, input[type=submit] {
        width: 100%;
        margin-top: 0;
      }
    }
  </style>
</head>

<body>
  <!-- Left Panel -->
  <aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
      <div id="main-menu" class="main-menu collapse navbar-collapse">
        <ul class="nav navbar-nav">

         <!--  <li class="active1"> <a href="index.html"><i class="menu-icon fa fa-laptop"></i>View </a></li>-->

         <li class="menu-title">FOOD MANAGEMENT</li><!-- /.menu-title -->
                     <!-- <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-cogs"></i>VIEW</a>
                        <ul class="sub-menu children dropdown-menu"><li><i class="fa fa-puzzle-piece"></i><a href="#">Payment</a></li>
                          <li><i class="fa fa-id-badge"></i><a href="ui-badges.html">Update Profile</a></li>
                           <!-- <li><i class="fa fa-bars"></i><a href="ui-tabs.html">Tabs</a></li>

                            <li><i class="fa fa-id-card-o"></i><a href="ui-cards.html">Cards</a></li>
                            <li><i class="fa fa-exclamation-triangle"></i><a href="ui-alerts.html">Alerts</a></li>
                            <li><i class="fa fa-spinner"></i><a href="ui-progressbar.html">Progress Bars</a></li>
                            <li><i class="fa fa-fire"></i><a href="ui-modals.html">Modals</a></li>
                            <li><i class="fa fa-book"></i><a href="ui-switches.html">Switches</a></li>
                            <li><i class="fa fa-th"></i><a href="ui-grids.html">Grids</a></li>
                            <li><i class="fa fa-file-word-o"></i><a href="ui-typgraphy.html">Typography</a></li>
                        </ul>
                      </li>-->

                      <li class="menu-item-has-children dropdown">


                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Food management</a>
                        <ul class="sub-menu children dropdown-menu">
                          <li><i class="menu-icon fa fa-th"></i><a href="#">Payment</a></li>
                          <!--<li><i class="menu-icon fa fa-th"></i><a href="forms-advanced.html">Subcategory</a></li>-->
                        </ul>
                      </li>







                    </ul>
                  </div><!-- /.navbar-collapse -->
                </nav>
              </aside>
              <!-- /#left-panel -->
              <!-- Right Panel -->
              <div id="right-panel" class="right-panel">
                <!-- Header-->
                <header id="header" class="header">
                  <div class="top-left">
                    <div class="navbar-header">
                      <a class="navbar-brand" href="./"><img src="images/logo.png" alt="Logo"></a>
                      <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>
                      <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                    </div>
                  </div>
                  <div class="top-right">
                    <div class="header-menu">
                      <div class="header-left">
                        <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                          <form class="search-form">
                            <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                            <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                          </form>
                        </div>

                    

                        
                      </div>

                      <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <img class="user-avatar rounded-circle" src="images/admin.jpg" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                          <a class="nav-link" href="#"><i class="fa fa- user"></i>My Profile</a>


                          <a class="nav-link" href="logout.php"><i class="fa fa-power -off"></i>Logout</a>
                        </div>
                      </div>

                    </div>
                  </div>
                </header>
                <!-- /#header -->
                <!-- Content -->
                <div class="content">
                  <!-- Animated -->
                  <div class="animated fadeIn">
                    <!-- Widgets  -->
                    <div class="row">





                    </div>
                    <!-- /Widgets -->
                    <!--  Traffic  -->
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="card">

                          <div class="row">
                            <div class="col-lg-8">
                              <div class="card-body">

                                <div class="container">
                                  <form method="POST" action="payment.php">
                                    <?php

                                    while($array=mysqli_fetch_array($disp_result))
                                    {
										
										$sql_bank=mysqli_query($con,"SELECT * FROM `tbl_bank` WHERE `register_email`='$mail'");
										$count_bank=mysqli_num_rows($sql_bank);
										if($count_bank==0)
											
											{
												$name_on_card=$array['fname'];
												$card_number="1212121212121212";
												$ins_bank=mysqli_query($con,"INSERT INTO `tbl_bank` (`register_email`, `card_type`, `name_on_card`, `card_number`, `cvv`, `expiry_date`, `balance`, `status`, `temp_otp`) VALUES ('$mail', 'Debit', '$name_on_card', '$card_number', '123', '12/25', '50000', 'VALID', '0');");
												
											}
									
                                     ?>
                                     <div class="row">
									 
									 <div class="col-25">
                                        <label for="name on card">Select card type</label>
                                      </div>
									   <div class="col-75">
                                       <select name="ctype" id="ctype" required>
									   <option value="debit">Debit card</option>
									    <option value="credit">Credit card</option>
									   </select>
                                      </div>
									  
                                      <div class="col-25">
                                        <label for="name on card">Name on card</label>
                                      </div>
                                      <div class="col-75">
                                        <input type="text"  id="name_on_card" name="name_on_card" required>
                                      </div>
                                    </div>

                                    <div class="row">
                                      <div class="col-25">
                                        <label for="cnumber">Card Number</label>
                                      </div>
                                      <div class="col-75">
                                        <input type="text"  id="cnumber" name="cnumber" required>
                                      </div>
                                    </div>

                                    <div class="row">
                                      <div class="col-25">
                                        <label for="cvv">CVV</label>
                                      </div>
                                      <div class="col-75">
                                        <input type="password" placeholder="***" id="cvv" name="cvv" required>
                                      </div>
									  
                                    </div>
									<div class="row">
                                      <div class="col-25">
                                        <label for="expiry_date">Expiry Date</label>
                                      </div>
                                      <div class="col-75">
                                        <input type="text"  id="edate" name="edate" placeholder="MM/YY" required>
                                      </div>
									  
                                    </div>
									
                                    <div class="row">
                                    <?php } ?>
                                    <div class="col-25">
                                      <label for="Price">Payment Details</label>
                                    </div>
                                    <div class="col-lg-12 col-md-6">
                                      <div class="card ov-h">
                                        <div class="card-body bg-flat-color-2">
                                          <?php
                                          $today=date("Y-m-d");
                                          $fetch=mysqli_query($con,"select * from tbl_checkout where register_email='$mail' and date='$today'");
                                          foreach($fetch as $category) {
                                           //echo $category['checkout_id'];
                                             $id=$category['checkout_id'];
											 
											 ?>
											 <input type="text" name="checkout_id" id="checkout_id" value="<?php echo $id;?>" hidden>
											 <?php
                                         }
                                         echo "Course Selected"."<br>";
                                         $fetch1=mysqli_query($con,"select * from tbl_checkout,tbl_subcategory where tbl_checkout.starter_id =tbl_subcategory.subcategory_id and tbl_checkout.register_email='$mail' and date='$current_date'");
                                         foreach($fetch1 as $category) {
                                          $startPrice=$category['subcategory_price'];
                                          echo $category['subcategory_name'].' - '. $category['subcategory_price'];

                                         }
                                         echo "<br>";
                                         $fetch2=mysqli_query($con,"select * from tbl_checkout,tbl_subcategory where tbl_checkout.maincourse_id =tbl_subcategory.subcategory_id and tbl_checkout.register_email='$mail'and date='$current_date'");
                                         foreach($fetch2 as $category) {
                                          $mainPrice=$category['subcategory_price'];
                                          echo $category['subcategory_name'].' - '. $category['subcategory_price'];
                                         }
                                         echo "<br>";
                                          $fetch3=mysqli_query($con,"select * from tbl_checkout,tbl_subcategory where tbl_checkout.desert_id =tbl_subcategory.subcategory_id and tbl_checkout.register_email='$mail' and date='$current_date'");
                                         foreach($fetch3 as $category) {
                                          $desertPrice=$category['subcategory_price'];
                                           echo $category['subcategory_name'].' - '. $category['subcategory_price'];
                                         }
                                         ?>
                                       </div>
                                       <div  class="float-chart" style="padding: 0px; position: relative;">
                                        Total :
                                         <?php
                                         $total=$startPrice+$mainPrice+$desertPrice;

                                           $fetch3=mysqli_query($con,"select * from tbl_checkout,tbl_subcategory where tbl_checkout.desert_id =tbl_subcategory.subcategory_id and tbl_checkout.register_email='$mail' and date='$current_date'");
                                         foreach($fetch3 as $category) {
                                          $no=$category['no.of.persons'];
                                           echo $no."Person"." * ".$total."Rs"." =₹ ";
                                            echo $no * $total."<br>";
                                         }
                                        ?>
                                      </div>
                                    </div><!-- /.card -->
                                  </div>
                                  <div class="col-75">
                                  </div>
                                </div>

								
                                  <?php 
                                  echo "10% payment in advance";
                                  ?>
                                <div class="row">
                                  <?php
                                  $tot=$no * $total;
                                  $per=$tot * 10 / 100;
                                  ?>
								   <input type="text" name="total" id="total" value="<?php  echo $per;?>" hidden>
                                  <input type="submit" name="payment" id="payment" value="Pay Amount :₹ <?php  echo $per;?>">
                                </div>
					
								
                              </form>
						
                            </div>       


<?php

//code payment

if(isset($_POST["payment"]))
{
	
$ctype=$_POST["ctype"];
$name_on_card=$_POST["name_on_card"];
$cnumber=$_POST["cnumber"];
$cvv=$_POST["cvv"];
$edate=$_POST["edate"];
$total=$_POST["total"];
$check_out_id=$_SESSION['checkout_id'];

$d_bank_info=mysqli_query($con,"SELECT * FROM `tbl_bank` WHERE `register_email`='$mail' and `card_type`='$ctype' and `name_on_card`='$name_on_card' and `card_number`='$cnumber' and `cvv`='$cvv' and `expiry_date`='$edate'");

//$row=mysqli_fetch_array($d_del_adrs);

$rowcount = mysqli_num_rows($d_bank_info); 


	if($rowcount==0)
	{
						

	echo "<script>
	alert('Invalid Card details');
	window.location='payment.php';
		</script>";

	}
	else
		
		{
			$row_customer=mysqli_fetch_array($d_bank_info);
			$old_balance=$row_customer['balance'];
	
		
			if($old_balance<$total)
				{
					echo "<script>
															alert('Insufficient Balance in your card');
															window.location='payment.php';
															</script>";
				}
				else
					{

					$new_balance=$old_balance-$total;

					$sql2=mysqli_query($con,"UPDATE `tbl_bank` SET `balance`=$new_balance WHERE  CVV='$cvv' and `register_email`='$mail' and `card_type`='$ctype'");			

					if($sql2)
							{
							$admin_bank_info=mysqli_query($con,"SELECT * FROM `tbl_bank` WHERE `register_email`='admin@gmail.com'");
							$row_admin=mysqli_fetch_array($admin_bank_info);
							$admin_old_bal=$row_admin['balance'];
							$admin_new_bal=$admin_old_bal+$total;

							$sql3=mysqli_query($con,"UPDATE `tbl_bank` SET `balance`=$admin_new_bal WHERE `register_email`='admin@gmail.com' ");

							if($sql3)
									{
										$sql4=mysqli_query($con,"UPDATE `tbl_booking_order` SET `status`='PAID' WHERE `check_out_id`=$check_out_id");
										
												if($sql4)
																
																{
																echo "<script>
																			alert('Order placed successfully');
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
}

//end payment


?>

							
                            <!-- <canvas id="TrafficChart"></canvas>   -->
                            <div id="traffic-chart" class="traffic-chart"></div>
                          </div>
                        </div>
                        <div class="col-lg-4">
                          <div class="card-body">




                          </div> <!-- /.card-body -->
                        </div>
                      </div> <!-- /.row -->
                      <div class="card-body"></div>
                    </div>
                  </div><!-- /# column -->
                </div>
                <!--  /Traffic -->
                <div class="clearfix"></div>
                <!-- Orders -->
                <div class="orders">
                  <div class="row">
                    <div class="col-xl-8">
                     <!-- /.card -->
                   </div>  <!-- /.col-lg-8 -->

                    <!-- /.col-md-4 -->
                </div>
              </div>
              <!-- /.orders -->
              <!-- To Do and Live Chat -->
              <div class="row">
              </div>
            </div> <!-- /.card-body -->
          </div><!-- /.card -->
        </div>

      </div>
      <!-- /To Do and Live Chat -->
      <!-- Calender Chart Weather  -->
      <div class="row">
       

      

      </div>
      <!-- /Calender Chart Weather -->
      <!-- Modal - Calendar - Add New Event -->

      <!-- /#event-modal -->
      <!-- Modal - Calendar - Add Category -->
      <div class="modal fade none-border" id="add-category">
        <div class="modal-dialog">

        </div>
      </div>
      <!-- /#add-category -->
    </div>
    <!-- .animated -->
  </div>
  <!-- /.content -->
  <div class="clearfix"></div>
  <!-- Footer -->
  <footer class="site-footer">
    <div class="footer-inner bg-white">
      <div class="row">
        <div class="col-sm-6">
          Copyright &copy; 2018 Ela Admin
        </div>
        <div class="col-sm-6 text-right">
          Designed by <a href="https://colorlib.com">Colorlib</a>
        </div>
      </div>
    </div>
  </footer>
  <!-- /.site-footer -->
</div>
<!-- /#right-panel -->

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
<script src="assets/js/main.js"></script>

<!--  Chart js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script>

<!--Chartist Chart-->
<script src="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartist-plugin-legend@0.6.2/chartist-plugin-legend.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/jquery.flot@0.8.3/jquery.flot.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flot-pie@1.0.0/src/jquery.flot.pie.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flot-spline@0.0.1/js/jquery.flot.spline.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/simpleweather@3.1.0/jquery.simpleWeather.min.js"></script>
<script src="assets/js/init/weather-init.js"></script>

<script src="https://cdn.jsdelivr.net/npm/moment@2.22.2/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script>
<script src="assets/js/init/fullcalendar-init.js"></script>

<!--Local Stuff-->
<script>
  jQuery(document).ready(function($) {
    "use strict";

            // Pie chart flotPie1
            var piedata = [
            { label: "Desktop visits", data: [[1,32]], color: '#5c6bc0'},
            { label: "Tab visits", data: [[1,33]], color: '#ef5350'},
            { label: "Mobile visits", data: [[1,35]], color: '#66bb6a'}
            ];

            $.plot('#flotPie1', piedata, {
              series: {
                pie: {
                  show: true,
                  radius: 1,
                  innerRadius: 0.65,
                  label: {
                    show: true,
                    radius: 2/3,
                    threshold: 1
                  },
                  stroke: {
                    width: 0
                  }
                }
              },
              grid: {
                hoverable: true,
                clickable: true
              }
            });
            // Pie chart flotPie1  End
            // cellPaiChart
            var cellPaiChart = [
            { label: "Direct Sell", data: [[1,65]], color: '#5b83de'},
            { label: "Channel Sell", data: [[1,35]], color: '#00bfa5'}
            ];
            $.plot('#cellPaiChart', cellPaiChart, {
              series: {
                pie: {
                  show: true,
                  stroke: {
                    width: 0
                  }
                }
              },
              legend: {
                show: false
              },grid: {
                hoverable: true,
                clickable: true
              }

            });
            // cellPaiChart End
            // Line Chart  #flotLine5
            var newCust = [[0, 3], [1, 5], [2,4], [3, 7], [4, 9], [5, 3], [6, 6], [7, 4], [8, 10]];

            var plot = $.plot($('#flotLine5'),[{
              data: newCust,
              label: 'New Data Flow',
              color: '#fff'
            }],
            {
              series: {
                lines: {
                  show: true,
                  lineColor: '#fff',
                  lineWidth: 2
                },
                points: {
                  show: true,
                  fill: true,
                  fillColor: "#ffffff",
                  symbol: "circle",
                  radius: 3
                },
                shadowSize: 0
              },
              points: {
                show: true,
              },
              legend: {
                show: false
              },
              grid: {
                show: false
              }
            });
            // Line Chart  #flotLine5 End
            // Traffic Chart using chartist
            if ($('#traffic-chart').length) {
              var chart = new Chartist.Line('#traffic-chart', {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                series: [
                [0, 18000, 35000,  25000,  22000,  0],
                [0, 33000, 15000,  20000,  15000,  300],
                [0, 15000, 28000,  15000,  30000,  5000]
                ]
              }, {
                low: 0,
                showArea: true,
                showLine: false,
                showPoint: false,
                fullWidth: true,
                axisX: {
                  showGrid: true
                }
              });

              chart.on('draw', function(data) {
                if(data.type === 'line' || data.type === 'area') {
                  data.element.animate({
                    d: {
                      begin: 2000 * data.index,
                      dur: 2000,
                      from: data.path.clone().scale(1, 0).translate(0, data.chartRect.height()).stringify(),
                      to: data.path.clone().stringify(),
                      easing: Chartist.Svg.Easing.easeOutQuint
                    }
                  });
                }
              });
            }
            // Traffic Chart using chartist End
            //Traffic chart chart-js
            if ($('#TrafficChart').length) {
              var ctx = document.getElementById( "TrafficChart" );
              ctx.height = 150;
              var myChart = new Chart( ctx, {
                type: 'line',
                data: {
                  labels: [ "Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul" ],
                  datasets: [
                  {
                    label: "Visit",
                    borderColor: "rgba(4, 73, 203,.09)",
                    borderWidth: "1",
                    backgroundColor: "rgba(4, 73, 203,.5)",
                    data: [ 0, 2900, 5000, 3300, 6000, 3250, 0 ]
                  },
                  {
                    label: "Bounce",
                    borderColor: "rgba(245, 23, 66, 0.9)",
                    borderWidth: "1",
                    backgroundColor: "rgba(245, 23, 66,.5)",
                    pointHighlightStroke: "rgba(245, 23, 66,.5)",
                    data: [ 0, 4200, 4500, 1600, 4200, 1500, 4000 ]
                  },
                  {
                    label: "Targeted",
                    borderColor: "rgba(40, 169, 46, 0.9)",
                    borderWidth: "1",
                    backgroundColor: "rgba(40, 169, 46, .5)",
                    pointHighlightStroke: "rgba(40, 169, 46,.5)",
                    data: [1000, 5200, 3600, 2600, 4200, 5300, 0 ]
                  }
                  ]
                },
                options: {
                  responsive: true,
                  tooltips: {
                    mode: 'index',
                    intersect: false
                  },
                  hover: {
                    mode: 'nearest',
                    intersect: true
                  }

                }
              } );
            }
            //Traffic chart chart-js  End
            // Bar Chart #flotBarChart
            $.plot("#flotBarChart", [{
              data: [[0, 18], [2, 8], [4, 5], [6, 13],[8,5], [10,7],[12,4], [14,6],[16,15], [18, 9],[20,17], [22,7],[24,4], [26,9],[28,11]],
              bars: {
                show: true,
                lineWidth: 0,
                fillColor: '#ffffff8a'
              }
            }], {
              grid: {
                show: false
              }
            });
            // Bar Chart #flotBarChart End
          });
        </script>
      </body>
      </html>
    <?php }


    else{

      header("location:../login.php");

    }

    ?>