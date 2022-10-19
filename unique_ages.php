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
    <h1>Get the unique age in the table</h1> 
    <p>For this challenge, write a query that’ll return all unique ages from the table. 
    Your result should have these values: 18, 19, 20, 21</p>         
    <table class="table table-bordered">
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
        $sql = "SELECT * FROM ages";
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
            <td> <?php echo $row['Age']; ?>  </td>
        </tr>
        <?php
            }
        }    
        ?>
        </tbody>
    </table>
    <h2>Answer : </h2>
    <table class="table table-bordered">
        <tbody>
        <?php
        // sql query
        // select uniques values with distinct
        $sql = "SELECT DISTINCT Age  FROM ages";
        $result = $conn->query($sql);
        // check if there are zero or more rows return
        if($result->num_rows > 0) {
            // output all the data with loop
            // fetch_assoc puts all result in associative array
            while($row = $result->fetch_assoc()) {
        ?>
        <tr>
            <td> <b> <?php echo $row['Age']; ?> </b> </td>
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