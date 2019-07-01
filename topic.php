<?php
    /**
    *Header content
    *Title : topic.php
    *Description : topic page for assignment 3
    *Author : Chamath Vindula
    *Date : 21/05/2018
    */
?>
<!DOCTYPE html>

<html lang='en'>

<head>
  <meta charset="utf-8" />
  <meta name="description" content="Single page applications topic" />
  <meta name="keywords" content="SPA,Single page applications,topic" />
  <meta name="author" content="Chamath Vindula"  />
  
  <title>Single Page Applications In Depth</title>
  <link href="styles/style.css" rel="stylesheet" />
</head>
	
<body>
	<?php
    		require('header.inc');
    ?>

	<section id="clientAndServer">
		<h1>single page applications in depth</h1>
		<p>In the past web applications worked by sending requests to the web server and receiving responses and if you clicked on a link the browser sends a request to the server requesting a page and the browser gets the response, if you typed something in a search bar and press enter then again a request is sent and the web page waits for a response and every time the server sends something to the browser the page had to be refreshed or sometimes a new page has to be created in order to react to the new response. Single page applications use a different approach. When a new website is loaded on for the first time the browser downloads a small program (typically written in a JavaScript) along with the requested page. This program is similar to any other program which you might install on your computer but this happens behind the scenes from within the browser application. This is why it is called a single page application because it loads only the one time. This little program will control everything within the web application domain and if required the program will communicate with the server and get the information needed without reloading the page and dynamically altering behavior and appearance of the web application. This will save a ton of bandwidth and time. The creation of such highly interactive web programs and silent data transfer between the web application and the server is facilitated through a solution called AJAX and a common data interchange format called JSON (note:there are other data interchange formats available).</p>
	</section><br />

	<aside>
		<h2 id="special_h2">Fun history fact!</h2>
		<blockquote cite="https://en.wikipedia.org/wiki/Single-page_application#History">
		"The origins of the term single-page application are unclear, though the concept was discussed at least as early as 2003. Stuart (stunix) Morris wrote the Self-Contained website at slashdotslash.com with the same goals and functions in April 2002 and later the same year, Lucas Birdeau, Kevin Hakman, Michael Peachey and Evan Yeh described a single page application implementation in the US patent 8,136,109."<br />"Between 2009 to 2015, Google Webmaster Central proposed and then recommended an "AJAX crawling scheme" using an initial exclamation mark in fragment identifiers for stateful AJAX pages.  Special behavior must be implemented by the SPA site to allow extraction of relevant metadata by the search engine's crawler."
		</blockquote>
	</aside>

	<section class='special_section' id="ajaxAndJson">
		<h1>what is AJAX?</h1>
		<p>Stands for Asynchronous JavaScript and XML.  This is a set of nifty programs which can be used essentially to create highly interactive web applications to send and receive data from servers by dynamically altering the behaviour of the web page rather than reloading pages. This in turn eliminates the excess time that users have to wait until the servers and applications get to the same speed by decoupling the data interchange layer from the presentation layer and making server-user interaction asynchronous. Users can now perform tasks in a continuous flow. AJAX generally uses XHTML, CSS, XML, XMLHttpRequest and JavaScript as the default set of utilities. Although X in Ajax stands for XML, JSON is used more than XML nowadays because of its many advantages such as being lighter and a part of JavaScript. Both JSON and XML are used for packaging information in Ajax model.</p>
	</section><br />

	<section class='special_section'>
	<h1>javascript framework</h1>
		<p>The more interactive the web application is the more JavaScript dependent it becomes. Therefore javascript code should be clean and well structured. JavaScript frameworks were created for this exact reason.</p>
		<p>Here are some open source JavaScript frameworks used to build SPAs</p>
		<ol>
			<li>Angular</li>
			<li>React</li>
			<li>Ember</li>
			<li>Aurelia</li>
			<li>Vue.js</li>
			<li>Cycle.js</li>
			<li>Backbone</li>
		</ol>

	</section>
	
	
	<table>
			<caption>Quick comparison of SPAs and MPAs</caption>
				<tr>
					<th>Feature</th>
					<th>Single Page Applications</th>
					<th>Multi page Aplications</th>
				</tr>
				<tr>
					<td>Fast</td>
					<td>Yes</td>
					<td>No</td>
				</tr>
				<tr>
					<td>Saves Bandwidth</td>
					<td>Yes</td>
					<td>No</td>
				</tr>
				<tr>
					<td>Secure</td>
					<td>No</td>
					<td>Yes</td>
				</tr>
				<tr>
					<td>Offline capability</td>
					<td>Yes</td>
					<td>No</td>
				</tr>
				<tr>
					<td>JavaScript Dependancy</td>
					<td>Yes</td>
					<td>No</td>
				</tr>
		</table><br />

	<section>
	<h1>single page application vs multi page application <br />in depth</h1>
	<p>As mentioned earlier, Single Page Applications use one single page and depend heavily on JavaScript for web page maintenance but Multi Page Apllications use the traditional method of page reload. Eventhough SPAs have provided solutions to issues that are available with Multi Page Applications, it has brought some problems of its own along with it as well. Lets look at some Pros and Cons of the two.</p>
	</section>

	
	<section class="sub_special_section">
		<h2>Single Page Applications</h2>
		<h3>Pros</h3>
		<ul>
			<li>SPAs are more faster as most of the required resources (html, css, javascript) are loaded only once at the initial page load up and only data is transmitted back and fourth consequently.</li>
			<li>SPAS can use any local storage as a cache therefore an application can send a request and store all the received data and use it to even work 
			offline.</li>
			<li>Saves bandwidth and time by not using extra queries to request page information.</li>
		</ul>

		<h3>Cons</h3>
		<ul>
			<li>Single page applications solely depends on JavaScript, therefore it should be available and enabled on the local computer for the single page application to be able to function properly.</li>
			<li>SPAs are less secure in comparison to multipage applications because of Cross-Site Scripting where unauthorized people can inject client-side scripts into legitimate web applications and run their own commands.</li>
			<li>The initial web page is slow to download as there is heavy client frameworks (JavaScript) to be loaded onto the local browser.</li>
		</ul>
	</section><br />				

	<section class="sub_special_section">
		<h2>Multi Page Applications</h2>

		<h3>Pros</h3>
		<ul>
			<li>More secure than SPA as different scripts and pages have to be loaded in every single time by dynamically altering web page structure.</li>
			<li>Webpages can still display basic content even if JavaScript is not available.</li>
			<li>Ideal for users who require a visual map of the webpage in order to navigate through it.</li>
		</ul>

		<h3>Cons</h3>
		<ul>
			<li>Takes more time for application development as frameworks have to be created for both front end and back end.</li>
			<li>Consumes more bandwidth and time due to multiple query requests and consecutive page loads.</li>
		</ul>
	</section>

	<p id="diagram">
	<img src="images/lifecycle(MPA).png" alt="MPA Diagram" title="file size - 27KB" />
	<img src="images/lifecycle(SPA).png" alt="MPA Diagram" title="file size - 21KB" usemap="#SPA" id="imageMap" />
	<!--Website enhancement 2-->
	<map name="SPA" id="SPA">
		<area shape="rect" coords="15,40,160,280" href="topic.html#clientAndServer" alt="Client" />
		<area shape="rect" coords="377,40,534,280" href="topic.html#clientAndServer" alt="Server" />
		<area shape="rect" coords="180,160,220,180" href="topic.html#ajaxAndJson" alt="AJAX" />
		<area shape="rect" coords="225,10,320,30" href="index.html#rectangle1" alt="Life Cycle" />
		<area shape="rect" coords="260,210,290,230" href="topic.html#ajaxAndJson" alt="JSON" />
	</map>

	</p>
	
	<h3 id='special_h3'>References</h3>
	<ol>
		<li>Skólski,P 2016,'Single-page application vs. multiple-page application',1 December 2016, viewed 15 March 2017, Available at: https://neoteric.eu/single-page-application-vs-multiple-page-application</li>
		<li>Academind (2017), SPAs vs MPAs/MVC - Are Single Page Apps always better?, Jul 25, viewed 14 March 2018, Available at: https://www.youtube.com/watch?v=F_BYg2QGsC0</li>
		<li>Single-page Applications, code school, viewed 14 March 2018,Available at: https://www.codeschool.com/beginners-guide-to-web-development/single-page-applications</li>
		<li>Tony Alicea (2014), How Single Page Applications Work (with AngularJS), Dec 8, viewed 14 March 2018, Available at:https://www.youtube.com/watch?v=qvHecQOiu8g</li>
		<li>Difference between Ajax and JSON, differencebetween.info ,viewed 14 March 2018, Available at:http://www.differencebetween.info/difference-between-ajax-and-json</li>
		<li>Comparison of JavaScript frameworks, wikipedia, viewed 14 March 2018, Available at: https://en.wikipedia.org/wiki/Comparison_of_JavaScript_frameworks</li>
		<li>Single-page application, wikipedia, viewed 14 March 2018, viewed 19 May 2018 Available at: https://en.wikipedia.org/wiki/Single-page_application</li>
		<li>COS10011 week-10 lecture Relational databases PHP and MYSQL Available at: https://ilearn.swin.edu.au/bbcswebdav/pid-7110962-dt-content-rid-40496060_2/courses/2018-HS1-COS10011-228290/L10_ServerSideData_2pp%281%29.pdf</li>
	</ol>


	<?php
    		require('footer.inc');
    ?>
</body>

</html>







