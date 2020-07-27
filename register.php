<?php

// Start the session
session_start();
error_reporting(0);

?>
<!DOCTYPE html>
<html>
<head>
<title>F00D MANAGINGS | SignUp</title>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="css/style.css">
<!--[if IE 8]><link rel="stylesheet" type="text/css" href="css/ie8.css"><![endif]-->
<!--[if IE 7]><link rel="stylesheet" type="text/css" href="css/ie7.css"><![endif]-->
<!--[if IE 6]><link rel="stylesheet" type="text/css" href="css/ie6.css"><![endif]-->
<script>
function checkFName()
{
var letters = /^[a-zA-Z][a-zA-Z\\s]+$/;


if(document.getElementById('firstname').value==null || register.firstname.value.length==0)
{
document.getElementById('errorname').innerHTML="Mandatory Field!";

}
else if(document.getElementById('firstname').value.match(letters))
{
document.getElementById('errorname').innerHTML=" ";

}

else
{
	
document.getElementById('errorname').innerHTML="Information entered is incorrectly formatted!";
document.getElementById('firstname').value = " "; 
}

}

	function checkLName()
	{
	var letters = /^[a-zA-Z][a-zA-Z\\s]+$/;


	if(document.getElementById('lastname').value==null || register.lastname.value.length==0)
	{
	document.getElementById('errornameL').innerHTML="Mandatory Field!";

	}
	else if(document.getElementById('lastname').value.match(letters))
	{
	document.getElementById('errornameL').innerHTML=" ";
	
	}

	else
	{
	document.getElementById('errornameL').innerHTML="Information entered is incorrectly formatted!";
	document.getElementById('lastname').value = ""; 
	}
	}


	


function checkMob() { 
                var mobnum = document.getElementById("phoneno").value;
		///^([+]\d{2})?\d{10}$/
		//   /^\d{10}$/
		var phoneno =/^(?!(\d)\1{9})(?!0123456789|1234567890|0987654321)\d{10}$/ ;
                if(document.getElementById("phoneno").value==null ||register.phoneno.value.length==0)
	{
	document.getElementById("errormob").innerHTML="Mandatory Field!";
	
	}


	else if(document.getElementById('phoneno').value.match(phoneno))
	{
		
		if(document.getElementById("phoneno").value=='0000000000')
		{
			document.getElementById("errormob").innerHTML="Please enter a valid Mobile number";
			document.getElementById("phoneno").value="";
		}
		else
		document.getElementById('errormob').innerHTML=" ";
	
	}

	else
	{
	document.getElementById('errormob').innerHTML="Please enter a valid Mobile number";
	document.getElementById("phoneno").value="";
	}
            }



function checkemail()

{

var mailformat1 = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
var mailformat=/^([a-z0-9_\-\.]+)@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/;   //only small letters

var email = document.getElementById("email").value;
		
if(document.getElementById("email").value==null ||register.email.value.length==0)
	{
	document.getElementById("erroremail").innerHTML="Mandatory Field!";

	}

else if(document.getElementById("email").value.match(mailformat))
	{
	document.getElementById("erroremail").innerHTML=" ";
	
	}

	else
	{
	document.getElementById('erroremail').innerHTML="Please enter a valid E-Mail ID";
	document.getElementById("email").value="" ;
	}

}

function checkpassword()

{

var passw=/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;

		
if(document.getElementById("password").value==null ||register.password.value.length==0)
	{
	document.getElementById("errorpswrd").innerHTML="Mandatory Field!";

	}

else if(document.getElementById("password").value.match(passw))
	{
	document.getElementById("errorpswrd").innerHTML=" ";
	
	}

	else
	{
	document.getElementById('errorpswrd').innerHTML="Please enter a valid password";
	   alert(' Your password should be 8 to 20 characters which contain at least one lowercase letter, one uppercase letter, one numeric digit, and one special character');
	   document.getElementById("password").value="";
	   
		}

}

function checkCpasswords()

{

var passw=/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;
var passwrd=document.getElementById("password").value;
var cpasswrd=document.getElementById("confirmpass").value;

		
if(document.getElementById("confirmpass").value==null ||register.confirmpass.value.length==0)
	{
	document.getElementById("errorCpswrd").innerHTML="Mandatory Field!";

	}

else if(document.getElementById("confirmpass").value.match(passw))
	{
	document.getElementById("errorCpswrd").innerHTML=" ";
	
			if(passwrd==confirmpass)
						{ 	document.getElementById("errorCpswrd").innerHTML=" ";
						
							}
						else{
						document.getElementById("errorCpswrd").innerHTML="";
							document.getElementById("confirmpass").value="";
						}
	}

	else
	{
	document.getElementById('errorCpswrd').innerHTML="Password and confirm password should be valid and  same";
	document.getElementById("confirmpass").value="";
	 }

}

	</script>
