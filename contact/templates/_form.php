<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('contact/submit'); ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
  <table id="contact_table">
    <thead>
        <tr>
            <th colspan="2">
                Napisz do nas
            </th>
        </tr>
    </thead>  
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          <input type="submit" value="Wyślij wiadomość" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['email']->renderLabel() ?><span class="red">*</span></th>
        <td>
          <?php echo $form['email']->renderError() ?>
          <?php echo $form['email'] ?><div class="input-validation"></div>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['title']->renderLabel() ?><span class="red">*</span></th>
        <td>
          <?php echo $form['title']->renderError() ?>
          <?php echo $form['title'] ?><div class="input-validation"></div>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['message']->renderLabel() ?><span class="red">*</span></th>
        <td>
          <?php echo $form['message']->renderError() ?>
          <?php echo $form['message'] ?><div class="input-validation"></div>
        </td>
      </tr>      
    </tbody>
  </table>
</form>
