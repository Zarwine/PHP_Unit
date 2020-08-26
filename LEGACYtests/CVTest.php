<?php

use PHPUnit\Framework\TestCase ;
use \PHP_Unit_Project\CV;

class CVTest extends TestCase 
{
    public function test_with_incomplete_skills()
    {

        $skills1 = [
            'PHP object' => 'great',
            'MySQL/MariaDB' => 'great',
            'HTML/CSS/JavaScript' => 'cool',
            'PHP units' => 'test = doubt !'
        ];
        
        $cv1 = new CV($skills1, 2, 5, true);

        $this->assertFalse(findPerfectCandidate($cv1));         
        
    }

    public function test_with_full_skills()
    {        

        $skills2 = [
            'PHP object' => 'great',
            'MySQL/MariaDB' => 'great',
            'HTML/CSS/JavaScript' => 'cool',
            'Laravel/Silex/Symfony2/Zend' => 'at less 1',
            'PHP units' => 'test = doubt !'
        ];

        $cv2 = new CV($skills2, 2, 5, true);

        $this->assertTrue(findPerfectCandidate($cv2)); 
        
    }

    public function test_without_skills()
    {     

        $cv0 = new CV([], 2, 5, true);

        $this->assertFalse(findPerfectCandidate($cv0)); 
        
    }
}