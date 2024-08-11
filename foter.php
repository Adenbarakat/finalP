<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.css" rel="stylesheet">

<style>

.cont {
    text-align: center;
	padding: 30px;
}

.btn2 {
	display: inline-block;
	width: 50px;
	height: 50px;
	background: #f1f1f1;
	margin: 10px;
	border-radius: 30%;
	box-shadow: 0 5px 15px -5px #ecf0f1;
	color: #3498db;
	overflow: hidden;
	position: relative;
}

a.btn2:hover {
	transform: scale(1.1);
	color: #f1f1f1;
}

.btn2 i {
	line-height: 50px;
	font-size: 20px;
	transition: 0.2s linear;
}

.btn2:hover i {
	transform: scale(1.3);
	color: #f1f1f1;
}

.fa-facebook-f {
    color: #3c5a99;
}

.fa-waze {
    color: #1da1f2;
}

.fa-instagram {
    color: #e1306c;
}

.fa-youtube {
    color: #ff0000;
}

.btn2::before {
	content: "";
	position: absolute;
	width: 120%;
	height: 120%;
	background: #B8860B;
	transform: rotate(45deg);
	left: -110%;
	top: 90%;
}

.btn2:hover::before {
	animation: aaa 0.7s 1;
	top: -10%;
	left: -10%;
}
h1{
	color:#B8860B;
	font-size:15px;
}
.content.pure-u-1.support_frame {
    background-color: rgba(236, 222, 222, 0.00);
    border-top: 7px solid #b98926;
	
}

</style>
</head>
<body>

<div class="content pure-u-1  support_frame">
        
 </div>
	<div class="row">
		<div class="col-sm-12">
		    <div class="cont">
				<h1>Follow Us </h1>
                <a class="btn2" href="https://www.facebook.com/login/">
                    <i class="fab fa-facebook-f"></i>
                </a>

                <a class="btn2" href="https://www.waze.com/live-map/">
                    <i class="fab fa-waze"></i>
                </a>

                <a class="btn2" href="https://www.instagram.com/">
                    <i class="fab fa-instagram"></i>
                </a>

                <a class="btn2" href="https://www.youtube.com/">
                    <i class="fab fa-youtube"></i>
                </a>
            </div>
		</div>
	</div>
</div>
</body>
</html>
