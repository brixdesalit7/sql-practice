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
    <h1>Return a greeting string</h1> 
    <p>Your challenge is to return a result set that has a column called Greeting in it. This column will take the value from the
    Name column and return a string like this, with the name inserted into it: Hi, Bob! How are you today?</p>        
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Name</th>
        </tr>
        <tbody>
        <?php
        // sql query
        // group rows that has a same values
        $sql = "SELECT * FROM greeting";
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
        </tr>
        <?php
            }
        }    
        ?>
        </tbody>
    </table>
    <h2>Answer : </h2>
    <table class="table table-bordered">
        <tr>
            <th class="text-center display-6" colspan="2">Greeting</th>
        </tr>
        <tbody>
        <?php
        // sql query
        // select uniques values with distinct
        $sql = "SELECT  * FROM greeting";
        $result = $conn->query($sql);
        // check if there are zero or more rows return
        if($result->num_rows > 0) {
            // output all the data with loop
            // fetch_assoc puts all result in associative array
            while($row = $result->fetch_assoc()) {
        ?>
        <tr>
            <td class="text-center"> Hi,<?php echo $row['Name']; ?>! How are you today? </td>
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