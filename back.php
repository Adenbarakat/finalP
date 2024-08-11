
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #backTop {
    position:fixed;
    bottom: 20px;
    right: 60px;
  z-index: 1;
}
#backTop a {
    width: 60px;
    display: block;
    font-family:Calibri Light;
    text-align: center;
    font: 12px/100% ;
    text-transform: uppercase;
    text-decoration: none;
    color: #bbb;
    -webkit-transition: 1s;
    -moz-transition: 1s;
    transition: 1s;
    background-color:#000;
    border-radius: 5;
    padding:10px;
}
#backTop a:hover {
    color: #000;
    background-color:#bbb;
}
#scroll {
    width:70px;
    font: 12px/100% ;
    font-family:Calibri Light;
    border:none;
    border-radius:5;
    position:fixed;
    background-color:#000;
    color: rgba(0,0,0,20);
    bottom: 1rem;
    right: 1.5rem;
    display:block;
    justify-content:center;
    align-items:center;
    cursor:pointer;
    outline:none;
    z-index: 1;

}
#scroll a:hover {
    color: #000;
    background-color:#bbb;
}
    </style>
</head>
<body>
<?php
  $date=date('Y-m-d');
  ?>




</div>  

<script>
   const button = document.getElementById('Scroll');
function Scroll() {
  function Check() {
    if(window.scrollY > 0) {
      setTimeout(function() {
                 window.scrollTo( 0 , window.scrollY - 30)
      Check()
                 }, 6);
    }
  }
Check()
}
</script>
</body>
</html>