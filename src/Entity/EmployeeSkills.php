<?php

declare(strict_types = 1);

namespace App\Entity;

final class EmployeeSkills
{

    private $skillName;
    private $skillLevel;

    public function getSkillName()
    {
        return $this->skillName;
    }

    public function setSkillName($skillName): void
    {
        $this->skillName = $skillName;
    }

    public function getSkillLevel()
    {
        return $this->skillLevel;
    }

    public function setSkillLevel($skillLevel): void
    {
        $this->skillLevel = $skillLevel;
    }


}