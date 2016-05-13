<?php
    require ('steamauth/steamauth.php');  
?>

<!!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Introducing Gaming Analyst">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>Gaming Analyst</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.indigo-pink.min.css">
    <script defer src="https://code.getmdl.io/1.1.3/material.min.js"></script>
      
    <!-- Page styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.min.css">
    <link rel="stylesheet" href="styles.css">
    <style>
    #view-source {
      position: fixed;
      display: block;
      right: 0;
      bottom: 0;
      margin-right: 40px;
      margin-bottom: 40px;
      z-index: 900;
    }
        .table {
            table-layout: fixed;
            word-wrap: break-word;
        }
        
        .bg{
            background: rgba(10,20,30,.1);
            position: absolute;
            margin-top: 90px;
            width: 1600px;
            height: 250px;
            border-radius: 2px;
        }

        .imgs{
            display: inline-block;
            margin-left: 5px;
            margin-right: auto;
            margin-top: 10px;
            margin-bottom: auto;
            height: 230px;
            border-radius: 1px;
            
        }
        
        .personname{
           font-size: 18px;
            font-family: sans-serif;
            color: #79d340;
        }
        
    </style>
  </head>
  <body>
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
      <div class="android-header mdl-layout__header mdl-layout__header--waterfall">
        <div class="mdl-layout__header-row">
          <span class="android-title mdl-layout-title">
            <img class="android-logo-image" src="images/android-logo.png">
          </span>
          <!-- Add spacer, to align navigation to the right in desktop -->
          <div class="android-header-spacer mdl-layout-spacer"></div>
          <div class="android-search-box mdl-textfield mdl-js-textfield mdl-textfield--expandable mdl-textfield--floating-label mdl-textfield--align-right mdl-textfield--full-width">
            <label class="mdl-button mdl-js-button mdl-button--icon" for="search-field">
              <i class="material-icons">search</i>
            </label>
            <div class="mdl-textfield__expandable-holder">
              <input class="mdl-textfield__input" type="text" id="search-field">
            </div>
          </div>
            
          <!-- Navigation -->
          <div name= "top" class="android-navigation-container">
            <nav class="android-navigation mdl-navigation">
              <a class="mdl-navigation__link mdl-typography--text-uppercase" href="csgo.php">CS:GO</a>
                <a class="mdl-navigation__link mdl-typography--text-uppercase" href="dota2.php">DOTA 2</a>
              <a class="mdl-typography--text-uppercase"><?php
                if(!isset($_SESSION['steamid'])) {
                echo loginbutton("small");
	               
	       }  else {
                include ('steamauth/userInfo.php');
	           
                  echo "Welcome, " . $steamprofile['personaname']
               ?>  		
		<?php
		}    
		?></a>
                
            </nav>
          </div>
          <span class="android-mobile-title mdl-layout-title">
            <img class="android-logo-image" src="images/android-logo-white.png">
          </span>
          <button class="android-more-button mdl-button mdl-js-button mdl-button--icon mdl-js-ripple-effect" id="more-button">
            <i class="material-icons">more_vert</i>
          </button>
          <ul class="mdl-menu mdl-js-menu mdl-menu--bottom-right mdl-js-ripple-effect" for="more-button">
            <li class="mdl-menu__item">About</li>
            <li class="mdl-menu__item">Settings</li>
          </ul>
        </div>
      </div>

        <div class="android-drawer mdl-layout__drawer">
        <span class="mdl-layout-title">
          <img class="android-logo-image" src="images/android-logo.png">
        </span>
        <nav class="mdl-navigation">
            <span class="mdl-navigation__link">
            
            <?php
                if(!isset($_SESSION['steamid'])) {

                    echo "<center>Welcome Guest. Please Login!</center><br>";
                    echo loginbutton("small"); //login button

                }  else {
                    include ('steamauth/userInfo.php');

                    //Protected content
               
                    echo '<img class="img_profile" href="'.$steamprofile['profileurl'].'" src="'.$steamprofile['avatarfull'].'"/><br>';
                   echo '<a class="personname"><center>' . $steamprofile['personaname']. '</center></a>';

                }    
            ?>
            </span>
            <div class="android-drawer-separator"></div>
            <a class="mdl-navigation__link" href="csgo.php">CS:GO</a>
            <a class="mdl-navigation__link" href="dota2.php">DOTA 2</a>
            <div class="android-drawer-separator"></div>
            <a class="mdl-navigation__link" href="">Settings</a>
            <a class="mdl-navigation__link" href="">About</a>
            <a class="mdl-navigation__link">
              <?php
                if(!isset($_SESSION['steamid'])) {

                }  else {
                    include ('steamauth/userInfo.php');

                   echo '<a class="personname"><center>' . logoutbutton() . '</center></a>';

                }    
            ?></a>
        </nav>
      </div>
      
        
        
      <div class="android-content mdl-layout__content">
        <a name="top"></a>
        <div class="mdl-typography--text-center">
          <div class="logo-font android-slogan">Escape reality. Play games</div>
          <div class="logo-font android-sub-slogan">Welcome to Gaming Analyst</div>
              
            <div class="bg">
            <div class="choose-game">
                <a href="csgo.php"><img class="imgs" alt="CS:GO" src="images/cs-go-img.png"/></a>
                <a href="dota2.php"><img class="imgs" alt="DOTA 2" src="images/dota-2-img.jpg" href="/main-pages/dota2.html"/></a>
            </div>
        </div>
            
          <div class="logo-font android-create-character">
            <a><img src="images/andy.png"> Choose Your Game</a>
          </div>      
        <footer class="android-footer mdl-mega-footer">
          <div class="mdl-mega-footer--top-section">
            <div class="mdl-mega-footer--right-section">
              <a class="mdl-typography--font-light" href="#top">
                Back to Top
                <i class="material-icons">expand_less</i>
              </a>
            </div>
          </div>

          <div class="mdl-mega-footer--middle-section">
            <p class="mdl-typography--font-light">© 2016 ISMAI</p>
          </div>
          <div class="mdl-mega-footer--bottom-section">
            <a class="android-link android-link-menu mdl-typography--font-light" id="version-dropdown">
              Developers
              <i class="material-icons">arrow_drop_up</i>
            </a>
            <ul class="mdl-menu mdl-js-menu mdl-menu--top-left mdl-js-ripple-effect" for="version-dropdown">
              <li class="mdl-menu__item">Mário Rocha</li>
              <li class="mdl-menu__item">Hugo Brandão</li>
              <li class="mdl-menu__item">Francisco Garcia</li>
            </ul>
          </div>
            
        </footer>
      </div>
    </div>
      </div>
    <script src="https://code.getmdl.io/1.1.3/material.min.js"></script>
  </body>
</html>

    
    