<?php

class CV
{

    public $skills;
    public $dip_years;
    public $anywayIamPerfectCandidate;

    /**
     * @param array skills
     * @param int dipYears
     * @param int xpYears
     * @param bool anywayIamPerfectCandidate
     */
    public function __construct($skills, $dipYears, $xpYears, $anywayIamPerfectCandidate)
    {
        $this->skills = $skills;
        $this->dip_years = $dipYears;
        $this->xp_years = $xpYears;
        $this->anywayIamPerfectCandidate = $anywayIamPerfectCandidate;
    }
}
