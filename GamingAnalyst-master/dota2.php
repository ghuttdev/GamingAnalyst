<?php
    require ('steamauth/steamauth.php');  
?>

<!doctype html>
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
        
        .bg{
            background: rgba(10,20,30,.5);
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            right: 0;
            z-index: 10;
        }

        .imgs{
            display: inline-block;
            margin-left: auto;
            margin-right: auto;
            height: 230px;
        }
        
    </style>
  </head>

  <body>
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
      <div class="android-header mdl-layout__header mdl-layout__header--waterfall">
        <div class="mdl-layout__header-row">
          <span class="android-title mdl-layout-title">
            <img class="android-logo-image" src="images/android-logo.png" href="index.php">
          </span>
          <div class="android-header-spacer mdl-layout-spacer"></div>
          <div class="android-search-box mdl-textfield mdl-js-textfield mdl-textfield--expandable mdl-textfield--floating-label mdl-textfield--align-right mdl-textfield--full-width">
            <label class="mdl-button mdl-js-button mdl-button--icon" for="search-field">
              <i class="material-icons">search</i>
            </label>
            <div class="mdl-textfield__expandable-holder">
              <input class="mdl-textfield__input" type="text" id="search-field">
            </div>
          </div>
            
          <div name= "top" class="android-navigation-container">
            <nav class="android-navigation mdl-navigation">
                <a class="mdl-navigation__link mdl-typography--text-uppercase" href="index.php">HOME</a>
              <a class="mdl-navigation__link mdl-typography--text-uppercase" href="csgo.php">CS:GO</a>
                <a class="mdl-navigation__link mdl-typography--text-uppercase">
	               <?php
	                if(!isset($_SESSION['steamid'])) {
	        	        echo loginbutton("small");
			       }  else {
	    	            include ('steamauth/userInfo.php');
		                echo "Welcome, " . $steamprofile['personaname']
	               ?>  		
					<?php
					}    
					?>
				</a>
              </nav>
          </div>
          <span class="android-mobile-title mdl-layout-title">
            <img class="android-logo-image" src="images/android-logo.png">
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
          <img class="android-logo-image" src="images/android-logo-white.png">
        </span>
        <nav class="mdl-navigation">
             <span class="mdl-navigation__link">
            
            <?php
                if(!isset($_SESSION['steamid'])) {

                    echo "<center>Welcome Guest. Please Login!</center><br>";
                    echo loginbutton("small");

                }  else {
                    include ('steamauth/userInfo.php');

                    echo '<img class="img_profile" href="'.$steamprofile['profileurl'].'" src="'.$steamprofile['avatarfull'].'"/><br>';
                   echo '<a class="personname"><center>' . $steamprofile['personaname']. '</center></a>';

                }    
            ?>
              
            </span>
             <div class="android-drawer-separator"></div>
            <a href="index.php" class="mdl-navigation__link" >Home</a>
            <a href="csgo.php" class="mdl-navigation__link" >CS:GO</a>
            <div class="android-drawer-separator"></div>
          <span class="mdl-navigation__link">DOTA 2</span>
          <a class="mdl-navigation__link" href="dota2/dota2-matches.php">All Matches</a>
          <a class="mdl-navigation__link" href="">My Matches</a>
          <a class="mdl-navigation__link" href="dota2/dota2-streams.php">Streams and Vods</a>
          <a class="mdl-navigation__link" href="">Tournaments</a>
          <a class="mdl-navigation__link" href="">Team Ranking</a>      
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
          <div class="logo-font android-slogan">DOTA 2</div>
          <div class="logo-font android-sub-slogan">Welcome to Gaming Analyst</div>
          </div>

            
             <div class="android-more-section">
          <div class="android-section-title mdl-typography--display-1-color-contrast">News:</div>
          <div class="android-card-container mdl-grid">
            <div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-tablet mdl-cell--4-col-phone mdl-card mdl-shadow--3dp">
              <div class="mdl-card__media">
                <img src="images/more-from-1.png">
              </div>
              <div class="mdl-card__title">
                 <h4 class="mdl-card__title-text">Update - April 14th, 2016</h4>
              </div>
              <div class="mdl-card__supporting-text">
                <span class="mdl-typography--font-light mdl-typography--subhead">- Alt+clicking on upgradeable items owned by enemy players will show the item level in chat. Fixed Techies Arcana particle counter that appears after Suicide Squad....</span>
              </div>
              <div class="mdl-card__actions">
                 <a class="android-link mdl-button mdl-js-button mdl-typography--text-uppercase" href="http://www.dota2.com/news/updates/21365/">
                   Read More
                   <i class="material-icons">chevron_right</i>
                 </a>
              </div>
            </div>

            <div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-tablet mdl-cell--4-col-phone mdl-card mdl-shadow--3dp">
              <div class="mdl-card__media">
                <img src="images/more-from-4.png">
              </div>
              <div class="mdl-card__title">
                 <h4 class="mdl-card__title-text">Update - April 13th, 2016</h4>
              </div>
              <div class="mdl-card__supporting-text">
                <span class="mdl-typography--font-light mdl-typography--subhead">Enabled display of Leshrac staff animations in loadout and game preview when submitting a Leshrac weapon.</span>
              </div>
              <div class="mdl-card__actions">
                 <a class="android-link mdl-button mdl-js-button mdl-typography--text-uppercase" href="http://www.dota2.com/news/updates/21344/">
                   Read More
                   <i class="material-icons">chevron_right</i>
                 </a>
              </div>
            </div>

            <div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-tablet mdl-cell--4-col-phone mdl-card mdl-shadow--3dp">
              <div class="mdl-card__media">
                <img src="images/more-from-2.png">
              </div>
              <div class="mdl-card__title">
                 <h4 class="mdl-card__title-text">Update - April 12th, 2016</h4>
              </div>
              <div class="mdl-card__supporting-text">
                <span class="mdl-typography--font-light mdl-typography--subhead">Fixed demo mode preview for hero ability models.
Added alternate UI Main track for Music Packs. </span>
              </div>
              <div class="mdl-card__actions">
                 <a class="android-link mdl-button mdl-js-button mdl-typography--text-uppercase" href="http://www.dota2.com/news/updates/21327/">
                   Read More
                   <i class="material-icons">chevron_right</i>
                 </a>
              </div>
            </div>

            <div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-tablet mdl-cell--4-col-phone mdl-card mdl-shadow--3dp">
              <div class="mdl-card__media">
                <img src="images/more-from-3.png">
              </div>
              <div class="mdl-card__title">
                 <h4 class="mdl-card__title-text">April 5th 2016</h4>
              </div>
              <div class="mdl-card__supporting-text">
                <span class="mdl-typography--font-light mdl-typography--subhead">- Restored normal Ranked Matchmaking modes	</span>
              </div>
              <div class="mdl-card__actions">
                 <a class="android-link mdl-button mdl-js-button mdl-typography--text-uppercase" href="http://www.dota2.com/news/updates/21224/">
                   Read More
                   <i class="material-icons">chevron_right</i>
                 </a>
              </div>
            </div>
          </div>
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
        
    <script src="https://code.getmdl.io/1.1.3/material.min.js"></script>
  </body>
</html>

    
    