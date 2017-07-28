<?php

$offer = array("Try a Class for £5", "5");

$terms = array(
	array("18 June 2017", "30 July 2017", "Summer Term"),
	array("11 Sept 2017", "30 Dec  2017", "Autumn Term"),
	);

function isPast($time)
{
    return (strtotime($time) < time());
}

function isFuture($time)
{
    return (strtotime($time) > time());
}

function num_classes($term, $from, $day) {
	$total = 0;
	while (strtotime($term[1]) > $from) {
		// increment first, cannot book into todays class
		$from = strtotime(date("Y-m-d", $from) . " + 1 days");
		if (date("l", $from) == $day) {
			$total = $total + 1;
		}
	}
	return $total;
}

function classes_total($term){
	return num_classes($term, strtotime($term[0]), "Monday");
}

function classes_left($term, $day) {
	if (isPast($term[0])) {
		return num_classes($term, strtotime("today"), $day);
	} else {
		return num_classes($term, strtotime($term[0]), $day);
	}
}

function currentTerm() {
	global $terms;
	$i = 0;
	while (isPast($terms[$i][1]) && $i < count($terms)) {
		$i++;
	}
	// check if we are currently in the term
	if (isPast($terms[$i][0])) {
		return $terms[$i];
	} else {
		return Null;
	}
}

function nextTerm() {
	global $terms;
	$i = 0;
	while (isPast($terms[$i][0]) && $i < count($terms)) {
		$i++;
	}
	// check if we are currently in the term
	if (isPast($terms[$i][0])) {
		return Null;
	} else {
		return $terms[$i];
	}
}

function getTermOptions($day) {
	if (currentTerm()) {
		$rem = classes_left(currentTerm(), $day);
		if ($rem > 0) {
			$opts[] = array(date("D jS M", strtotime("next $day")),
					$rem, "ASAP!", 15+6.5*$rem);
		}
		if ($rem > 1) {
			$opts[] = array(date("D jS M", strtotime("next $day + 1 weeks")),
					$rem-1, "In a Week", 15+6.5*($rem-1));
		}
	}
	if (nextTerm()) {
		$rem = classes_left(nextTerm(), $day);
		$opts[] = array(date("D jS M", strtotime("next $day", strtotime(nextTerm()[0]))), $rem, nextTerm()[2], 15+6.5*$rem);
	}
	return $opts;
}

function getTrialOffers($day) {
	global $offer;
	if (currentTerm()) {
		$rem = classes_left(currentTerm(), $day);
		if ($rem > 0) {
			$opts[] = array(date("D jS M", strtotime("next $day")),
					$rem, "ASAP!", $offer[1]);
		}
		if ($rem > 1) {
			$opts[] = array(date("D jS M", strtotime("next $day + 1 weeks")),
					$rem-1, "In a Week", $offers[1]);
		}
	}
	if (nextTerm()) {
		$rem = classes_left(nextTerm(), $day);
		$opts[] = array(date("D jS M", strtotime("next $day", strtotime(nextTerm()[0]))), $rem, "Start of Term", $offer[1]);
	}
	return $opts;
}
?>
