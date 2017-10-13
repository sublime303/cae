<?php

require 'vendor/autoload.php';
use Philo\Blade\Blade;

$views = __DIR__ . '/views';
$cache = __DIR__ . '/cache';

date_default_timezone_set('Europe/Stockholm');
ini_set('default_socket_timeout', 1); # 1 sec
include_once 'sim_db.php'; # database 
include_once 'simple_html_dom.php';
$meta_refresh = 5;
$server_online = 1;
$ip = '10.75.50.17:8888';
$url = "http://$ip/lineinfo.xml";
$map = [
    'DI0' => 'SAAB',
    'DI1' => '737(N/A)',
    'DI2' => 'Bell(N/A)',
    'DI3' => 'Dash(N/A)',
    'DI4' => 'Puma(N/A)',
    'DI5' => 'S-61',
    'DI6' => '',
    'DI7' => ''
    ];


if (isset($_GET['refresh'])){
    $meta_refresh = $_GET['refresh'];
}

#flush();


$html = @file_get_html($url);
if ($html == '') {
    #echo "Omg! Where's the brainbox? It used to be at: $ip";
    $server_online = 0;
}

#die('--end--'.date('H:i:s'));






if ($server_online){

    $digitalinputs = $html->find('DIGITALINPUTS', 0);

    foreach ($digitalinputs->find('line') as $line) {
        
        $sim = R::dispense( 'sims' );
        #$last = R::load( 'last', 1 ); # make if not exists
        $last = R::load( 'last' , 1 );
        #$last->test = 'xx';

         

        $sim->name       = $line->find('name',0)->plaintext;
        $sim->v          = $line->find('v',0)->plaintext;
        $sim->c          = $line->find('c',0)->plaintext;
        $sim->simname    = $map[$sim->name];
        $sim->date       = date( "Y-m-d H:i:s" );
        $sims[]          = $sim;

        R::store( $sim );

        
        #$last = R::load( 'last', 1 ); 
        $last = $sim;
        R::store( $last );


    }
}else{
    #echo "Offline mode";
    $data['meta_refresh'] = $meta_refresh;
    $data['date'] = date("d/M H:i:s");
    $data['sims'] = R::find( 'sims', ' id < 9 '); # last sims
    #$db = R::find( 'sims', ' id < 9 ');
    #$data['sims'] = R::find( 'sims', ' id < 9 '); # last sims
    $string ="string";
    $array = ['one','two','three'];
    $blade = new Blade($views, $cache);
    echo $blade->view()->make('hello')
    ->with($data)
    ->withString($string)
    ->withArray($array)
    
    ->render();
}

include 'simget_stats.php'; # additional data(v c fields) from the brainbox 
#include 'sim_view.php'; # loads the HTML view 
