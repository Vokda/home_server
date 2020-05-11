<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<link href='global.css' rel='stylesheet' media='all'/>
		<script>
			function open_tab(link){
					window.open(link, '_blank');
			}
		</script>
	  </head>
	<body id=body>
	<?php
	function make_button($name, $href, $new_tab){
		if($new_tab)
		{
			$button =  htmlspecialchars(
				"<button onclick=\"open_tab('$href', $new_tab)\">$name</button>"
			);
		}
		else
		{

			$button =  htmlspecialchars(
				"<button onclick=\"location.href='$href'\">$name</button>"
			);
		}
		return $button;
	}
	?>
	<h1>/home/daniel_johansson/website</h1>
	<div>
		<img src="asdf" alt="[At some point there will be a neat profile picture here. Until then I'll leave my face your imagination.]">
		<p>
			Welcome to my website! My name is Daniel. I'm <?php echo date("Y")-1990;?> years old living in Lund in the south of Sweden. 
			I'm a programmer in search of a job, an avid Linux user and a big fan of games whether they run on a motherboard or a regular board. 
			I'm also part-owner of lsjbot where I'm available for consulting. My CV can be found <a href="writings/CV.pdf">here</a>.
		</p>
	</div>
	<h3>Menu</h3>
	<?php
		$items = array(
			make_button('About Me', 'about_me.php', false),
			make_button('lsjbot.se', 'http://lsjbot.se', true),
			make_button('My Projects', 'https://github.com/Vokda', true),
			make_button('Forum', 'forum.php', false),
			make_button('Linkedin','https://www.linkedin.com/in/daniel-johansson-883b3666/', true),
			make_button('Gallery', 'gallery.html', false),
			make_button('Writings', 'writings.php', false),
			make_button('Contact', 'contact.html', false)
		);

	echo "<ul>";
	for ($x = 0; $x < count($items); $x++)
	{
		echo '<li>';
		echo htmlspecialchars_decode($items[$x]);
		echo '</li>';
	}
	echo '</ul>';
	?>
  </p>
  </body>
</html>
