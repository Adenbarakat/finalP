<!DOCTYPE html>
<?php include('menu.php') ?>

<html lang="en">
<head>
	 <style>
.geometric-box .geometric-box-content {
    position: absolute;
    top: 5%;
    left: 5%;
    width: 90%;
    height: 90%;
}

.geometric-box .geometric-box-content .geometric-bottom-desc {
    position: absolute;
    bottom: 5%;
    left: 5%;
    width: 90%;
    height: auto;
    transform: scale(0);
    transition: all 0.5s ease;
    font-family: Calibri Light;
    font-weight: doubleval;
    font-size: 18px;
    text-align: right;
}

/*sentences color and design in pictuers*/
.geometric-box .geometric-box-content .geometric-bottom-desc .geometric-title {
    font-family: Calibri Light;
    font-weight: normal;
    font-size: 30px;
    text-transform: uppercase;
    text-decoration: none;
    text-align: center;
    letter-spacing: 1px;
    color: #B8860B;
}

/*white background in pictures*/
.geometric-box:hover img {
    opacity: 0.3;
}
/* sentences design*/
.geometric-box:hover .geometric-box-content .geometric-bottom-desc {
    transform: scale(1);
}

/* title design*/
.myH2 {
    text-align: center;
    color: #B8860B;
    padding-left: 15%;
    padding-right: 15%;
    font-size: 28px;
    font-family: Calibri Light;
    color: #B8860B;
}

.container {
    padding: 10%;
}

/*background  page*/
body {
    background-image: url("img/white2.png");
    background-size: cover;
    background-repeat: no-repeat;
}

    </style>
</head>
<body>	
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<div class="container">
	<h2 class="myH2">our jounrey of interor design 

</h2><br>
			<div class="col-12 big-wrap mx-auto p-3">
				<div class="row mx-auto p-0">
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 mx-auto p-3">
						<div class="geometric-box">
							<img src="img\oo.jpg">
							<div class="geometric-box-content">
								<div class="geometric-bottom-desc">
									<div class="geometric-title">
                                   our first project
									</div>
							</div>
						</div>
					</div>
					<br><br><br>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 mx-auto p-3">
						<div class="geometric-box">
							<img src="img\11.jpg">
							<div class="geometric-box-content">
								<div class="geometric-bottom-desc">
									<div class="geometric-title">
                                     our first bedroom project
									</div>
								</div>
							</div>
						</div>
					</div>
					<br><br><br>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 mx-auto p-3">
						<div class="geometric-box">
							<img src="img\מטבח שחור.jpg">
							<div class="geometric-box-content">
								<div class="geometric-bottom-desc">
									<div class="geometric-title">
									our first kitchen project
									 </div>
								</div>
							</div>
						</div>
					</div>
					<br><br><br>
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 mx-auto p-3">
						<div class="geometric-box">
							<img src="img\ll.jpg">
							<div class="geometric-box-content">
								<div class="geometric-bottom-desc">
									<div class="geometric-title">
									one of our latest projects								</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
	</div>
	<br><br><br>
    

</body>
</html>