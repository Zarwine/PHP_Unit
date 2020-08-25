<?php 

require(__DIR__ . '/annonce.php');

$cv = new CV($skills, 2, 5, true);
findPerfectCandidate($cv);


define('RECRUT_END', microtime(true));