<?php

declare(strict_types = 1);

namespace App\Repository;

use App\Entity\Employee;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;

final class EmployeeRepository
{
    private $paginator;
    private $entityManager;
    private $repository;

    public function __construct(PaginatorInterface $paginator, EntityManagerInterface $entityManager)
    {
        $this->repository    = $entityManager->getRepository(Employee::class);
        $this->paginator = $paginator;
        $this->entityManager = $entityManager;
    }

    public function find(int $employeeId):Employee{
        $employee = $this->repository->find($employeeId);
        return $employee;
    }

    public function findAll(int $page){
        $elementsPerPage=10;
        $repository = $this->repository->findAll();
        $repositoryPaginated = $this->paginator->paginate($repository, $page, $elementsPerPage);
        return  $repositoryPaginated;
    }

    public function update(Employee $employee): void
    {
        $this->entityManager->merge($employee);
        $this->entityManager->flush();
    }

    public function remove(Employee $employee): void
    {
        $this->entityManager->remove($employee);
        $this->entityManager->flush();
    }

    public function save(Employee $employee): void
    {
        $this->entityManager->persist($employee);
        $this->entityManager->flush();
    }
}