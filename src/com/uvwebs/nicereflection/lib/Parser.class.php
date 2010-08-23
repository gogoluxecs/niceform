<?php
class nicereflection_lib_Parser
{
	const TYPE_CLASS_COMMENT = 1;
	const TYPE_PROPERTY_COMMENT = 2;

	static public function create($type, $class)
	{
		switch($type)
		{
			case self::TYPE_CLASS_COMMENT:
				$i = new nicereflection_lib_DocCommentClass();
				$i->setReflectionClass($class);

				return $i;
				break;

			case self::TYPE_PROPERTY_COMMENT:
				$i = new nicereflection_lib_DocCommentProperty();
				$i->setReflectionClass($class);

				return $i;
				break;

			default:
				throw new Exception('Missing reflection type');
				break;
		}
	}
}

