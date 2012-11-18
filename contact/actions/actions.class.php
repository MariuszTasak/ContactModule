<?php

/**
 * Contact module actions.
 *
 * @package contact
 * @author Mariusz Tasak <pixelmt@gmail.com>
 */
class contactActions extends sfActions
{
    /**
    * Executes index action
    *
    * @access public
    * @param sfRequest $request A request object
    */
    public function executeIndex(sfWebRequest $request)
    {
        $this->form = new ContactForm();
    }
}
