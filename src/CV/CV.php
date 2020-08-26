<?php

namespace PHP_Unit_Project\CV;

class CV
{
    protected array $skills;
    protected int $diplomaYears;
    protected int $xpYears;
    protected bool $isPerfectCandidate;

    public function __construct(array $skills, int $diplomaYears, int $xpYears, bool $isPerfectCandidate = false)
    {
        $this->skills = $skills;
        $this->diplomaYears = $diplomaYears;
        $this->xpYears = $xpYears;
        $this->isPerfectCandidate = $isPerfectCandidate;
    }

    public function getSkills(): array
    {
        return $this->skills;
    }
    
    public function getDiplomaYears(): int
    {
        return $this->diplomaYears;
    }

    public function getXpYears(): int
    {
        return $this->xpYears;
    }

    public function isPerfectCandidate(): bool
    {
        return $this->isPerfectCandidate;
    }
}
