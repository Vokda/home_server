<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<link href='global.css' rel='stylesheet' media='all'/>
	  </head>
	<body id=body>
	<?php
	require 'utils/buttoner.php';
	?>
	<h1>/home/daniel_johansson/website</h1>
	<div>
		<img src="asdf" alt="[At some point there will be a neat profile picture here. Until then I'll leave my face your imagination.]">
		<p>
			Welcome to my website! My name is Daniel. I'm <?php echo date("Y")-1990;?> years old living in Lund in the south of Sweden. 
			I'm a programmer an avid Linux user and a big fan of games whether they run on a motherboard or a regular board. 
			I'm also part-owner of lsjbot where I'm available for consulting. Currently on assignment. My CV can be found <a href="writings/CV.pdf">here</a>.
		</p>
	</div>
	<h3>Menu</h3>
	<?php
		$buttons = array(
			make_button('About Me', 'about_me.php', false),
			make_button('Academical Merits', 'grades.php', false),
			make_button('CV', 'writings/CV.pdf', false),
			make_button('My Projects', 'projects/top.php', false),
			make_button('Github', 'https://github.com/Vokda', true),
			make_button('lsjbot.se', 'http://lsjbot.se', true),

			make_button('Linkedin','https://www.linkedin.com/in/daniel-johansson-883b3666/', true),
			make_button('Services', 'services/top.php', false),
			make_button('Forum', 'forum/forum.php', false),

			make_button('Software Related', 'software/top.php', false),
			make_button('Gallery', 'gallery/gallery.php', false),
			make_button('Writings', 'writings.php', false),

			make_button('Games', 'games/top.php', false),
			make_button('Books', 'books/top.php', false),
			make_button('Contact', 'contact.php', false)
		);

		//make_button_list($buttons);
		make_button_grid($buttons, 3);
	?>
  </p>
<?php
		include 'templates/footer.html';
?>
  </body>
</html>
