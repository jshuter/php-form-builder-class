**IMPORTANT:** For a detailed list of changes to this project, please see the commit log at http://code.google.com/p/php-form-builder-class/source/list.

Version 0.9.7 - _Released 01/28/2010_
  * Added html form element type
  * Corrected cross site scripting vulnerabilities in example files.
  * Corrected several xhtml discrepancies.
  * Converted all php shorthand open tags (<?) to full open tags (<?php).

Version 0.9.8 - _Released 01/30/2010_
  * Replaced Animated GIF Captcha with reCAPTCHA
  * Corrected syntax issue in web editor js section.
  * Corrected several more xhtml discrepancies.
  * Added optional parameter to render() function for returning string instead of echoing html content
  * 02/13/2010 - Corrected several more xhtml discrepancies.
  * 02/15/2010 - Found and correct a bug occurring when using the setReferenceValues method.  Special thanks to saleh.alghamdi for bringing this issue to my attention.
  * 02/16/2010 - Updated example files adding title tags as well as correcting a few wording issues.
  * 02/20/2010 - Changed radio button form element type.  Previously, one radio button in each radio button group was checked by default making the required attribute irrelevant.  Now, no radio buttons will be checked by default if no value is pass to the addRadio method.  This change also affects the truefalse and yesno form element types as they both ultimately use the radio element.
  * 02/24/2010 - reCAPTCHA public and private keys can now be specified to reduce security issues.  Special thanks to moncojhr for bringing this issue to my attention.
  * 02/24/2010 - Found and corrected bug related to preHTML attribute.  Previously, this attribute would only be rendered if a form element label was supplied.

Version 0.9.9 - _Released 02/02/2010_
  * 03/02/2010 - Added jQuery color picker field
  * 03/02/2010 - Several minor enhancements inside class.form.php
  * 03/02/2010 - Minor cosmetic tweaks to tooltips.
  * 03/02/2010 - Added jqueryDateFormat form attribute which allows developers to control the formatting of dates returned by the date and daterange fields.

Version 1.0.0 - _Released 02/04/2010_
  * 03/04/2010 - Added CKEditor web editor field courtesy of moncojhr
  * 03/04/2010 - Found and corrected bug related to setting initial form field's focus
  * 03/07/2010 - Found and corrected javascript error in focus setting section
  * 03/07/2010 - Added hint element attribute (example coming in near future)
  * 03/08/2010 - Updated to Google Maps API v3 (no longer need API key parameter)
  * 03/09/2010 - Corrected php notice message in latlng form element
  * 03/09/2010 - Corrected bug within hint functionality

Version 1.0.1 - _Released 03/17/2010_
  * 03/10/2010 - Replaced/combined checkForm() and captchaIsValid() function into one function - validate()
  * 03/12/2010 - Fixed bug with rating element occurring during javascript validation
  * 03/12/2010 - Added errorMsgFormat form attribute for customizing js/php error messages
  * 03/12/2010 - Added latlngDefaultLocation form attribute for controlling where the marker is placed on the google map initially - with no value assigned
  * 03/17/2010 - Updated examples to accomodate version change
  * 03/17/2010 - Remove some unneeded files from ckeditor directory
  * 03/17/2010 - Updated tooltip icon image
  * 03/19/2010 - Fixed IE bug with tooltips
  * 03/19/2010 - Fixed IE bug with rating element
  * 03/21/2010 - Added Conditional Scenarios example

Version 1.0.2 - _Released 03/24/2010_
  * 03/22/2010 - Added includesRelativePath form attribute which combines/replaces jqueryPath, tinymcePath, ckeditorPath, and captchaPath
  * 03/22/2010 - Updated examples files to accomodate includesRelativePath attribute
  * 03/22/2010 - Removed path-attributes.php example file
  * 03/22/2010 - Added example file explaining includesRelativePath attribute
  * 03/23/2010 - Added email form element type w/validation
  * 03/23/2010 - Added email validation example
  * 03/23/2010 - Updated index.php to include various additions included in version 1.0.2
  * 03/24/2010 - Updated jquery sortable functionality to correct IE issue
  * 03/24/2010 - Added system requirements (PHP 5 or greater)
  * 03/26/2010 - Added ajaxPreCallback attribute w/newly added 3rd ajax example for demonstration purposes
  * 03/27/2010 - Added parentFormOverride form attribute
  * 03/27/2010 - Added new conditional scenario example using select box w/onchange event
  * 03/28/2010 - Added new ajax example demoing manual ajax submission
  * 03/28/2010 - Added onsubmitFunctionOverride form attribute
  * 04/01/2010 - Adding bind() function for nested form elements rendered via elementsToString()
  * 04/01/2010 - Updated Conditional Scenarios example to include bind() functionality
  * 04/02/2010 - Added ckeditorCustomConfig form attribute
  * 04/08/2010 - Updated markup/css of index.php file and all example files
  * 04/08/2010 - Correct bug with bind() function.  Updated Conditional Scenarios example file.

