<?php 

require 'rb.php';
R::setup( 'sqlite:sim.db' );

#R::nuke( 'sims' ); // To destroy the entire database simply invoke the nuclear method (be careful!):
#R::nuke( 'last' ); // To destroy the entire database simply invoke the nuclear method (be careful!):
#R::trashAll( $sims ); //for multiple beans
#R::wipe( 'sims' ); //burns all the books!
