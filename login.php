<?php
    session_start();
	
	
	if(isset($_POST["remember"])) {
		setcookie ("LIBRARIAN_ID",$_POST["LIBRARIAN_ID"],time()+ 3600);
		setcookie ("LIBRARIAN_PASS",$_POST["LIBRARIAN_PASS"],time()+ 3600);
		
	} else {
		setcookie("LIBRARIAN_ID","");
		setcookie("LIBRARIAN_PASS","");
	}

    $message="";
    if(count($_POST)>0) {
        $con = mysqli_connect('localhost','root','','dbtshirt') or die('Unable To connect');
        $result = mysqli_query($con,"SELECT * FROM LIBRARIAN WHERE LIBRARAN_ID='" . $_POST["LIBRARIAN_ID"] . "' and LIBRARIAN_PASS = '". $_POST["LIBRARIAN_PASS"]."'");
        $row  = mysqli_fetch_array($result);
        if(is_array($row)) {
        $_SESSION["LIBRARIAN_ID"] = $row['LIBRARIAN_ID'];
		$admin = $row['LIBRARIAN_ID'];
        } else {
         $message = "Invalid Librarian ID and Password!";
        }
    }

<?php include 'header.php'; ?>

<form align="center" method="POST" action="">
<div class="message"><?php if($message!="") { echo $message; } ?></div>

  <img src="library.jpeg" alt="Logo" width="445" height="250" align="center"><br>
  
  <label for="LIBRARIAN_ID" style="font-family: Verdana, Geneva, Tahoma, sans-serif ;">Librarian ID:</label><br>
  <input type="text" id="LIBRARIAN_ID" name="LIBRARIAN_ID" value="<?php if(isset($_COOKIE["LIBRARIAN_ID"])) { echo $_COOKIE["LIBRARIAN_ID"]; } ?>"><br>
  
  
  <label for="LIBRARIAN_PASS" style="font-family: Verdana, Geneva, Tahoma, sans-serif ;" >Password:</label><br>
  <input type="LIBRARIAN_PASS" id="pass" name="LIBRARIAN_PASS"
  value="<?php if(isset($_COOKIE["LIBRARIAN_PASS"])) { echo $_COOKIE["LIBRARIAN_PASS"]; } ?>"><br>
  <input type="checkbox" onclick="myFunction()" align="left"> Show Password <br><br>

          <script>
          function myFunction() {
            var x = document.getElementById("LIBRARIAN_PASS");
            if (x.type === "LIBRARIAN_PASS") {
              x.type = "text";
            } else {
              x.type = "LIBRARIAN_PASS";
            }
          }
          </script>
  
  <input type="submit" value="Log In">
  <input type="reset" value="Reset"><br>
  <input type="checkbox" name="remember" id="LIBRARIAN_ID"> Remember Password? 
  
</form> <br> <br>

<?php include 'footer.php'; ?>
?>