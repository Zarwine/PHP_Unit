<?php

namespace PHP_Unit_Project\CV;

use PHP_Unit_Project\CV\CV;

class CV_Verifier
{

    private const REQUIRED_SKILLS = [
        'PHP object' => 'great',
        'MySQL/MariaDB' => 'great',
        'HTML/CSS/JavaScript' => 'cool'
    ];

    private const APPRECIATED_SKILLS = [
        'Laravel/Silex/Symfony2/Zend' => 'at less 1',
        'PHP units' => 'test = doubt !'
    ];

    private const MIN_XP_YEARS = 5;
    private const MIN_DIPLOMA_YEARS = 5;

    public function isVerified(CV $cv): bool
    {
        $isVerified = false;
        $skillScore = 0;
        if ($cv->getXpYears() >= self::MIN_XP_YEARS) {
            if ($cv->getDiplomaYears() >= self::MIN_DIPLOMA_YEARS || $cv->isPerfectCandidate()) {
                foreach ($cv->getSkills() as $skillName => $skillValue) {
                    if(isset(self::REQUIRED_SKILLS[$skillName]) && $skillValue === self::REQUIRED_SKILLS[$skillName]){
                        $skillScore += 1;
                    }
                    if(isset(self::APPRECIATED_SKILLS[$skillName]) && $skillValue === self::APPRECIATED_SKILLS[$skillName]){
                        $skillScore += 0.5;
                    }
                }

                if ($skillScore / (count(self::REQUIRED_SKILLS) + count(self::APPRECIATED_SKILLS) / 2) >= 0.9) {
                    $isVerified = true;
                }
            }
        }
        return $isVerified;
    }
}
