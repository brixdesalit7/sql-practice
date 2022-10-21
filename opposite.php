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
    <h1>Select each number as its opposite</h1>
    <p>The challenge is to write a SQL query for this table that’ll return all the opposites of the values in the Value column.
    If a number is negative, make it positive and vice versa. Here’s what your query should return: 56, -76, 84, -96, 47</p>          
    <table class="table table-bordered w-25">
        <thead>
        <tr>
            <th>id</th>
            <th>Year</th>
        </tr>
        </thead>
        <tbody>
        <?php
        // sql query
        // select all rows from table ages
        $sql = "SELECT * FROM opposite";
        $result = $conn->query($sql);
        // check if there are zero or more rows return
        if($result->num_rows > 0) {
            // output all the data with loop
            // fetch_assoc puts all result in associative array
            while($row = $result->fetch_assoc()) {
        ?>
        <tr>
            <td> <?php echo $row['id']; ?> </td>
            <td> <?php echo $row['Value']; ?> </td>
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
            <th>id</th>
            <th>Value</th>
            <th>Opposite</th>
        </tr>
        </thead>
        <tbody>
        <?php
        // sql query
        // extract a value of row
        // check if the sign of value is negative with sign() if true return then the absolute value with abs()
        // if the sign of value is positive then add a minus sign to value
        $sql = "SELECT id , Value, CASE WHEN SIGN(Value) = -1 THEN ABS(Value) WHEN SIGN(Value) = 1 THEN -Value END AS opposite_val FROM opposite ";
        $result = $conn->query($sql);
        // check if there are zero or more rows return
        if($result->num_rows > 0) {
            // output all the data with loop
            // fetch_assoc puts all result in associative array
            while($row = $result->fetch_assoc()) {
        ?>
        <tr>
            <td> <b> <?php echo $row['id']; ?> </b> </td>
            <td> <b> <?php echo $row['Value']; ?> </b> </td>
            <td> <b> <?php echo $row['opposite_val']; ?> </b> </td>
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