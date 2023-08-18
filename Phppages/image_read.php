<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="http://localhost/HELPMATE/Stylesheets/image_read_styles.css" />
    <link rel="icon" href="login_icon.png" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Cormorant:ital,wght@1,500&family=Lobster+Two:ital@1&family=Noto+Sans+TC&family=Poiret+One&family=Poppins:wght@300&family=Srisakdi&family=Tangerine:wght@700&family=Varela+Round&display=swap"
        rel="stylesheet" />
    <title>Upload Crop Image</title>
</head>

<body>
    <div classs="reps">
        <?php
        $flg = 0;

        if (isset($_POST['img'])) {
            if (isset($_POST['fname'])) {
                $host = "localhost:3306";
                $dbUsername = "root";
                $dbPassword = "";
                $dbName = "pdctarp";

                $user_name = $_POST['fname'];

                $file_name = $_FILES['mp']['name'];
                $file_type = $_FILES['mp']['type'];
                $file_type = $_FILES['mp']['size'];
                $file_temp_loc = $_FILES['mp']['tmp_name'];
                $file_store = "D:/xampp/htdocs/HELPMATE/Crop_Images/" . $file_name;

                if (!move_uploaded_file($file_temp_loc, $file_store)) {
                    $flg = 1;
                }

                $conn = mysqli_connect($host, $dbUsername, $dbPassword, $dbName);

                if ($conn) {
                    $sql = "INSERT INTO crpimg VALUES('$user_name','$file_name')";
                    if (!mysqli_query($conn, $sql)) {
                        $flg = 1;
                    }
                } else {
                    echo "<p>All fields are not set</p>";
                    $flg = 1;
                    die();
                }
            } else {
                echo "<p>Submit button not set</p>";
                $flg = 1;
            }

            if ($flg == 0) {
                echo "<h1>IMAGE UPLOADED SUCCESSFULLY!</h1>";


                shell_exec(escapeshellcmd("Set-ExecutionPolicy -ExecutionPolicy RemoteSigned -Scope Process"));
                shell_exec(escapeshellcmd("D:/xampp/htdocs/HELPMATE/Models/venv/Scripts/activate.bat"));

                $query = "python predictLeaf.py";
                $runCmd = $query;
                $command = escapeshellcmd($runCmd);
                $output = shell_exec($command);

                echo "<h1> the disese is " .$output. "</h1>";


            } else {
                echo "<h1>IMAGE UPLOAD UNSUCCESSFULL!</h1>";

            }
        }
        ?>
        <button>
            <a href="http://localhost/SM/html/login.html">Want Pesticides?</a>
        </button>
        <button id="b2"><a href="http://localhost/HELPMATE/Webpages/image_upload.html">UPLOAD
                AGAIN</a></button>
    </div>
</body>

</html>