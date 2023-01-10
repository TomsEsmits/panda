<?php
class Message {
  public static $successMessage = 'Form submited successfully!';
  public static $errorMessage = 'Error: Something went wrong!';
  public static $emptydataMessage = 'No data! Please fill form.';

  public static function showSuccessMessage() {
    echo '<h3 class="submission-message">' . self::$successMessage . '</h3>';
  }

  public static function showErrorMessage() {
    echo '<h3 class="submission-message">' . self::$errorMessage . '</h3>';
  }

  public static function showEmptyDataMessage() {
    echo '<h3 class="submission-message">' . self::$emptydataMessage . '</h3>';
  }
}