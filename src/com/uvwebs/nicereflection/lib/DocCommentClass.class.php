<?php
class nicereflection_lib_DocCommentClass
extends nicereflection_lib_AbstractDocComment
{
	/**
	 * Doc comments, that supportes parsing
	 *
	 * @return Array
	 */
	static private $supportedDocComments = array(
		'@RequestMethod',
		'@Response',
	);

	public function parse()
	{
		$r = $this->r;

		if(!$this->validateParse())
			return array();

		$replace = array(
			'*',
			'/',
			"\r",
			"\r\n",
			"\n",
			' '
		);

		$docComment = str_replace($replace, '', $r->getDocComment());

		return array_filter(
			explode('@', trim($docComment)
		));
	}

	/**
	 * Rules to validate parse of doc comment
	 *
	 * @return Bool
	 */
	private function validateParse()
	{
		$r = $this->r;

		if($r->getDocComment() == false || strpos($r->getDocComment(), '@') === false)
			return false;

		$i = 0;
		foreach(self::$supportedDocComments as $option)
		{
			if(strpos($r->getDocComment(), $option) !== false)
				$i++;
		}

		if($i == 0)
			return false;

		return true;
	}
}

