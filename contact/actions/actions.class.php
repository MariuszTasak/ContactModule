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
    
    /**
     * Executes submit action when user push submit button
     * on contact form.
     * 
     * @param sfWebRequest $request A request object
     */
    public function executeSubmit(sfWebRequest $request){
        
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        $this->form = new ContactForm();

        $this->processForm($request, $this->form);

        // if validation fail make flash and set submitError template
        $this->getUser()->setFlash('contactMessage', 'Formularz nie został prawidłowo wypełniony');
        $this->setTemplate('submitError');
    }
    
    /**
     * Bind data to form and next validate form. After validation 
     * send mail and make a redirect depend of validation result.
     * 
     * @param sfWebRequest $request A request object
     * @param ContactForm $form A ContactForm object
     * @todo make class Mailer and add to this function
     */
    protected function processForm(sfWebRequest $request, ContactForm $form){
        $data = $request->getParameter($form->getName());
        $form->bind($data, $request->getFiles($form->getName()));
        
        if ($form->isValid())
        {   
            //send mail
            //...           
                        
            
            //validation ok, so set flash and make a redirect
            $this->getUser()->setFlash('contactMessage', 'Dziękujemy za wysłanie wiadomości');
            $this->redirect('contact/index');
        }        
    }
}
