<?php

$Username = $_POST['fname'];
echo $Username;
$Password = $_POST['fpass'];
echo $Password;
$Email = $_POST['fmail'];
$New_pass = hash('sha1', $Password);

$conn = new mysqli('localhost:3306', 'root', '', 'pdctarp');
if ($conn->connect_error) {
    die('Connection Failed : ' . $conn->connect_error);
} else {
    $user = mysqli_query($conn, "SELECT Username from signup where Username='$Username'");
    $result = mysqli_num_rows($user);
    if ($result > 0) {
        echo '<script>alert("Sorry, this username already exists. Please select other usernames.");window.location="http://localhost/HELPMATE/Webpages/login.html";</script>';
    } else if (empty($Username)) {
        echo '<script>alert("Please enter username properly");window.location="http://localhost/HELPMATE/Webpages/sign_up.html";</script>';
    } else if (empty($Password)) {
        echo '<script>alert("Please enter password properly");window.location="http://localhost/HELPMATE/Webpages/sign_up.html";</script>';
    } else if (empty($Email)) {
        echo '<script>alert("Please enter email properly");window.location="http://localhost/HELPMATE/Webpages/sign_up.html";</script>';
    } else if (strlen($Password) < 8 or strlen($Password) > 20) {
        echo '<script>alert("A password should have 8 to 20 characters");window.location="http://localhost/HELPMATE/Webpages/sign_up.html";</script>';
    } else if (!preg_match("#[0-9]+#", $Password)) {
        echo '<script>alert("A Password should have a number");window.location="http://localhost/HELPMATE/Webpages/sign_up.html";</script>';
    } else if (!preg_match("#[A-Z]+#", $Password)) {
        echo '<script>alert("A Password should have one capital letter");window.location="http://localhost/HELPMATE/Webpages/sign_up.html";</script>';
    } else if (!preg_match("#\W+#", $Password)) {
        echo '<script>alert("A Password should have one special cheacter");window.location="http://localhost/HELPMATE/Webpages/sign_up.html";</script>';
    } else {
        $stmt = $conn->prepare("insert into signup(Username,Password,Email) values(?, ?, ?)");
        $stmt->bind_param('sss', $Username, $New_pass, $Email);
        $stmt->execute();
        echo '<script>alert("Your account has been created. Please login to go to your homepage");window.location="http://localhost/HELPMATE/Webpages/login.html";</script>';
        $stmt->close();
        $conn->close();
    }
}
?>