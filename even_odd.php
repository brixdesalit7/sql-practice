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
    <h1>Even or odd</h1> 
    <p>Your job is to return whether or not the number in the Value column is even or odd rather than returning the number itself.
    Your query should return the following values: even, odd, odd, even, odd</p> 
    <table class="table table-bordered w-25">
        <thead>
        <tr>
            <th>id</th>
            <th>Value</th>
        </tr>
        </thead>
        <tbody>
        <?php
        // sql query
        // select all the row in even table
        $sql = "SELECT * FROM even_odd";
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
        } else {
            echo "<h1>No Result</h1>";
        }
        ?>
        </tbody>
    </table>
    <h2>Answer : </h2>
    <table class="table table-bordered w-25">
        <thead>
        <tr>
            <th>id</th>
            <th>Value</th>
            <th>Even or Odd</th>
        </tr>
        </thead>
        <tbody>
        <?php
        // sql query
        // create a condition with case statement
        // divide a value of row Value to 2 and get the remainder with modulo operator %
        // if the remainder is 0 output even
        // if the remainder is 1 output odd
        // give the alias the value row
        $sql = "SELECT id, Value, CASE WHEN Value % 2 = 0 THEN 'Even' WHEN Value % 2 = 1 THEN 'Odd' END AS even_odd FROM even_odd ";
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
            <td> <b> <?php echo $row['even_odd']; ?> </b> </td>
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