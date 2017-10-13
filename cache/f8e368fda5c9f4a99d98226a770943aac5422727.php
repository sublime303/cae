<meta http-equiv="refresh" content="<?php echo e($meta_refresh); ?>">
Simulator Bridge State. Updated:  <?php echo e($date); ?>


<table width=25% border=0 cellpadding=0 cellspacing=0>
<?php $__currentLoopData = $sims; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sim): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
    <?php
    
	    $sim->status_text = '';
	    $sim->css = 'style="background-color:whitesmoke"';
	    
	    if( $sim->v == 0){
	        $sim->status_text = 'UP';
	        $sim->css = 'style="background-color:lime"';
	    }

    ?>


	
	<tr <?php echo $sim->css; ?> >
		<td> <?php echo e($sim->simname); ?></td>
		<td><?php echo e($sim->status_text); ?></td>
	</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table>

<?php echo e($string); ?>

<?php $__currentLoopData = $array; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<?php echo e($a); ?>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


	


