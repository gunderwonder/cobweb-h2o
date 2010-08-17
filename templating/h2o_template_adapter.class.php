<?php

class H2OTemplateAdapter extends TemplateAdapter {
	
	public function interpolate($template, $interpolation_mode = self::INTERPOLATE_FILE) {
		$h2o = new h2o($template);
		return $h2o->render($this->bindings());
	}
}