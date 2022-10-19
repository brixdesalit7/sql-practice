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
    <h1>Get the sum of all age in Table</h1>
    <p>Your task for this challenge is to return a sum of all the ages in the table. Your query should return 139.</p>          
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
        $sql = "SELECT * FROM ages ";
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
            <td> <?php echo $row['Age']; ?> </td>
        </tr>
        <?php
            }
        }    
        ?>
        <tr>
            <td class="text-center" colspan="2"> <b> Total </b> </td>
            <?php
            // call the sum function to get the sum of column age
            $sql = "SELECT SUM(Age) AS total FROM ages";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            ?>
            <td> <b> <?php echo $row['total']; ?> </b> </td>
        </tr>
        </tbody>
    </table>
    </div>

</body>
</html>