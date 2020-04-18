<?php

function ruDate($v, $format = 'd F Y') {
	if (is_null($v)) {
		return '';
	} else {
		return $v->translatedFormat($format);
	}
}

?>