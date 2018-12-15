<?php

declare(strict_types = 1);

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;

final class Employee
{

    private $id;
    private $name;
    private $email;
    private $job;
    private $birthDate;
    private $domicile;
    private $skills;

    public function __construct()
    {
        $this->skills = new ArrayCollection();
    }


    public function id()
    {
        return $this->id;
    }

    public function name()
    {
        return $this->name;
    }

    public function setName($name): void
    {
        $this->name = $name;
    }

    public function email()
    {
        return $this->email;
    }

    public function setEmail($email): void
    {
        $this->email = $email;
    }

    public function job()
    {
        return $this->job;
    }

    public function setJob($job): void
    {
        $this->job = $job;
    }

    public function birthDate()
    {
        return $this->birthDate;
    }

    public function setBirthDate($birthDate): void
    {
        $this->birthDate = $birthDate;
    }

    public function domicile()
    {
        return $this->domicile;
    }

    public function setDomicile($domicile): void
    {
        $this->domicile = $domicile;
    }

    public function skills()
    {
        return $this->skills;
    }

    public function setSkills($skills): void
    {
        $this->skills = $skills;
    }

}