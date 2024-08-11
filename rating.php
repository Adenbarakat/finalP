
<?php include('menu.php') ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
  body {
    background-image: url("img/white2.png");
    background-size: cover;
    background-repeat: no-repeat;
  
    }
 
        .nav>li>a:focus, .nav>li>a:hover{background: transparent!important;}
.design-process-section .text-align-center {
    line-height: 25px;
    margin-bottom: 12px;
}
.design-process-content {
    border: 2px solid gray;
    box-shadow: 4px 4px 9px #B8860B;
    position: relative;
    padding: 16px 10% 30px 30px;
    border-radius: 80px;

}
.design-process-content img {
    position: absolute;
    top: 0;
    right: 1;
    bottom: 0;
    z-index: 0;
    max-height: 100%;
}
.design-process-content h3 {
  font-size: 3rem;
    color:#B8860B;
    margin-bottom: 16px;
    text-align: center;
    font-family:Calibri Light;
}
.design-process-content p {
    line-height: 26px;
    margin-bottom: 12px;
    text-align: right;
	font-size: 20px;
    font-family:Calibri Light;
}
.process-model {
    list-style: none;
    padding: 0;
    position: relative;
    max-width: 600px;
    margin: 20px auto 26px;
    border: none;
    z-index: 0;
}
.process-model li::after {
    background: #e5e5e5 none repeat scroll 0 0;
    bottom: 0;
    content: "";
    display: block;
    height: 4px;
    margin: 0 auto;
    position: absolute;
    right: -30px;
    top: 33px;
    width: 85%;
    z-index: -1;
}
.process-model li.visited::after {
    background: #D6DA28;
}
.process-model li:last-child::after {
    width: 0;
}
.process-model li {
    display: inline-block;
    width: 18%;
    text-align: center;
    float: none;
}
.nav-tabs.process-model > li.active > a, .nav-tabs.process-model > li.active > a:hover, .nav-tabs.process-model > li.active > a:focus, .process-model li a:hover, .process-model li a:focus {
    border: none;
    background: transparent;

}
.process-model li a {
    padding: 0;
    border: none;
    color: #606060;
}
.process-model li.active,
.process-model li.visited {
    color: #D6DA28;
}
.process-model li.active a,
.process-model li.active a:hover,
.process-model li.active a:focus,
.process-model li.visited a,
.process-model li.visited a:hover,
.process-model li.visited a:focus {
    color: #D6DA28;
}
.process-model li.active p,
.process-model li.visited p {
    font-weight: 300;
    color: #B8860B;
}
.process-model li i {
    display: block;
    height: 68px;
    width: 68px;
    text-align: center;
    margin: 0 auto;
    background: #f5f6f7;
    border: 2px solid gray;
    line-height: 65px;
    font-size: 30px;
    border-radius: 50%;
}
.process-model li.active i, .process-model li.visited i  {
    background: #fff;
    border-color: #B8860B;
    box-shadow: 4px 4px 9px #B8860B;

}
.process-model li p {
    font-size: 15px;
    color:black;
    margin-top: 15px;
}

/* CSS */
.button-33 {
  background-color: #c2fbd7;
  border-radius: 100px;
  box-shadow: rgba(44, 187, 99, .2) 0 -25px 18px -14px inset,rgba(44, 187, 99, .15) 0 1px 2px,rgba(44, 187, 99, .15) 0 2px 4px,rgba(44, 187, 99, .15) 0 4px 8px,rgba(44, 187, 99, .15) 0 8px 16px,rgba(44, 187, 99, .15) 0 16px 32px;
  color: green;
  cursor: pointer;
  display: inline-block;
  font-family: CerebriSans-Regular,-apple-system,system-ui,Roboto,sans-serif;
  padding: 7px 20px;
  text-align: center;
  text-decoration: none;
  transition: all 250ms;
  border: 0;
  font-size: 16px;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
}

.button-33:hover {
  box-shadow: rgba(44,187,99,.35) 0 -25px 18px -14px inset,rgba(44,187,99,.25) 0 1px 2px,rgba(44,187,99,.25) 0 2px 4px,rgba(44,187,99,.25) 0 4px 8px,rgba(44,187,99,.25) 0 8px 16px,rgba(44,187,99,.25) 0 16px 32px;
  transform: scale(1.05) rotate(-1deg);
}
.home {
	width: 80%;
	height: 10vh;
	
	background-position: center top;
    background-attachment:fixed;
	background-size: cover;
}
.rate {
            font-size: 50px;
            font-weight: bold;
            color: #333; /* Adjust the color as needed */
            text-align: center;
            padding: 50px 15% 30px 30px;
   
        }
    </style>
</head>
<body>
<section class="home">
</section>
 
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'>
<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
<h3 class="rate">Rate Our Project By Clicking On The<i aria-hidden="true">⭐</i> Icon</h3>
<div class="container">
	<div class="row">
		      <div class="col-xs-12"> 
        <!-- design process steps--> 
        <!-- Nav tabs -->
        <ul class="nav nav-tabs process-model more-icon-preocess" role="tablist">
          <li role="presentation" class="active"><a href="#discover" aria-controls="discover" role="tab" data-toggle="tab"><i aria-hidden="true">⭐</i>
            <p>Great</p>
            </a></li>
          <li role="presentation"><a href="#optimization" aria-controls="optimization" role="tab" data-toggle="tab"><i aria-hidden="true">⭐</i>
            <p>Good</p>
            </a></li>
          <!--<li role="presentation"><a href="#content" aria-controls="content" role="tab" data-toggle="tab"><i aria-hidden="true">⭐</i>
            <p>Bad</p>
            </a></li>-->
          <li role="presentation"><a href="#reporting" aria-controls="reporting" role="tab" data-toggle="tab"><i aria-hidden="true">⭐</i>
            <p>Very Bad</p>
            </a></li>
        </ul>

        <!-- end design process steps--> 
        <!-- Tab panes -->

        <div class="tab-content">
          <div role="tabpanel" class="tab-pane active" id="discover">
            <div class="design-process-content">
              <h3 class="semi-bold"> SOME Have Quality. Others- Style .. WE HAVE BOTH</h3>
        <p>Thank You It Will Be Our Pleasure To Work With You</p>
             </div>
          </div>
          
          <div role="tabpanel" class="tab-pane" id="optimization">
            <div class="design-process-content">
              <h3 class="semi-bold">Tank You To Rate Us "GOOD"</h3>
              <p>We Are Sure That You Like To Take A Look On Our Products </p>
              <p>Click On The Green Buttoun </p>
              <a href="products.php" class="button-33" >Products Page</a>
            </div>
          </div>
          <div role="tabpanel" class="tab-pane" id="content">
            <div class="design-process-content">
             
            <p>We will be happy if you contact us</p>              
              
          
            </div>
          </div>
          <div role="tabpanel" class="tab-pane" id="reporting">
            <div class="design-process-content">
              <h3>We Will Be Happy If You Contacted Us</h3>
              <p>We Will Be Happy To Give You The Service You Need </p>
             <p>Click On The Green Buttoun To Go To Advice Page</p>
              <a href="indx.php" class="button-33" >Contact Us</a>
          </div>
        </div>
      </div>
    </div>
	</div>
</div>

  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js'></script>
<br><br>
<?php include('rating2.php') ?>
<br><br>
<br><br>
<br><br>
<br><br>

<?php include('foter.php') ?>

</body>
</html>
