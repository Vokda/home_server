<?php
$root = realpath($_SERVER['DOCUMENT_ROOT']);
require "$root/templates/head.html";


$fnl = $_GET['f_name_len'];
$lnl = $_GET['l_name_len'];
$n_n = $_GET['n_names'];

chdir('name_generator/');

echo "<h3> Name(s) Generated </h3>";

for($i = 0; $i < $n_n; $i++)
{
	if($n_n > 32)
	{
		echo "Nice try.";
		break;
	}
	$name = shell_exec("./generate_name.pl $fnl $lnl");
	$matches = [];
	preg_match('/name (.+) (.+)/', $name, $matches);

	echo "<p>";
	echo $matches[1] . ' ' . $matches[2];
	echo "</p>";
}

?>
<div>
<button onclick='location.reload()'>Generate name(s) again</button>
<button onclick='history.back()'>Change settings</button>
</div>

<?php
require "$root/templates/footer.html";
?>
