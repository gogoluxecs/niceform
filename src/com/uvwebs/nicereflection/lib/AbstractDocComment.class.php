<?php
abstract class nicereflection_lib_AbstractDocComment
{
	protected $r = null;

	/**
	 * Constructs class reflection independs on the instance or class name
	 *
	 * @return Void
	 */
	public function setReflectionClass($class)
	{
		if(is_object($class))
		{
			$this->r = new ReflectionClass(get_class($class));
		}
		else
		{
			if(class_exists($class))
				$this->r = new ReflectionClass($class);
			else
				throw new Exception($class);
		}
	}

	/**
	 * Parses the comments
	 *
	 * @return Hash
	 */
	abstract public function parse();
}

