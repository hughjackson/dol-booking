<?php
$ages = array(
	array("1", "Dance With Me", "1.5 - 3 yrs"),
	array("2", "Fairy Ballet", "3 - 5 yrs"),
	array("3", "Tutu Ballet", "5 -7 yrs"),
	);
$classes = array(
	array("Monday",    "3:00pm", "Southampton - Lodge Rd", "Dance With Me"),
	array("Monday",    "3:40pm", "Southampton - Lodge Rd", "Fairy Ballet"),
	array("Monday",    "4:20pm", "Southampton - Lodge Rd", "Tutu Ballet"),
	array("Monday",    "4:55pm", "Southampton - Lodge Rd", "Dance With Me"),
	array("Monday",    "5:20pm", "Southampton - Lodge Rd", "Fairy Ballet"),
	array("Tuesday",   "9:00am", "Southampton - Lodge Rd", "Dance With Me"),
	array("Tuesday",   "9:40am", "Southampton - Lodge Rd", "Fairy Ballet"),
	array("Tuesday",  "10:20am", "Southampton - Lodge Rd", "Fairy Ballet"),
	array("Wednesday", "3:00pm", "West End - Hildene",    "Tutu Ballet"),
	array("Wednesday", "3:40pm", "West End - Hildene",    "Fairy Ballet"),
	array("Wednesday", "4:30pm", "West End - Hildene",    "Dance With Me"),
	array("Friday",    "9:00am", "West End - Hildene",    "Dance With Me"),
	array("Friday",    "9:40am", "West End - Hildene",    "Fairy Ballet"),
	array("Friday",   "10:20am", "West End - Hildene",    "Dance With Me"),
	);

$days = array(
	'Monday',
	'Tuesday',
	'Wednesday',
	'Thursday',
	'Friday',
	);


function daysForClass($class)
{
	global $classes;
	$days = array();
	foreach ($classes as $c) {
		if ($c[3] == $class && !in_array($c[0], $days)) {
			$days[] = $c[0];
		}
	}
	return $days;

}

function timesForClass($class, $day)
{
	global $classes;
	$times = array();
	$i = 0;
	foreach ($classes as $c) {
		if ($c[3] == $class && $c[0] == $day) {
			$times[] = array($c[1], $c[2], $i);
		}
		$i++;
	}
	return $times;
}

function timesByDay($class)
{
	global $classes;
	global $days;
	$i = 0;
	$continue = true;
	while($continue) {
		$continue = false;
		$row = array();
		foreach ($days as $day) {
			$temp = timesForClass($class, $day);
			if (count($temp) > $i) {
				$temp[$i][] = $day;
				$row[] = $temp[$i];
				$continue = true;
			} else {
				$row[] = null;
			}

		}
		if ($continue) {
			$result[] = $row;
		}
		$i++;
	}
	return $result;
}

function timeRange($time)
{
	return date("g:i", strtotime($time)) . " - " . date("g:ia", strtotime($time . " + 30 mins"));
}

function colSize($age, $day)
{
	$size = count(timesForClass($age, $day));
	print "s" . 12/$size;
}
?>
