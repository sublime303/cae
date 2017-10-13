<?php
$sekunder = $_GET['sek'];
echo "<meta http-equiv=\"refresh\" content=\"$sekunder\">";
$ip = '10.75.50.17';
$map = [
    'DI0' => 'Bell',
    'DI1' => '737',
    'DI2' => 'SAAB',
    'DI3' => 'Dash',
    'DI4' => 'Puma',
    'DI5' => 'S-1',
    'DI6' => 'DI6 (ledig)',
    'DI7' => 'DI7 (ledig)'
    ];


include_once 'simple_html_dom.php';
$url = "http://$ip/lineinfo.xml";
$html = file_get_html($url); 
$digitalinputs = $html->find('DIGITALINPUTS', 0);

foreach ($digitalinputs->find('line') as $line) {
    $sim['name']       = $line->find('name',0)->plaintext;
    $sim['v']          = $line->find('v',0)->plaintext;
    $sim['c']          = $line->find('c',0)->plaintext;
    $sim['simname']    = $map[$sim['name']];
    $sims[]            = $sim;
}

#print_r($sims);

foreach ($sims as $sim) {
    $sim = (object) $sim;

    #$sim->ny = 'test';

    
    
    if( $sim->v == 0){
        echo "\n<br>$sim->simname (bridge up) ";
    }
    
    if( $sim->v == 255){
        echo "\n<br>$sim->simname ";
    }
}


