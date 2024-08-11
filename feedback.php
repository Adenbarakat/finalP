<!DOCTYPE html>
<?php include('menu.php') ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>feedback</title>
    <style>
   

        .geometric-box {
            position: relative; /* Added to make the text absolute position relative to the box */
            box-shadow: 0px 3px 6px #B8860B;
            background-color: #FFFFFF;
			height: 700px; /* Fixed height for all boxes */
            overflow: hidden; /* Ensure images don't exceed the box height */
        }

        .geometric-box img {
            transform: scale(1);
			height: 100%;
            width: 100%;
            opacity: 0.5;
			object-fit: cover; /* Maintain aspect ratio */
        }
		

      

        .geometric-box .geometric-box-content {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex; /* Added to center the text vertically and horizontally */
            justify-content: center;
            align-items: center;
            flex-direction: column; /* Added to stack the title and description */
            padding: 20px;
            text-align: center;
        }

        .geometric-box .geometric-box-content .geometric-title {
            font-family: Calibri Light;
            font-weight: normal;
            font-size: 33px;
            text-transform: uppercase;
            text-decoration: none;
            color: #B8860B;
            margin-bottom: 10px;
        }

        .geometric-box .geometric-box-content .geometric-description {
            font-family: Calibri Light;
            font-weight: normal;
            font-size: 20px;
            text-align: center;
        }

        .geometric-box:hover img {
            opacity: 0.7;
        }

   
   
        .geometric-box {
    box-shadow: 0px 3px 6px #B8860B;
    background-color: #FFFFFF;
}
.geometric-box img {
    transform: scale(1);
    height: auto;
    opacity: 0.5;
    width: 100%;
}
.geometric-box .geometric-box-content {
    position: absolute;
    top: 5%;
    left: 5%;
    width: 90%;
    height: 90%;
}
.container{
	padding: 10%;
}
.geometric-box .geometric-box-content .geometric-bottom-desc {
    position: absolute;
    bottom: 5%;
    left: 5%;
    width: 90%;
    height: auto;
    transform: scale(0);
    transition: all 0.5s ease;
    font-family:Calibri Light;   
    font-weight: normal;
    font-size: 20px;
    text-align: right;
;
}
.geometric-box .geometric-box-content .geometric-bottom-desc .geometric-title {
    font-family:Calibri Light;   
    font-weight: normal;
    font-size: 33px;
    text-transform: uppercase;
    text-decoration: none;
    text-align: center;
    color:#B8860B;
}
.geometric-box:hover img {
    opacity: 0.3;
}

.geometric-box:hover .geometric-box-content .geometric-bottom-desc {
    transform: scale(1);
}
.myH2 {
	text-align: center;
	color:#B8860B;
	padding-left: 15%;
	padding-right: 15%;
	font-size: 28px;
    font-family:Calibri Light;   
	

}
body {
        background-image: url("img/white2.png");
        background-size: cover;
        background-repeat: no-repeat;
    }

    </style>
</head>
<br><br>


<body>	

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<div class="container">
<h2 class="myH2">Client Testimonials<br>

</h2><br>
			<div class="col-12 big-wrap mx-auto p-3">
				<div class="row mx-auto p-0">
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 mx-auto p-3">
						<div class="geometric-box">
							<img src="img\bb.jpg">
							<div class="geometric-box-content">
								<div class="geometric-bottom-desc">
									<div class="geometric-title">
									“Long Distance Designer”								</div>
									<div>  "Reves completely transformed our dated NYC apartment into an elegant, cozy and most importantly, kid-friendly, home for me and my family. We had begun an enormous gut renovation on our 3500 square foot apartment which was overwhelming and thankfully Alexis stepped in and helped us through it. She worked with me long distance and through rounds of emails, phone calls, and texts she quickly ascertained what I was looking for and put together a cohesive design plan with all the colors, patterns, textures and fabrics I loved. She was so thoughtful with every detail and selection which resulted in the apartment really feeling like 'me' and not a cookie-cutter, generically decorated apartment. She has an amazing eye for fabrics and color and she just made the whole process fun. We can't thank her enough for creating such a beautiful and special home for us."

Vanessa - New York City</div>
								</div>
							</div>
						</div>
					</div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 mx-auto p-3">
						<div class="geometric-box">
							<img src="img\bg1.png">
							<div class="geometric-box-content">
								<div class="geometric-bottom-desc">
									<div class="geometric-title">
									“It truly reflects our personalities.”								</div>
									<div>"Reves successfully managed the interior design for a large scale renovation while we were living outside the country. What we appreciated most was her unflappable demeanour, her ability to work well in a team under pressure and her ability to listen/understand our vision. We absolutely love the results and our home is not only beautiful but extremely functional. It truly reflects our personalities."

Elizabeth and James - San Francisco, CA</div>
								</div>
							</div>
						</div>
					</div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 mx-auto p-3">
						<div class="geometric-box">
							<img src="img\background2.png">
							<div class="geometric-box-content">
								<div class="geometric-bottom-desc">
									<div class="geometric-title">
									“Just the vision I had”								</div>
									<div>"I want to tell you how much we appreciate all your attention to details.  Airy with graceful lines & soft colors: this is just the vision I had for the Beach House. It is so serene and lovely.  Each item is lovely on its own & they all harmonize so beautifully together. We love the soft grays, blues & white.  The desk in my bedroom is a true work of art.  The sofa & pillows are gorgeous & comfy.

It has been such a wonderful experience to work with you creating this beautiful vacation dream home for us.  Thank you so very, very much. We very much appreciate your beautiful design sense."

Catherine - San Francisco</div>
								</div>
							</div>
						</div>
					</div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 mx-auto p-3">
						<div class="geometric-box">
							<img src="img\qq.jpg">
							<div class="geometric-box-content">
								<div class="geometric-bottom-desc">
									<div class="geometric-title">
									“A Talented Interior Designer.”
									</div>
									<div>"Alexis is first and foremost a lovely, intelligent person.  She is someone you can feel confident representing you and handling your projects, with minimal input from you other than initially.

She has excellent taste; designs and keeps schedules; is respected by vendors and contractors and others, such as homeowners associations and managers with whom she must work to complete a job.  This means everything runs smoothly and on time.

You would be fortunate to have Alexis agree to take responsibility for your work."

Ann - San Francisco</div>
								</div>
							</div>
						</div>
					</div>
	</div>
    <?php include('foter.php') ?>

</body>
</html>