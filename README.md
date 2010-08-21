# cobweb-h2o

A Cobweb template adapter for [H2O](http://github.com/speedmax/h2o-php).

## Usage

To use H2O in your Cobweb project, add this application to the `application` directory and add it `h2o` to your `INSTALLED_APPLICATIONS` setting. To use the H20 template engine globally (for the entire project), set the `TEMPLATE_ADAPTER` setting to `H2OTemplateAdapter`:

	<?php // settings/settings.conf.php
	return array(
		'INSTALLED_APPLICATIONS' => array('h2o', /* ... */),
		'TEMPLATE_ADAPTER' => 'H2OTemplateAdapter'
	);

To use with `Controller::render()` in specific controllers, simply override the  method in a base class:

	<?php
	class H2OController extends Controller {
		public function render(
				$template_name,
				$bindings = array(),
				$code = HTTPResponse::OK,
				$mime_type = MIMEType::HTML) {
			return parent::render($template_name, $bindings, $code, $mime_type, 'H2OTemplateAdapter');
		}
	}
	
	class MyH2OController extends H2OController {
		public function index() {
			return $this->render('index.tpl', array('foo' => 'bar'));
		}
	}