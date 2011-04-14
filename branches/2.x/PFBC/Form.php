<?php
namespace PFBC;

/*This project's namespace structure is leveraged to autoload requested classes at runtime.*/
function Load($class) {
	$file = __DIR__ . "/../" . str_replace("\\", DIRECTORY_SEPARATOR, $class) . ".php";
	if(is_file($file))
		include_once $file;
}
spl_autoload_register("PFBC\Load");

class Form extends Base {
	private $elements = array();
	private $prefix = "http";
	private $values = array();
	private $widthSuffix = "px";

	protected $ajax;
	protected $ajaxCallback;
	protected $attributes;
	protected $error;
	protected $jQueryTheme = "smoothness";
	protected $jQueryUIButtons = 1;
	protected $resourcesPath;
	protected $prevent = array();
	protected $view;
	protected $width;

	public function __construct($id = "pfbc", $width = "") {
		$this->configure(array(
			"width" => $width,
			"action" => basename($_SERVER["SCRIPT_NAME"]),
			"id" => preg_replace("/\W/", "-", $id),
			"method" => "post"
		));

		if(isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on")
			$this->prefix = "https";
		
		if(empty($this->view))
			$this->view = new View\Standard;
		if(empty($this->error))
			$this->error = new Error\Standard;
		
		$path = __DIR__ . "/Resources";
		if(strpos($path, $_SERVER["DOCUMENT_ROOT"]) !== false)
			$this->resourcesPath = substr($path, strlen($_SERVER["DOCUMENT_ROOT"]));
		else
			$this->resourcesPath = "/PFBC/Resources";
	}

	/*When a form is serialized and stored in the session, this function prevents any non-essential
	information from being included.*/
	public function __sleep() {
		return array("attributes", "elements", "error");
	}

	public function addElement(Element $element) {
		$element->setForm($this);
		$id = $element->getID();
		if(empty($id))
			$element->setID($this->attributes["id"] . "-element-" . sizeof($this->elements));
		$this->elements[] = $element;
    }

    private function applyValues() {
        foreach($this->elements as $element) {
            $name = $element->getName();
            if(isset($this->values[$name]))
                $element->setValue($this->values[$name]);
            elseif(substr($name, -2) == "[]" && isset($this->values[substr($name, 0, -2)]))
                $element->setValue($this->values[substr($name, 0, -2)]);
        }
    }

	public static function clearSessionErrors($id = "pfbc") {
		if(!empty($_SESSION["pfbc"][$id]["errors"]))
			unset($_SESSION["pfbc"][$id]["errors"]);
	}

	public static function clearSessionValues($id = "pfbc") {
		if(!empty($_SESSION["pfbc"][$id]["values"]))
			unset($_SESSION["pfbc"][$id]["values"]);
	}

	public function formatWidthProperties() {
		if(!empty($this->width)) {
			if(substr($this->width, -1) == "%") {
				$this->width = substr($this->width, 0, -1);
				$this->widthSuffix = "%";
			}
			elseif(substr($this->width, -2) == "px")
				$this->width = substr($this->width, 0, -2);
		}
		else {
			$this->width = 100;
			$this->widthSuffix = "%";
		}
	}

    public function getAjax() {
        return $this->ajax;
    }

    public function getElements() {
        return $this->elements;
    }

	public function getError() {
		return $this->error;
	}

    public function getId() {
        return $this->attributes["id"];
    }

    public function getResourcesPath() {
        return $this->resourcesPath;
    }

	public static function getSessionErrors($id = "pfbc") {
		$errors = array();
		if(!empty($_SESSION["pfbc"][$id]["errors"]))
			$errors = $_SESSION["pfbc"][$id]["errors"];
		return $errors;	
	}

	public static function getSessionValues($id = "pfbc") {
		$values = array();
		if(!empty($_SESSION["pfbc"][$id]["values"]))
			$values = $_SESSION["pfbc"][$id]["values"];
		return $values;
	}

	public function getWidth() {
		return $this->width;
	}	

	public function getWidthSuffix() {
		return $this->widthSuffix;
	}	

	public static function isValid($id = "pfbc", $clearValues = true) {
		$valid = true;
		$form = self::recover($id);
		if(!empty($form)) {
			if($_SERVER["REQUEST_METHOD"] == "POST")
				$data = $_POST;
			else
				$data = $_GET;
			
			self::clearSessionValues($id);
			self::clearSessionErrors($id);

			if(!empty($form->elements)) {
				foreach($form->elements as $element) {
					$name = $element->getName();
					if(substr($name, -2) == "[]")
						$name = substr($name, 0, -2);

					if(isset($data[$name])) {
						$value = $data[$name];
						if(is_array($value)) {
							$valueSize = sizeof($value);
							for($v = 0; $v < $valueSize; ++$v)
								$value[$v] = stripslashes($value[$v]);
						}
						else
							$value = stripslashes($value);
						self::setSessionValue($id, $name, $value);
					}		
					else
						$value = null;
					
					if(!$element->isValid($value)) {
						self::setSessionError($id, $name, $element->getErrors());
						$valid = false;
					}	
				}
			}

			if($valid) {
				if($clearValues)
					self::clearSessionValues($id);
				self::clearSessionErrors($id);
			}		
		}

		return $valid;
	}

	private function recover($id) {
		if(!empty($_SESSION["pfbc"][$id]["form"]))
			return unserialize($_SESSION["pfbc"][$id]["form"]);
	}

	public function render() {
		$this->view->setForm($this);
		$this->error->setForm($this);

		$values = self::getSessionValues($this->attributes["id"]);
		if(!empty($values))
			$this->setValues($values);
		$this->applyValues();

		$this->formatWidthProperties();

		$this->renderCSS();
		$this->view->render();
		$this->renderJS();

		$this->save();
	}

	public static function renderAjaxErrorResponse($id = "pfbc") {
		$form = self::recover($id);
		$form->error->renderAjaxErrorResponse();
	}

	private function renderCSS() {
		$this->renderCSSFiles();

		echo '<style type="text/css">';
		$this->view->renderCSS();
		$this->error->renderCSS();
		foreach($this->elements as $element)
			$element->renderCSS();
		echo '</style>';
	}

	private function renderCSSFiles() {
		$urls = array();
		if(!in_array("jQueryUI", $this->prevent))
			$urls[] = $this->prefix . "://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/themes/" . $this->jQueryTheme . "/jquery-ui.css";
		foreach($this->elements as $element) {
			$elementUrls = $element->getCSSFiles();
			if(is_array($elementUrls))
				$urls = array_merge($urls, $elementUrls);
		}	

		/*This section prevents duplicate css files from being loaded.*/ 
		if(!empty($urls)) {	
			$urls = array_values(array_unique($urls));
			foreach($urls as $url)
				echo '<link type="text/css" rel="stylesheet" href="', $url, '"/>';
		}	
	}

	private function renderJS() {
		$this->renderJSFiles();	

		echo '<script type="text/javascript">';
		$this->view->renderJS();
		foreach($this->elements as $element)
			$element->renderJS();
		
		$id = $this->attributes["id"];

		echo 'jQuery(document).ready(function() {';
		/*jQuery is used to set the focus of the form's initial element.*/
		if(!in_array("focus", $this->prevent))
			echo 'jQuery("#', $id, ' :input:visible:enabled:first").focus();';

		$this->view->jQueryDocumentReady();
		foreach($this->elements as $element)
			$element->jQueryDocumentReady();
		
		if(!empty($this->jQueryUIButtons))
			echo 'jQuery("#', $id, ' input[type=button], #', $id, ' input[type=submit]").button();';
		
		if(!empty($this->ajax)) {
			echo 'jQuery("#', $id, '").bind("submit", function() {';
			$this->error->clear();
			echo <<<JS
			jQuery.ajax({
				url: "{$this->attributes["action"]}",
				type: "{$this->attributes["method"]}",
				data: jQuery("#$id").serialize(),
				success: function(response) {
					if(response != undefined && typeof response == "object" && response.errors) {
JS;
			$this->error->applyAjaxErrorResponse();
			echo <<<JS
						jQuery("html, body").animate({ scrollTop: jQuery("#$id").offset().top }, 500 );
					}
					else {
JS;
			if(!empty($this->ajaxCallback))
				echo $this->ajaxCallback, "(response);";
			echo <<<JS
					}
				}
			});
			return false;
		});

JS;
		}

