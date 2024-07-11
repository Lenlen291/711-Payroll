<?php
$hostName = "localhost";
$userName = "root";
$password = "";
$databaseName = "softeng";
 $conn = new mysqli($hostName, $userName, $password, $databaseName);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);    
}


if(isset($_POST['update'])){
    $user_id=$_POST['update'];
    
    $sql="SELECT * FROM employee where id = $id";
    $result=mysqli_query($con,$sql);
    $response=array();
    while($row=mysqli_fetch_assoc($result)){
        $response=$row;
    }
    echo json_encode($response);
}else{
    $response['status']=200;
    $response['message']="Invalid or data not found";
}



//update query
if(isset($_POST['hiddendata'])){
    $uniqueid=$_POST['hiddendata'];
    $id_number = $_POST['update-id_number'];
    $branch = $_POST['update-branch'];
    $name = $_POST['update-name'];
    $address = $_POST['update-address'];
    $email = $_POST['update-email'];
    $contact_number = $_POST['update-contact_number'];
    $bank_account = $_POST['update-bank_account'];
    $basic_pay = $_POST['update-basic_pay'];
    $salary = $_POST['update-salary'];
    $username = $_POST['update-username'];
    $password = $_POST['update-password'];
    $status = $_POST['update-status'];

    $sql="UPDATE employee set id_number='$id_number',branch='$branch',name='$name',address='$address',email='$email',contact_number='$contact_number',bank_account='$bank_account',basic_pay='$basic_pay',salary='$salary',username='$username',password='$password',status='$status' where id=$uniqueid";

    $result=mysqli_query($con,$sql);
}
?>


<h5 class="modal-title" id="exampleModalLabel">Update Details</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span></button>

<label for="updatename">ID Number</label>
<input type="text" id="update-id_number" placeholder="Enter ID Number">

<label for="updateemail">branch</label>
<input type="email" id="update-branch" placeholder="Enter Branch">

<label for="updatemobile">Name  </label>
<input type="text" id="update-name" placeholder="Enter your Name">

<label for="updateplace">Address</label>
<input type="text" id="update-address" placeholder="Enter Address">

<label for="updatename">Email</label>
<input type="text" id="update-email" placeholder="Enter Email">

<label for="updateemail">Contact Number</label>
<input type="email" id="update-contact_number" placeholder="Enter Contact Number">

<label for="updatemobile">Bank Account</label>
<input type="text" id="update-bank_account" placeholder="Enter your Bank Account">

<label for="updateplace">Basic Pay</label>
<input type="text" id="update-basic_pay" placeholder="Enter Basic Pay">

<label for="updatename">Salary</label>
<input type="text" id="update-salary" placeholder="Enter Salary">

<label for="updateemail">Username</label>
<input type="email" id="update-username" placeholder="Enter Username">

<label for="updatemobile">Password</label>
<input type="text" id="update-password" placeholder="Enter Password">

<label for="updateplace">status</label>
<input type="text" id="update-status" placeholder="Enter Status">

<button type="button" class="btn btn-dark" onclick="updateDetails()">Update</button>
<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
<input type="hidden" id="hiddendata">

