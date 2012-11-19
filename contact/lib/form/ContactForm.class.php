<?php

/**
 * ContactForm
 *
 * @author Mariusz Tasak <pixelmt@gmail.com>
 */
class ContactForm extends sfForm  {
    
    /**
     * Configuration of contact form
     * 
     * @access public 
     */
    public function configure()
    {
        $this->setWidgets(array(
            'email'     => new sfWidgetFormInput(array(), array(
                'placeholder' => 'Podaj adres e-mail',
                'type' => 'text',
                'pattern' => '[^@]+@[^@]+\.[a-zA-Z]{2,6}',
                'required' => 'required',
                'title' => 'Proszę wprowadzić prawidłowy adres e-mail',
            )),
            'title'     => new sfWidgetFormInput(array(), array(
                'placeholder' => 'Podaj tytuł wiadomości',
                'required' => 'required',
                'pattern' => '.{3,300}',
                'title' => 'min znaków: 3, max znaków: 300'
            )),
            'message'   => new sfWidgetFormTextarea(array(), array(
                'placeholder' => 'Podaj treść wiadomości',
                'required' => 'required',
                'title' => 'Podaj treść (min znaków: 3)'
            ))
        ));
        
        $this->widgetSchema->setLabels(array(
        'title'    => 'Tytuł:',
        'email'    => 'Adres e-mail:',
        'message'  => 'Treść wiadomości:'
        ));

        $this->widgetSchema->setNameFormat('contact[%s]');

        $this->setValidators(array(
            'email'         => new sfValidatorEmail(array(),array(
                'required'      => 'Podaj adres e-mail.',
                'invalid'       => 'Adres email jest niepoprawny.')),
            'title'         => new sfValidatorString(array('max_length' => 100,'min_length' => 3, 'trim' => true),array(
                'required'      => 'Podaj tytuł wiadomości.',
                'min_length'    => 'Tytuł "%value%" jest za krótki (min znaków:  %min_length% ).',
                'max_length'    => 'Tytuł "%value%" jest za długi (max znaków: %max_length% ).')),
            'message'       => new sfValidatorString(array('min_length' => 3, 'trim' => true),array(
                'required'      => 'Podaj treść wiadomości.',
                'min_length'    => 'Treść "%value%" jest za krótka (min znaków:  %min_length% ).'))
        ));

    }
    
    
      
}

?>
