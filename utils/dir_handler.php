<head>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
</head>
<link href='../global.css' rel='stylesheet' media='all'/>
<?php

	/*
	 * reads $dir and returns an array with files found 
	 * except for . and ..
	 * format: Array([0] => $path, [1] => 'dir/value')
	 */
	function get_files($dir)
	{
		$root = $_SERVER['DOCUMENT_ROOT'];
		chdir($root);
		$file_list = [];
		$entries = array_diff(scandir($dir), array('.', '..'));
		foreach($entries as $key => $value)
		{
			$entry = $dir . DIRECTORY_SEPARATOR . $value;
			if(is_dir($entry))
			{
				array_push($file_list,[$entry , 'dir']);
			}
			else
			{
				array_push($file_list, [$entry , 'file']);
			}
		} 
		return $file_list;
	}

	function print_file($file_data)
	{
		$cwd = getcwd();
		$abs_name = $file_data[0];
		$type = $file_data[1];
		$size=number_format(filesize($abs_name));

		$info = pathinfo($abs_name);

		$file_name = $info['basename'];
		$dir_name = $info['dirname'];
		$last_mod = date("F d Y H:i", filemtime($abs_name));

		$full_path = "/$dir_name/$file_name";

		//$file_icon = '&#xf15b;';
		//$dir_icon = '&#xf07b;';

		echo "<tr>";
		echo "<td>";
		if($type === 'file')
		{
			echo "<i class='far fa-file'></i>";
			echo " <a href='$full_path'>";
		}
		else // dir
		{
			$sub_dir_path = "/utils/sub_dir.php";
			echo "<i class='far fa-folder-open'></i>";
			echo " <a href='$sub_dir_path?sub_dir=$dir_name/$file_name'>";
		}

		echo "$file_name</a></td>";
		echo "<td> $size</td>";
		echo "<td>$last_mod</td>";
		echo "</tr>";
	}


?>
