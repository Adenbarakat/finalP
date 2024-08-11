<?php include("db.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"></head>
<style>
  @import url("https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap");
* {
  margin: 0;
  padding: 0;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}

body {
  background: white;
  font-family: "Montserrat", sans-serif;
}

.navMenu {
  position: absolute;
  top: 10%;
  left: 45%;
  align:center;
  -webkit-transform: translate(-50%, -90%);
  transform: translate(-50%, -90%);
}

.navMenu a {
  color: black;
  text-decoration: underline;
  font-size: 1.2em;
  text-transform: uppercase;
  font-weight: 500;
  display: inline-block;
  width:auto;
  padding-left:20px;
  -webkit-transition: all 0.2s ease-in-out;
  transition: all 0.2s ease-in-out;
  
}

.navMenu a:hover {
  color: brown;
}

.navMenu .dot {
  width: 6px;
  height: 6px;
  background: black;
  border-radius: 50%;
  opacity: 0;
  -webkit-transform: translateX(90px);
  transform: translateX(90px);
  -webkit-transition: all 0.2s ease-in-out;
  transition: all 0.2s ease-in-out;
}

.navMenu a:nth-child(1):hover ~ .dot {
  -webkit-transform: translateX(80px);
  transform: translateX(80px);
  -webkit-transition: all 0.2s ease-in-out;
  transition: all 0.2s ease-in-out;
  opacity: 1;
}

.navMenu a:nth-child(2):hover ~ .dot {
  -webkit-transform: translateX(230px);
  transform: translateX(230px);
  -webkit-transition: all 0.2s ease-in-out;
  transition: all 0.2s ease-in-out;
  opacity: 1;
}

.navMenu a:nth-child(3):hover ~ .dot {
  -webkit-transform: translateX(420px);
  transform: translateX(420px);
  -webkit-transition: all 0.2s ease-in-out;
  transition: all 0.2s ease-in-out;
  opacity: 1;
}

.navMenu a:nth-child(4):hover ~ .dot {
  -webkit-transform: translateX(590px);
  transform: translateX(590px);
  -webkit-transition: all 0.2s ease-in-out;
  transition: all 0.2s ease-in-out;
  opacity: 1;
}
.navMenu a {
  color: black;
  text-decoration: underline;
  font-size: 14px; /* تغيير حجم الخط هنا */
  text-transform: uppercase;
  font-weight: 500;
  display: inline-block;
  width: auto;
  padding-left: 20px;
  -webkit-transition: all 0.2s ease-in-out;
  transition: all 0.2s ease-in-out;
}

</style>
<body>

<nav class="navMenu">
<a href="brtetor.php">Consultation Appointment Page</a>
      <a href="products.php"> Products</a>
      <a href="additem.php">Adding Products</a>
      <a href="/finalP/login.php">Log Out</a>
      <a href="index.php">Main</a>

      <div class="dot"></div>
    </nav>
</body>
</html>