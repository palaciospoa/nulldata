<?php

declare(strict_types = 1);

namespace App\Controller;

use App\Entity\Employee;
use App\Form\EmployeeType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class EmployeeController extends AbstractController
{
    public function createEmployee(Request $request):Response{

        $employee = new Employee();

        $form = $this->createForm(EmployeeType::class, $employee);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
//            return new JsonResponse("enviado");
//            create new employee
        }

        return $this->render('employee-form.html.twig',
            ['form'=>$form->createView()]
            );
    }

    public function employeeList(int $page){


    }
}