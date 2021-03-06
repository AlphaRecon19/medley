<?php

namespace App\Controller\User;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /**
     * @Route("/user/{id}", name="user")
     */
    public function index($id, Request $request, UserRepository $userRepository)
    {
        if ($user = $userRepository->findOneById($id)) {
            return $this->render('user/index.html.twig', [
                'controller_name' => 'UserController',
                'user'            => $user,
            ]);
        } else {
            return $this->render('error.html.twig');
        }
    }
}
