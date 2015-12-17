<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="<?php echo $ENCODING; ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $site; ?></title>
	<base href="<?php echo $SCHEME.'://'.$HOST.':'.$PORT.$BASE.'/'; ?>" />
	<link rel="stylesheet" href="lib/code.css" type="text/css" />
	<link rel="stylesheet" href="ui/css/base.css" type="text/css" />
	<link rel="stylesheet" href="ui/css/theme.css" type="text/css" />
	<link rel="stylesheet" href="ui/bootstrap/css/bootstrap.css" type="text/css" />
	<link rel="stylesheet" href="ui/bootstrap/css/bootstrap-theme.css" type="text/css" />
	<script src="ui/js/jquery-2.1.4.js"></script>
	<script src="ui/bootstrap/js/bootstrap.js"></script>
</head>
<body>
	<div class="container-fluid">
		<?php echo $this->render($content,$this->mime,get_defined_vars()); ?>
	</div>
</body>
</html>
