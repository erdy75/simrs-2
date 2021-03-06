<style rel="stylesheet">
    .header-row_sim {
        background: #4a4a4c;
        color: #fff;

    }
    .full-width{
        width: 100%;
    }
    .row_sim {
        display: table-row;
    }

    .cell_sim {
        display: table-cell;

        padding: 6px;
        text-align: center;
    }
    .rata_tengah {
        text-align: center;
    }
    .table-remove {
        color: #700;
        cursor: pointer;

    &:hover {
         color: #f00;
     }
    }

    .kolomAksi {
        width: 5%;
    }
    .kolomKodeObat {
        width: 7%;
    }
    .kolomObat {
        width: 29%;
    }
    .kolomBatch {
        width: 18%;
    }
    .kolomKadaluarsa {
        width: 10%;
    }
    .kolomHarga {
        width: 10.5%;
    }
    .kolomJumlah {
        width: 8.5%;
    }
    .kolomDiskon {
        width: 8.5%;
    }
    .kolomPPN {
        width: 10%;
    }
    .paddingForm {
        padding-top: 0.3%;
        text-align: right;
    }
    hr.style4 {
        border-top: 1px dotted #8c8b8b;
    }
</style>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <a href="<?php echo base_url('/farmasi/pengadaan'); ?>"><b> Pengadaan Barang </b></a><br>

        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                            <div class="modal-body" style="text-align: right; ">
                                <div class="item form-group">
                                    <div style="text-align: center;">
                                        <h2><i>Informasi Penerimaan</i></h2>
                                        <br>
                                    </div>

                                    <label class="col-md-5 control-label paddingForm" >Jenis Penerimaan</label>
                                    <div class="col-md-3">
                                    <select class="form-control" name="jenis_penerimaan_id" id="jenis_penerimaan_id">
                                        <option hidden value="" >Pilih jenis penerimaan</option>
                                            <?php
                                            foreach ($daftarJenisPenerimaan['data'] as $field => $values) {
                                                if ($values['jenis_penerimaan_id']!=3) {           //--------------GANTI IF ROLE = ID
                                                    echo "<option value=";
                                                    echo $values['jenis_penerimaan_id'];
                                                    echo ">";
                                                    echo $values['nama_jenis_penerimaan'];
                                                    echo "</option>";
                                                }
                                            }
                                            ?>
                                    </select>
                                    </div><br><br>

                                    <label class="col-md-5 control-label paddingForm">Terima Dari</label>
                                    <div class="col-md-3">
                                        <?php
                                        $data = array(
                                            'name' => 'terima_dari',
                                            'placeholder' => 'Misal PT Kimia Farma Tbk',
                                            'autocomplete' => 'off',
                                            'required' => 'required',
                                            'id' => 'terima_dari',
                                            'type' => 'text',
                                            'class' => 'form-control'
                                        );
                                        echo form_input($data);
                                        ?>
                                    </div><br><br>

                                    <label class="col-md-5 control-label paddingForm">Nomor Faktur</label>
                                    <div class="col-md-3">
                                        <?php
                                        $data = array(
                                            'name' => 'no_faktur',
                                            'autocomplete' => 'off',
                                            'placeholder' => 'Nomor faktur penerimaan',
                                            'required' => 'required',
                                            'id' => 'no_faktur',
                                            'type' => 'text',
                                            'class' => 'form-control'
                                        );
                                        echo form_input($data);
                                        ?>
                                    </div><br><br>

                                    <label class="col-md-5 control-label paddingForm">Tanggal Faktur</label>
                                    <div class="col-md-3">
                                        <?php
                                        $data = array(
                                            'name' => 'tanggal_faktur',
                                            'autocomplete' => 'off',
                                            'required' => 'required',
                                            'id' => 'tanggal_faktur',
                                            'type' => 'date',
                                            'class' => 'form-control'
                                        );
                                        echo form_input($data);
                                        ?>
                                    </div><br><br>

                                    <label class="col-md-5 control-label paddingForm">Keterangan</label>
                                    <div class="col-md-3">
                                        <?php
                                        $data = array(
                                            'name' => 'keterangan',
                                            'autocomplete' => 'off',
                                            'placeholder' => 'masukan keterangan bila perlu . . . ',
                                            'required' => 'required',
                                            'id' => 'keterangan',
                                            'type' => 'text',
                                            'class' => 'form-control'
                                        );
                                        echo form_input($data);
                                        ?>
                                    </div><br><br>

                                    <hr class="style4">

                                    <div style="text-align: center;">
                                        <h2><i>Informasi Barang</i></h2>
                                        <br>
                                    </div>

                                    <label class="col-md-5 control-label paddingForm" for="barang_id">Nama Barang</label>
                                    <div class="col-md-3">
                                        <?php
                                        $data = array(
                                            'name' => 'barang_id',
                                            'autocomplete' => 'off',
                                            'required' => 'required',
                                            'id' => 'barang_id',
                                            'type' => 'text',
                                            'class' => 'form-control'
                                        );
                                        echo form_input($data);
                                        ?>
                                    </div><br><br>
                                    
                                    <label class="col-md-5 control-label paddingForm">Harga Beli</label>
                                    <div class="col-md-3">
                                        <?php
                                        $data = array(
                                            'name' => 'harga_beli',
                                            'autocomplete' => 'off',
                                            'required' => 'required',
                                            'placeholder' => 'Harga beli barang dari sumber',
                                            'id' => 'harga_beli',
                                            'type' => 'number',
                                            'class' => 'form-control'
                                        );
                                        echo form_input($data);
                                        ?>
                                    </div><br><br>
                                    
                                    <label class="col-md-5 control-label paddingForm">Harga Jual</label>
                                    <div class="col-md-3">
                                        <?php
                                        $data = array(
                                            'name' => 'harga_jual',
                                            'autocomplete' => 'off',
                                            'required' => 'required',
                                            'placeholder' => 'Harga jual di rumah sakit',
                                            'id' => 'harga_jual',
                                            'type' => 'number',
                                            'class' => 'form-control'
                                        );
                                        echo form_input($data);
                                        ?>
                                    </div><br><br>

                                    <label class="col-md-5 control-label paddingForm">Nomor Batch</label>
                                    <div class="col-md-3">
                                        <?php
                                        $data = array(
                                            'name' => 'nomor_batch',
                                            'autocomplete' => 'off',
                                            'required' => 'required',
                                            'placeholder' => 'Nomor batch barang',
                                            'id' => 'nomor_batch',
                                            'type' => 'text',
                                            'class' => 'form-control'
                                        );
                                        echo form_input($data);
                                        ?>
                                    </div><br><br>

                                    <label class="col-md-5 control-label paddingForm" >Tanggal Kadaluarsa</label>
                                    <div class="col-md-3">
                                        <?php
                                        $data = array(
                                            'name' => 'tanggal_kadaluarsa',
                                            'autocomplete' => 'off',
                                            'required' => 'required',
                                            'id' => 'tanggal_kadaluarsa',
                                            'type' => 'date',
                                            'class' => 'form-control'
                                        );
                                        echo form_input($data);
                                        ?>
                                    </div><br><br>

                                    <label class="col-md-5 control-label paddingForm">Jumlah</label>
                                    <div class="col-md-3">
                                        <?php
                                        $data = array(
                                            'name' => 'jumlah',
                                            'autocomplete' => 'off',
                                            'required' => 'required',
                                            'placeholder' => 'Misal 1 box isi 20 maka isi 20 (tergantung satuan)',
                                            'id' => 'jumlah',
                                            'type' => 'number',
                                            'class' => 'form-control'
                                        );
                                        echo form_input($data);
                                        ?><i>*masukan nama barang di menu kelola bila tidak ada</i>
                                    </div><br><br>
                                </div>
                            </div>
                            <div class="col-md-5 col-sm-offset-5">
                                <button class="btn btn-default btn-md" onclick="tambahDataKeTabel('dataObat')"><i class="fa fa-plus"> Tambah item</i></button>
                            </div><br><br>
                            <form method="post" action="<?php echo base_url('/farmasi/pengadaan/tambahPengadaanStok')?>">
                            <div class="form-group" style="display: none;" id="tampilkanTabel">
                                <table style="margin-left: 10px; margin-top: 20px; text-align: center;" border="1" class="" id="dataObat"  width="99%" >
                                    <thead>
                                    <tr class="header-row_sim row_sim">
                                        <th class="cell_sim">Aksi</th>
                                        <th class="cell_sim">ID Barang</th>
                                        <th class="cell_sim">Nama Barang</th>
                                        <th class="cell_sim">Jumlah</th>
                                        <th class="cell_sim">Harga Beli</th>
                                        <th class="cell_sim">Harga Jual</th>
                                        <th class="cell_sim">Kadaluarsa</th>
                                        <th class="cell_sim">Jenis Penerimaan</th>
                                        <th class="cell_sim">Nomor Batch</th>
                                        <th class="cell_sim">Terima Dari</th>
                                        <th class="cell_sim">No Faktur</th>
                                        <th class="cell_sim">Tgl Faktur</th>
                                        <th class="cell_sim">Keterangan</th>
                                        
                                    </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>

                                </table>
                                
                            </div>
                            <br><br>
                            <div style="text-align: center;">
                            <button formnovalidate class="btn btn-danger" name="batal" value="batal" type="submit"><i class="glyphicon glyphicon-remove"> Batal</i></button>
                            <button class="btn btn-success" type="submit" name="simpan" value="simpan"><i class="fa fa-arrow-right"> Proses</i></button>
                            <input id="trTotal" name="trTotal" hidden readonly>
                            </div>
                        </form>
                    </div>
                    <?php if ($this->session->flashdata('pesan')) {?>
                        <div class="alert alert-success alert-dismissible" id="success-alert">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h4><i class="icon fa fa-info"></i> Notifikasi</h4>
                            <?php echo $this->session->flashdata('metode') ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
</div>

<script src="<?php echo base_url('assets/js/plugins/jQuery/jQuery-2.1.3.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/plugins/fastclick/fastclick.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/AdminLTE/app.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/plugins/sparkline/jquery.sparkline.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/plugins/daterangepicker/daterangepicker.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/plugins/datepicker/bootstrap-datepicker.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/plugins/iCheck/icheck.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/plugins/slimScroll/jquery.slimscroll.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/plugins/chartjs/Chart.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('tAutocomplete/tautocomplete.js'); ?>" type="text/javascript"></script>

<script>
$("#success-alert").fadeTo(3000, 500).slideUp(500, function(){
    $("#success-alert").slideUp(500);
});
</script>

<script>
    var nomor_batch = document.getElementById('nomor_batch');
    var tanggal_kadaluarsa = document.getElementById('tanggal_kadaluarsa');
    var jumlah = document.getElementById('jumlah');
    var tabelPengeluaran = document.getElementById('tabelPengeluaran');
    var kolom_barang_id = document.getElementById('barang_id');

    var jenis_penerimaan_id = document.getElementById('jenis_penerimaan_id');
    var terima_dari = document.getElementById('terima_dari');
    var no_faktur = document.getElementById('no_faktur');
    var tanggal_faktur = document.getElementById('tanggal_faktur');
    var keterangan = document.getElementById('keterangan');
    var harga_beli = document.getElementById('harga_beli');
    var harga_jual = document.getElementById('harga_jual');

    var trTot = document.getElementById("trTotal");

    var grup_barang_temp;
    var nama_barang_temp;
    var barang_id_temp;

    function clearFields(){
        harga_beli.value = "";
        harga_jual.value = "";
        tanggal_kadaluarsa.value = "";
        nomor_batch.value = "";
        jumlah.value = "";
    }

    var tr = 1;
    var td = 1;
    function tambahDataKeTabel(idTabel) {
        if(jumlah.value == ""){ alert("Kolom jumlah tidak boleh kosong!"); }
        if(kolom_barang_id.value == ""){ alert("Nama barang tidak boleh kosong!"); }
        if(jenis_penerimaan_id.value == ""){ alert("Jenis penerimaan tidak boleh kosong!"); }

        if(jumlah.value && kolom_barang_id.value && jenis_penerimaan_id.value){
        tampilkanTabel.style.display = "block";
        var table = document.getElementById(idTabel);
        var row = table.insertRow(1);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        var cell4 = row.insertCell(3);
        var cell5 = row.insertCell(4);
        var cell6 = row.insertCell(5);
        var cell7 = row.insertCell(6);
        var cell8 = row.insertCell(7);
        var cell9 = row.insertCell(8);
        var cell10 = row.insertCell(9);
        var cell11 = row.insertCell(10);
        var cell12 = row.insertCell(11);
        var cell13 = row.insertCell(12);
        
        cell1.innerHTML = "<span class=\"table-remove glyphicon glyphicon-remove\" onclick=\"hapusBaris(this)\"></span>";
        cell2.innerHTML = "<input hidden name=\"tabel_barang_id[]\" value=\"" + barang_id_temp + "\" class=\"full-width rata_tengah\" readonly>"+ barang_id_temp;
        td++;
        cell3.innerHTML = "<input hidden value=\"" + nama_barang_temp + "\" class=\"full-width rata_tengah\" readonly>"+ nama_barang_temp;
        td++;
        cell4.innerHTML = "<input hidden name=\"tabel_jumlah[]\" value=\"" + jumlah.value + "\" class=\"full-width\" readonly>"+ jumlah.value;
        td++;
        cell5.innerHTML = "<input hidden name=\"tabel_harga_beli[]\" value=\"" + harga_beli.value + "\" class=\"full-width\" readonly>"+ harga_beli.value;
        td++;
        cell6.innerHTML = "<input hidden name=\"tabel_harga_jual[]\" value=\"" + harga_jual.value + "\" class=\"full-width\" readonly>"+ harga_jual.value;
        td++;
        cell7.innerHTML = "<input hidden name=\"tabel_tanggal_kadaluarsa[]\" value=\"" + tanggal_kadaluarsa.value + "\" class=\"full-width\" readonly>"+ tanggal_kadaluarsa.value;
        td++;
        cell8.innerHTML = "<input hidden name=\"tabel_jenis_penerimaan_id[]\" value=\"" + jenis_penerimaan_id.value + "\" class=\"full-width\" readonly>"+ jenis_penerimaan_id.value;
        td++;
        cell9.innerHTML = "<input hidden name=\"tabel_nomor_batch[]\" value=\"" + nomor_batch.value + "\" class=\"full-width\" readonly>"+ nomor_batch.value;
        cell10.innerHTML = "<input hidden name=\"tabel_terima_dari[]\" value=\"" + terima_dari.value + "\" class=\"full-width\" readonly>"+ terima_dari.value;
        td++;
        cell11.innerHTML = "<input hidden name=\"tabel_no_faktur[]\" value=\"" + no_faktur.value + "\" class=\"full-width\" readonly>"+ no_faktur.value;
        td++;
        cell12.innerHTML = "<input hidden name=\"tabel_tanggal_faktur[]\" value=\"" + tanggal_faktur.value + "\" class=\"full-width\" readonly>"+ tanggal_faktur.value;
        td++;
        cell13.innerHTML = "<input hidden name=\"tabel_keterangan[]\" value=\"" + keterangan.value + "\" class=\"full-width\" readonly>"+ keterangan.value ;
            
        trTot.value = tr;
        tr++;
        td = 1;
        clearFields();
        }
    }

    function hapusBaris(r) {
        var i = r.parentNode.parentNode.rowIndex;
        document.getElementById("dataObat").deleteRow(i);
    }
</script>

<?php
    $arrayDaftarBarang=[];
    $arrayDaftarJenisPenerimaan=[];

    foreach ($daftarBarang['data'] as $field => $values) {
        $arrayDaftarBarang[]=$values;
    }
?>
<script>
    $(document).ready(function() {
        var daftarObat = <?php echo json_encode($arrayDaftarBarang);?>;

        var daftarSearchData = $("#barang_id").tautocomplete({
            hide: [true,true],
            placeholder: "Ketik kata kunci. . .",
            norecord: "data tidak ditemukan",
            highlight: "",
            columns: ['id Barang', 'Nama', 'Stok', 'Grup', 'satuan','harga'],
            data: function () {
                try {
                    var data = daftarObat;
                }
                catch (e) {
                    alert(e)
                }
                var filterData = [];
                var searchData = eval("/" + daftarSearchData.searchdata() + "/gi");

                $.each(data, function (i, v) {
                    if ((v.barang_id.search(new RegExp(searchData)) != -1) 
                    || (v.nama_barang.search(new RegExp(searchData)) != -1)
                    || (v.jumlah_stok.search(new RegExp(searchData)) != -1)   
                    || (v.grup_barang.search(new RegExp(searchData)) != -1)  
                    || (v.satuan.search(new RegExp(searchData)) != -1)) {
                        filterData.push(v);
                    }
                });
                return filterData;

            },
            onchange: function () {
                stok = daftarSearchData.all()['Stok'];
                if(stok<0){
                    alert("Stok tidak tersedia");
                }else{
                    barang_id_temp = daftarSearchData.all()['id Barang'];
                    nama_barang_temp = daftarSearchData.all()['Nama'];
                    grup_barang_temp = daftarSearchData.all()['Grup'];
                }
            }
        });
    });
</script>

</body>
</html>



