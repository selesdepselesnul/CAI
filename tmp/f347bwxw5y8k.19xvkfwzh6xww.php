<div class="page-header">
	<h1>Inventory</h1>

</div>
<div class="form-group">
	<div class="form-inline">
		<label for="type">tipe</label>
		<select id="typeInput" class="typeSelect form-control input-sm">
		</select>
		<input type="text" id="newType" placeholder="baru" class="form-control"></input>
		<button id="newTypeButton" class="btn btn-default">baru</button>
	</div>
	<div class="form-inline">
		<input type="text" placeholder="label" id="label" class="form-control"></input>
		<input type="number" placeholder="harga" id="price" class="form-control"></input>
		<input type="number" placeholder="kuantitas" id="quantity" class="form-control">
	</input>
	<input type="text" placeholder="diskon" id="discount" class="form-control" ></input>
</div>
<button id="addItemButton" class="btn btn-primary">
	<span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
	tambah ke inventory
</button>
<br/><br/>
<div class="form-inline">
	<select id="typeFilter" class="typeSelect form-control input-sm">
	</select>
	<input type="search" id="searchField" placeholder="cari item..." 
	class="form-control"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></input>
	<select class="form-control" id="filterCategory">
		<option value="byId">berdasarkan Id</option>
		<option value="byLabel">berdasarkan label</option>
		<option value="byQuantity">berdasarkan kuantitas</option>
		<option value="byDiscount">berdasarkan diskon</option>
		<option value="byType">berdasarkan tipe</option>
	</select>
	<select class="form-control" id="filterAction">
		<option value="delete">lakukan penghapusan</option>
		<option value="edit">lakukan pengeditan</option>
		<option value="display">tampilkan</option>
	</select>
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
