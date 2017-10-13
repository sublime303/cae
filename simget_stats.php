<?php

if ($server_online) {
	
	$lines = $html->find('lines', 0);
	$info['va'] = $lines->find('va',0)->plaintext;
	$info['vb'] = $lines->find('vb',0)->plaintext;
	$info['v5'] = $lines->find('v5',0)->plaintext;
	$info['v3v3'] = $lines->find('v5',0)->plaintext;
	$info['tc'] = $lines->find('tc',0)->plaintext;
}
