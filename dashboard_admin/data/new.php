<?php 
include '../../koneksi.php';

include 'getdata.php';

?>
<form action="data/send.php?>" enctype="multipart/form-data" method="POST" class="mx-4">
    <div class="mb-3">
        <label for="no" class="form-label">Item Code</label>
        <input type="text" class="form-control" id="no" placeholder="id"  disabled />
    </div>
    <div class="mb-3">
        <label for="nama" class="form-label">Item Name</label>
        <input type="text" class="form-control" id="nama" placeholder="namamu" name="nama"/>
    </div>
    <div class="mb-3">
    <label for="merek" class="form-label">Item Brand</label>
        <select class="form-select" aria-label="Default select example" name="merek" id="merek">
            <?php if ($data_barang->num_rows > 0) {
                // output data of each row
            
                while ($row = $data_barang->fetch_assoc()) {

                    ?>

                    <option value="<?= $row['id'] ?>">
                        <?= $row['merek'] ?>
                    </option>
                <?php }
            } ?>
    
    </select>
    </div>
    <div class="mb-3">
    <label for="jenis" class="form-label">Item Category</label>
        <select class="form-select" aria-label="Default select example" name="jenis" id="jenis">
            <?php if ($data_kategori->num_rows > 0) {
                // output data of each row
            
                while ($row = $data_kategori->fetch_assoc()) {

                    ?>

                    <option value="<?= $row['id'] ?>">
                        <?= $row['jenis'] ?>
                    </option>
                <?php }
            } ?>
    
    </select>
    </div>
    <div class="mb-3">
    <label for="satuan" class="form-label">Unit of Measure</label>
        <select class="form-select" aria-label="Default select example" name="satuan" id="satuan">
            <?php if ($data_satuan->num_rows > 0) {
                // output data of each row
            
                while ($row = $data_satuan->fetch_assoc()) {

                    ?>

                    <option value="<?= $row['id'] ?>">
                        <?= $row['satuan'] ?>
                    </option>
                <?php }
            } ?>
    
    </select>
    </div>
    <div class="mb-3">
        <label for="nohp" class="form-label">Quantity</label>
        <input type="text" class="form-control" id="jumlah" placeholder="jumlah" name="jumlah"/>
    </div>
    <div class="mb-3">
        <label for="nohp" class="form-label">Unit Price</label>
        <input type="text" class="form-control" id="harga" placeholder="harga" name="harga" />
    </div>
    <div class=" d-flex justify-content-center">
        <button type="submit" class="btn btn-primary mb-3 text-center">Submit</button>
    </div>
</form>