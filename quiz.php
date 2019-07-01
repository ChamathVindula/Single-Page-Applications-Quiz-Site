<?php
    /**
    *Header content
    *Title : quiz.php
    *Description : quiz page for assignment 3
    *Author : Chamath Vindula
    *Date : 21/05/2018
    */
?>
<!DOCTYPE html>

<html lang='en'>

<head>
  <meta charset="utf-8" />
  <meta name="description" content="Single page applications quiz" />
  <meta name="keywords" content="SPA,Single page applications,quiz" />
  <meta name="author" content="Chamath Vindula"  />

  <title>Single Page Applications Quiz</title>
  <link href="styles/style.css" rel="stylesheet" />
  <!--<script src="scripts/quiz.js"></script>-->
  <script src="scripts/enhancements.js"></script>
</head>
	
<body>

<?php
	require('header.inc');
?>

<h1 id='quizHeading'>quiz time!!!</h1>
<form id="form1" method="post" action="markquiz.php" novalidate="novalidate">

<!--User details-->
	<p><label for="fname">First Name</label>
	<input type="text" name="first_Name" id="fname" size="30" maxlength="25" required="required" pattern="^[A-Za-z -]+$" /></p>
	
	<p><label for="lname">Last Name</label>
	<input type="text" name="Last_Name" id="lname" size="30" maxlength="25" required="required" pattern="^[A-Za-z -]+$" /></p>
	
	<p><label for="stID">Student ID</label>
	<input type="text" name="Student_Number" id="stID" size="30" required="required" pattern="[0-9]{7}|[0-9]{10}" /></p>

<!--Text input-->
<fieldset>
	<legend>Short Anwser</legend>
	
	<p><label for="text1">What does SPA stand for?<br /></label>	
	<input type="text" id="text1" size="30" name="SPA_Definition" required="required" autocomplete="off" /></p>

	<p>Fill in the blanks<br /><br />	
	<label for="text2">SPAs ____________ alter webpage content.<br /></label>
	<input type="text" name="Fill_Blank1" id='text2' size="30" required="required" autocomplete="off" /><br /><br /></p>
	
	
	<p><label for="text3">A group of web development programs used to design interactive websites called ___________.<br/></label>
	<input type="text" name="Fill_Blank2" id="text3" size="30" required="required" autocomplete="off" /></p>
</fieldset>

<!--Radio input-->
<fieldset>
<legend>Single Choice</legend>
	<p>Which one of these is not an electronic data interchange format?<br />
	<label for="radio1">JSON</label>
	<input type="radio" id="radio1" name="Data_Interchange_Format" value="JSON" required="required" />
	
	<label for="radio2">XML</label>
	<input type="radio" id="radio2" name="Data_Interchange_Format" value="XML" />
	
	<label for="radio3">Atom</label>
	<input type="radio" id="radio3" name="Data_Interchange_Format" value="Atom" />
	
	<label for="radio4">CIF</label>
	<input type="radio" id="radio4" name="Data_Interchange_Format" value="CIF" />
	
	<label for="radio5">RDF</label>
	<input type="radio" id="radio5" name="Data_Interchange_Format" value="RDF" /></p>
</fieldset>

<!--Checkbox input-->
<fieldset>
	<legend>Multiple Choice</legend>
	<p>Which of these are open source JavaScript frameworks?<br />
	<label for="check1">Ember</label>
	<input type="checkbox" id="check1" name="JS_frameworks[]" value="Ember" />
	
	<label for="check2">Ruby</label>
	<input type="checkbox" id="check2" name="JS_frameworks[]" value="Ruby" />
	
	<label for="check3">Angular</label>
	<input type="checkbox" id="check3" name="JS_frameworks[]" value="Angular" />
	
	<label for="check4">React</label>
	<input type="checkbox" id="check4" name="JS_frameworks[]" value="React" />
	
	<label for="check5">WordPress</label>
	<input type="checkbox" id="check5" name="JS_frameworks[]" value="WordPress" /></p>

	<p>AJAX is comprised of which of these?<br />
	<label for="check6">HTML</label>
	<input type="checkbox" id="check6" name="AJAX_Units[]" value="HTML" />
	
	<label for="check7">CSS</label>
	<input type="checkbox" id="check7" name="AJAX_Units[]" value="CSS" />
	
	<label for="check8">XML</label>
	<input type="checkbox" id="check8" name="AJAX_Units[]" value="XML" />
	
	<label for="check9">XMLHttpRequest</label>
	<input type="checkbox" id="check9" name="AJAX_Units[]" value="XMLHttpRequest" />
	
	<label for="check10">JavaScript</label>
	<input type="checkbox" id="check10" name="AJAX_Units[]" value="JavaScript" /></p>
</fieldset>

<!--Select input-->
<fieldset>
	<legend>Select</legend>
	<p><label for="SelectOption">Select the correct anwser</label>
	<select id="SelectOption" name="Best_Anwser" required="required">
		<option value="" selected="selected">Please select an anwser</option>
		<option value="1">Multi Page Applications decouple data interchange layer from presentation layer</option>
		<option value="2">Single page applications require user to install specific applications beforehand</option>
		<option value="3">Multi Page Applications use local storage as cache</option>
		<option value="4">Single Page Applications download two initial web pages  in order to get started</option>
		<option value="5">Hackers can use cross-site scripting on Single page applications</option>		
	</select></p>

	<p><label for="number_question">When did Google deprecate their hash-bang AJAX crawling proposal?</label>
	<input type="number" value='2011' min="2010" max="2016" step="1" id="number_question" name="Year_google_deprecated_hashback" /></p>

</fieldset>

<fieldset id="special_fieldset">
	<input type="submit" value="submit quiz" class="btn" id="btn1" />
	<input type="reset" value="reset" class="btn" />
	<span id="demo"></span>
</fieldset><br />
</form>

<?php
    require('footer.inc');
?>

</body>

</html>
