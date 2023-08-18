<?php
$f = 3;

$crop = "";
$grow = "";
$season = "";
$dm = "";
$uses = "";
$climatech = "";
$pest = "";
$ferti = "";


if (isset($_POST['sub'])) {
  if (isset($_POST['cname'])) {
    $host = "localhost:3306";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "pdctarp";
    $x = intval("2");

    $crop = ($_POST['cname']);

    $conn = mysqli_connect($host, $dbUsername, $dbPassword, $dbName);
    if ($conn == false) {
      $f = 1;
      // die('Could not connect to the database.');
    } else {
      $sql4 = "SELECT * FROM  cropinfo WHERE name = '$crop'";
      $res = mysqli_query($conn, $sql4);
      while ($row = $res->fetch_array()) {
        if ($rowcount = mysqli_num_rows($res) > 0) {

          // echo "<table border= '$x' >";
          // echo "<tr>";
          // echo "<th>Crop_name</th>";
          // echo "<th>Growing area</th>";
          // echo "<th>Season</th>";
          // echo "<th>Months to grow</th>";
          // echo "<th>Uses</th>";
          // echo "<th>Potential climate change</th>";
          // echo "<th>Pesticide</th>";
          // echo "<th>Fertilizer</th>";
          // echo "</tr>";
          // echo "<tr>";
          // echo "<td>" . $row['name'] . "</td>";
          // echo "<td>" . $row['garea'] . "</td>";
          // echo "<td>" . $row['Season'] . "</td>";
          // echo "<td>" . $row['month'] . "</td>";
          // echo "<td>" . $row['uses'] . "</td>";
          // echo "<td>" . $row['changes'] . "</td>";
          // echo "<td>" . $row['fertilizer'] . "</td>";
          // echo "<td>" . $row['pesticide'] . "</td>";
          // echo "</tr>";

          $crop = $row['name'];
          $grow = $row['garea'];
          $season = $row['Season'];
          $dm = $row['month'];
          $uses = $row['uses'];
          $climatech = $row['changes'];
          $pest = $row['pesticide'];
          $ferti = $row['fertilizer'];

          $f = 0;

        } else {
          $f = 2;
        }
        echo "</table>";
      }
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="http://localhost/HELPMATE/Stylesheets/search_styles.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Cormorant:ital,wght@1,500&family=Lobster+Two:ital@1&family=Noto+Sans+TC&family=Poiret+One&family=Poppins:wght@300&family=Srisakdi&family=Tangerine:wght@700&family=Varela+Round&display=swap"
    rel="stylesheet" />
  <title>SEARCH CROP</title>
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
    <div class="search">
      <h1>CROP SEARCH ENGINE</h1>
      <form action="" , method="POST">
        <input type="text" name="cname" id="sb" placeholder="Get to know about the crop..." />
        <button type="submit" name='sub'>
          <img src="http://localhost/HELPMATE/Resources/search.png" alt="search icon" />
        </button>
      </form>
      <?php
      if ($f == 1) {
        echo "<div class='resp'>";
        echo "<h1>Connection to database failed. Please try again!</h1>";
        echo "</div>";
      } else if ($f == 2) {
        echo "<h1>Sorry, no records found!</h1>";

      } else if ($f == 0) {
        echo "<div class='resp'>";
        echo "<h1>" . $crop . "</h1><br>";
        echo "<ol>
          <li>Area Required: " . $grow . "</li>" .
          "<li>Suitable Season: " . $season . "</li>" .
          "<li>Growth Duration: " . $dm . "</li>" .
          "<li>Crop Uses: " . $uses . "</li>" .
          "<li>Possible Climate Changes: " . $climatech . "</li>" .
          "<li>Fertilizer Required: " . $ferti . "</li>" .
          "<li>Pesticide Required: " . $pest . "</li>" .
          "</ol>";
        echo "</div>";
      }
      ?>
    </div>
  </div>
  </div>
</body>

</html>