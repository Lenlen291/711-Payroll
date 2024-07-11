<?php
include(".get_employee.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" href="style/home.css">
    <link rel="stylesheet" href="./style/dashboard.css">
    <link rel="icon" href="./image/logo.png" type="image/x-icon">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>7 Eleven-Payroll</title>
    <style>

    </style>
</head>

<body>
    <nav class="nav">
        <p class="nav__title">DASHBOARD</p>
        <div class="navigation">

            <div class="userBx">
                <div class="imgBx">
                    <img src="./image/user.jpg" alt="user avatar" />
                </div>
                <p class="username">ADMIN</p>
            </div>
            <div class="menuToggle"></div>
            <ul class="menu">
                <li>
                    <a href="#">Profile</a>
                </li>
                <li>
                    <a href="#">Settings</a>
                </li>
                <li>
                    <a href="#">Help</a>
                </li>
                <li>
                    <a href="logout.php">Logout</a></h2>
                </li>
            </ul>
        </div>
    </nav>
    <div class="wrapper">
        <div class="sidebar">
            <div class="profile">
                <img class="logo" src="./image/logo.png" alt="logo">

                <ul>
                    <li>
                        <a href="m-home.php" class="active">
                            <img class="icon" src="./image/home-icon.png">
                            <span class="item">DASHBOARD</span>
                        </a>
                    </li>
                    <li>
                        <a href="m-employee.php">
                            <img class="icon" src="./image/employee-icon.png">
                            <span class="item">EMPLOYEE</span>
                        </a>
                    </li>
                    <li>
                        <a href="m-position.php">
                            <img class="icon" src="./image/position-icon.png">
                            <span class="item">POSITION</span>
                        </a>
                    </li>
                    <li>
                        <a href="m-payroll.php">
                            <img class="icon" src="./image/payroll.png">
                            <span class="item">PAYROLL</span>
                        </a>
                    </li>
                    <li>
                        <a href="m-deductions.php">
                            <img class="icon" src="./image/allowance.png">
                            <span class="item">DEDUCTIONS</span>
                        </a>
                    </li>
                    <li>
                        <a href="m-allowance.php">
                            <img class="icon" src="./image/allowance.png">
                            <span class="item">ALLOWANCE</span>
                        </a>
                    </li>
                    <li>
                        <a href="m-attendance.php">
                            <img class="icon" src="./image/attendance.png">
                            <span class="item">ATTENDANCE</span>
                        </a>
                    </li>
                    <li>
                </ul>
            </div>
        </div>
    </div>
    <div class="box">
        <div class="boxes">
            <img style="width: 80px; margin-left:50px;margin-top:-50px;" src="./image/Picture1.png">
            <p class="description">Total Employee</p>
            <hr>
            <p class="value"><?php echo $var; ?> </p>
        </div>
        <div class="boxes">
            <img style="width: 80px; margin-left:50px;margin-top:-50px;" src="./image/Picture1.png">
            <p class="description">Active</p>
            <hr>
            <p class="value"><?php echo $act; ?></p>

        </div>
        <div class="boxes">
            <img style="width: 80px; margin-left:50px;margin-top:-50px;" src="./image/Picture1.png">
            <p class="description">Deactive</p>
            <hr>
            <p class="value"><?php echo $unact; ?></p>
        </div>
    </div>
</body>
<script>
let menuToggle = document.querySelector(".menuToggle");
let navigation = document.querySelector(".navigation");
menuToggle.onclick = function() {
    navigation.classList.toggle("active");
};
</script>

</html>