<!-- start-smoth-scrolling -->





<style>
	
	.errmessage
		{
			color:red;
			}
	</style>




<style>
input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
</style>

</head>
<body>
<div id="header">
  <div>
    <div>
      <div id="logo"> <a href="#"><img src="" alt=""></a> </div>
      <div>
        <div> <a href="register.php">My Account</a> <a href="index.php">Home</a> <a href="login.php" class="last">Sign in</a> </div>
        <form action="#">
          
        </form>
      </div>
    </div>
    <ul>
      <li><a href="#"></a></li>
      <li><a href="#"></a></li>
      <li><a href="#"></a></li>
    </ul>
   
  </div>
</div>
<div id="content">
  <div>
    <div id="account">
      <div>
        <form action="success_register.php" method="POST" id="register" name="register">
          <span>SIGN-UP</span>
          <table>
            <tr>
              <td><label for="firstname">firstname</label></td>
              <td><input type="text" name="firstname" id="firstname" placeholder="First Name" style= "width:70%" onblur="checkFName()" required>
			   <p id="errorname" class="errmessage">    </p>
			  </td>
            </tr>
			 <tr>
              <td><label for="lastname">lastname</label></td>
              <td><input type="text" name="lastname" id="lastname" placeholder="Last Name" onblur="checkLName()"style= "width:70%" required>
			  </br><span id="errornameL" class="errmessage" >    </span>
			 </td>
            </tr>
            <tr>
             <td><label for="name">Email</label></td>
              <td><input type="text"name="email" id="email" placeholder="Email" onblur="checkemail()"  required>
			  </br><span id="erroremail"class="errmessage"> </span>
			  </td>
		
            </tr>
            <tr>
              <td><label for="password">Password</label></td>
              <td><input type="password" name="password" id="password" placeholder="Password"onblur="checkpassword()"  required>
			   <span id="errorpswrd"class="errmessage" >    </span>
			  </td>
            </tr>
            <tr>
              <td><label for="confirmpass">Confirm<br>
                  Password</label></td>
              <td><input type="password" name="confirmpass" id="confirmpass" onblur="checkCpassword()"placeholder="Confirm Password" required>
			  <span id="errorCpswrd"class="errmessage" >    </span>
			  </td>
            </tr>
			<tr>
              <td><label for="Phoneno">Phoneno</label></td>
              <td><input type="text" id="phoneno" name="phoneno"  placeholder="Phone number"style= "width:70%" onblur="checkMob()" required>
			  </br> <span id="errormob" class="errmessage" >    </span>
			</td>
            </tr>
            
          </table>
          <input type="submit" name="submit1" id="submit1" value="Sign-up" class="submitbtn">
        </form>
      </div>
    </div>
  </div>
</div>
<div id="footer">
  <div class="section">
    <div>
      <div class="aside">
        <div>
          <div> <a href="signin.html">Sign up for free</a>
          </div>
        </div>
      </div>
      <div class="connect"> <span>Follow Us</span>
        <ul>
          <li><a href="#" class="facebook">Facebook</a></li>
          <li><a href="#" class="twitter">Twitter</a></li>
          <li><a href="#" class="subscribe">Subscribe</a></li>
          <li><a href="#" class="flicker">Flicker</a></li>
        </ul>
      </div>
    </div>
  </div>
 

  <div id="navigation">
    <div>
      <ul>
        <li class="first"><a href="#">help</a></li>
        <li><a href="#">about cake delight</a></li>
        <li><a href="#">cake delight talk</a></li>
        <li><a href="#">developers</a></li>
        <li><a href="#">privacy policy</a></li>
        <li><a href="#">terms of use</a></li>
      </ul>
      <p>Copyright &copy; 2012 <a href="#">Domain Name</a> All rights reserved | Website Template By <a target="_blank" href="http://www.freewebsitetemplates.com/">freewebsitetemplates.com</a></p>
    </div>
  </div>
</div>
</body>
</html>
<?php
if(isset($_SESSION['page1'])){
	
session_unset();
session_destroy();
header("location:login.php");
exit();

}

?>
