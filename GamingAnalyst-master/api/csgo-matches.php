
<?php
    require ('../steamauth/steamauth.php');
?>

<!DOCTYPE html>
	<html lang="en">
	  <head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="description" content="Introducing Gaming Analyst">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
	    <title>Gaming Analyst</title>
	    <link rel="stylesheet" type="text/css"  href="http://bootswatch.com/darkly/bootstrap.min.css" />
	    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	    <link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.indigo-pink.min.css">
	    <script defer src="https://code.getmdl.io/1.1.3/material.min.js"></script>
	    <script src='https://code.jquery.com/jquery-2.2.3.min.js'></script>
	    <script src='https://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular.min.js'></script>     
	    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
	    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	    <link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.min.css">
	    <link rel="stylesheet" href="../styles.css">

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
	        
          .team_logos{
            display: inline-block;
            margin-left: auto;
            margin-right: auto;
            width: 50px;
          }

	        .personname{
	           font-size: 18px;
	            font-family: sans-serif;
	            color: #79d340;
	        }
	        
	        .table-dark{
	        	color: gray;
                 margin-left:auto; 
                 margin-right:auto;
                margin-bottom: 20px;
	        }

          
	        body{
	         background-color: white;
	        }


	    </style>
	  </head>
	<body>
		 <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
      <div class="android-header mdl-layout__header mdl-layout__header--waterfall">
        <div class="mdl-layout__header-row">
          <span class="android-title mdl-layout-title">
            <img class="android-logo-image" src="../images/android-logo.png">
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
            
          <!-- Navigation -->
          <div name= "top" class="android-navigation-container">
            <nav class="android-navigation mdl-navigation">
              <a class="mdl-navigation__link mdl-typography--text-uppercase" href="../csgo.php">CS:GO</a>
                <a class="mdl-navigation__link mdl-typography--text-uppercase" href="../dota2.php">DOTA 2</a>
              <a class="mdl-navigation__link mdl-typography--text-uppercase"><?php
                if(!isset($_SESSION['steamid'])) {
                echo loginbutton("small");
	               
	       }  else {
                include ('../steamauth/userInfo.php');
	           
                  echo "Welcome, " . $steamprofile['personaname']
               ?>  		
		<?php
		}    
		?></a>
                
            </nav>
          </div>
          <span class="android-mobile-title mdl-layout-title">
            <img class="android-logo-image" src="../images/android-logo-white.png">
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
          <img class="android-logo-image" src="../images/android-logo.png">
        </span>
        <nav class="mdl-navigation">
            <span class="mdl-navigation__link">
            <?php
                if(!isset($_SESSION['steamid'])) {

                    echo "<center>Welcome Guest. Please Login!</center><br>";
                    echo loginbutton("small"); //login button

                }  else {
                    include ('../steamauth/userInfo.php');

                    //Protected content
               
                    echo '<img class="img_profile" href="'.$steamprofile['profileurl'].'" src="'.$steamprofile['avatarfull'].'"/><br>';
                   echo '<a class="personname"><center>' . $steamprofile['personaname']. '</center></a>';

                }    
            ?>
            </span>
            <div class="android-drawer-separator"></div>
             <a href="../index.php" class="mdl-navigation__link" >Home</a>
            <a href="../dota2.php" class="mdl-navigation__link" >DOTA 2</a>
            <div class="android-drawer-separator"></div>
          <span class="mdl-navigation__link">CS: GO</span>
          <a class="mdl-navigation__link" href="">All Matches</a>
          <a class="mdl-navigation__link" href="">My Matches</a>
          <a class="mdl-navigation__link" href="live-matches.php">Live</a>
          <a class="mdl-navigation__link" href="">Tournaments</a>
          <a class="mdl-navigation__link" href="">Team Ranking</a>      
          <div class="android-drawer-separator"></div>
           <a class="mdl-navigation__link" href="">Settings</a>
          <a class="mdl-navigation__link" href="">About</a>
            <a class="mdl-navigation__link">
              <?php
                if(!isset($_SESSION['steamid'])) {

                }  else {
                    include ('../steamauth/userInfo.php');

                   echo '<a class="personname"><center>' . logoutbutton() . '</center></a>';

                }    
            ?></a>
        </nav>
      </div>
       <div class="android-content mdl-layout__content">
        <a name="top"></a>
        <div class="mdl-typography--text-center">
          <div class="logo-font android-slogan">CS: Global Offensive</div>
          <br>
          <br>
			
            <table class="mdl-data-table table-dark mdl-js-data-table mdl-shadow--2dp">
              <thead>
                <tr>
                <th name="team_1_name"><center>Team A</center></th>
                <th name="team_1_percent"><center>Odds</center></th>
                <th name="team_2_percent"><center>Odds</center></th>
	              <th name="team_1_name"><center>Team B</center></th>
	              <th name="event"><center>Event</center></th>
	              <th name="time"><center>Time</center></th>
	              <th name="winner"><center>Winner</center></th>
	               <th name="live"><center>Status</center></th>
	               <th name="link"><center>Betting Page</center></th>
                </tr>
              </thead>
              <tbody></tbody>
           </table>
            
          </div>
	      
           
            
		<script src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
		

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
        <script>
                      
        function sortTable(table, order) {
          var asc   = order === 'asc',
            tbody = table.find('tbody');

          tbody.find('tr').sort(function(a, b) {
            if (asc) return $('td:last', a).text().localeCompare($('td:last', b).text());
            else return $('td:last', b).text().localeCompare($('td:last', a).text());
          }).appendTo(tbody);
        }

        $.getJSON("./api.php", function(data) {
          $.each(data, function(key, val) {
            var live, time, team_1, team_2, winner, team_1_name, team_2_name, event, team_1_percent, team_2_percent

            live = val.live
            event = val.event
            winner = "TBD"
            time = val.time
            team_1_name = val.teams[0].name
            team_2_name = val.teams[1].name
            team_1_percent = val.teams[0].percent
            team_2_percent = val.teams[1].percent
            link = "http://csgolounge.com/match?m=" + key
            
            status = live ? "Live" : "Upcoming"

            if(val.result)
              if(val.result.status == "won")
                if(val.result.team == 0) {
                  winner = ""
                  winner += team_1_name
                  status = "Closed"
                }
                else {
                  winner = ""
                  winner += team_2_name
                  status = "Closed"
                }

            $("tbody").html($("tbody").html() + "<tr><td>" + team_1_name + "</td><td>"  + team_1_percent + "</td><td>" + team_2_percent + "</td><td>"+ team_2_name + "</td><td>" + event + "</td><td>"  + time + "</td><td>" + winner + "</td><td>" + status + "</td><td>" + link + "<td><td>" + '<button name="addFavorite" class="mdl-button mdl-js-button mdl-button--icon mdl-js-ripple-effect"><i class="material-icons">favorite border</i></button>' + "</td></tr>")
              });

          sortTable($('table'),'desc');
        });
      </script>
    <script src="https://code.getmdl.io/1.1.3/material.min.js"></script>
        
    <?php
        
        if (isset($_POST['addFavorite'])){
         
		$team_1_name = $_POST['team_1_name'];
        $team_1_percent = $_POST['team_1_percent'];
		$team_2_percent = $_POST['team_2_percent'];
		$team_2_name = $_POST['team_2_name'];
        $event = $_POST['$event'];
        $time = $_POST['$time'];
        $winner = $_POST['$winner'];
        $live = $_POST['$live'];
        $link = $_POST['link'];
        $user = $steamprofile['steamid']; 
            
        $query = "INSERT INTO `matches` (`teamA`, `oddA`, `oddB`, `teamB`, `event`, `time`, `winner`, `status`, `betting_page`, `user_id`) VALUES ($team_1_name', '$team_1_percent', '$team_2_percent', '$team_2_name', '$event', '$time', '$winner', '$live', '$link', '$user')";
        $result = mysql_query($query);
        if($result){
            echo "<div class='form'><h3 class='warning'>You are now following this game!</h3><br/>Click here to <a href='api/csgo-matches.php'>View Your Matches</a></div>";
        }
    }
    else{}
?>
	</body>
</html>
