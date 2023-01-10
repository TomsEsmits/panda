<?php
 $a_field_value = $b_field_value = $c_field_value = '';
 $a_field_Err = $b_field_Err = $c_field_Err = '';

 if (isset($_POST['submit'])) {
  if (empty($_POST['a_field_value'])) {
    $a_field_Err = 'This field is required';
  } else {
    $a_field_value = filter_input(
      INPUT_POST,
      'a_field_value',
      FILTER_SANITIZE_STRING
    );
  }

  if (empty($_POST['b_field_value'])) {
    $b_field_Err = 'This field is required';
  } else {
    if (is_numeric($_POST['b_field_value'])) {
      $b_field_value = filter_input(
        INPUT_POST,
        'b_field_value',
        FILTER_SANITIZE_NUMBER_INT
      );
    } else {
      $b_field_Err = 'Insert only numeric values';
    }
  }

  if (empty($_POST['c_field_value'])) {
    $c_field_Err = 'This field is required';
  } else {
    $c_field_value = filter_input(
      INPUT_POST,
      'c_field_value',
      FILTER_SANITIZE_STRING
    );
  }

  if (empty($a_field_Err) && empty($b_field_Err) && empty($c_field_Err)) {
    $table_a = 'table_a';
    $table_b = 'table_b';
    $table_c = 'table_c';

    if ($database->insert($table_a, ['a_table_value' => $a_field_value]) && $database->insert($table_b, ['b_table_value' => $b_field_value]) && $database->insert($table_c, ['c_table_value' => $c_field_value])) {
      Message::showSuccessMessage();
      $a_field_value = $b_field_value = $c_field_value = '';
    } else {
      Message::showErrorMessage();
    }

    $conn = null;
  }
 }