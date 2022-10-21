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
    <h1> Find the century for the year</h1>
    <p>Write a query for the table above that’ll return the century that the year is in. The results of this query should have the
    following values: 18, 21, 17, 19, 20</p>          
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
        $sql = "SELECT * FROM year_century";
        $result = $conn->query($sql);
        // check if there are zero or more rows return
        if($result->num_rows > 0) {
            // output all the data with loop
            // fetch_assoc puts all result in associative array
            while($row = $result->fetch_assoc()) {
        ?>
        <tr>
            <td> <?php echo $row['id']; ?> </td>
            <td> <?php echo $row['Year']; ?> </td>
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
            <th>Year</th>
            <th>Century</th>
        </tr>
        </thead>
        <tbody>
        <?php
        // sql query
        // extract a value of row
        // substr(string, start, length )
        $sql = "SELECT id, Year, SUBSTR(Year,1,2 ) AS getCentury FROM year_century ";
        $result = $conn->query($sql);
        // check if there are zero or more rows return
        if($result->num_rows > 0) {
            // output all the data with loop
            // fetch_assoc puts all result in associative array
            while($row = $result->fetch_assoc()) {
        ?>
        <tr>
            <td> <b> <?php echo $row['id']; ?> </b> </td>
            <td> <b> <?php echo $row['Year']; ?> </b> </td>
            <td> <b> <?php echo $row['getCentury']; ?> </b> </td>
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