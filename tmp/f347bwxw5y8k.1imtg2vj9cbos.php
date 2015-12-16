<!DOCTYPE html>
<html>
<head>
	<title>FORM</title>

</head>
<body>
	<input type="text" placeholder="label" id="label"></input><br/>
	<input type="text" placeholder="harga" id="price"></input><br/>
	<input type="text" placeholder="kuantitas" id="quantity"></input><br/>
	<input type="text" placeholder="diskon" id="discount" ></input><br/>
	<select name="select" placeholder="type" id="type"></select>
	<input type="text" id="newType" placeholder="baru"></input>
	<button id="newTypeButton">baru</button>
	<button id="addItemButton">Tambah!</button>
	<script src=<?php echo $BASE.'/'.$UI.'js/jquery-2.1.4.js'; ?>></script>
	<script src=<?php echo $BASE.'/'.$UI.'js/itemsubmitinghandler.js'; ?>></script>
</body>
</html>