<!DOCTYPE html>
<?php include('menu.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
  body {
    background-image: url("img/white2.png");
    background-size: cover;
    background-repeat: no-repeat;
    margin: 0;
    display: flex;
    align-items: center;
    height: 100vh; /* Adjust the height as needed */
    text-align: right;
    flex-direction: column;

    
        }


.container {
    padding: 0; /* Change padding to 0 */
}

.item {
    width: 300px;
    overflow: hidden;
    display: flex;
    padding: 20px 10% 15px 15px;
}

.item img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    -webkit-transition: 0.6s ease;
    transition: 0.6s ease;
}

.item img:hover {
    -webkit-transform: scale(1.2);
    transform: scale(1.2);
}

.img-thumbnail {
    border: 0;
    border-radius: 0;
}


        /* products sentence */
        .products {
            font-size: 50px;
            font-weight: bold;
            color: #333; /* Adjust the color as needed */
            text-align: center;
            padding: 100px 15% 30px 30px;
   
        }
    </style>
</head>
<body>
<header>
        <p class="products">Products</p>
    </header>
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <br><br><br>
                <div class="item"><a href="products.php?id=12"><img src="img/background1.png"></a></div>
            </div>
        </div>
    </div>
</body>
</html>
