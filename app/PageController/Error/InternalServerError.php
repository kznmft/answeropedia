<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

class InternalServerError_Error_PageController extends Abstract_PageController
{
    public function handle(string $lang, Request $request, Response $response, $args): Response
    {
        $this->lang = $lang;
        $this->l = Localizer::getInstance($this->lang);

        $this->template = 'error/500';
        $this->pageTitle = _('Error 500 - Page title').' - '._('OctoAnswers');
        $this->pageDescription = _('Error 500 - Page description');

        $this->errorTitle = _('Error 500 - Page title');
        $this->errorDescription = _('Error 500 - Error description');
        $this->additionalJavascript[] = 'goal/error_404';

        $output = $this->renderPage();
        $response->getBody()->write($output);

        return $response->withStatus(500);
    }
}
