<?php
include 'templates/head.html';
?>
<h1>About Me</h1>
<div >
	<p>
	This page should contain a more descriptive description of me.
	I have always found this hard. 
	How does one describe oneself? 
	Lists are much easier.
	So here is a short list (summary) of my life so far:
	</p>
	<p>
	<ul style="list-style-type:circle;">
		<li> I was born in Lund. </li>
		<li> I grew up in Jönköping.</li>
		<li> I tried to become a doctor, didn't quite have the grades for it so I tried programming. </li>
		<li> Turns out programming is absolutely amazing. And I like games, always
			have, so I went to Skövde University to study game progamming. </li>
		<li> After that I had the choice of continuing studying or finding a job. I picked studying and went on to Linköping University to pursue a masters degree. </li>
		<li> Due to some issues I never finished my thesis and took a job instead. </li>
		<li> My first job out of university was in Lund at Axis as a system
			developer. After almost 2 years I quit that job and now I'm looking for
		a new one.</li>
	</ul>
	</p>
	<p>

</div>

<h2>Academical Merits</h2>
More specifically what I have stuidied can be found
<a href="grades.php">here</a>.

<h2>Programming Related</h2>
<p>
I'm often asked, at least on job interviews, what do I like and what do I want to
do.
I know there is some stuff I don't like
and some stuff I do like. 
The world of programming is quite vast and there are plenty of things I have not
worked with or only very little. I am however willing try new things and love
learing. 
You never know what you might enjoy.
That's how I found out programming was amazing after all. 
Here are some lists in no particular order (in fact, it's random, try reloading the page!) of stuff.
</p>

<?php
function print_ul($arr)
{
	echo "<ul comment='this was done by php'>";
	foreach($arr as $item)
		echo "<li> $item </li>";
	echo "</ul>";
}
?>

<h3>Stuff I like</h3>
<?php
$likes=['Linux', 'Machine Learning', 'Regular Expression', 'Perl', 'C/C++', 'Vim', 'Tea', 'LaTeX'];
shuffle($likes);
print_ul($likes);
?>

<h3>Stuff that sounds exciting (but may not have a lot of experience with)</h3>
<?php
$interests=['System administration','Data science / data mining / big data','Compiler construction','Space walks','Embedded programming','Devops'];
shuffle($interests);
print_ul($interests);
?>

<h3>Stuff don't like</h3>
<?php
$dislikes=['Windows','Frontend','Javascript','Java ', 'React','Coffee'];
shuffle($dislikes);
print_ul($dislikes);
?>
<p>
My CV can be found <a href="writings/CV.pdf">here</a>.
</p>
</div>
<?php include 'templates/footer.html' ?>
