<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Student Forms</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://localhost/management/bootstrap/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Courgette" rel="stylesheet">
    <script src="http://localhost/management/bootstrap/bootstrap.min.js"></script>
    <style>
        body {
            font-family: Lucida Console;
        }

        

    </style>
</head>

<body>
    <div class="container-fluid">
        <!--  navigation menu goes here -->
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4">
                <form method="post" action="">
                    <!--  form  -->
                </form>
            </div>
            <div class="col-lg-8">
                <h2>Student Data</h2>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "hack";

                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT id, name, fname, email, phone, state, qualification, branch, rollno, gender, birth FROM smash";
                $result = $conn->query($sql);

                echo "<table border='1'>
                <tr>
                    <th>Search ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Branch</th>
                    <th>University</th>
                    <th>Semester</th>
                    <th>CGPA</th>
                    <th>Gender</th>
                    <th>Date Of Birth</th>
                </tr>";

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['fname'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td>" . $row['phone'] . "</td>";
                        echo "<td>" . $row['state'] . "</td>";
                        echo "<td>" . $row['qualification'] . "</td>";
                        echo "<td>" . $row['branch'] . "</td>";
                        echo "<td>" . $row['rollno'] . "</td>";
                        echo "<td>" . $row['gender'] . "</td>";
                        echo "<td>" . $row['birth'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "0 results";
                }

                $conn->close();
                ?>
            </div>
        </div>
    </div>
</body>

</html>
