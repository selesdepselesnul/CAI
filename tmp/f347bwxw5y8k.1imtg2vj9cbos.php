<div class="page-header">
	<h1>Inventory</h1>
</div>
<div class="form-group">
	<input type="text" placeholder="label" id="label" class="form-control"></input>
	<input type="number" placeholder="harga" id="price" class="form-control"></input>
	<input type="number" placeholder="kuantitas" id="quantity" class="form-control"></input>
	<input type="text" placeholder="diskon" id="discount" class="form-control" ></input>
	<select name="select" placeholder="type" id="type" class="form-control"></select>
	<input type="text" id="newType" placeholder="baru" class="form-control"></input>
	<button id="newTypeButton" class="btn btn-default">baru</button>
	<button id="addItemButton" class="btn btn-primary">Tambah!</button>
</div>
<table id="itemTable" class="table table-condensed">
	<tr>
		<th>label</th>
		<th>harga</th>
		<th>kuantitas</th>
		<th>diskon</th>
		<th>tipe</th>
	</tr>
</table>
<script src=<?php echo $BASE.'/'.$UI.'js/itemsubmitinghandler.js'; ?>></script>
