<?php

/***********************************************************/
/* Created by 2S Computing on 07/01/2016. */
/* Copyright (c) 2016 2S Computing. All rights reserved. */
/***********************************************************/
/*
* @package    2S-Computing
* @author     recrutement@2s-computing.fr
* @website    https://www.2s-computing.fr/
*/
define('__ROOT__', dirname(dirname(__FILE__)));
define('RECRUT_START', microtime(true));
define('EXPERIENCE_MIN', 5);
define('DIPLOMA_LEVEL', 5);
define('LIFE_UNIVERSE_EVERYTHG_ANSWER', 42);
require_once(__ROOT__ . '/experiences.php');
require_once(__ROOT__ . '/cdi.php');
/*
* Find the perfect candidate. Meet the perfect job.
* @param CV $cv
* @return boolean $isItAMatched
*/
function findPerfectCandidate($cv)
{
    $isItAMatched = false;
    $i = 0;
    $matchingSkill = 0;
    $arr_Experiences['required'] = array(
        'PHP object' => 'great',
        'MySQL/MariaDB' => 'great',
        'HTML/CSS/JavaScript' => 'cool'
    );
    $arr_Experiences['appreciated'] = array(
        'Laravel/Silex/Symfony2/Zend' => 'at less 1',
        'PHP units' => 'test = doubt !'
    );
    
    if ($cv->xp_years >= EXPERIENCE_MIN) {
        if ($cv->dip_years >= DIPLOMA_LEVEL || $cv->anywayIamPerfectCandidate === TRUE) {
            foreach ($cv->skills as $key => $value) {
                if (isset($arr_Experiences['required'][$key]) && $value === $arr_Experiences['required'][$key]) {
                    $matchingSkill++;
                }
                if (isset($arr_Experiences['appreciated'][$key]) && $value === $arr_Experiences['appreciated'][$key]) {
                    $matchingSkill += 0.5;
                }
            }
            
            if ($matchingSkill / (count($arr_Experiences['required']) + count($arr_Experiences['appreciated']) / 2) >= 0.9) {
                $isItAMatched = LIFE_UNIVERSE_EVERYTHG_ANSWER;
            }
        }
    }
    if ($isItAMatched) {
        sendApplicationNow("recrutement@2s-computing.fr");
    }
    return $isItAMatched;
}

function sendApplicationNow($mail) {
    echo "Send application to $mail" . PHP_EOL;
}
