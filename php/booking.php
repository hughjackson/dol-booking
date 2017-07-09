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

<p class="w3-margin-left color-text-1 font-cursive w3-xxlarge">1. Select your class!</p>
<div class="w3-white">
  <div class="w3-row">
<?php
	foreach ($ages as $age) {
?>
    <div class="w3-third">
      <div class="bgimg-class-<?php print $age[0]; ?> w3-card-2 w3-center">
        <div id="btn<?php print $age[0]; ?>" onclick="toggleSection('btn<?php print $age[0]; ?>', 'table<?php print $age[0]; ?>')" 
		class="toggle-button color-hover-1 w3-hover-opacity-none w3-white w3-opacity w3-center w3-padding-jumbo" style="height:100%">
          <span class="w3-xlarge font-chunky">
            <?php print $age[1] . "<br>" . $age[2]; ?>
          </span>
        </div>
      </div>
    </div>
<?php
	}
?>
  </div>
</div>

<a id="step2-anchor"></a>
<p id="step2" class="w3-hide w3-animate-bottom w3-margin-left color-text-1 font-cursive w3-xxlarge">2. Select your day/time...</p>

<?php
	foreach ($ages as $age) {
?>
<div id="table<?php print $age[0]; ?>" class="toggle-section w3-hide w3-animate-bottom">
<?php
		foreach (daysForClass($age[1]) as $day) {
?>
  <div class="w3-margin-top w3-margin-left w3-margin-right w3-padding-small color-2">
    <p class="w3-center w3-large text-color-3 font-chunky"><?php print $day?>s</p>
  </div>
  <div class="w3-margin-left w3-margin-right w3-row">
<?php
			foreach (timesForClass($age[1], $day) as $time) {
?>
    <div id="btn<?php print $time[2]; ?>" onclick="toggleSection2('btn<?php print $time[2]; ?>', 'sec-<?php print $day; ?>')" 
	class="toggle-button-2 w3-border w3-col <?php colSize($age[1], $day); ?> w3-padding-small color-3">
      <p class="w3-center w3-medium text-color-2 font-chunky"><?php print timeRange($time[0]) . "<br>" . $time[1]; ?></p>
    </div>
<?php
			}
?>
  </div>
<?php
		}
?>
</div> 
<?php
	}
?>



<a id="step3-anchor"></a>
<p id="step3" class="w3-hide w3-animate-bottom w3-margin-left color-text-1 font-cursive w3-xxlarge">3. Select your start date.</p>

<?php
	foreach ($days as $day) {
		$term = currentTerm()
?>
  <div id="sec-<?php print $day; ?>" class="toggle-section-2 w3-hide w3-animate-bottom">
<?php
		foreach (getTermOptions($day) as $opt) {
?>
    <a href="register" style="text-decoration: none">
      <div class="color-1 w3-margin w3-center w3-padding font-chunky w3-large">
<?php
			print "       <p>$opt[2] (Starting on $opt[0])</p>";
			print "       <p>$opt[1] lessons @6.5 + registration @15 = $opt[3]</p>";
?>
      </div>
    </a>
<?php
		}
?>
  </div>
<?php
	}
?>

<script>
function toggleSection(btn, sec) {
    x = document.getElementById("step2");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    }
    // Show next section
    var all = document.getElementsByClassName("toggle-section");
    for (i = 0; i < all.length; i++) {
    	if (all[i].id != sec) {
        	all[i].className = all[i].className.replace(" w3-show", "");
        } else if (all[i].className.indexOf("w3-show") == -1) {
        	all[i].className += " w3-show";
        }
    }
    // Active button
    var all = document.getElementsByClassName("toggle-button");
    for (i = 0; i < all.length; i++) {
    	if (all[i].id != btn && all[i].className.indexOf("w3-opacity") == -1) {
        	all[i].className = all[i].className.replace("color-1", "w3-white");
        	all[i].className += " w3-opacity";
        } else if (all[i].id == btn && all[i].className.indexOf("w3-opacity") != -1) {
        	all[i].className = all[i].className.replace("w3-white", "color-1");
        	all[i].className = all[i].className.replace(" w3-opacity", "");
        }
    }
    // scroll to ext step
    $('html, body').animate({
        scrollTop: $("#step2-anchor").offset().top
    }, 1000);

    // clear lower level buttons
    var all = document.getElementsByClassName("toggle-button-2");
    for (i = 0; i < all.length; i++) {
       all[i].className = all[i].className.replace("color-2", "color-3");
    }

}

function toggleSection2(btn, sec) {
    x = document.getElementById("step3");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    }
    // Show next section
    var all = document.getElementsByClassName("toggle-section-2");
    for (i = 0; i < all.length; i++) {
    	if (all[i].id != sec) {
        	all[i].className = all[i].className.replace(" w3-show", "");
        } else if (all[i].className.indexOf("w3-show") == -1) {
        	all[i].className += " w3-show";
        }
    }
    // Active button
    var all = document.getElementsByClassName("toggle-button-2");
    for (i = 0; i < all.length; i++) {
    	if (all[i].id != btn) {
        	all[i].className = all[i].className.replace("color-2", "color-3");
        } else {
        	all[i].className = all[i].className.replace("color-3", "color-2");
        }
    }
    // scroll to ext step
    $('html, body').animate({
        scrollTop: $("#step3-anchor").offset().top
    }, 1000);
}
</script>

</body>
</html>
