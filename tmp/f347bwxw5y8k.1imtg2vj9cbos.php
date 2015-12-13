<!DOCTYPE html>
<html>
<head>
	<title>FORM</title>
</head>
<body>
	<form action="" method="post">
		<input type="text" name="label" placeholder="label"></input><br/>
		<input type="text" name="price" placeholder="harga"></input><br/>
		<input type="text" name="quantity" placeholder="jumlah"></input><br/>
		<input type="text" name="discount" placeholder="diskon"></input><br/>
		<input type="text" name="type" placeholder="tipe"></input><br/>
		<input type="submit"></input>
	</form>
	<?php if ($isPostMode): ?>
		
			<?php if ($isSucess): ?>
				
					<div>yeah</div>
				
			<?php endif; ?>
		
	<?php endif; ?>
</body>
</html>