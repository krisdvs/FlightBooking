<!DOCTYPE html>
<html lang="en">
    <!-- load the styleshetts,jquery,javascript,bootstrap-->
<head>
	<title>Details</title>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<script src="<?php echo base_url();?>js/jquery-3.2.1.min.js"></script>
    <script src="<?php echo base_url();?>js/jquery.min.js"></script>
    <script src="<?php echo base_url();?>js/jquery.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/station.css">
	<!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>
        //split the elements and and display in the ligthbox
        function clickbutton(id){
            var string=id.split('|'); //.split is used to cut the string with given parameter
            document.getElementById("modalname").innerHTML=string[0]; //settingup the html data to the element by id
            document.getElementById("modalfrom").innerHTML=string[1];
            document.getElementById("modalto").innerHTML=string[2];
            document.getElementById("modalfromtime").innerHTML=string[3];
            document.getElementById("modaltotime").innerHTML=string[4];
             document.getElementById("modalprice").innerHTML=string[7];
             document.getElementById("modalpassengers").innerHTML=string[9];
             document.getElementById("modaldate").innerHTML=string[8];
             //changing thd display mode from none to block to show lightbox
            document.getElementById("simpleModel").style.display="block"; 
        }
        //close the lightbox by clicking X symbol
        function closeModel(){
            document.getElementById("simpleModel").style.display="none";
        }
        //adding the eventlistener to close the lightbox
        window.addEventListener('click',clickoutside);
        //close the lightbox on clicking anywhere outside the lightbox
        function clickoutside(e){
            if(e.target==document.getElementById("simpleModel")){
                document.getElementById("simpleModel").style.display="none";
            }
        }
        //take the values from the elements by id and sending it to php to store the booking imformation 
        //and displaying the success message
        function confirm(){
            var name=document.getElementById("modalname").innerHTML; //accesssing the value of the element
            var from=document.getElementById("modalfrom").innerHTML;
            var to=document.getElementById("modalto").innerHTML;
            var fromtime=document.getElementById("modalfromtime").innerHTML;
            var totime=document.getElementById("modaltotime").innerHTML;
            var price=document.getElementById("modalprice").innerHTML;
            var passengers=document.getElementById("modalpassengers").innerHTML;
             var date=document.getElementById("modaldate").innerHTML;
            var id=name+'|'+from+'|'+to+'|'+passengers+'|'+date; //concating the values to pass to php
            // redirecting to the success display meassage
            window.location.href = "<?php echo base_url();?>search/insert/" + id; 
        
        }
    </script>
</head>
<body>
    <!-- light box design structure-->
    <div id="simpleModel" class="model">
        <div class="modal1-content">
            <span class="closeBtn" onClick="closeModel();">&times;</span><!-- X symbol to close the light box -->
                <div class="row">
                <div class="col-md-6 padd">
                    <span>Name:</span><span id="modalname"></span>
                </div>
                <div class="col-md-6 padd">
                    <span>Price:</span><span id="modalprice"></span>
                </div>
                </div>
                <div class="row">
                <div class="col-md-6 padd">
                    <span>From:</span><span id="modalfrom"></span>
                </div>
                <div class="col-md-6 padd">
                    <span>To:</span><span id="modalto"></span>
                </div>
                </div>
                <div class="row">
                <div class="col-md-6 padd">
                    <span>Departure:</span><span id="modalfromtime"></span>
                </div>
                <div class="col-md-6 padd">
                    <span>Arrival:</span><span id="modaltotime"></span>
                </div>
                </div>
                 <div class="row">
                <div class="col-md-6 padd">
                    <span>Date:</span><span id="modaldate"></span>
                </div>
                <div class="col-md-6 padd">
                    <span>Passengers:</span><span id="modalpassengers"></span>
                </div>
                </div>
                <!-- button to redirect the values and store the booking information-->
                <div><button onClick="confirm();" class="btn btn-warning">Confirm</button></div>
        
        </div>
    </div>
    <!-- Coloumn names -->
    <div>
        <div class=" header container container1">
            <div class="row">
                <div class="col-md-1 labels">
                    <span>Flights</span>
                </div>
                <div class="col-md-2 labels">
                    <span>Names</span>
                </div>
                <div class="col-md-3 labels">
                    <span>Price</span>
                </div>
                <div class="col-md-1 labels">
                    <span>Departure Time</span>
                </div>
                <div class="col-md-1 labels">
                    <span>Arival Time</span>
                </div>
                <div class="col-md-1 labels">
                    <span>Stops</span>
                </div>
                <div class="col-md-1 labels">
                    <span>Total Time</span>
                </div>
            </div>
        </div>
    </div>
    <!-- display the details of the flights -->
     <?php if($details){
    foreach($details as $show){
    ?>
    <div class="container container1">
            <div class="col-md-1 labels">
                <span><image src="<?php echo base_url();?>images/<?php echo $show->name; ?>.png"></span>
            </div>
            <div class="col-md-2 labels" >
                <span><?php echo $show->name; ?></span>
            </div>
            <div class="col-md-3 labels" >
                <span><?php echo ($show->price)*($passengers); ?></span>
            </div>
            <div class="col-md-1 labels" >
                <span><?php echo $show->time_from; ?></span>
            </div>
            <div class="col-md-1 labels" >
                <span><?php echo $show->time_to; ?></span>
            </div>
            <div class="col-md-1 labels" >
                <span><?php echo $show->stops; ?></span>
            </div>
            <div class="col-md-2 labels" >
                <span><?php echo $show->totaltime; ?></span>
            </div>
            <div class="col-md-1 labels" >
                <!-- button to confirm the details  -->
                <button class="btn btn-warning" id="<?php echo $show->name;?>|<?php echo $show->source;?>|<?php echo $show->destination;?>|<?php echo $show->time_from;?>|<?php echo $show->time_to;?>|<?php echo $show->stops;?>|<?php echo $show->totaltime;?>|<?php echo $show->price;?>|<?php echo $date?>|<?php echo $passengers?>" onClick="clickbutton(this.id);">Book</button>   
            </div>
        </div>
    </div>
    <?php }
     }
else{?>
<!-- display no flights when there is no flights in the selected routes-->
        <div class="container container1 error" >
            <div>
                <h2>No Flights Found</h2>
            </div>
        </div>
    <?php }
    ?>
    <div class="start"></div>

    
    
</body>
</html>