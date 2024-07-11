<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="./style/login.css">
    <link rel="stylesheet" href="./style/common.css">
    <link rel="icon" href="./image/logo.png" type="image/x-icon">
	<title>Login Page</title>
</head>

<body>
    <nav class="nav"><p class="nav__title">LOG IN</p></nav>
    <div class="wrapper">
    <div class="sidebar">
    <div class="profile">
        <img class="logo" src="./image/logo.png" alt="logo">
    </div>

<div class="overlay">
            <form action="./accept_login.php" method="post">
              <div class="con">
                <header class="head-form">
                  <h2>Log In</h2>
                  <p>login here using your username and password</p>
                </header>
                <br>

                <div class="field-set">
                  <span class="input-item">
                    <i class="fa fa-user-circle"><input class="form-input" type="text" placeholder="Username" name="username" value="" required></i>
                </span>
                           
                 <br>
                  <span class="input-item">
                    <i class="fa fa-key"><input class="form-input" type="password" id="pwd" placeholder="Password" name="password" value="" required></i> <span><i class="fa fa-eye" aria-hidden="true" type="button" id="eye"></i></span>
                </span>
                  <br>
                  <?php if (isset($_GET['error'])) { ?>
                    <p style="color: darkred; padding: 10px; text-align: center;"><?php echo $_GET['error']; ?></p>
                    <?php } ?>
                  <input class="login_button" type="submit" name="login" value="LOGIN">
                  
                </div>        
              </div>
            </form>
          </div>
        </div>
    </div>
</body>
<script>
function show() {
  var p = document.getElementById("pwd");
  p.setAttribute("type", "text");
}

function hide() {
  var p = document.getElementById("pwd");
  p.setAttribute("type", "password");
}

var pwShown = 0;

document.getElementById("eye").addEventListener(
  "click",
  function () {
    if (pwShown == 0) {
      pwShown = 1;
      show();
    } else {
      pwShown = 0;
      hide();
    }
  },
  false
);
</script>
</html>
