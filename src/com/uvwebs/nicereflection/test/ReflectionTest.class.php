<?php
/**
 * @RequestMethod = get
 * @Response = xml
 */
class nicereflection_test_ReflectionTest
{
	/**
	 * @Validate = Require
	 * @ValidateMessage = Missing first name
     * @Validate = Unique
	 * @ValidateMessage = First name is not unique
	 */
	private $first_name = null;

	/**
	 * @Validate = Require
	 * @ValidateMessage = Missing last name
	 */
	private $last_name = null;

	public function execute()
	{
		// executes the command
	}

	/**
	 * Adapters the validator instance and method
	 *
	 * @return Bool
	 */
	public function validateRequire($v)
	{
		echo 'Validate Require';

		return false;
	}

	/**
	 * Adapters athe validator isntance and methods
	 *
	 * @return Bool
	 */
	private function validateUnique()
	{
		echo 'Validate Unique';

		return false;
	}
}

