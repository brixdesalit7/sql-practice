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
    <h1>Select all the divisions that have had revenue this year</h1>
    <p>Your task is to write a query for this table that’ll return just the division ids for all the 
    divisions that had positive revenue in 2021. Your query should return the following values: 1, 4</p>          
    <table class="table table-bordered w-25">
        <thead>
        <tr>
            <th>id</th>
            <th>Division ID</th>
            <th>Year</th>
            <th>Revenue</th>
        </tr>
        </thead>
        <tbody>
        <?php
        // sql query
        // select all rows from table ages
        $sql = "SELECT * FROM division_revenue";
        $result = $conn->query($sql);
        // check if there are zero or more rows return
        if($result->num_rows > 0) {
            // output all the data with loop
            // fetch_assoc puts all result in associative array
            while($row = $result->fetch_assoc()) {
        ?>
        <tr>
            <td> <?php echo $row['id']; ?> </td>
            <td> <?php echo $row['Division_id']; ?> </td>
            <td> <?php echo $row['Year']; ?> </td>
            <td> <?php echo $row['Revenue']; ?> </td>
        </tr>
        <?php
            }
        }    
        ?>
        </tbody>
    </table>
    <h2>Answer:</h2>
    <table class="table table-bordered w-25">
        <thead>
        <tr>
            <th>Division ID</th> 
        </tr>
        </thead>
        <tbody>
        <?php
        // sql query
        // filter the sql with where
        // sign will check if the value is positive or negative 
        // where year is equal to 2021 and sign is positive
        $sql = "SELECT * FROM division_revenue WHERE Year = 2021 AND SIGN(Revenue) = 1";
        $result = $conn->query($sql);
        // check if there are zero or more rows return
        if($result->num_rows > 0) {
            // output all the data with loop
            // fetch_assoc puts all result in associative array
            while($row = $result->fetch_assoc()) {
        ?>
        <tr>
            <td> <b> <?php echo $row['Division_id']; ?> </b> </td>
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