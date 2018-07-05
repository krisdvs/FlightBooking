<!DOCTYPE html>
<html lang="en">
<head>
    <title>Confirmed</title> <!-- Title of the page -->
    <!-- style of the webpage -->
    <style> 
        .centered {
            position: fixed;
            top: 35%;
            left: 50%;
            margin-top: -50px;
            margin-left: -100px;
            text-align:center;
        }
    </style>
</head>
<body>
    <div class="centered">
        <img src="<?php echo base_url();?>images/success.png"> <!-- success image -->
        <h2>Confirmed</h2>
        <form action="<?php echo base_url();?>">
            <button class="btn btn-warning">Book Again</button> <!-- Button to go back to search page -->
        </form>
    </div>
</body>
</html>