Version 1.0.3 - _Released 04/23/2010_
  * includesRelativePath form attribute renamed to includesPath and now supports both relative and absolute paths to includes directory.
  * Replaced table markup with flexible div layout.
  * Removed all table specific form attributes: tableAttributes, tdAttributes, etc.
  * Added hard coded classes on div/label containers for styling.
  * Removed name attribute from form tag.
  * Added doctypes to example files.
  * Added php/css file in examples directory - pfbc-css.php - showing default styles that can be used.
  * 04/24/2010 - Added preventDefaultCSS form attribute for not including the default css that is applied.
  * 04/26/2010 - Added Custom CSS Styling example file

Version 1.0.4 - _Released 05/04/2010_
  * Added xhtml strict 1.0 compliance
  * Updated all example files and index.php to be xhtml strict 1.0 compliant
  * 05/06/2010 - Added support for sesssion\_name()

Version 1.0.5 - _Released 05/10/2010_
  * Updated jQuery to version 1.4.2
  * Updated jQuery UI to version 1.8.1
  * Updated TinyMCE to version 3.3.5.1
  * Added preview button to TinyMCE control panel.
  * Updated CKEditor to version 3.2.1
  * Replaced javascript error alerts with a more visually pleasing solution.
  * Updated qTip and Star Rating jQuery plugins to accomodate move to jQuery 1.4.2

Version 1.0.6 - _Released 05/12/2010_
  * Added datetime and time form elements

Version 1.0.7 - _Released 06/17/2010_
  * Deprecated datetime and time form elements
  * Added jQuery UI theming functionality.  A new form attribute, jqueryUITheme, can now be used to customize the colors in the various jQuery UI elements that are integrated into the project.
  * Added support for jQueryUI buttons
  * Added min/max attributes for date and daterange elements which allows the window of available dates to be limited.  Also added months attribute to date element allowing multiple months to be displayed at the same time.
  * Added openFieldset/closeFieldset functions for supporting fieldset tags.  A new example file has been added demoing the fieldset functionality.
  * Re-added support for the noBreak element attribute for rendering checkboxes/radio button horizontally on the same row as apposed to vertically on their own row.
  * errorMsg form attribute can now be set prior to the render() function for displaying and error message returned from php validation.
  * Form/element attribute can now be assigned case insensitively.
  * Updated button rendering allowing the addButton() function to be used within the flow of form elements.

Version 1.0.8 - _Released 07/19/2010_
  * Improved how values of "" and 0 are handled in checkbox, radio, checksort, and select elements
  * Updated layout example to include more demos of available form structures.
  * Pull jQuery and jQueryUI javascript files from Google's ajax api libraries
  * jqueryOptions element attribute can now be used to pass supported jQuery options to form elements that leverage jQueryUI and other plugins.
  * Added labelWidth support for slider, captcha, sort, checksort, latlng, radio, and checkbox elements
  * Improved https support.
  * Pull jQueryUI themes from Google's ajax api libraries

Version 1.0.9 - _Released 08/23/2010_
  * Updated TinyMCE to version 3.3.8
  * Updated CKEditor to version 3.3.1
  * Added jqueryUIButtons form attribute that can be used to render all buttons attached to a form with jQueryUI styling.
  * Replaced "$" with "jQuery" to prevent potential compatibility issues with other javascript libraries.
  * Many of the js/css includes are now rolled together in their appropriate js.php/css.php files.  Fewer http requests means fast page loads and will allow the form's css/structure to load more quickly.
  * Replaced qTip with Poshy Tip for the form's tooltip functionality.
  * Updated jQueryUI to version 1.8.4
  * js.php file is now loaded asynchronously which frees up the browser to apply css more quickly.
  * jQuery is leveraged for dynamically adjusting element's length based on padding and border.  Previously, border and padding were hardcoded in the default stylesheet.
  * Example files have been re-styled.

