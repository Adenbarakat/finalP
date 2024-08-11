
<?php include('menu.php') ?>

<html lang="en">
	
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
	

    <style>
body {
	background-image:url('img/body6.jpg');
	background-attachment:fixed;
    background-size:100% 100%;
	

}

.affix {
	padding: 0;
	background-color: #111;
}

.myH2 {
    font-family:Calibri Light;   

	text-align: center;
	font-size: 3rem;
    color:#AA7F2A;
}
.myP {
	text-align: justify;
	padding-left: 15%;
	padding-right: 15%;
	font-size: 25px;
    font-family:Calibri Light;
    text-align:right;


}
.item{
    left: 0;
    top: 0;
    overflow: hidden;
    margin-top:5px;
    
}
.item img{
    -webkit-transition: 0.6s ease;
      transition: 0.6s ease;
      
}
.item img:hover{
    -webkit-transform: scale(1.2);
      transform: scale(1.2);

}
.img-thumbnail{
    border:0px;
    border-radius:0px;
}


.container{
	padding: 10%;
}
    </style>

   
</head>
<body>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <div class="container">

    <h2 class="myH2">WELCOME TO RêVES DESIGN
</h2><br>
		
    <?php include('aboutus.php') ?>
<br><br>
<?php include('foter.php') ?>

</body>

</html>