<?php
class niceform_lib_Validate
{
	const TYPE_VALIDATE = 'Validate';
	const TYPE_VALIDATE_MESSAGE = 'ValidateMessage';

	private $validateObject = null;
	private $reflectionObject = null;
	private $requestValue = '';

	private $validateMessage = array();

	public function setReflection($v)
	{
		$this->reflectionObject = $v;
	}

	public function setValidate($v)
	{
		$this->validateObject = $v;
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

	/**
	 * Proceed to Validation
	 *
	 * @return Return
	 */
	public function validate()
	{
		$result = array();

		foreach($this->reflectionObject as $k => $p)
		{
			if(!is_object($this->validateObject))
				$i = new $this->validateObject;
			else
				$i = $this->validateObject;

			$s = explode('=', $p);

			if($s[0] == self::TYPE_VALIDATE)
			{
				$result[$k] = call_user_func_array(array($i, $s[1]), array($this->requestValue));
			}
		}

		$i = 0;
		foreach($result as $k => $r)
		{
			$i++;

			if($r == false)
			{
				$p = $this->reflectionObject[$k+1];
				$s = explode('=', $p);

				if($s[0] == self::TYPE_VALIDATE_MESSAGE)
					$this->validateMessage[] = $s[1];

				$i--;
			}
		}

		return (count($result) == $i) ? true : false;
	}

	public function getValidateMessage()
	{
		return $this->validateMessage;
	}
}

