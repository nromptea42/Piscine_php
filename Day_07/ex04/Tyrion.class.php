<?php

class Tyrion {

	public function sleepWith($param)
	{
		if ($param == new Jaime())
			print ("Not even if I'm drunk !" . PHP_EOL);
		if ($param == new Sansa())
			print ("Let's do this" . PHP_EOL);
		if ($param == new Cersei())
			print ("Not even if I'm drunk !" . PHP_EOL);
	}
}

?>
