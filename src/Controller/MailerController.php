<?php

namespace App\Controller;

use App\Service\Mail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MailerController extends AbstractController
{
    // #[Route('/mailer', name: 'mailer')]
    /**
     * @Route("/mailer", name="mailer")
     */ 
    public function index(): Response
    {
        $mail = new Mail();
        $mail->send('william.david93000@gmail.com', 'william.david93000@gmail.com', 'test', 'contenu');
        return $this->redirectToRoute('home');
    }
}
