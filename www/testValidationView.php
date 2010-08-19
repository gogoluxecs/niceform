<?php
error_reporting(E_ALL | E_STRICT);

$pathToBootstrap = dirname(dirname(__FILE__)) .
	DIRECTORY_SEPARATOR . 'src' .
	DIRECTORY_SEPARATOR . 'com' .
	DIRECTORY_SEPARATOR . 'uvwebs' .
	DIRECTORY_SEPARATOR . 'niceform' .
	DIRECTORY_SEPARATOR . 'bootstrap.php';

require_once $pathToBootstrap;

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	///XXX RAW test version
	// get reflection
	$reflection = nicereflection_lib_Parser::create(2, 'TestValidation');
	$reflection = $reflection->parse();

	// initialize validation
	$firstNameValidation = new niceform_lib_Validate();
	// setValidate can be different
	$firstNameValidation->setValidate('TestValidation');


	$firstNameValidation->setReflection($reflection['first_name']);
	$firstNameValidation->setRequestValue($_REQUEST['first_name']);
	var_dump($firstNameValidation->validate());
	var_dump($firstNameValidation->getValidateMessage());

	$lastNameValidation = new niceform_lib_Validate();
	$lastNameValidation->setValidate('TestValidation');

	$lastNameValidation->setReflection($reflection['last_name']);
	$lastNameValidation->setRequestValue($_REQUEST['last_name']);
}

?>

<!DOCTYPE html PUBLIC
	"-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Test Validation</title>
</head>

<?php $request = isset($_REQUEST['test']) ? $_REQUEST['test'] : ''; ?>

<body>
	<form method="post">
		<div>
			<label id="test_first_name">First name:</label>
			<input type="text"
				id="test_first_name"
				name="first_name"
				value="<?php ?>"/>
		</div>

		<div>
			<label id="test_last_name">Last name:</label>
			<input type="text"
				id="test_last_name"
				name="last_name"
				value="<?php  ?>" />
		</div>

		<div>
			<label id="test_sex_m">Male</label>

			<input type="radio"
				id="test_sex_m"
				name="text[sex]"
				value="1" />

			<label id="test_sex_f">Female</label>

			<input type="radio"
				id="test_sex_f"
				name="text[sex]"
				value="2" />
		</div>

		<div>
			<input type="submit" value="Send" />
		</div>

	</form>
</body>
</html>

