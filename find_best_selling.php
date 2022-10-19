<?php 
require_once 'conn.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get the sum of all Ages in table</title>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

    <div class="container mt-3">
    <h1>Find the best selling products</h1> 
    <p>Write a query that returns only the top five selling items in the table.</p> 
    <table class="table table-bordered w-25">
        <thead>
        <tr>
            <th>id</th>
            <th>Name</th>
            <th>Age</th>
        </tr>
        </thead>
        <tbody>
        <?php
        // sql query
        // group rows that has a same values
        $sql = "SELECT * FROM products";
        $result = $conn->query($sql);
        // check if there are zero or more rows return
        if($result->num_rows > 0) {
            // output all the data with loop
            // fetch_assoc puts all result in associative array
            while($row = $result->fetch_assoc()) {
        ?>
        <tr>
            <td> <?php echo $row['id']; ?> </td>
            <td> <?php echo $row['Name']; ?> </td>
            <td> <?php echo $row['Amount_Sold']; ?>  </td>
        </tr>
        <?php
            }
        }    
        ?>
        </tbody>
    </table>
    <h2>Answer : </h2>
    <table class="table table-bordered w-25">
        <thead>
        <tr>
            <th>id</th>
            <th>Name</th>
            <th>Age</th>
        </tr>
        </thead>
        <tbody>
        <?php
        // sql query
        $sql = "SELECT * FROM products ORDER BY Amount_Sold DESC LIMIT 5";
        $result = $conn->query($sql);
        // check if there are zero or more rows return
        if($result->num_rows > 0) {
            // output all the data with loop
            // fetch_assoc puts all result in associative array
            while($row = $result->fetch_assoc()) {
        ?>
        <tr>
            <td> <b> <?php echo $row['id']; ?> </b> </td>
            <td> <b> <?php echo $row['Name']; ?> </b> </td>
            <td> <b> <?php echo $row['Amount_Sold']; ?> </b> </td>
        </tr>
        <?php
            }
        }    
        ?>
        </tbody>
    </table>
    </div>

</body>
</html>