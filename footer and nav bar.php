<?php
session_start();

$loggedin_userid = $_SESSION['userid'];

include 'conn.php';
// Ensure $loggedin_userid is set and is a valid value
$loggedin_userid = isset($_SESSION['userid']) ? intval($_SESSION['userid']) : 0;

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - OnlyYou!</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
footer {
    background-color: #333;
    color: #f8e0e6;
    padding: 20px 0;
    text-align: center;
    width: 100%;
}

.footer-container {
    margin-left: 15%;
    margin-top: -2px;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.footer-logo img {
    width: 150px;
    margin-bottom: 20px;
}

.footer-links ul,
.footer-social ul {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    gap: 20px;
}

.footer-links a,
.footer-social a {
    color: #f8e0e6;
    text-decoration: none;
}


.footer-contact {
    margin-top: 20px;
}

.footer-copyright {
    margin-top: 10px;
}

@media screen and (max-width: 768px) {
       
        }
        .footer.footer-container {
            max-width: 50%;
        }
    
    
    </style>
<body>
<!-- ======= Mobile nav toggle button ======= -->
<i class="bi bi-list mobile-nav-toggle d-xl-none"></i>

<!-- ======= Header ======= -->
<header id="header">
    <div class="d-flex flex-column">
        <div class="profile">
            <?php
            echo "<br>";
            $sql_fetch_profile_photo = "SELECT profile_picture FROM users WHERE userid = $loggedin_userid";
            $result_profile_photo = $conn->query($sql_fetch_profile_photo);
            if ($result_profile_photo->num_rows > 0) {
                $row_profile_photo = $result_profile_photo->fetch_assoc();
                $profile_photo_url = $row_profile_photo['profile_picture'];
                echo "<img src='$profile_photo_url' class='user-photo'>";
            } else {
                echo "<img src='path_to_default_placeholder_image.jpg' class='user-photo'>";
            }
            ?>
            <h1 class="text-light"><a href="dashboard.php"><?php echo isset($_SESSION['fname']) ? $_SESSION['fname'] : ''; ?></a></h1>
        </div>
        <nav id="navbar" class="nav-menu navbar">
            <ul>
                <li><a href="dashboard.php" class="nav-link scrollto "><i class="bx bx-home"></i> <span>Dashboard</span></a></li>
                <li><a href="user_profile.php" class="nav-link scrollto "><i class="bx bx-user"></i> <span>View Profile</span></a></li>
                <li><a href="about.php" class="nav-link scrollto "><i class="bi bi-info-circle"></i> <span>About Us</span></a></li>           
                <li><a href="contacts.php" class="nav-link scrollto active "><i class='bx bx-phone'></i> <span>Contact Us</span></a></li>
            </ul>
        </nav>
    </div>
</header>
<script src="assets/js/main.js"></script>
<div class="footer-links">
            <ul>
               <br><br><br><br> </ul>
        </div>
 <!-- Footer -->
 <footer>
    <div class="footer-container">
        
        <div class="footer-links">
            <ul>
                <li><a href="about.php">About Us</a></li>
                <li><a href="FAQ.php">FAQ</a></li>
                <li><a href="Privacypolicy.php">Privacy Policy</a></li>
                <li><a href="terms.php">Terms of Service</a></li>
                <li><a href="contacts.php">Contact Us</a></li>
            </ul>
        </div>
        <div class="footer-social">
           
            <ul>  
                <li><a href="https://facebook.com" target="_blank"><i class='bx bxl-facebook'></i></a></li>
                <li><a href="https://twitter.com" target="_blank"><i class='bx bxl-twitter'></i></a></li>
                <li><a href="https://instagram.com" target="_blank"><i class='bx bxl-instagram'></i></a></li>
                <li><a href="https://linkedin.com/company" target="_blank"><i class='bx bxl-linkedin'></i></a></li>
                <li><a href="https://youtube.com" target="_blank"><i class='bx bxl-youtube'></i></a></li>
            </ul>
        </div>
        <div class="footer-copyright">
            <p>&copy; 2024 OnlyYou! TI-TECH GROUP. All rights reserved.</p>
        </div>
    </div>
</footer>
</body>
</html>

<?php
$conn->close();
?>
