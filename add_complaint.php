<?php
@ob_start();
session_start();
if(isset($_SESSION['alogin'])){
$mail=$_SESSION['alogin'];

include 'new_connection.php';
//$con=mysqli_connect("localhost","root","","db_dreams_project")or die ("Couldn't connect");

$disp="SELECT  tbl_login.register_email, tbl_registration.user_type_id,tbl_registration.fname,tbl_registration.lname,tbl_registration.mobile_num FROM tbl_login INNER JOIN  tbl_registration
ON tbl_login.register_email=tbl_registration.register_email WHERE  tbl_login.register_email='$mail'";

$disp_result=mysqli_query($con,$disp);
//$disp_user_type="Select user_type_id from tbl_registeration ";

	
	$customer_order_id=$_GET['customer_order_id'];
	$_SESSION['customer_order_id']=$customer_order_id;
	
	
	
	
	$viewprod="SELECT tbl_customer_order.customer_order_id,tbl_customer_order.register_email as cust_email, tbl_customer_order.stock_product_id as cust_product_id,tbl_seller_stock.stock_product_id as seller_prod_id ,tbl_seller_stock.seller_profile_brand_id, tbl_seller_profile_brand.brand_name,tbl_seller_profile_brand.register_email as seller_email, tbl_seller_stock.product_name,tbl_seller_stock.img1, tbl_customer_order.purchase_qty,tbl_customer_order.purchase_price,tbl_customer_order.order_date,tbl_customer_order.status
from tbl_customer_order,tbl_seller_stock INNER JOIN tbl_seller_profile_brand on tbl_seller_stock.seller_profile_brand_id=tbl_seller_profile_brand.seller_profile_brand_id WHERE tbl_seller_stock.stock_product_id=tbl_customer_order.stock_product_id and tbl_customer_order.register_email='$mail' and tbl_customer_order.customer_order_id='$customer_order_id'";

//"SELECT * FROM((tbl_seller_stock INNER JOIN tbl_seller_profile_brand ON tbl_seller_stock.seller_profile_brand_id = tbl_seller_profile_brand.seller_profile_brand_id) )INNER JOIN tbl_customer_order ON tbl_customer_order.stock_product_id=tbl_seller_stock.stock_product_id WHERE tbl_customer_order.register_email='$mail'   ";

$d_seller_prod=mysqli_query($con,$viewprod);



$prod=mysqli_fetch_array($d_seller_prod);

$prod_brand=$prod['brand_name'] ;
$prod_name=$prod['product_name'];
	$seller_email=	$prod['seller_email'];
	

?>
<!DOCTYPE html>
<html>
<head>
<title>Dreams|Customer update Profile</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Grocery Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- font-awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet" type="text/css" media="all" /> 
<!-- //font-awesome icons -->
<!-- js -->
<script src="js/jquery-1.11.1.min.js"></script>
<!-- //js -->
<link href='//fonts.googleapis.com/css?family=Ubuntu:400,300,300italic,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>

<!-- set data -->

<script>

function setdata(email,user_type_id,fname,lname,mobile_num)
{
	
	document.getElementById('fname').innerHTML="hello";
	//email,user_type_id,fname,lname,mobile_num
	
}


</script>


<style>
	
	.errmessage
		{
			color:red;
			}
	</style>


<link href="css/style_a.css" rel="stylesheet" type="text/css" media="all" />
</head>
	
<body>
<!-- header -->
			<?php include 'customer_top_nav.php';?>
		<!--top nav end--> 
		<div class="clearfix"> </div>
	</div>
<!-- script-for sticky-nav -->
	<script>
	$(document).ready(function() {
		 var navoffeset=$(".agileits_header").offset().top;
		 $(window).scroll(function(){
			var scrollpos=$(window).scrollTop(); 
			if(scrollpos >=navoffeset){
				$(".agileits_header").addClass("fixed");
			}else{
				$(".agileits_header").removeClass("fixed");
			}
		 });
		 
	});
	</script>

<!-- //header -->

<!-- banner -->
	</br>
    </br>
	<div class="banner">
	
	<?php include 'customer_side_nav.php'; ?>
	
	<!--side nav end-->
		<div class="w3l_banner_nav_right">
	


			<!-- update profile -->
		
			<div class="w3_login_module">
			
				<div class="module form-module">
				 
				  <div class="form">
					
				  </div>
				  <div class="form">
					<h2>Add a Written Complaint</h2>
					<form  action="add_complaint_action.php"  id="update" method="POST" name="update" >  
							
							
							
						<input type="text" id="prod_brand" name="prod_brand" value="Brand name : <?php echo $prod_brand ;?>" disabled>
						<input type="text" id="prod_name" name="prod_name" value="Product name : <?php echo $prod_name ;?>" disabled>
						<input type="text" id="seller_mail" name="seller_mail" value="Seller's mail id : <?php echo $seller_email ;?>" disabled>
					
							</br>
							
							
							<script>
					
							function checkComplaint()
									{
										alert('hiii');
										var expr=/^[^-\s][a-zA-Z0-9_\s-]+$/;
									var letters = /\d{1,5}\s\w.\s(\b\w*\b\s){1,2}\w*\/;
								
									var fnamevalue=document.getElementById("complaint").value;
									//document.getElementById('errornamec').innerHTML=fnamevalue;
									
									if (fnamevalue==null || update.complaint.value.length==0)
									{
									document.getElementById('errornamec').innerHTML="Mandatory Field!";
	
									}
									else if(document.getElementById("complaint").value.match(letters))
									{
									document.getElementById('errornamec').innerHTML="";

									}
									
									else if(document.getElementById("complaint").value.match(expr))
									{
									document.getElementById('errornamec').innerHTML="";

									}

									else
									{
										
									document.getElementById('errornamec').innerHTML="Information entered is incorrectly formatted!";
									document.getElementById('complaint').value = ""; 
									}

									}
					
					</script>
							
					 <textarea name="complaint" id="complaint" pattern="^[^-\s][a-zA-Z0-9_\s-]+$" onchange="checkComplaint()"  style="width:320px" required></textarea>
					<span id="errornamec" class="errmessage"></span>	

					

					
					
					<input type="submit" value="Send Complaint" name="submitd" onclick="checkComplaint()" id="submitd"  >
					</form>
					
					

					
					
					
					
					
					
					
					</br>
					</br>
					
				  </div>
				  <div class="cta"></div>
				</div>
			</div>
			<script>
				$('.toggle').click(function(){
				  // Switches the Icon
				  $(this).children('i').toggleClass('fa-pencil');
				  // Switches the forms  
				  $('.form').animate({
					height: "toggle",
					'padding-top': 'toggle',
					'padding-bottom': 'toggle',
					opacity: "toggle"
				  }, "slow");
				});
			</script>
	
<!-- //login -->
			
		</div>
		<div class="clearfix"></div>
	</div>
<!-- banner -->
	<div class="banner_bottom">
			<div class="wthree_banner_bottom_left_grid_sub">
			</div>
			
			<div class="clearfix"> </div>
	</div>
<!-- top-brands -->
<!--
	
	
	-->
<!-- //top-brands -->
<!-- fresh-vegetables -->

<!-- footer -->
<?php include 'customer_footer_nav.php'; ?>
<!-- //footer -->
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
    $(".dropdown").hover(            
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideDown("fast");
            $(this).toggleClass('open');        
        },
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideUp("fast");
            $(this).toggleClass('open');       
        }
    );
});
</script>
<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
<!-- //here ends scrolling icon -->
<script src="js/minicart.js"></script>
<script>
		paypal.minicart.render();

		paypal.minicart.cart.on('checkout', function (evt) {
			var items = this.items(),
				len = items.length,
				total = 0,
				i;

			// Count the number of each item in the cart
			for (i = 0; i < len; i++) {
				total += items[i].get('quantity');
			}

			if (total < 3) {
				alert('The minimum order quantity is 3. Please add more to your shopping cart before checking out');
				evt.preventDefault();
			}
		});

	</script>
</body>
</html>



<?php }
else{
header("Location:login.php");
} ?>