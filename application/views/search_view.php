<!DOCTYPE html>
<html lang="en">
	<!-- load the scripts,jquery,javascript,bootstrap and stylesheets -->
<head>
	<title>Search Flights</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<script src="<?php echo base_url();?>js/jquery-3.2.1.min.js"></script>
    <script src="<?php echo base_url();?>js/jquery.min.js"></script>
    <script src="<?php echo base_url();?>js/jquery.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<!-- load images for slideshow in background -->
<script>
	var image1=new Image(); //creating image object
	image1.src="<?php echo base_url();?>images/flightinair.jpg"; //setting up the link of the images
	var image2=new Image();
	image2.src="<?php echo base_url();?>images/lufthansa.jpg";
	var image3=new Image();
	image3.src="<?php echo base_url();?>images/sunsetflight.jpg";
	var image4=new Image();
	image4.src="<?php echo base_url();?>images/uplifting.jpg";
	var image5=new Image();
	image5.src="<?php echo base_url();?>images/window.jpg";
</script>

<body>
	
		<div class="slider">
			<div class="load">
				<img src="" name="slide">
				<div class="overlay">
					<!-- form to set action to redirect another page which display details of flights -->
					<form action="<?php echo base_url();?>search/details" method="POST"> 
					<div class="principal">
						<div class="row">
							<div class="col-md-6 label1">
								<!-- Source city entry and drop down box for selecting source city -->
								<div class="entry">
									<input type="text" id="sourcecity" placeholder="From: City" list="list" name="source" autocomplete="off" required>
									<!-- drop down list of cities-->
									<datalist id="list" type="text" class="form-control fip"   name='source' style="display:none;">
										<?php
										foreach($airports as $row)
										{ 
										echo '<option value="'.$row->city.'" name="source">'.$row->city.'</option>';
										}
										?>
									</datalist>
								</div>
							</div>
							<div class="col-md-6 label1">
								<div class="entry">
									<!-- Entery for destination-->
									<input type="text" placeholder="To: City" list="list2" name="destination" autocomplete="off" required>
									<datalist id="list2" type="text" class="form-control fip destinationcity"   name='source' style="display:none;" require>
										
									</datalist>
								</div>
							</div>
							
						</div>
						<div class="row">
							<div class="col-md-6 label1 bellow">
								<!-- Date of journery selection-->
								<span>Date</span>
								<div class="entry"><input  type="date" name="date" required></div>
							</div>
							<div class="col-md-6 label1 bellow">
								<!-- select number of passengers-->
								<span>Passengers<span>
								<div class="entry passengers"><input size="5" type="number" name="passengers" value="1" required></div>
							</div>
						</div>
						<div calss="search">
							<!-- Button to submit the requirements to load the details of flights-->
							<input type="submit" class="btn btn-warning" style="font-size:20px;" val="Search">
						</div>
					</div>
					</form>
				</div>
			</div>
		</div>
	
	<script>
		//ajax call for dynamic load of destination dropdown list to prevent source city to appear 
		$(document).ready(function(){
			//select the source city element by id and changing the values of destination dropdown list by on-change function
			$("#sourcecity").on('change',function(){
				var city=$(this).val(); //selecting the source city
				if(city){
						//ajax call 
						$.ajax({
							url:"<?php echo base_url();?>search/destination",
							type:"POST", 
							async:true, //making async true to continue without waiting for the result
							data:{'city':city}, //assining the source city value to city variable and creating object to store it
							//success function is used to display the result data in the perticular element
							success:function(data){
								$('.destinationcity').html(data);
							},
							error:function(data){
								alert('error occured...!');
							},
						}); 
					}
					else{
						$('.destinationcity').html('<option>select destination</option>');
					}
			});
		});
	</script>

	<script>
		//Slideshow of images step by step 
		var step=1;
		function slideit(){
			document.images.slide.src=eval("image"+step+".src"); //selecting the image link and assining to img tag
			if(step<5)
			step++
			else
			step=1
			setTimeout("slideit()",2500); //time to change the image by calling the fuction again and again
		}
		slideit(); //calling the function to start the image slideshow
	</script>
</body>
</html>