Version 1.1.0 - _Released 09/20/2010_
  * Added support for displaying multiple error messages above each appropriate form element.
  * Added two element attributes - integer and alphanumeric - for filtering a textbox's value as a user types as well as validating the input when submitted.  This functionality can be viewed in the newly added textbox validation example file.
  * Added alternate option for building and displaying your forms by utilizing two new form functions - renderHead and renderBody.  An example file titled "Synchronous Resource Loading" has been added demoing this functionality.
  * Depricated ajaxDataType form attribute.
  * Depricated ajaxType form attribute.  The form tag's method is now used.
  * Depricated ajaxUrl form attribute.  The form tag's action is now used.
  * New validation example file replaces previous javascript, php, email, and textbox example files.
  * Added renderAjaxErrorResponse function to aid php validation when submitting a form via ajax.
  * Added errorDisplayOption for replacing inline validation above each element with an option for displaying each error at the top of the form.  This attribute is automatically set to 1 when using the mapping functionality.
  * Moved the data used for the options of the addState and addCountry functions to external files making localization easier.

Version 1.1.1 - _Released 09/30/2010_
  * Added sendToGoogleSpreadsheet function for sending a form's submitted data directly to a Google Docs spreadsheet.  A new example file has been added demoing this functionality.
  * Improved support for users with javascript disabled.

Version 1.1.2 - _Released 10/10/2010_
  * Improved anti-bot/spam detection and prevention.
  * Added support for emailing a form's submitted data using PHPMailer and Google's Gmail service via the new email function.  A new example - email.php -has been added demoing this functionality.
  * Added processing image/text in the lower-left corner of the form to provide the user with visual feedback while their form is submitted.
  * Added new form attribute - jqueryNoConflict - to allow "$" alias to be used by other javascript libraries.
  * Added Date/Time, IP Address, and Url to information that is sent via Google Spreadsheets API

Version 1.1.3 - _11/17/2010_
  * Added two new form/element attributes - labelDisplayRight and labelPaddingLeft.  labelDisplayRight will render the label to the right of the its appropriate form element.  labelPaddingLeft is identical to labelPaddingRight except padding is applied to the left side of the label as apposed to the right.
  * The includesPath form attribute has been deprecated.  jsIncludesPath and phpIncludesPath can now be applied in the form's setAttributes function.  phpIncludesPath is automatically set using php's FILE constant.
  * Moved email, element, and button class to external files in the includes directory.  Previously these classes were included in class.form.php.  Depricated the option class.
  * Updated jQuery and jQueryUI to version 1.4.3 and 1.8.6 respectively.
  * Added new element attribute - float - for applying float validation to textboxes.  Plus/minus signs are now allowed for integer validation.
  * Added new form element type - expdate - for handling credit card expiration dates.
  * Updated hint function to add/remove class pfbc-hint, which can be used to differentiate a hint from an actual value.
  * The rating form element has been deprecated.
  * Radio buttons, and checkboxes are now rendered in a table to better support word wrapping.
  * CSS on the sortable elements - sort, checksort - has been adjusted to better support word wrapping.
  * Added clear links below date, daterange, and color elements allowing the textbox's value to be cleared.

Version 1.1.4 - _11/20/2010_
  * Updated jQuery to 1.4.4
  * Fix bug affecting css being applied to select boxes

Version 1.1.5 - _Unreleased_
  * Fixed bug causing reCAPTCHA's to disappear in Internet Explorer.
  * Added optional second parameter - width - to the form class constructor allowing the form's width to be set without having to use the setAttributes function.
  * Added optional parameter - clearSessionValues - to the validate function allowing developers to validate the form submission data without clearing the php session values used to auto-populate the form's elements when an error is found.
  * Added new function - setError - for applying custom errors to specific elements.
  * Fixed bug causing auto focus of a form's initial element to throw a javascript error in Internet Explorer.