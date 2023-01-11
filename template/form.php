<?php include_once './inc/Submit.php'; ?>
<section class="form-block">
  
  <div class="container">
    <form class="form-block__form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
      <div class="form-block__item-wrapper">
        <label for="a_table"
          >A Database table Values (all data types)</label
        >
        <input
          type="text"
          name="a_field_value"
          id="a_table"
          class="form-block__field <?php echo !$form->a_field_Err ?: 'form-block__field--invalid'; ?>"
          value="<?php echo $form->a_field_value; ?>"
        />
        <div class="form-block__error-message"> 
          <?php echo $form->a_field_Err ? $form->a_field_Err : null; ?>
        </div>
      </div>

      <div class="form-block__item-wrapper">
        <label for="b_table">"B"(only numerical)</label>
        <input
          type="text"
          name="b_field_value"
          id="b_table"
          class="form-block__field <?php echo !$form->b_field_Err ?: 'form-block__field--invalid'; ?>"
          value="<?php echo $form->b_field_value; ?>"
        />
        <div class="form-block__error-message"> 
          <?php echo $form->b_field_Err ? $form->b_field_Err : null; ?>
        </div>
      </div>

      <div class="form-block__item-wrapper">
        <label for="c_table"
          >C Database table Values (all data types)</label
        >
        <input
          type="text"
          name="c_field_value"
          id="c_table"
          class="form-block__field <?php echo !$form->c_field_Err ?: 'form-block__field--invalid'; ?>"
          value="<?php echo $form->c_field_value; ?>"
        />
        <div class="form-block__error-message"> 
          <?php echo $form->c_field_Err ? $form->c_field_Err : null; ?>
        </div>
      </div>

      <input class="form-block__submit-button" type="submit" name="submit" value="Send">
    </form>
  </div>
</section>