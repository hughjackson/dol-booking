<?php 
	include "classes.php";
	include "terms.php";
?>
<!DOCTYPE html>
<html>
<title>Dance Out Loud</title>
<link rel="icon" href="./favicon.ico" type="image/x-icon">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3.css">
<link rel="stylesheet" href="w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Fredericka+the+Great|Raleway|Dancing+Script" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<style>
@font-face {
    font-family: playlist-caps;
    src: url("fonts/Playlist Caps.otf") format("opentype");
}
@font-face {
    font-family: playlist-script;
    src: url("fonts/Playlist Script.otf") format("opentype");
}
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}
body, html {
    height: 100%;
    line-height: 1.5;
}
/* Full height image header */
.bgimg-1 {
    background-size: cover;
    background-position:center;
    background-image: url("https://static.wixstatic.com/media/b80d9e_9693ef49f1bd4b43b9bcf6d73e64f180~mv2.jpg/v1/fill/w_1286,h_382,al_c,q_85,usm_0.66_1.00_0.01/b80d9e_9693ef49f1bd4b43b9bcf6d73e64f180~mv2.webp");
    min-height: 387px;
}
.trialpass-img {
    background-size: cover;
    background-position:center;
    background-image: url("https://static.wixstatic.com/media/b80d9e_27fbcf98bf5440cca05e4a900dcbab3e~mv2.jpg/v1/fill/w_280,h_208,al_c,q_80,usm_0.66_1.00_0.01/b80d9e_27fbcf98bf5440cca05e4a900dcbab3e~mv2.webp");
}
.bgimg-class-1, .bgimg-class-2, .bgimg-class-3 {
    background-size: cover;
    background-position:center;
    height:100px;
}
.bgimg-class-1 {
    background-image: url("https://static.wixstatic.com/media/b80d9e_c566cbe19ee3473995242da5949dd338~mv2.jpg/v1/fill/w_515,h_873,al_c,q_85,usm_0.66_1.00_0.01/b80d9e_c566cbe19ee3473995242da5949dd338~mv2.webp");
}
.bgimg-class-2 {
    background-image: url("https://static.wixstatic.com/media/b80d9e_51b96b18b72b46eb96c7c5cac28d2f44~mv2.jpg/v1/fill/w_515,h_846,al_c,q_85,usm_0.66_1.00_0.01/b80d9e_51b96b18b72b46eb96c7c5cac28d2f44~mv2.webp");
}
.bgimg-class-3 {
    background-image: url("https://static.wixstatic.com/media/b80d9e_2a19bfed261545c29d3150f52e080df0~mv2.jpg/v1/fill/w_1286,h_351,al_r,q_85,usm_0.66_1.00_0.01/b80d9e_2a19bfed261545c29d3150f52e080df0~mv2.webp");
}
.w3-bar .w3-button {
    padding: 16px;
}

.strip-centre{max-width:1200px; margin:0 auto}
.strip-centre-small{max-width:600px; margin:0 auto}
.anchor{
    display: block;
    position: relative;
    top: -95px;
    visibility: hidden;
    }

.class{display:none}

.w3-hover-opacity-none:hover {opacity: 1!important}
.font-logo {font-family:amatic sc, cursive; line-height:60%; font-size:35px}
.font-bold {font-family:playlist-caps,fantasy; line-height:110%}
.font-chunky {font-family:raleway,fantasy; line-height:110%}
.font-cursive {font-family:playlist-script,fantasy; line-height:110%}
.color-1, .color-hover-1:hover {background-color:#ffa8be!important; color:#ffffff!important;}
.color-text-1, .color-text-hover-1:hover {color:#ff8abd!important;}
.color-2, .color-hover-2:hover {background-color:#9ec6df !important; color:#000000!important;}
.color-text-2, .color-text-hover-2:hover {color:#9ec6d9 !important;}
.color-3, .color-hover-3:hover {background-color:#757575!important; color:#ffffff!important;}
.color-text-3, .color-text-hover-3:hover {color:#757575!important;}
.color-text-4, .color-text-hover-4:hover {color:#53555a!important;}
.color-text-5, .color-text-hover-5:hover {color:#2e2e2e!important;}
</style>


<body>

<div class="w3-container">
  <h2>Input Details</h2>
  <form>
    <input class="color-1 w3-round w3-margin-bottom w3-input w3-border" type="test" placeholder="Parent/Guardian Name">
    <input class="color-1 w3-round w3-margin-bottom w3-input w3-border" type="test" placeholder="Email">
    <input class="color-1 w3-round w3-margin-bottom w3-input w3-border" type="test" placeholder="Phone">
    <textarea class="color-1 w3-round w3-margin-bottom w3-input w3-border" type="test" placeholder="Addresss" rows="4"></textarea>
    <input class="color-1 w3-round w3-margin-bottom w3-input w3-border" type="test" placeholder="Dancer's Name">
    <input class="color-1 w3-round w3-margin-bottom w3-input w3-border" type="test" placeholder="Dancer's DOB">
    <input class="color-1 w3-round w3-margin-bottom w3-input w3-border" type="test" placeholder="Dancer's Shoe Size">
  </form>

<?php
	$class = $classes[$_GET['lesson']];
?>

 <h2>Terms and conditions</h2>
<?php if ($_GET['type'] == 'trial') { ?>

  <p>This is terms and conditions for trial</p>
<?php } else { ?>
  <p>This is terms and conditions for enrollment. They are longer</p>

<?php } ?>



 <h2>Booking Details</h2>

<?php if ($_GET['type'] == 'trial') {
	$option = getTrialOffers($class[0])[$_GET['option']];
?>

  <p>This is to confirm that you are booking in for <?php print $class[3];?> trial class at <?php print $class[2];?> on <?php print $option[0];?> for £<?php print $option[3];?>.</p>

<?php } else { 
	$option = getTermOptions($class[0])[$_GET['option']];
?>

  <p>This is to confirm that you are booking in for <?php print $class[3];?> classes at <?php print $class[2];?> on <?php print $class[0];?>s at <?php timeRange($class[1]);?>. Your first class will be on <?php print $option[0];?>, the total cost for <?php print $option[1];?> classes will be £<?php print $option[3];?>.</p>

<?php } ?>
  <p>You will now be directed to goCardless to setup a direct debit payment. Money will never be taken from your account without your permission. The initial amount will be taken today.</p>
  <button class="w3-button w3-round color-1">Pay Now</button>
</div>

</body>
</html>
