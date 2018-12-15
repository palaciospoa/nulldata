<?php

declare(strict_types = 1);

namespace App\Controller;

use App\Entity\Employee;
use App\Form\EmployeeType;
use App\Repository\EmployeeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class EmployeeController extends AbstractController
{
    private $employeeRepository;

    public function __construct(EmployeeRepository $employeeRepository)
    {
        $this->employeeRepository = $employeeRepository;
    }

    public function createEmployee(Request $request):Response{

        $employee = new Employee();

        $form = $this->createForm(EmployeeType::class, $employee);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $this->employeeRepository->save($employee);
            return $this->redirectToRoute('employeeList');
        }

        return $this->render('employee-form.html.twig',
            ['form'=>$form->createView()]
            );
    }

    public function employeeList(int $page){
        $employeeRepository = $this->employeeRepository->findAll($page);

        return $this->render('employee-list.html.twig',[
            'employeeRepository'=>$employeeRepository
        ]);
    }

    public function employeeShow(int $id){
        $employee = $this->employeeRepository->find($id);

        dd($employee);
        return $this->render('employee-show.html.twig',[
            'employee'=>$employee
        ]);
    }
}