﻿    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">Mesin Kasir</h4>

                </div>

            </div>
            <div class="row">
                <div class="col-md-6">
                   <!--    Context Classes  -->
                   <div class="panel panel-default">

                    <div class="panel-heading">
                        Transaksi
                    </div>
                    
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table">

                                <tbody>
                                    <tr class="success">
                                        <td>NO</td>
                                        <td>:</td>
                                        <td>0001</td>
                                    </tr>
                                    <tr class="info">
                                        <td>ID TRANSAKSI</td>
                                        <td>:</td>
                                        <td>TR001</td>
                                    </tr>
                                    <tr class="warning">
                                        <td>TGL TRANSAKSI</td>
                                        <td>:</td>
                                        <td>01-12-2015 / 22.00 WIB</td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!--  end  Context Classes  -->
            </div>

            <div class="col-md-6">
                <form role="form" style="margin-top:-2%">

                    <div class="form-group has-warning">
                     Nama Barang
                     <input type="text" class="form-control" id="label" />
                 </div>
                 <div class="form-group has-error">
                    Qty Barang
                    <input type="text" class="form-control" id="quantity" />
                </div>
                <a href="#" class="btn btn-primary">Enter</a>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
          <!--   Kitchen Sink -->
          <div class="panel panel-default">

            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID</th>
                                <th>Nama Barang</th>
                                <th>Qty</th>
                                <th>Harga</th>
                                <th>Sub Total</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>BR001</td>
                                <td>Pepsodent</td>
                                <td>1</td>
                                <td>Rp.2000</td>
                                <td>Rp.2000</td>
                                <td align="center">
                                    <button class="btn btn-primary"><i class="fa fa-edit "></i></button>
                                    <button class="btn btn-danger"><i class="fa fa-pencil"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>BR002</td>
                                <td>Ciptadent</td>
                                <td>1</td>
                                <td>Rp.2000</td>
                                <td>Rp.2000</td>
                                <td align="center">
                                    <button class="btn btn-primary"><i class="fa fa-edit "></i></button>
                                    <button class="btn btn-danger"><i class="fa fa-pencil"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>BR003</td>
                                <td>Permen Sikil</td>
                                <td>2</td>
                                <td>Rp.1000</td>
                                <td>Rp.2000</td>
                                <td align="center">
                                    <button class="btn btn-primary"><i class="fa fa-edit "></i></button>
                                    <button class="btn btn-danger"><i class="fa fa-pencil"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h4 class="page-head-line"></h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8" >
                        <h3>Jumlah</h3>
                    </div>
                    <div class="col-md-1">
                        <h3>=</h3>
                    </div>
                    <div class="col-md-3"  >
                        <h3>Rp 6.000</h3>
                    </div>
                </div>
                <br>
                <div class="row"  >
                    <div class="col-md-10" align="right">
                       <a href="#" class="btn btn-success">Simpan</a>
                   </div>
               </div>
           </div>

       </div>
       <script src="<?php echo $UI.'js/cashier.js'; ?>"></script>
       <!-- End  Kitchen Sink -->