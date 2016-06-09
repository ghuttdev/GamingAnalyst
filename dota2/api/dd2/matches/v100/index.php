<?php
	error_reporting(0);
	date_default_timezone_set("CET");

	$matchList = file_get_contents('http://dailydota2.com/api/v2/live');
	$data = json_decode($matchList, true);
	$i = 0;

	foreach ($data['matches'] as $match) {
		$img1 = "http://dailydota2.com".$match['team1']['logo_url'];
		$img2 = "http://dailydota2.com".$match['team2']['logo_url'];

		$linkID = $match['link'];

		$team1 = $match['team1']['team_name'];
		$team2 =  $match['team2']['team_name'];

		if (strlen($team1) > 20){
			$team1 = $match['team1']['team_tag'];

		}

		if (strlen($team2) > 20) {
			$team2 = $match['team2']['team_tag'];
		}


		$bestof = $match['series_type'];

		$eventName = $match['league']['name']." [BO{$bestof}]";

		$timeStamp = $match['starttime_unix'];

		$date = "Live";
		$gameArray["eventLive"][] = "<tr class='d2mtrow eventLive' href='{$linkID}' title='{$eventName}' rel='tooltip'><td alt='{$timeStamp}' class='push-tt gg_date'><b>{$date}</b></td><td><img class='dd2-teamimg' src='{$img1}' width='28px' height='18px'> {$team1}</td><td>v</td><td><img class='dd2-teamimg' src='{$img2}' width='14px' height='9px'> {$team2}</td></tr>";

		if ($i == 13) {
			break;
		}

		$i++;
	}

	$matchList = file_get_contents('http://dailydota2.com/api/v2/upcoming');
	$data = json_decode($matchList, true);
	$i = 0;

	foreach ($data['matches'] as $match) {
		$img1 = "http://dailydota2.com".$match['team1']['logo_url'];
		$img2 = "http://dailydota2.com".$match['team2']['logo_url'];

		$linkID = $match['link'];

		$team1 = $match['team1']['team_name'];
		$team2 =  $match['team2']['team_name'];

		if (strlen($team1) > 20) {
			$team1 = $match['team1']['team_tag'];
		}


		if (strlen($team2) > 20) {
			$team2 = $match['team2']['team_tag'];
		}


		$bestof = $match['series_type'];

		$eventName = $match['league']['name']." [BO{$bestof}]";

		$timeStamp = $match['starttime_unix'];

		if ($match['status'] == 0) {
			$date = nice_time($match['timediff']);
			$gameArray["eventSoon"][] =  "<tr class='d2mtrow eventSoon' href='{$linkID}' title='{$eventName}' rel='tooltip'><td alt='{$timeStamp}' class='push-tt gg_date'>{$date}</td><td><img class='dd2-teamimg' src='{$img1}' width='28px' height='18px'> {$team1}</td><td>v</td><td><img class='dd2-teamimg' src='{$img2}' width='14px' height='9px'> {$team2}</td></tr>";
		}

		if ($i == 13) {
			break;
		}

		$i++;
	}

	$matchList = file_get_contents('http://dailydota2.com/api/v2/recent');
	$data = json_decode($matchList, true);
	$i = 0;

	foreach ($data['matches'] as $match) {
		$img1 = "http://dailydota2.com".$match['team1']['logo_url'];
		$img2 = "http://dailydota2.com".$match['team2']['logo_url'];

		$linkID = $match['link'];

		$team1 = $match['team1']['team_name'];
		$team2 =  $match['team2']['team_name'];

		$bestof = $match['series_type'];

		$eventName = $match['league']['name']." [BO{$bestof}]";

		$score1 = $match['team1']['score'];
		$score2 = $match['team2']['score'];
		$series = "{$score1}:{$score2}";

		$timeStamp = $match['starttime_unix'];

		if ($score1 == $score2)
			$winner = "x";
		else if ($score1 > $score2) {
			$team1 = '<b>'.$team1.'</b>';
			$winner = ">";
		} else {
			$team2 = '<b>'.$team2.'</b>';
			$winner = "<";
		}

		if ($match['status'] == 2) {
			$date = nice_time($match['timediff']);
			$gameArray["eventDone"][] =  "<tr class='d2mtrow eventDone' href='{$linkID}' title='{$eventName}' rel='tooltip'><td alt='{$timeStamp}' class='push-tt gg_date series'>{$series}</td><td><img class='dd2-teamimg' src='{$img1}' width='28px' height='18px'> {$team1}</td><td class='winResult' data-winner='{$winner}'>{$winner}</td><td><img class='dd2-teamimg' src='{$img2}' width='28px' height='18px'> {$team2}</td></tr>";
		}

		if ($i == 13) {
			break;
		}

		$i++;
	}

	$gameArray["eventDone"] = array_reverse($gameArray["eventDone"]);

	$str = trim(json_encode($gameArray));
	$filestr = "api.json";
	$fp=@fopen($filestr, 'w');
	fwrite($fp, $str);
	fwrite($fp, "");
	fclose($fp);
	// echo $str;
	echo "OK";

	function nice_time($t) {
		$h = floor($t/3600);
		$m = floor($t/60)%60;
		$s = floor($t%60);

		if ($t > 3600) {
			return $h.'h '.$m.'m';
		} else {
			return $m.'m '.$s.'s';
		}
	}

?>
