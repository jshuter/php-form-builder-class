<?php
namespace PFBC\Element;

class CKEditor extends \PFBC\Element\Textarea {
	protected $basic;

	function renderJS() {
		echo 'CKEDITOR.replace("', $this->attributes["id"], '"';
		if(!empty($this->basic))
			echo ', { toolbar: "Basic" }';
		echo ');';

		$form = $this->getForm();
		$ajax = $form->getAjax();
		$id = $form->getID();
		if(!empty($ajax)) {
			echo <<<JS
	jQuery("#$id").bind("submit", function() {
		CKEDITOR.instances["{$this->attributes["id"]}"].updateElement();
	});
JS;
		}
	}

	function getJSFiles() {
		return array(
			$this->getForm()->getResourcesPath() . "/ckeditor/ckeditor.js"
		);
	}
}	
