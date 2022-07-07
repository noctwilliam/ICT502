<?php
       
       session_start(); ?>
      
       <?php
       require "connect.php";
       
       
       $query = "SELECT *  FROM LIBRARIAN WHERE LIBRARIAN_ID = :librarianid AND LIBRARIAN_PASS = :password"; 
       //query is sent to the db to fetch row id.
       $stid = oci_parse( $connect, $query);
       if (isset($_POST['librarianid']) ||  isset($_POST['password'])){           
       $librarianid = $_POST['librarianid'];
       $password = $_POST['password'];
       }
       
      oci_bind_by_name($stid, ':librarianid', $librarianid);
      oci_bind_by_name($stid, ':password', $password);

      oci_execute($stid);
      $row = oci_fetch_array($stid, OCI_ASSOC);

      if(is_array($row)) {
        $_SESSION['LIBRARIAN_ID'] = $row['LIBRARIAN_ID'];
          header("Location: index.php");
            } else
             {
             echo "Invalid Librarian ID or Password!";
            }

     ?>


<?php include "header.php"; ?>
<form align="center" method="POST">

    <br><img src="img/library.jpg" alt="Logo" width="445" height="250" align="center"><br>
    <input type="text" name="librarianid" placeholder="Librarian ID" ><br/><br/>
    <input type="password" name="password" placeholder="Password"><br/><br/>
    <button type="submit">Log In</button>

</form>
<?php include 'footer.php'; ?>