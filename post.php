<?php

	//if upload button is pressed
if(isset($_POST['upload'])) {
	//the path to store the uploaded image
	$target = "uploads/".basename($_FILES['image']['name']);

	//connect to the db
	//host name - localhost
	//db name - id16097853_funclub
	//username - id16097853_funclub883
	//password - Funclubwebsite@883
	$db = mysqli_connect("localhost", "id16097853_funclub883", "Funclubwebsite@883", "id16097853_funclub");
	//$db = mysqli_connect("localhost", "root", "", "funclubsite");
	//get all the submitted data from the form
	$image = $_FILES['image']['name'];
	$text = $_POST['text'];
	$name = $_POST['name'];

	$sql = "INSERT INTO post (image, text, name) VALUES ('$image', '$text', '$name')";
	//stores the submitted data into db table:images
	mysqli_query($db, $sql);

	//now let's move the uploaded image into the folder :uploads
	if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
		$msg = "Image uploaded successfully!";
	} else {
		$msg = "There was a problem uploading image";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

	<!-- font awesome -->
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.css">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.css">

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>

    <script src="http://malsup.github.com/jquery.cycle2.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js"></script>

	<link rel="icon" href="images/logo.png" />
	
	<title>FunClub - Post</title>
	<style type="text/css">
		.box {
			width: 100%;
			max-width: 100%;
			height: 350px;
			padding: 20px;
		}
		#img_div{
		    width: 70%;
		    height: 60%;
		    padding: 10px;
		    margin-top: 40px;
		    margin-left: 15%;
		    margin-bottom: 50px;
		    border: 1px solid #cbcbcb;
	   	}
	   	#img_div:after{
		    content: "";
		    display: block;
		    clear: both;
	   	}
	   	.status{
	   		text-align: center;
	   	}
	   	.name {
	   		text-transform: uppercase;
	   		text-align: center;
	   		margin-top: 20px;
	   	}
	   	#img_div img{
		    box-shadow: 5px 5px 5px 5px black;
		    float: left;
		    margin: 5px;
		    height: auto;
			text-align: center;
			width: 200px;
			max-width: 40%;
			padding: 10px;
		}
		.underline {
	        width: 100px;
	        height: 2px;
	        background-color: orangered;
      	}
		/* social media icons */
		.icon i {
	    	color: #fff;
	    	font-size: 30px;
	    	margin: 10px;
	    	padding-top: 10px;
	    }
	    /* help button */
	    .open-button {
		    background-color: #fff;
		    color: #000;
		    padding: 16px 20px;
		    border: none;
		    cursor: pointer;
		    opacity: 0.8;
		    position: fixed;		    
		    bottom: 23px;
		    right: 28px;
		    width: 100px;
		    height: 55px;
		    border-radius: 20%;
		  }
		  /* The popup form - hidden by default */
		  .form-popup {
		    display: none;
		    position: fixed;
		    bottom: 0;
		    right: 15px;
		    border: 3px solid #f1f1f1;
		    z-index: 9;
		  }
		  /* Add styles to the form container */
		  .form-container {
		    max-width: 300px;
		    padding: 10px;
		    background-color:  white;
		   	height: 300px;
		  }
		  /* Full-width input fields */
		  .form-container input[type=text]{
		    width: 100%;
		    padding: 15px;
		    margin: 5px 0 22px 0;
		    border: 2;
		    border-bottom: 2;
		    background: #f1f1f1;
		    border-radius: 4px;
		  }
		  /* When the inputs get focus, do something */
		  .form-container input[type=text]:focus {
		    background-color: #ddd;
		    outline: none;
		  }
		  .heading {
		  	font-family: 'Bree Serif',Serif;
		  	font-weight: 600;
		  	text-align: center;
		  	text-transform: uppercase;
		    color: black;
		    font-size: 25px;
		    margin-top: 30px;
		  }
		  #helpBtn{
		    color: #000;
		    font-size: 20px;
		    font-weight: bold;
		    width: 100px;
		  }
		  /* Add some hover effects to buttons */
		  .form-container .btn:hover, .open-button:hover {
		    opacity: 1;
		}
	</style>
