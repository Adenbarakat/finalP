<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .circle {
  padding: 13px 20px;
  border-radius: 50%;
  background-color: #B8860B;
  color: #fff;
  max-height: 50px;
  z-index: 2;
}

.how-it-works.row .col-2 {
  align-self: stretch;
}
.how-it-works.row .col-2::after {
  content: "";
  position: absolute;
  border-left: 3px solid #B8860B;
  z-index: 1;
}
.how-it-works.row .col-2.bottom::after {
  height: 50%;
  left: 50%;
  top: 50%;
}
.how-it-works.row .col-2.full::after {
  height: 100%;
  left: calc(50% - 3px);
}
.how-it-works.row .col-2.top::after {
  height: 50%;
  left: 50%;
  top: 0;
}


.timeline div {
  padding: 0;
  height: 40px;
}
.timeline hr {
  border-top: 3px solid #B8860B
;
  margin: 0;
  top: 17px;
  position: relative;
}
.timeline .col-2 {
  display: flex;
  overflow: hidden;
}
.timeline .corner {
  border: 3px solid #B8860B
;
  width: 100%;
  position: relative;
  border-radius: 15px;
}
.timeline .top-right {
  left: 50%;
  top: -50%;
}
.timeline .left-bottom {
  left: -50%;
  top: calc(50% - 3px);
}
.timeline .top-left {
  left: -50%;
  top: -50%;
}
.timeline .right-bottom {
  left: 50%;
  top: calc(50% - 3px);
}

    </style>
</head>
<body>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


<div class="">
  <div class="container"><center>
  <h2 class="myH2">The process we will go through together at the beginning</h2>

<br>
<br>   
    <div class="row align-items-center how-it-works d-flex">
      <div class="col-2 text-center bottom d-inline-flex justify-content-center align-items-center">
        <div class="circle font-weight-bold"><i aria-hidden="true">⭐</i></div>
      </div>
      <div class="col-6">
        <h3>Meeting Each Other</h3>
        <h5>we will be so happy to meet you and give you the advice you need</h5>
      </div>
    </div>
    <div class="row timeline">
      <div class="col-2">
        <div class="corner top-right"></div>
      </div>
      <div class="col-8">
        <hr/>
      
      </div>
      <div class="col-2">
        <div class="corner left-bottom"></div>
      </div>
    </div>
    <div class="row align-items-center justify-content-end how-it-works d-flex">
      <div class="col-6 text-right">
        <h3>Making your and our dream come true</h3>
        <h5>Starting The process</h5>
      </div>
      <div class="col-2 text-center full d-inline-flex justify-content-center align-items-center">
        <div class="circle font-weight-bold"><i aria-hidden="true">⭐</i></div>
      </div>
    </div>
    <div class="row timeline">
      <div class="col-2">
        <div class="corner right-bottom"></div>
      </div>
      <div class="col-8">
        <hr/>
      </div>
      <div class="col-2">
        <div class="corner top-left"></div>
      </div>
    </div>
    <div class="row align-items-center how-it-works d-flex">
      <div class="col-2 text-center top d-inline-flex justify-content-center align-items-center">
        <div class="circle font-weight-bold"><i aria-hidden="true">⭐</i></div>
      </div>
      <div class="col-6">
        <h3>Seeing Your Dream Becoming A Reality</h3>
        <h5>We Were So Happy To Work With You And Wishing For More And More Projects</h5>
      </div>
    </div>
  </div>
</div>
</center>
</body>
</html>