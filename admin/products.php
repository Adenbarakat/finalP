<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body style="background-image: url('product_images/white1.png'); background-size: cover; background-repeat: no-repeat; background-position: center;">

<?php include("nav.php"); ?>

<br><br><br><br><br><br><br><br>

<div class="container">
    


    <h2>All Products</h2>
        <input class="form-control" id="myInput" type="text" placeholder="Search..">
        <br>
        <div class="row col-md-13 col-md-offset-2 custyle">
            <?php
                // Fetch all products
                $sql = "SELECT * FROM product";
                $result = mysqli_query($con, $sql);

                if (!$result) {
                    die("Error: " . mysqli_error($con));
                }
            ?>
            <table class="table table-striped" style="color:#fff; background-color:gray;">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Information</th>
                        <th>Category</th>
                        <th class="text-center">More</th>
                    </tr>
                </thead>
                <tbody id="myTable">
                    <?php
                        while ($row = mysqli_fetch_array($result)) {
                    ?>
                    <tr>
                        <td><img src="product_images/<?php echo $row['image']; ?>" style="width:60%;"></td>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['price']; ?></td>
                        <td><?php echo $row['quantity']; ?></td>
                        <td><?php echo $row['detail']; ?></td>
                        <td><?php echo $row['cat']; ?></td>
                        <td>
                        <a href="erasure.php?id=<?php echo $row['id'];?>"style="color:#fff;" >delet<i class="bi bi-trash-o"></i>
        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="black" class="bi bi-trash-o" viewBox="0 0 16 16">
        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
      <path fill-rule="black" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
    </svg>
  </a>
  <br>
  <a href="update.php?id=<?php echo $row['id'];?>"style="color:#fff;" >
  Editing<i class="bi bi-trash-o">✏️</i>
 
  </a>

                        </td>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <script>
    $(document).ready(function() {
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
    </script>
</body>
</html>
