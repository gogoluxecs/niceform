<?php
class niceform_lib_Validate
{
	const TYPE_VALIDATE = 'Validate';
	const TYPE_VALIDATE_MESSAGE = 'ValidateMessage';

	private $validateObject = null;
	private $requestValue = '';


	public function setValidateObject()
	{

	}


	/**
     * Matches agains compare value
	 *
	 * @return String
	 */
	public function setRequestValue($v)
	{
		$this->requestValue = $v;
	}

	public function validate()
	{
		$this->validateObject = $validateObject;

		foreach($validateObject as $p)
		{
			if(!is_object($i))
				$i = new $i;

			$s = explode('=', $p);

			if($s[0] == self::TYPE_VALIDATE)
			{
				//if($s[1] == 'Require')
				call_user_func_array(array($i, 'validate' . ucfirst($s[1])), array('Georgi'));
			}
		}

	}
}

