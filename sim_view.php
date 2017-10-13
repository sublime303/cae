<?php

echo "Simulator Bridge State. Updated:". date("d/M H:i:s");


echo "<table width=25% border=0 cellpadding=0 cellspacing=0>";
foreach ($sims as $sim) {
    $sim = (object) $sim;
    $sim->status_text = '';
    $sim->css = 'style="background-color:whitesmoke"';
    if( $sim->v == 0){
        $sim->status_text = 'UP';
        $sim->css = 'style="background-color:lime"';
    }


	echo "\n<tr $sim->css>
				<td $sim->css>$sim->simname</td>
				<td$sim->status_text</td>
				<td>$sim->status_text</td>
			</tr>";

}
echo "</table>";
echo "<pre>";
print_r($info);
echo "</pre>";

	
	#$rows = R::dispense( 'sims' );
	#$rows = R::getAll( 'sims' );
	$rows = R::findAll( 'last' );
	foreach ($rows as $row) {
			echo "\n<br>$row->id $row->simname $row->date";
	}
    
?>
