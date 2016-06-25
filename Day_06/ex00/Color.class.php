<?php
Class Color {
	static $verbose = false;
	public $green = 0;
	public $red = 0;
	public $blue = 0;

	public function __construct(array $kwargs) {
		if (isset($kwargs['rgb'])) {
			$val = intval($kwargs['rgb']);

			$this->blue = $val % 256;
			$val /= 256;
			$this->green = $val % 256;
			$val /= 256;
			$this->red = $val % 256;
		}
		else {
			if (isset($kwargs['red']) && is_numeric($kwargs['red']))
				$this->red = intval($kwargs['red']);
			if (isset($kwargs['green']) && is_numeric($kwargs['green']))
				$this->green = intval($kwargs['green']);
			if (isset($kwargs['blue']) && is_numeric($kwargs['blue']))
				$this->blue = intval($kwargs['blue']);
		}
		if ($this->blue < 0)
			$this->blue = 0;
		if ($this->green < 0)
			$this->green = 0;
		if ($this->red < 0)
			$this->red = 0;
		if ($this->blue > 255)
			$this->blue = 255;
		if ($this->green > 255)
			$this->green = 255;
		if ($this->red > 255)
			$this->red = 255;
		if (self::$verbose == true)
			print($this . " constructed." . PHP_EOL);
	}

	public function add($kwargs) {
		$res = new Color(array( 'blue' => $kwargs->blue + $this->blue, 'green' => $kwargs->green + $this->green, 'red' => $kwargs->red + $this->red));
		return ($res);
	}

	public function sub($kwargs) {
		$res = new Color(array( 'blue' => $this->blue - $kwargs->blue, 'green' => $this->green - $kwargs->green, 'red' => $this->red - $kwargs->red));
		return ($res);
	}

	public function mult($param) {
		$res = new Color(array( 'blue' => $this->blue * $param, 'green' => $this->green * $param, 'red' => $this->red * $param));
		return ($res);
	}

	public function doc() {
		return file_get_contents('./Color.doc.txt');
	}

	public function __toString() {
		return sprintf("Color( red: %3d, green : %3d, blue : %3d )", $this->red, $this->green, $this->blue);
	}

	public function __destruct() {
		if (self::$verbose == true) {
			print($this . " destructed." . PHP_EOL);
		}
	}
}
?>
