<?php

class Newest_Hashtags_PageController extends Abstract_PageController
{
    const HASHTAGS_PER_PAGE = 10;

    public function handle($request, $response, $args)
    {
        $this->lang = $args['lang'];
        $this->page = @$request->getParam('page') ? (int) $request->getParam('page') : 1;

        $hashtagsCount = (new Hashtags_Query($this->lang))->hashtagsLastID();

        $this->hashtags = (new Hashtags_Query($this->lang))->findNewest($this->page);

        $this->template = 'hashtags';
        $this->pageTitle = $this->_getPageTitle();
        $this->pageDescription = "Хештеги";
        $this->activeFilter = 'newest';

        if ((isset($this->hashtags[9])) && ($this->hashtags[9]->getID() > 1)) {
            $this->nextPageURL = Hashtags_URL_Helper::getNewestURL($this->lang, ($this->page + 1));
        }

        $output = $this->renderPage();
        $response->getBody()->write($output);

        return $response;
    }

    #
    # Helper methods
    #

    public function _getPageTitle()
    {
        return _('New hashtags').' - '._('Page').' '.$this->page.' - '._('Answeropedia');
    }
}