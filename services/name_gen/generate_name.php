<?php
$root = realpath($_SERVER['DOCUMENT_ROOT']);
require "$root/templates/head.html";


$fnl = $_GET['f_name_len'];
$lnl = $_GET['l_name_len'];

chdir('name_generator/');
$name = shell_exec("./generate_name.pl $fnl $lnl");
$matches = [];
preg_match('/name (.+) (.+)/', $name, $matches);

echo "<h3> Name Generated </h3>";
echo "<p>";
echo $matches[1] . ' ' . $matches[2];
echo "</p>";

?>
<div>
<button onclick='location.reload()'>Again</button>
<button onclick='history.back()'>Change settings</button>
</div>

<?php
require "$root/templates/footer.html";
?>
