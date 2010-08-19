<?php
class TestValidation
{
	/**
	 * @Validate = validateRequire
     * @ValidateMessage = First name is required
	 * @Validate = validateUnique
     * @ValidateMessage = Not Unique
	 */
	private $first_name = null;


	/**
	 * @Validate = validateRequire
	 * @ValidateMessage = Last name is required
	 */
	private $last_name = null;

	/**
	 * Validator handler
	 *
	 */
	public function validateRequire($v)
	{
		return true;
	}

	/**
	 * Validator handler
	 *
	 */
	public function validateUnique($v)
	{
		return false;
	}
}

