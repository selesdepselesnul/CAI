<div class="page-header">
	<h1>Inventory</h1>
</div>
<div class="form-group">
	<div class="form-inline">
		<label for="type">tipe</label>
		<select id="typeInput" class="form-control input-sm">
		</select>
		<input type="text" id="newTypeInputText" hidden
		placeholder="tipe baru" class="form-control"></input>
		<button id="newTypeButton" class="btn btn-default">
			<span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></button>
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
	<div id="alertSuccess" class="alert alert-success" role="alert">sukses cyyn</div>
	<br/><br/>
	<div class="form-inline">
		<label for="typeFilter">type : </label>
		<select id="typeFilter" class="form-control input-sm">
		</select>
	</div>
	<div class="table-responsive">
		<table id="itemTable" class="table table-condensed">
			<tr>
				<th>id</th>
				<th>label</th>
				<th>harga</th>
				<th>kuantitas</th>
				<th>diskon</th>
				<th>tipe</th>
			</tr>
		</table>
	</div>
