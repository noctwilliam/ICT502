<?php
        require "connect.php";
        session_start();
        // global $connect;
        // $connect = oci_connect('books', 'localhost');
        if(isset($_POST['submit'])){
            $user = $_POST['username'];
            $pass = $_POST['password'];
            $result = oci_parse($connect, $sql);       
            oci_execute($result);
            $row = oci_fetch_all($result);
            if($row){
                    $_SESSION['user']=$user;
                    $_SESSION['time_start_login'] = time();
                    header("location: index.php");
            }else{

                echo "wrong password or username";
            }
        }



     ?>

<?php include 'header.php'; ?>


<form align="center" method="POST" action="">
<!-- <div class="message"><?php if($message!="") { echo $message; } ?></div> -->

  <img src="library.jpg" alt="Logo" width="445" height="250" align="center"><br>
  
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
  
  <input type="submit" value="Log In" class="button but">
  <a href = "addbooks.php" class="button but">
  <input type="reset" value="Reset"><br>
  <input type="checkbox" name="remember" id="LIBRARIAN_ID"> Remember Password? 
  
</form> <br> <br>

<?php include 'footer.php'; ?>
