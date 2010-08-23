<?php
class nicereflection_lib_CachingAdapter
{
	private $parser = null;

	public function __construct(nicereflection_lib_CachingAdapter $parser)
	{
		$this->parser = $parser;
	}

	/**
	 * Wrapps parser method for caching
	 *
	 * @return Void
	 */
	public function parser()
	{
		// wraps parser method
	}
}

