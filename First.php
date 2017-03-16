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

        <!-- <img src="/resource/project/logos_break-01.png" height="100" width="110"> -->
        <?php
        ?>

        <div align = 'center'>
          <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <p><span> TNM stage를 선택해주세요 </span><br>
              <span> T </span> <select name="T">
                <option disabled selected value> - </option>
                <option value="X">X</option>
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
              </select>
              <span> N </span> <select name="N">
                <option disabled selected value> - </option>
                <option value="X">X</option>
                <option value="0">0</option>
                <option value="1">1</option>
              </select>
              <span> M </span> <select name="M">
                <option disabled selected value> - </option>
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="1a">1a</option>
                <option value="1b">1b</option>
              </select></p>
              <p><span> 닉네임을 입력해주세요 </span><br><input type="text" name="name"></p>
              <p><input type="submit" value="제출"></p>
            </form>
          </div>

          <div align = 'center' class=container>
            <p class="bg-sucess">
              <?php
              unset($tStage);
              unset($nStage);
              unset($mStage);

              if ($_SERVER["REQUEST_METHOD"] == "POST")
              {
                $tStage = $_POST['T'];
                $nStage = $_POST['N'];
                $mStage = $_POST['M'];
                $name = test_input($_POST["name"]);

                echo "<p>" . "$name 님은 T$tStage N$nStage M$mStage stage 입니다." . "</p>";
              }

              function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
              }

              if(isset($tStage))
              {

                $servername = "localhost";
                $username = "bkyoung311";
                $password = "ABCancer311";
                $dbname = "bkyoung311";

                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);
                // Check connection
                if ($conn->connect_error) {
                  die("Connection failed: " . $conn->connect_error);
                }

                $sql = "INSERT INTO ABCancer (name, T, N, M)
                VALUES ('$name', '$tStage', '$nStage', '$mStage')";

                if ($conn->query($sql) === TRUE) {
                  echo "New record created successfully";
                } else {
                  echo "Error: " . $sql . "<br>" . $conn->error;
                }

                $conn->close();

                header("Location: Second.php?name=$name");
              }

              ?>
            </p>
          </div>
        </div>
      </div>
    </body>
  </HTML>
