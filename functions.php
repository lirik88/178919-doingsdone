<?php 

function renderTemplate(string $path_template, array $data_template)
{
	if (empty($path_template) || !file_exists($path_template)) {
		$html = '';
	} 
	else
	{
		ob_start();
		include($path_template);
		$html = ob_get_contents();
		ob_end_clean();
	}
	return $html;
}

 ?>