<meta http-equiv="refresh" content="{{ $meta_refresh }}">
Simulator Bridge State. Updated:  {{ $date }}

<table width=25% border=0 cellpadding=0 cellspacing=0>
@foreach ($sims as $sim) 
    <?php
    
	    $sim->status_text = '';
	    $sim->css = 'style="background-color:whitesmoke"';
	    
	    if( $sim->v == 0){
	        $sim->status_text = 'UP';
	        $sim->css = 'style="background-color:lime"';
	    }

    ?>


	
	<tr {!! $sim->css !!} >
		<td> {{$sim->simname}}</td>
		<td>{{$sim->status_text}}</td>
	</tr>
@endforeach
</table>

{{ $string }}
@foreach($array as $a)
	{{ $a }}
@endforeach


	


