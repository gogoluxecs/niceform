<?php
class niceautoload_lib_AutoLoad
{
	/**
	 * @return String
	 */
	private $filename = '';

	public function __construct()
	{
		spl_autoload_register(array($this, 'autoload'));
	}

	public function __descrutct()
	{
		spl_autoload_unregister(array($this, 'autoload'));
	}

	static public function getInstance()
	{
		$c = new niceautoload_lib_AutoLoad();
		return $c;
	}

	/**
	 * Loads the class
	 *
	 * @return Void
	 */
	private function autoload($classname)
	{
		$filename = str_replace('_', '/', $classname);

		$filenames = array(
			$filename . '.class.php',
			$filename . '.php',
			$filename . '.interface.php',
		);

		foreach ($filenames as $f)
		{
			$this->filename = $f;
			$fileInPath = $this->searchInIncludePath();

			if($fileInPath != '' && file_exists($fileInPath))
				require_once($this->filename);
		}
	}


	/**
	 * Search for file in the include path
	 *
	 * @return String filename
	 */
	private function searchInIncludePath()
	{
		$filename = $this->filename;

		if (is_file($filename))
		    return $filename;

		foreach (explode(PATH_SEPARATOR, ini_get("include_path")) as $path)
		{
			if (strlen($path) > 0 && $path{strlen($path)-1} != DIRECTORY_SEPARATOR)
			  $path .= DIRECTORY_SEPARATOR;

			$f = realpath($path . $filename);
			if ($f && is_file($f))
			{
			  return $f;
			}
		}

		return $filename;
	}
}

