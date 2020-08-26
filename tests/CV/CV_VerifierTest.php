<?php

namespace Tests\CV;

use PHP_Unit_Project\CV\CV_Verifier;
use PHP_Unit_Project\CV\CV;
use PHPUnit\Framework\TestCase;

class CV_VerifierTest extends TestCase
{
    public function test_empty_skills_is_not_verified()
    {
        $skills = [];
        $diplomaYears = 5;
        $xpYears = 5;
        $isPerfectCandidate = true;

        $cv = new CV($skills, $diplomaYears, $xpYears, $isPerfectCandidate);

        $verifier = new CV_Verifier();
        $this->assertFalse($verifier->isVerified($cv));
    }

    public function test_full_skills_is_verified()
    {
        $skills = [
            'PHP object' => 'great',
            'MySQL/MariaDB' => 'great',
            'HTML/CSS/JavaScript' => 'cool',
            'Laravel/Silex/Symfony2/Zend' => 'at less 1',
            'PHP units' => 'test = doubt !'
        ];
        $diplomaYears = 5;
        $xpYears = 5;
        $isPerfectCandidate = false;

        $cv = new CV($skills, $diplomaYears, $xpYears, $isPerfectCandidate);

        $verifier = new CV_Verifier();
        $this->assertTrue($verifier->isVerified($cv));
    }

    public function test_half_skills_is_not_verified()
    {
        $skills = [
            'PHP object' => 'great',
            'MySQL/MariaDB' => 'great',
            'PHP units' => 'test = doubt !'
        ];
        $diplomaYears = 3;
        $xpYears = 5;
        $isPerfectCandidate = true;

        $cv = new CV($skills, $diplomaYears, $xpYears, $isPerfectCandidate);

        $verifier = new CV_Verifier();
        $this->assertFalse($verifier->isVerified($cv));
    }
}
