<script>
function open_tab(link){
	window.open(link, '_blank');
}
</script>
<style>
.button_grid
{
	display: grid;
}
</style>
<?php

/* creates a button with $name that links to $href.
 * opens a new tab if $new_tab
 */
function make_button($name, $href, $new_tab)
{
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

function make_button_list($button_array)
{
	echo "<ul>";
	for ($x = 0; $x < count($button_array); $x++)
	{
		echo '<li>';
		echo htmlspecialchars_decode($button_array[$x]);
		echo '</li>';
	}
	echo '</ul>';

}

function make_button_grid($button_array, $max=1)
{
	$size = count($button_array);
	$width = 100/min($size,$max);
	$w_arr = array_fill(0, min($size,$max), "$width%");
	$n_cols = 'grid-template-columns:' . join(' ', $w_arr);
	echo "<div class='button_grid' style='$n_cols'>";
	for ($x = 0; $x < count($button_array); $x++)
	{
		echo htmlspecialchars_decode($button_array[$x]);
	}
	echo '</div>';
}

?>
