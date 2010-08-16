<?php

// get reflection result
$result = '';

// validate first name
$validateFirstName = niceform_lib_Validate();
$validateFirstName->setValidateObject($result['first_name']);
$validateFirstName->setRequestValue($result['first_name');

// validate last name
$validateLastName = niceform_lib_Validate();
$validateLastName->setValidateObject($result['last_name']);
$validateLastName->setRequestValue($_REQUEST['last_name']);

if($validateLastName->hasError())
{
	foreach ($validateLastName->getErrorMessages() as $errorMessage)
	{
		echo $errorMessage . ' <br />';
	}
}

