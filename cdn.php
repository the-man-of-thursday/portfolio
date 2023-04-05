<?php
checkLoadTime('jQuery本家', 'https://code.jquery.com/jquery-3.3.1.min.js');
checkLoadTime('Google', 'https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js');
checkLoadTime('Microsoft', 'https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js');
checkLoadTime('cdnjs', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js');
checkLoadTime('jsDelivr', 'https://cdn.jsdelivr.net/npm/jquery@3.3.1/dist/jquery.min.js');

function checkLoadTime($title, $url, $max = 5) {
	$total_time = 0;
	for ($i = 0; $i < $max; $i++) {
		$start_time = microtime(true);
		file_get_contents($url);
		$total_time += (microtime(true) - $start_time);
	}
	//試行回数の平均値を表示
	echo '<span style="display:inline-block;width:100px;">'.$title.'</span>';
	echo number_format($total_time / $max, 4).'秒<br>';
}
?>