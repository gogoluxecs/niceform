<?php
class nicereflection_lib_DocCommentProperty
extends nicereflection_lib_AbstractDocComment
{
	private $docComments = array();

	public function parse()
	{
		$r = $this->r;

		//TODO add compile option
		// read
		// $handle = fopen(dirname(dirname(__FILE__)). DIRECTORY_SEPARATOR .'cache' . DIRECTORY_SEPARATOR . 'cache.txt', 'rb');
		// return unserialize(stream_get_contents($handle));

		$replace = array(
			'*',
			'/',
			"\r",
			"\r\n",
			"\n",
			"\t",
			' '
		);

		$properties = $this->r->getProperties(ReflectionProperty::IS_PRIVATE);

		$docComments = array();
		foreach($properties as $property)
		{
			$docComment = str_replace($replace, '', $property->getDocComment());
			$docComment = array_filter(explode('@', trim($docComment)));
			$docComments[$property->getName()] = $docComment;
		}

		// fwrite
		// $handle = fopen(dirname(dirname(__FILE__)). DIRECTORY_SEPARATOR .'cache' . DIRECTORY_SEPARATOR . 'cache.txt', 'w+');
		// fwrite($handle, serialize($docComments));
		// fclose($handle);

		return $docComments;
	}
}