</head>
<body>

	<!-- nav bar -->
	<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
	  	<a class="navbar-brand" href="#">FUNCLUB</a>
	  	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
	    	<span class="navbar-toggler-icon"></span>
	  	</button>
		<div class="collapse navbar-collapse" id="collapsibleNavbar">
		    <ul class="navbar-nav">
		      	<li class="nav-item active"><a href="index.html" class="nav-link"><i class="fas fa-home"></i> Home</a></li>
		      	<li class="nav-item"><a href="#category" class="nav-link"><i class="fas fa-list"></i> Category</a></li>
                <li class="nav-item"><a href="#contact" class="nav-link"><i class="far fa-address-card"></i> Contact Us</a></li> 
		    </ul>
		</div>  
	</nav>

	<!-- posts -->
	<div class="container">
		<div class="box">
			<h4 class="wow fadeInLeft" style="text-transform: uppercase; text-align: center; font-weight: 600;">Posts</h4>
			<center><div class="underline" style="width: 70px;"></div></center>
			<br>
			<p class="text-center" style="font-weight: 500;">Image or post upload here!</p>
			<div class="custom-file">
				<form method="POST" enctype="multipart/form-data">
		  			<div class="form-group">
		    			<input type="file" name="image" class="custom-file-input" id="validatedCustomFile" required>
    					<label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
		  			</div>
			  		<div class="form-group">
			    		<textarea name="text" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Add a Caption...."></textarea>
			  		</div>
			  		<div class="form-group">
			    		<input type="text" name="name" class="form-control" placeholder="Enter Your Name"></textarea>
			  		</div>
			  		<div class="form-group text-center">
			  			<button type="submit" name="upload" class="btn btn-success">Upload</button>
			  			<button type="submit" name="" class="btn btn-secondary" onclick="index()">Back</button>
			  		</div>
			  		<script type="text/javascript">
			  			function index(){
			  				window.open("index.html");
			  			}
			  		</script>
			  	</form>
			</div>
		</div>
	<br>
	<hr>
	<h3 class="text-center wow fadeInRight" style="text-transform: uppercase; font-family: 'Bree Serif', serif; font-weight: 600px;">Your Feed Post</h3>
	<center><div class="underline" style="width: 70px;"></div></center>
	<?php
		$db = mysqli_connect("localhost", "id16097853_funclub883", "Funclubwebsite@883", "id16097853_funclub");
		//$db = mysqli_connect("localhost", "root", "", "funclubsite");
		//$db = mysqli_connect("sql204.epizy.com", "epiz_27867051", "BmEoH9G2asX", "epiz_27867051_funclub");
		$sql = "SELECT * FROM post";
		$result = mysqli_query($db, $sql);
		while ($row = mysqli_fetch_array($result)) {
			echo "<div id='img_div'>";
			echo "<img src='images/".$row['image']."'>";
			?>
			<h3 style="color: black" class="name">
				<?php 
				echo "<p style='text-align: center; font-size: 30px; font-weight: 800; ''>".$row['name']."</p>"; 
				?>
				</h3>
			<h3 style= "color: black;" class="status">
				<?php 
				echo "<p style='text-align: center; font-size: 20px; font-weight: 600; ''>".$row['text']."</p>"; 
				?>
				</h3>
        	<?php
				echo "</div>";
				}
			?>
	</div>
	

	<!-- footer -->
	<footer>
      	<div class="container-fluid pt-5 bg-dark text-light" id="contact">
        	<div class="container">
          		<div class="row">
            		<div class="col-md-5">
              			<div class="row">
                			<h5 class="wow fadeInRight" style="font-family: open-sans;font-weight: 800;font-size: 30px;">FUNCLUB</h5>
              			</div>
              			<div class="row mb-4">
                			<div class="underline" style="width: 50px;">
                			</div>
              			</div>
              			<p class="p-2" style="font-size: 16px; font-weight: bold;">'FUNCLUB' IS A PALTFORM THAT SUPPORT PEOPLE WHO HAVE TALENT AND WERE WAITING FOR THE PUSH. THE FUNCLUB IS OPEN SOURCE WHERE IT GIVES YOU AN OPPORTUNITY TO EXPRESS YOURSELF.</p>
            		</div>
            		<div class="col-md-5 ml-5">
              			<div class="row">
                			<h5 class="wow fadeInRight">FOLLOW US </h5>
              			</div>
              			<div class="row mb-4">
                			<div class="underline" style="width: 50px;"></div>
              			</div>
              			<div class="row">
                			<div class="media-body">
              					<div class="text-center">
              						<div class="text-center icon">
					                	<a href="https://www.facebook.com/funclub.funclub.16/"><i class="fab fa-facebook-square"></i></a>
					                	<a href="https://t.me/funclub883"><i class="fab fa-telegram"></i></a>
					                	<a href="https://www.instagram.com/funclub5969/" target="_blank"><i class="fab fa-instagram"></i></a>
					                	<a href="mailto:funclub883@gmail.com"><i class="far fa-envelope"></i></a>
              						</div>
              					</div>
                			</div>
              			</div>
            		</div>
				<hr class="w-50 pt-4">
          		</div>
        	</div>
      	</div>
      	<div class="container-fluid bg-dark header-top d-none d-md-block">
          	<div class="row text-light pt-2 pb-2">
            	<div class="col-md-12">
              		<center><p class="text-center wow flipInX">© FUNCLUB 2019 - DESIGNED & MAINTAINED BY DMCE STUDENTS</p></center>
            	</div>
          	</div>
        </div>
    </footer>

    <button class="open-button wow bounceInRight" id="helpBtn" onclick="openForm()"><b>HELP?</b> </button>

	  	<div class="form-popup" id="myForm">
	    	<form action="/action_page.php" class="form-container">
			    <h3 class="heading">Leave us a message</h3>
	      		<label for="text" style="margin-top: 20px; text-transform: uppercase;"><b>Enter your message:</b></label>
	      		<textarea name="other" id="other" cols="30" rows="3" placeholder="Write your message..." required="" tabindex="0" style="margin-top: 10px;"> </textarea>
		      	<a href="mailto:funclub883@gmail.com" type="submit" class="btn btn-success sendBtn" style="margin-top: 20px;">Send</a>
		      	<button type="button" class="btn btn-danger cancel cancelBtn" onclick="closeForm()" style="margin-top: 20px;">Cancel</button>
	    	</form>
	  	</div>

    <script>
      // FOR HELP FUNCTION
	    function openForm() {
	      document.getElementById("myForm").style.display = "block";
	    }

	    function closeForm() {
	      document.getElementById("myForm").style.display = "none";
	    }

    	//preloader
    	var preloader = document.getElementById("loading");
    	function myFunction(){
    		preloader.style.display = 'none';
    	};

    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js" integrity="sha512-Eak/29OTpb36LLo2r47IpVzPBLXnAMPAVypbSZiZ4Qkf8p/7S/XRG5xp7OKWPPYfJT6metI+IORkR5G8F900+g==" crossorigin="anonymous"></script>
	<script>

	new WOW().init();

	</script>
    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>