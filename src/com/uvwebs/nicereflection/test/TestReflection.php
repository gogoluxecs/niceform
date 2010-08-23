<?php

$start = microtime(true);

require_once dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'bootstrap.php';

$i = new nicereflection_test_ReflectionTest();
$i = get_class($i);

for($j = 0; $j < 100; $j ++)
{
	$r = nicereflection_lib_Parser::create(2, $i);
	$result = $r->parse();
}


$end = microtime(true);

var_dump($result);

echo '<hr />';

echo ($end - $start);


/*
echo '<pre>';
$firstName = $result['first_name'];


foreach($firstName as $p)
{
	if(!is_object($i))
		$i = new $i;

	$s = explode('=', $p);

	if($s[0] == 'Validate')
	{
		if($s[1] == 'Require')
			call_user_func_array(array($i, 'validate' . ucfirst($s[1])), array('Georgi'));
	}
}


/** @TODO
	$p = nicereflection_lib_Parser::create(2);
	$p->setReflectionClass($i);
	$p->setCommentTypes(array('response', 'header'));
	$p->parse();
*/

