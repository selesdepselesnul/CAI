
<div class="page-header">
	<h1>Inventory</h1>
</div>
<input type="text" placeholder="label" id="label" class="form-control"></input><br/>
<input type="text" placeholder="harga" id="price" class="form-control"></input><br/>
<input type="text" placeholder="kuantitas" id="quantity" class="form-control"></input><br/>
<input type="text" placeholder="diskon" id="discount" class="form-control" ></input><br/>
<select name="select" placeholder="type" id="type" class="input-group"></select>
<input type="text" id="newType" placeholder="baru" class="form-control"></input>
<button id="newTypeButton" class="btn btn-primary">baru</button>
<button id="addItemButton" class="btn btn-primary">Tambah!</button>
<table id="itemTable" class="table table-striped">
	<tr>
		<th>label</th>
		<th>harga</th>
		<th>kuantitas</th>
		<th>diskon</th>
		<th>tipe</th>
	</tr>
</table>
<script src=<?php echo $BASE.'/'.$UI.'js/jquery-2.1.4.js'; ?>></script>
<script src=<?php echo $BASE.'/'.$UI.'js/itemsubmitinghandler.js'; ?>></script>
