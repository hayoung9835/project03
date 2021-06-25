<?php header("Content-Type:text/html;charset=utf-8"); ?>
<?php
	include "define.php";

   $id = $_GET["id"];

    $pass = $_POST["pass"];
    $name = $_POST["name"];
    $email1  = $_POST["email1"];
    $email2  = $_POST["email2"];

    $email = $email1."@".$email2;

    $con = mysqli_connect("localhost", DBuser, DBpass, DBname);
    $sql = "update members set pass='$pass', name='$name' , email='$email'";
    $sql .= " where id='$id'";
    mysqli_query($con, $sql);

    mysqli_close($con);     

    echo "
	      <script>
              location.href = 'index2.php';
	          //location.href = 'index.php';
	      </script>
	  ";

?>