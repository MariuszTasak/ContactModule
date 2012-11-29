/*
 * Simple validator for contact form
 */

$(document).ready(function(){
    
    var emailInput = $('#contact_table #contact_email');
    var titleInput = $('#contact_table #contact_title');
    var messageInput = $('#contact_table #contact_message');
    
    /* check if string is a valid e-mail address */
    function isEmail(email) {
        var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        return regex.test(email);
    }

    /* validate input min length */
    function validateMinLength(text, minLength){
        var textToValidate = $.trim(text);
        if ( textToValidate.length < minLength )
            return false;
        return true;
    }
    
    /* validate input max length */
    function validateMaxLength(text, maxLength){
        var textToValidate = $.trim(text);
        if ( textToValidate.length > maxLength )
            return false;
        return true;
    }
    
    /* validate email input from contact form */
    function validateEmail(input){
        var email = input.val();
        
        $(input).parent().children('.error').remove();
        
        if ( isEmail(email) ){
            showValidIcon($(input).next('.input-validation'));            
            return true;
        }
        else{
            showInvalidIcon($(input).next('.input-validation'));
            $(input).parent().append('<p class="error">Proszę wprowadzić prawidłowy adres e-mail.</p>');
            return false;
        }          
    }
    
    /* validate title input from contact form */
    function validateTitle(input){
        var title = input.val();
        
        $(input).parent().children('.error').remove();
        
        if ( validateMaxLength(title, 100) && validateMinLength(title, 3) ){
            showValidIcon(input.next('.input-validation'));            
            return true;
        }
        else{
            showInvalidIcon(input.next('.input-validation'));
            $(input).parent().append('<p class="error">Tytuł wiadomości musi zawierać od 3 do 100 znaków.</p>');
            return false;
        }      
    }
    
    /* validate message input from contact form */
    function validateMessage(input){
        var message = input.val();
        
        $(input).parent().children('.error').remove();
        
        if ( validateMinLength(message, 3) ){
            showValidIcon(input.next('.input-validation'));            
            return true;
        }
        else{
            showInvalidIcon(input.next('.input-validation'));
            $(input).parent().append('<p class="error">Treść wiadomości musi zawierać conajmniej 3 znaki.</p>');
            return false;
        }      
    }

    /* show valid icon after valid input (add valid class and remove invalid class) */
    function showValidIcon(input){
        $(input).removeClass('invalid');
        $(input).addClass('valid');
    }
    
    /* show invalid icon after invalid input (add invalid class and remove valid class)*/
    function showInvalidIcon(input){
        $(input).removeClass('valid');
        $(input).addClass('invalid');
    }
    
    /* event on email input change*/ 
    $('#contact_table #contact_email').change(function(){
        validateEmail(emailInput);
    });
    
    /* event on title input change */
    $('#contact_table #contact_title').change(function(){
        validateTitle(titleInput);
    });
    
    /* event on message input change */
    $('#contact_table #contact_message').change(function(){
        validateMessage(messageInput);
    });
    
    /* validation on submit form */
    $('#contact_table input[type="submit"]').click(function(){
        if ( !validateEmail(emailInput) || !validateTitle(titleInput) || !validateMessage(messageInput) )
            return false;
    });
    
    
});

