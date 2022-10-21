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
    <h1>Group by age</h1>
    <p>The challenge is to write a query that’ll group all the people by their age, along with a count of the people that are the 
    same age.</p>        
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
            <td> <?php echo $row['Age']; ?> </td>
        </tr>
        <?php
            }
        }    
        ?>
        </tbody>
    </table>
    <h2>Answer : </h2>
    <table class="table table-bordered w-25">
        <tr>
            <th class="text-center">Age</th>
            <th class="text-center">Count</th>
        </tr>
        <tbody>
        <?php
        // sql query
        // count the number of age with count function
        // group the result by age with group by
        // group by statement group rows that have the same values
        $sql = "SELECT COUNT(Age) AS countSameAge, Age FROM ages GROUP BY Age ";
        $result = $conn->query($sql);
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
        ?>
        <tr>
            <td class="text-center"> <?php echo $row['Age']; ?> </td>
            <td class="text-center"> <?php echo $row['countSameAge']; ?> </td>
        </tr>
        <?php
            }
        }  else {
            echo "<h1>No Result</h1>";
        }   
        ?>
        </tbody>
    </table>
    </div>

</body>
</html>