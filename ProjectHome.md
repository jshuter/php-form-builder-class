
<h2>Project Overview</h2>
<p>The PFBC (PHP Form Builder Class) project is developed with the following goals in mind...</p>
<ul>
<blockquote><li>Promote rapid development of forms through an object-oriented PHP structure.</li>
<li>Eliminate the grunt/repetitive work of writing the html and validation when building forms.</li>
<li>Reduce human error by using a consistent/tested utility.</li>
</ul>
<p>This project was first release to the open source community on April, 24 2009 at<br>
<a href='http://www.phpclasses.org/package/5350-PHP-Generate-HTML-and-Javascript-for-displaying-forms.html'>PHPClass.org</a>.<br>
It was moved to its current location at <a href='http://code.google.com/p/php-form-builder-class'>Google's Project Hosting service</a>
on November 16, 2009.  Since the initial release, the project has gone through over 20 version releases<br>
and is still under active development.</p></blockquote>

<p>The most significant enhancement in version 3.x is the integration with Bootstrap - a front-end framework from Twitter. Bootstrap incorporates responsive CSS, which means your forms not only look and behave great in the latest desktop browser, but in tablet and smartphone browsers as well.</p>

<h2>System Requirements</h2>
<ul>
<blockquote><li><a href='http://php-form-builder-class.googlecode.com/files/pfbc3.1-php5.3.zip'>pfbc3.1-php5.3.zip</a> - PHP 5 >= 5.3</li>
<li><a href='http://php-form-builder-class.googlecode.com/files/pfbc3.1-php5.zip'>pfbc3.1-php5.zip</a> - PHP 5</li>
</ul></blockquote>

<h2>Installation Instructions</h2>
<p>Before writing any code, you'll first need to download the latest version of PFBC, extract the contents of the zip file, and upload the PFBC directory within the document root of your web server. The other files/directories outside of the PFBC folder that are included in the download are provided only for instruction and can be omitted from your production environment.</p>

<h2>Examples/Tutorials</h2>
<p>The links provided below are meant to demonstrate the key features included in the project.  Currently, these links are using the pfbc3.1-php5 release.  Each of these examples are also included in both of the project's download files seen above.</p>
<ul>
<blockquote><li><a href='http://www.imavex.com/pfbc3.x-php5/examples/form-elements.php'>Form Elements</a></li>
<li><a href='http://www.imavex.com/pfbc3.x-php5/examples/html5.php'>HTML5</a></li>
<li><a href='http://www.imavex.com/pfbc3.x-php5/examples/views.php'>Views</a></li>
<li><a href='http://www.imavex.com/pfbc3.x-php5/examples/validation.php'>Validation</a></li>
<li><a href='http://www.imavex.com/pfbc3.x-php5/examples/ajax.php'>Ajax</a></li>
</ul></blockquote>

<h2>Code Samples</h2>
```
<?php
//PFBC 3.x PHP 5 >= 5.3
session_start();
include($_SERVER["DOCUMENT_ROOT"] . "/PFBC/Form.php");
$form = new PFBC\Form("GettingStarted");
$form->addElement(new PFBC\Element\Textbox("My Textbox:", "MyTextbox"));
$form->addElement(new PFBC\Element\Select("My Select:", "MySelect", array(
   "Option #1",
   "Option #2",
   "Option #3"
)));
$form->addElement(new PFBC\Element\Button);
$form->render();

//PFBC 3.x PHP 5
session_start();
include($_SERVER["DOCUMENT_ROOT"] . "/PFBC/Form.php");
$form = new Form("GettingStarted");
$form->addElement(new Element_Textbox("My Textbox:", "MyTextbox"));
$form->addElement(new Element_Select("My Select:", "MySelect", array(
   "Option #1",
   "Option #2",
   "Option #3"
)));
$form->addElement(new Element_Button);
$form->render();
?>
```