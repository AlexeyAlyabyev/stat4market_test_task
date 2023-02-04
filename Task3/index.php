<?php
	$result = 0;

	$date1 = strtotime($_GET['date1']);
	$date2 = strtotime($_GET['date2']);

	$date1_w = idate('w', $date1) ? idate('w', $date1) : 7;
	$date2_w = idate('w', $date2) ? idate('w', $date2) : 7;

	$days_between = ($date2 - $date1) / 60 / 60 / 24;

	if ($date1_w == 2 || $date2_w == 2) {
		$days_between--;
	}

	$weeks_between = floor(($days_between) / 7);

	if ($date1_w == 1 && $date2_w > 2 && $days_between > 1) {
		$result = 1 + $weeks_between;
	} elseif ($weeks_between){
		$result = $weeks_between;
	} elseif (($date1_w + $days_between - 7) > 2) {
		$result = 1;
	}
?>
<!DOCTYPE html>
<html lang='ru'>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
    <title>Написать рассчет количества вторников между двумя датами на PHP</title>
    <style>
			h1 {
				font-size: 24px;
				font-weight: 500;
			}
		</style>
</head>

<body>
	<h1>Рассчет количества вторников между двумя датами на PHP</h1>
  <form action="index.php">
		<input type="date" name="date1" required>
		<input type="date" name="date2" required>
		<button>Рассчитать</button>
	</form>
	<p>Количество: <span><?= $result ?></span></p>
</body>

</html>