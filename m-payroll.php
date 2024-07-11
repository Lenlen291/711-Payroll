<?php
include(".get_payroll.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" href="./style/home.css">
    <link rel="stylesheet" href="./style/common.css">
    <link rel="stylesheet" href="./style/table.css">
    <link rel="stylesheet" href="./style/modal_form.css">
    <link rel="icon" href="./image/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>7 Eleven-Payroll</title>
    <style>
    select {
        height: 45px;
        width: 100%;
        outline: none;
        font-size: 16px;
        border-radius: 5px;
        padding-left: 15px;
        border: 1px solid #ccc;
        border-bottom-width: 2px;
        transition: all 0.3s ease;
    }
    </style>
</head>

<body>
    <nav class="nav">
        <p class="nav__title">PAYROLL</p>
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
                        <a href="m-home.php">
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
                        <a href="m-payroll.php" class="active">
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
    </div>

    <section class="content">
        <button data-modal-target="modal1" name="add" class="addbutton"><i class="fa fa-plus"></i> Add</button>
        <div class="box-body">
            <table id="example1" class="form">
                <thead>
                    <th>Name</th>
                    <th>Allowance</th>
                    <th>Deduction</th>
                    <th>Basic Pay/Hour</th>
                    <!-- <th>Basic Earn</th>
    <th>Net Pay</th> -->
                    <th>Payslip</th>
                    <th>Action</th>

                </thead>
                <tbody>
                    <?php
    if(is_array($fetch_da)){      
    foreach($fetch_da as $data){
    ?>

                    <tr>
                        <td><?php echo $data['name']; ?></td>
                        <td><?php echo $data['allowance']; ?></td>
                        <td><?php echo $data['deduction']; ?></td>
                        <td><?php echo $data['basic_pay']; ?></td>

                        <td><a name="view" href=".view_payroll.php?id=<?php echo $data['id']; ?>"><i
                                    style="text-decoration: none; color: #039b77;" class="fa fa-eye"></i></a></td>
                        <td><a href=".delete_payroll.php?id=<?php echo $data['id']; ?>"><i
                                    style="text-decoration: none; color: #039b77;" class="fa fa-trash"></i></a></td>
                    </tr>
                    <?php
    }}
    else{ 
    ?>
                    <tr>
                        <td colspan="9">
                            <?php echo $fetch_da; ?>
                        </td>
                    <tr>
                        <?php

    }?>

                </tbody>
            </table>

        </div>
    </section>

    <div class="modal" id="modal1">
        <div class="modal-content">
            <span class="modal-close">&times;</span>
            <div class="title">PROCESS PAYROLL</div>


            <div class="content">
                <form action=".put_payroll.php" method="post">
                    <div class="user-details">

                    
                        <div class="input-box">
                            <span class="details">PAYROLL TYPE</span>
                            <select name="payroll_type" value="">
                                <option value="Monthly">Monthly</option>
                                <option value="Semi-monthly">Semi-monthly</option>
                            </select>
                        </div>
                        <div class="input-box">
                            <span class="details">DATE FROM</span>
                            <div class="container">
                                <div class="container">
                                    <br />
                                    <div class="row">
                                        <div class='col-sm-3'>
                                            <div class="form-group">
                                                <div class='input-group date' id='datetimepicker1'>
                                                    <input type='text' name='date_from' class="form-control" />
                                                    <span class="input-group-addon"><span
                                                            class="glyphicon glyphicon-calendar"></span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="input-box">
                                <span class="details">DATE TO</span>
                                <div class="container">
                                    <div class="container">
                                        <br />
                                        <div class="row">
                                            <div class='col-sm-3'>
                                                <div class="form-group">
                                                    <div class='input-group date' id='datetimepicker1'>
                                                        <input type='text' name='date_to' class="form-control" />
                                                        <span class="input-group-addon"><span
                                                                class="glyphicon glyphicon-calendar"></span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <div class="input-box">
                                    <span class="details">EMPLOYEE NAME</span>
                                    <select name="name">
                                        <option value=""></option>
                                        <?php
              $employee = $conn->query("SELECT *,concat(firstname,' ',middlename,' ',lastname) as ename FROM employee order by ename asc");
              while($data=$employee->fetch_assoc()):
              ?>
                                        <option value="<?php echo $data['ename'] ?>"
                                            <?php echo isset($pid) && $pid == $data['id'] ? " selected" : '' ?>>
                                            <?php echo $data['ename'] ?></option>
                                        <?php endwhile; 
              ?>
                                    </select>
                                </div>

                                <div class="input-box">
                                    <span class="details">EMPLOYEE NUMBER</span>
                                    <select name="employee_number">
                                        <option value=""></option>
                                        <?php
                $pos = $conn->query("SELECT * from employee order by employee_number asc");
                while($row=$pos->fetch_assoc()):
                ?>
                                        <option value="<?php echo $row['employee_number'] ?>"
                                            <?php echo isset($pid) && $pid == $row['id'] ? " selected" : '' ?>>
                                            <?php echo $row['lastname'] ?>,
                                            <?php echo $row['firstname'] ?>-<?php echo $row['employee_number'] ?>
                                        </option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>

                                <div class="input-box">
                                    <span class="details">POSITION</span>
                                    <select name="position">
                                        <option value=""></option>
                                        <?php
                $pos = $conn->query("SELECT * from position order by title asc");
                while($row=$pos->fetch_assoc()):
                ?>
                                        <option value="<?php echo $row['title'] ?>"
                                            <?php echo isset($pid) && $pid == $row['id'] ? " selected" : '' ?>>
                                            <?php echo $row['title'] ?></option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>

                                <div class="input-box">
                                    <span class="details">BASIC SALARY PER HOUR</span>
                                    <select name="basic_pay">
                                        <option value="per hour"></option>
                                        <?php
                $pos = $conn->query("SELECT * from position order by title asc");
                while($row=$pos->fetch_assoc()):
                ?>
                                        <option value="<?php echo $row['rate'] ?>"
                                            <?php echo isset($pid) && $pid == $row['id'] ? " selected" : '' ?>>
                                            <?php echo $row['title'] ?> - ₱<?php echo $row['rate'] ?></option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>


                                <div class="input-box">
                                    <span class="details">TOTAL OVERTIME HOURS</span>
                                    <?php
        
          $overtime = mysqli_query($conn, "SELECT SUM(overtime) from attendance;");
          while ($row = mysqli_fetch_array($overtime)) {
              $total_overtime = $row['SUM(overtime)']; //total overtime
          }
        
      ?>

                                    <input name="overtime" value="<?php echo $total_overtime; ?>" readonly>
                                </div>

                                <div class="input-box">
                                    <span class="details">ALLOWANCE AMOUNT</span>
                                    <?php
        $allowance = mysqli_query($conn, "SELECT SUM(amount) from allowance;");
        while ($row = mysqli_fetch_array($allowance)) {
            $total_allowance = $row['SUM(amount)']; //total allowance
          }
          ?>
                                    <input name="allowance" value="<?php echo $total_allowance; ?>" readonly>
                                </div>
                                <div class="input-box">
                                    <?php
        $deduction = mysqli_query($conn, "SELECT SUM(percentage) from deduction;");
        while ($row = mysqli_fetch_array($deduction)) {
            $sum_deduction = $row['SUM(percentage)']; //total percentage
            
          }
          ?>
                                    <span class="details">TOTAL DEDUCTION PERCENTAGE</span>
                                    <input name="deduction" value="<?php echo $sum_deduction; ?>" readonly>
                                </div>


                                <div class="button" style="display: inline;">
                                    <input type="submit" name="submit" value="ADD">
                                </div>

                </form>
            </div>
        </div>


</body>
<script>
$('.timepicker').datetimepicker({
    format: 'HH:mm',
    icons: {
        up: 'fas fa-chevron-up',
        down: 'fas fa-chevron-down',
        previous: 'fas fa-chevron-left',
        next: 'fas fa-chevron-right'
    }
})
</script>
<script>
let menuToggle = document.querySelector(".menuToggle");
let navigation = document.querySelector(".navigation");
menuToggle.onclick = function() {
    navigation.classList.toggle("active");
};


const modalTriggerButtons = document.querySelectorAll("[data-modal-target]");
const modals = document.querySelectorAll(".modal");
const modalCloseButtons = document.querySelectorAll(".modal-close");

modalTriggerButtons.forEach((elem) => {
    elem.addEventListener("click", (event) =>
        toggleModal(event.currentTarget.getAttribute("data-modal-target"))
    );
});
modalCloseButtons.forEach((elem) => {
    elem.addEventListener("click", (event) =>
        toggleModal(event.currentTarget.closest(".modal").id)
    );
});
modals.forEach((elem) => {
    elem.addEventListener("click", (event) => {
        if (event.currentTarget === event.target)
            toggleModal(event.currentTarget.id);
    });
});

// Close Modal with "Esc"...
document.addEventListener("keydown", (event) => {
    if (event.keyCode === 27 && document.querySelector(".modal.modal-show")) {
        toggleModal(document.querySelector(".modal.modal-show").id);
    }
});

function toggleModal(modalId) {
    const modal = document.getElementById(modalId);

    if (getComputedStyle(modal).display === "flex") {
        // alternatively: if(modal.classList.contains("modal-show"))
        modal.classList.add("modal-hide");
        setTimeout(() => {
            document.body.style.overflow = "initial";
            modal.classList.remove("modal-show", "modal-hide");
            modal.style.display = "none";
        }, 200);
    } else {
        document.body.style.overflow = "hidden";
        modal.style.display = "flex";
        modal.classList.add("modal-show");
    }
}
$(function() {
    var bindDatePicker = function() {
        $(".date")
            .datetimepicker({
                format: "YYYY-MM-DD",
                icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-arrow-up",
                    down: "fa fa-arrow-down"
                }
            })
            .find("input:first")
            .on("blur", function() {
                // check if the date is correct. We can accept dd-mm-yyyy and yyyy-mm-dd.
                // update the format if it's yyyy-mm-dd
                var date = parseDate($(this).val());

                if (!isValidDate(date)) {
                    //create date based on momentjs (we have that)
                    date = moment().format("YYYY-MM-DD");
                }

                $(this).val(date);
            });
    };

    var isValidDate = function(value, format) {
        format = format || false;
        // lets parse the date to the best of our knowledge
        if (format) {
            value = parseDate(value);
        }

        var timestamp = Date.parse(value);

        return isNaN(timestamp) == false;
    };

    var parseDate = function(value) {
        var m = value.match(/^(\d{1,2})(\/|-)?(\d{1,2})(\/|-)?(\d{4})$/);
        if (m)
            value =
            m[5] + "-" + ("00" + m[3]).slice(-2) + "-" + ("00" + m[1]).slice(-2);

        return value;
    };

    bindDatePicker();
});
</script>

</html>