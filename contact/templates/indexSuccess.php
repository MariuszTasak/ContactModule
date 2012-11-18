<?php if( $sf_user->hasFlash('contactMessage') ): ?>
    <p class="msg done"><?php echo $sf_user->getFlash('contactMessage'); ?></p>
<?php endif; ?>

<h1 class="contact">Formularz kontaktowy</h1>

<?php include_partial('contact/form',array('form'=> $form)); ?>