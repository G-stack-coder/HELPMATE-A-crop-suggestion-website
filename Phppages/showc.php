<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="http://localhost/HELPMATE/Stylesheets/showc_styles.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Cormorant:ital,wght@1,500&family=Lobster+Two:ital@1&family=Noto+Sans+TC&family=Poiret+One&family=Poppins:wght@300&family=Srisakdi&family=Tangerine:wght@700&family=Varela+Round&display=swap"
    rel="stylesheet" />
  <title>SUITABLE CROP</title>
</head>

<body>
  <div class="imgc">
    <div class="nav_bar">
      <ul>
        <li><a href="https://mkisan.gov.in">NEWS</a></li>
        <li><a href="http://localhost/HELPMATE/Webpages/homepage.html">HOME</a></li>
        <li><a href="http://localhost/HELPMATE/Webpages/login.html" id="lo">LOGOUT</a></li>
      </ul>
    </div>
    <div class="resp">
      <?php
      if (isset($_POST['sub'])) {
        if (isset($_POST['ph']) && isset($_POST['npkratio']) && isset($_POST['size']) && isset($_POST['smonth']) && isset($_POST['emonth']) && isset($_POST['sstate']) && isset($_POST['dist'])) {
          $host = "localhost:3306";
          $dbUsername = "root";
          $dbPassword = "";

          $dbName = "pdctarp";


          $ph = intval($_POST['ph']);
          //echo "$ph";
          $npkratio = $_POST['npkratio'];
          //echo "$npkratio";
          $size = $_POST['size'];
          //echo "$size";
          $smonth = $_POST['smonth'];
          $emonth = $_POST['emonth'];
          //echo "$availability";
          $state = $_POST['sstate'];
          // echo "$state";
          $district = $_POST['dist'];
          // echo "$district";

          
      
          $conn = mysqli_connect($host, $dbUsername, $dbPassword, $dbName);
          if ($conn == false) {
            die('Could not connect to the database.');
          } else {
            #$sql = "INSERT INTO helpmate VALUES ('$ph', '$npkratio', '$size','$availability', '$state', '$district')";
            #if (mysqli_query($conn, $sql)) {
              // echo "<h3>Data inserted in database successfully.</h3>";
            #}

          }
        } else {
          echo "All field are required.";
          die();
        }
      } else {
        echo "Submit button is not set";
      }
      
      shell_exec(escapeshellcmd("Set-ExecutionPolicy -ExecutionPolicy RemoteSigned -Scope Process"));
      shell_exec(escapeshellcmd("D:/xampp/htdocs/HELPMATE/Models/venv/Scripts/activate.bat"));

      $query = "python predict.py";
      $space = " ";
      $ph = strval($ph);
      $npkratio = strval($npkratio);
      $smonth = strval($smonth);
      $emonth = strval($emonth);
      $state = strval($state);
      $district = strval($district);

      $runCmd = $query.$space.$ph.$space.$npkratio.$space.$state.$space.$district.$space.$smonth.$space.$emonth;
      #echo $runCmd;
   

      $command = escapeshellcmd($runCmd);#.strval($ph) ." " .$npkratio ." " .$state ." " .$district);
     # .strval($ph) ." " .$npkratio ." " .$state ." " .$district
      #echo $command;
      $output = shell_exec($command);
      $output  = trim($output);
      echo $output;
      $crop = $output;
      



      // $linkToGet = "http://localhost/HELPMATE/Phppages/predict.py?npk=" . $npkratio . "&ph=" . $ph . "&state=" . $state . "&district" . $district;
      // $crop = file_get_contents($linkToGet);

      // echo $crop;




      // $conn2 = mysqli_connect($host, $dbUsername, $dbPassword, $dbName);
      // if ($conn2 == false) {
      //   die('Could not connect to the database.');
      // } else {
      //   $sql2 = "SELECT avgrain FROM  hweather WHERE ((minlat < '$lat') AND ('$lat' < maxlat) AND (minlongi < '$longi') AND ('$longi' < maxlongi))";
      //   $arr = array();
      //   $i = 0;
      //   $res = mysqli_query($conn2, $sql2);
      //   if ($rowcount = mysqli_num_rows($res) > 0) {
      //     echo "<h3>Average Rainfall observed in your land</h3>";
      //     echo "<ul>";
      //     while ($row = $res->fetch_array()) {
      //       $arr[$i] = $row['avgrain'];
      //       $i++;
      //       echo "<li>" . $row['avgrain'] . "</li>";
      //     }
      //     echo "</ul>";
      //     echo "<br>";
      //     echo "<br>";
      //     $res->free();
      //   } else {
      //     echo "No matching records are found.";
      //   }

      // }
      // // print_r($arr);
      // $sum = 0;
      // $count = 0;

      // foreach ($arr as $s) {
      //   $sum += $s;
      //   $count++;
      // }
      // $avg_php = $sum / $count;


      // $conn3 = mysqli_connect($host, $dbUsername, $dbPassword, $dbName);
      // if ($conn3 == false) {
      //   die('Could not connect to the database.');
      // } else {
      //   $sql3 = "SELECT name FROM  hcrop WHERE ((ph-2)<'$ph') AND ('$ph'<(ph+2) AND ('$availability'=availability)) AND (avgrainfall-100<'$avg_php') AND (avgrainfall+100>'$avg_php') ";
      //   $arr2 = array();
      //   $i2 = 0;
      //   $res = mysqli_query($conn3, $sql3);
      //   if ($rowcount = mysqli_num_rows($res) > 0) {
      //     echo "<h1>Suitable Crops for your land</h1>";
      //     echo "<br>";
      //     echo "<br>";
      //     while ($row = $res->fetch_array()) {
      //       $arr2[$i2] = $row['name'];
      //       $i2++;
      //       // echo "<tr>";
      //       //echo "<td><a href='cropdisplay.php#targetanchor'>" . $row['name'] . "</a></td>";
      
      //       //echo "<td>";
      
      //       //<form action="cropdisplay.php">
      //       //<input type="hidden" id="name" name="name" value="". $row['name'] ."" />
      //       //<input type="submit" value="Submit">
      
      //       //</form>
      
      //       //</td>";
      //     }
      //     $res->free();
      //   } else {
      //     echo "No matching records are found.";
      //   }

      // }

      // print_r($arr2);
      
      
      // echo $crop;
      // $x = intval("2");

      $conn4 = mysqli_connect($host, $dbUsername, $dbPassword, $dbName);
      if ($conn == false) {
        die('Could not connect to the database.');
      } else {
        $sql4 = "SELECT * FROM  cropinfo WHERE name = '$crop'  ";

        $res = mysqli_query($conn4, $sql4);
        while ($row = $res->fetch_array()) {
          if ($rowcount = mysqli_num_rows($res) > 0) {

            echo "<h2>" . $row['name'] . "</h2><br>";
            echo "<ol>
              <li>Area Required: " . $row['garea'] . "</li>" .
              "<li>Suitable Season: " . $row['Season'] . "</li>" .
              "<li>Growth Duration: " . $row['month'] . "</li>" .
              "<li>Crop Uses: " . $row['uses'] . "</li>" .
              "<li>Possible Climate Changes: " . $row['changes'] . "</li>" .
              "<li>Fertilizer Required: " . $row['fertilizer'] . "</li>" .
              "<li>Pesticide Required: " . $row['pesticide'] . "</li>" .
              "</ol>";

            //echo "<td>";
      
            //<form action="cropdisplay.php">
            //<input type="hidden" id="name" name="name" value="". $row['name'] ."" />
            //<input type="submit" value="Submit">
      
            //</form>
      
            //</td>";
      


            echo "</tr>";
          }
          echo "</table>";

        }
      }
      ?>
    </div>
  </div>
  </div>
</body>

</html>