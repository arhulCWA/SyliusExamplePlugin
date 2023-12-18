<?php

namespace Cwa\SyliusExamplePlugin\Controller;

use Cwa\SyliusExamplePlugin\Repository\PageLegalNoticeRepository;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PageController extends AbstractController
{
    public function legal_notice_index(Request $request, PageLegalNoticeRepository $pageLegalNoticeRepository): Response
    {
        $routeParams    = $request->attributes->get('_route_params');
        $legal_notice   = $pageLegalNoticeRepository->findEnabledPageLegalNotice();

        return $this->render('@CwaSyliusExamplePlugin/frontend/legal_notice.html.twig', [
            'routeParams'   => $routeParams,
            'legal_notice'  => $legal_notice,
        ]);
    }

}
