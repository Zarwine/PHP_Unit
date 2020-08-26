<?php 

require(__DIR__ . '/annonce.php');

use PHP_Unit_Project\CV;

$cv = new CV($skills, 2, 5, true);
findPerfectCandidate($cv);


define('RECRUT_END', microtime(true));