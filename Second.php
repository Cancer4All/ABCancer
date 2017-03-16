<!DOCTYPE html>
<HTML>
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="event.css">

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title> ABCancer First Webpage !! </title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/latest/css/bootstrap.min.css" rel="stylesheet">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>

    <script src="//maxcdn.bootstrapcdn.com/bootstrap/latest/js/bootstrap.min.js"></script>

    <style type="text/css">
    * { font-family: NanumGothic, 'Malgun Gothic'; }
    body { padding-top: 50px; }
    .starter-template {
      padding: 40px 15px;
      text-align: center;
    }
    </style>
  </head>

  <body>
    <div class="container">
      <div class="starter-template">
        <h4>
        <?php
        $servername = "localhost";
        $username = "bkyoung311";
        $password = "ABCancer311";
        $dbname = "bkyoung311";

        $name=$_GET['name'];

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM ABCancer WHERE name='$name'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            echo "<p> Retrived from : ".$servername."<br></p>" ;
            while($row = $result->fetch_assoc()) {
                echo "id: " . $row["id"]. " Name: " . $row["name"]. "  Stage: T".$row["T"]."N".$row["N"]."M".$row["M"]. "<br>";
            }
        } else {
            echo "0 results";
        }

        $conn->close();
        ?>
      </h4>
      </div>
    </div>
  </body>
</HTML>
