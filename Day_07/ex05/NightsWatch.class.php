<?php

class NightsWatch {
	private $ok;

	public function recruit($man) {
		if ($man instanceof Ifighter) {
			$this->ok[] = $man;
		}
	}
	public function fight() {
		foreach ($this->ok as $man)
			$man->fight();
	}
}

?>
