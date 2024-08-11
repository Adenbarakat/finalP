<?php include("userinfo.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
      * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

        .menu {
          
          margin: 0;
          padding: 0;
            background: #765421;
            height: 4rem;
            width: 100%;
            position: fixed;
            z-index: 1;
            display: flex;
            justify-content: center;
        }

        .menu ol {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
        }

        .menu > ol > .menu-item {
            width: 100px; /* Set a fixed width for menu items */
            text-align: center;
            position: relative;
        }

        .menu > ol > .menu-item a {
            color: #FFF;
            text-decoration: none;
            padding: 0.75rem 0;
            display: block;
        }

        .menu-item:hover .sub-menu {
            display: block;
        }
        
        .sub-menu {
            position: absolute;
            width: 100%;
            top: 100%;
            left: 0;
            display: none;
            z-index: 1;
            background: #765421;
        }

        .sub-menu .menu-item {
            padding: 0.75rem 0;
        }

        .sub-menu .menu-item:hover {
            background: #765421;
        }

        .sub-menu .menu-item a {
            padding: 0 0.75rem;
            display: block;
            color: #765421;
        }

        .menu > ol > .menu-item.active a {
            font-weight: bold;
            /* Add any other styles for the active state */
        }

        @media screen and (max-width: 600px) {
            .menu ol {
                flex-direction: column;
                align-items: center;
            }

            .menu > ol > .menu-item.active a {
                font-weight: bold;
                text-align: center;
            }

            .menu:hover > ol {
                display: flex;
            }
        }
    </style>
</head>
<body>
<?php
    $currentPage = basename($_SERVER['PHP_SELF']);
    $date = date('Y-m-d');
?>
<nav class="menu">
  <ol>
    <li class="menu-item">
      <a href="#0">More</a>
      <ul class="sub-menu">
        <li class="menu-item">
          <a href="cart.php">Cart</a>
        </li>
        <li class="menu-item">
          <a href="profile.php?id=<?php echo $fetch_info['id'];?>">Profile</a>
        </li>
        <li class="menu-item">
          <a href="logout.php">Logout</a>
        </li>
      </ul>
    </li>
    </li>
    <li class="menu-item <?php echo ($currentPage == 'rating.php') ? 'active' : ''; ?>"><a href="rating.php">Rating</a></li>
    <li class="menu-item <?php echo ($currentPage == 'indx.php') ? 'active' : ''; ?>"><a href="indx.php">Contact Us</a></li>
    <li class="menu-item <?php echo ($currentPage == 'cancel.php') ? 'active' : ''; ?>"><a href="cancel.php?date=<?php echo $date; ?>">Cancel a Meeting</a></li>
    <li class="menu-item <?php echo ($currentPage == 'us.php') ? 'active' : ''; ?>"><a href="us.php">A&T</a></li>
    <li class="menu-item <?php echo ($currentPage == 'ourProjects.php') ? 'active' : ''; ?>"><a href="ourProjects.php">Our Projects</a></li>
    <li class="menu-item <?php echo ($currentPage == 'feedback.php') ? 'active' : ''; ?>"><a href="feedback.php">Feedback</a></li>
    <li class="menu-item <?php echo ($currentPage == 'category1.php') ? 'active' : ''; ?>"><a href="category1.php">Product</a></li>
    <li class="menu-item <?php echo ($currentPage == 'home.php') ? 'active' : ''; ?>"><a href="home.php">About Us</a></li>
  </ol>
</nav>

</body>
</html>
