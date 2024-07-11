<?php
include(".get_employee.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" href="./style/home.css">
    <link rel="stylesheet" href="./style/common.css">
    <link rel="stylesheet" href="./style/table.css">
    <link rel="stylesheet" href="./style/modal_form.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="./image/logo.png" type="image/x-icon">
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
      <p class="nav__title">EMPLOYEE</p>
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
                <a href="#">Help</a
                >
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
                       <a href="m-employee.php" class="active">
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
        <section class="content">
<button data-modal-target="modal1" class="addbutton"><i class="fa fa-plus"></i> Add</button>
<div class="box-body">
<table id="example1" class="form">

      <th>EMPLOYEE NUMBER</th>
      <th>FIRST NAME</th>
      <th>MIDDLE NAME</th>
      <th>LAST NAME</th>
      <th>POSITION</th>

      <th>STATUS</th>
      <th>ACTION</th>
<tbody>
<?php
if(is_array($fetchData)){      
foreach($fetchData as $data){
?>

    <tr>

    <td><?php echo $data['employee_number']; ?></td>
    <td><?php echo $data['firstname']; ?></td>
    <td><?php echo $data['middlename']; ?></td>
    <td><?php echo $data['lastname']; ?></td>
    <td><?php echo $data['position']; ?></td> 
    <td><?php echo $data['status']; ?></td>
    </td>
    <td>
    <a href=".delete_employee.php?id=<?php echo $data['id']; ?>"><i style="text-decoration: none; color: #039b77;" class="fa fa-trash"></i></a>
    &nbsp&nbsp&nbsp&nbsp<a data-modal-target="modal2" href=".update_employee.php?id=<?php echo $data['id']; ?>"><i style="text-decoration: none; color: #039b77;" class='fas fa-edit'></a></td>
    </td>  
    </tr>
<?php
}}
else{ 
?>
    <tr>
    <td colspan="8"><?php echo $fetchData; ?></td>
    <tr>
<?php
}
?>
</tbody>
</table>
</div>
<div>

<div class="modal" id="modal1">
<div class="modal-content">
<span class="modal-close">&times;</span>
<div class="title">ADD EMPLOYEE</div>
<div class="content">
<form action=".put_employee.php" method="post">
<div class="user-details">
<div class="input-box">
<span class="details">EMPLOYEE NUMBER</span>
<input type="text" name="employee_number" placeholder="" required>
</div>
<div class="input-box">
<span class="details">FIRST NAME</span>
<input type="text" name="firstname" placeholder="" required>
</div>
<div class="input-box">
<span class="details">MIDDLE NAME</span>
<input type="text" name="middlename" placeholder="" required>
</div>
<div class="input-box">
<span class="details">LAST NAME</span>
<input type="text" name="lastname" placeholder="" required>
</div>
<div class="input-box">
<span class="details">POSITION</span>
<select name="position">
				<option value=""></option>
        <?php
			$pos = $conn->query("SELECT * from position order by title asc");
			while($row=$pos->fetch_assoc()):
			?>
				<option value="<?php echo $row['title'] ?>" <?php echo isset($pid) && $pid == $row['id'] ? " selected" : '' ?> ><?php echo $row['title'] ?></option>
			<?php endwhile; ?>
			</select>
</div>
<div class="input-box">
<span class="details">BASIC SALARY PER HOUR</span>
<select name="basic_salary">
				<option value="per hour"></option>
        <?php
			$pos = $conn->query("SELECT * from position order by title asc");
			while($row=$pos->fetch_assoc()):
			?>
				<option value="<?php echo $row['rate'] ?>" <?php echo isset($pid) && $pid == $row['id'] ? " selected" : '' ?> ><?php echo $row['title'] ?> - ₱<?php echo $row['rate'] ?></option>
			<?php endwhile; ?>
			</select>
</div>
<div class="input-box">
<span class="details">STATUS</span>
<select name="status" value=" ">
  <option value="active">ACTIVE</option>
  <option value="unactive">UNACTIVE</option>
</select>
</div>

<div class="button" style="display: inline;">
  <input type="submit" name="submit" value="ADD">
</div>
</form>
</div>
</div>
</div>

</body>
<script>

let menuToggle = document.querySelector(".menuToggle");
let navigation = document.querySelector(".navigation");
menuToggle.onclick = function () {
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
</script>
</html>