		echo <<<JS
	});	
</script>	
JS;
	}

	private function renderJSFiles() {
		$urls = array();
		if(!in_array("jQuery", $this->prevent))
			$urls[] = $this->prefix . "://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js";
		if(!in_array("jQueryUI", $this->prevent))
			$urls[] = $this->prefix . "://ajax.googleapis.com/ajax/libs/jqueryui/1.8.10/jquery-ui.min.js";
		foreach($this->elements as $element) {
			$elementUrls = $element->getJSFiles();
			if(is_array($elementUrls))
				$urls = array_merge($urls, $elementUrls);
		}		

		/*This section prevents duplicate css files from being loaded.*/ 
		if(!empty($urls)) {	
			$urls = array_values(array_unique($urls));
			foreach($urls as $url)
				echo '<script type="text/javascript" src="', $url, '"></script>';
		}	
	}

	private function save() {
		$_SESSION["pfbc"][$this->attributes["id"]]["form"] = serialize($this);
	}

	public static function setSessionError($id, $element, $errors) {
		if(!is_array($errors))
			$errors = array($errors);
		if(empty($_SESSION["pfbc"][$id]["errors"][$element]))
			$_SESSION["pfbc"][$id]["errors"][$element] = array();

		foreach($errors as $error)
			$_SESSION["pfbc"][$id]["errors"][$element][] = $error;
	}

	public static function setSessionValue($id, $element, $value) {
		$_SESSION["pfbc"][$id]["values"][$element] = $value;
	}

	public function setValues(array $values) {
        $this->values = array_merge($this->values, $values);
    }
}
