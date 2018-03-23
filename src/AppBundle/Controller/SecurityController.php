<?php

namespace AppBundle\Controller;

use FOS\UserBundle\Controller\SecurityController as BaseController;
use Symfony\Component\HttpFoundation\Request;

class SecurityController extends BaseController
{
    public function loginAction(Request $request)
    {
        if ($this->isGranted('IS_AUTHENTICATED_FULLY')) {

            return $this->redirectToRoute('reservation_add');

        }
        return parent::loginAction($request);
    }
}
