<?php
class Submit {
 	public $a_field_value;
	public $b_field_value;
	public $c_field_value;
	public $a_field_Err;
	public $b_field_Err;
	public $c_field_Err;
	public $database;
	public $conn;
	public $table_a;
	public $table_b;
	public $table_c;

	public function __construct() {
		$this->a_field_value = $this->b_field_value = $this->c_field_value = '';
		$this->a_field_Err = $this->b_field_Err = $this->c_field_Err = '';
		$this->database = new Database();
		$this->conn = $this->database->connect();
		$this->table_a = 'table_a';
		$this->table_b = 'table_b';
		$this->table_c = 'table_c';
	}

	public function validateForm() {
		if (isset($_POST['submit'])) {
			if (empty($_POST['a_field_value'])) {
				$this->a_field_Err = 'This field is required';
			} else {
				$this->a_field_value = filter_input(INPUT_POST, 'a_field_value', FILTER_SANITIZE_STRING);
				
			}

			if (empty($_POST['b_field_value'])) {
				$this->b_field_Err = 'This field is required';
			} else {
				if (is_numeric($_POST['b_field_value'])) {
					$this->b_field_value = filter_input(INPUT_POST, 'b_field_value', FILTER_SANITIZE_NUMBER_INT);
				} else {
					$this->b_field_Err = 'Insert only numeric values';
				}
			}

			if (empty($_POST['c_field_value'])) {
				$this->c_field_Err = 'This field is required';
			} else {
				$this->c_field_value = filter_input(INPUT_POST, 'c_field_value', FILTER_SANITIZE_STRING);
			}
			if (empty($this->a_field_Err) && empty($this->b_field_Err) && empty($this->c_field_Err)) {
				if ($this->database->insert($this->table_a, ['a_table_value' => $this->a_field_value]) && $this->database->insert($this->table_b, ['b_table_value' => $this->b_field_value]) && $this->database->insert($this->table_c, ['c_table_value' => $this->c_field_value])) {
					Message::showSuccessMessage();
						$this->a_field_value = $this->b_field_value = $this->c_field_value = '';
				} else {
						Message::showErrorMessage();
				}
			}
		}
	}
}

$form = new Submit();
$form->validateForm();