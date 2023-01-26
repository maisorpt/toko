<?php
include '../../koneksi.php';

if ($_POST['id'] == 1) {
    $id = $_POST['id'];

    include 'getdata.php';

    $sql = "SELECT g.*,k.jenis, s.satuan, b.merek
    FROM gudang AS g 
    JOIN barang as b ON g.id_barang=b.id
    JOIN kategori as k ON g.id_jenis=k.id
    JOIN satuan as s ON g.id_satuan=s.id
                    ";

    $result = $conn->query($sql)->fetch_assoc();


    ?>
    <form action="data/send.php?id=<?=$id?>" enctype="multipart/form-data" method="POST">
        <div class="mb-3">
            <label for="no" class="form-label">Item Code</label>
            <input type="text" class="form-control" id="no" disabled />
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Item Name</label>
            <input type="text" class="form-control" id="nama" placeholder="Item Name" name="nama"
                />
        </div>
        <div class="mb-3">
            <label for="merek" class="form-label">Item Brand</label>
            <select class="form-select" aria-label="Default select example" name="merek" id="merek">
                <?php if ($data_barang->num_rows > 0) {
                    // output data of each row
            
                    while ($row = $data_barang->fetch_assoc()) {

                        ?>

                        <option value="<?= $row['id'] ?>" <?=($row['id'] == $result['id_barang']) ? "selected" : "" ?>>
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

                        <option value="<?= $row['id'] ?>" <?=($row['id'] == $result['id_jenis']) ? "selected" : "" ?>>
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

                        <option value="<?= $row['id'] ?>" <?=($row['id'] == $result['id_satuan']) ? "selected" : "" ?>>
                            <?= $row['satuan'] ?>
                        </option>
                    <?php }
                } ?>

            </select>
        </div>
        <div class="mb-3">
            <label for="nohp" class="form-label">Quantity</label>
            <input type="text" class="form-control" id="nohp" placeholder="jumlah Stock" name="jumlah"
                />
        </div>
        <div class="mb-3">
            <label for="nohp" class="form-label">Unit Price</label>
            <input type="text" class="form-control" id="nohp" placeholder="Harga" name="harga"
                />
        </div>
        <div class=" d-flex justify-content-center">
            <button type="submit" class="btn btn-primary mb-3 text-center mx-4">Submit</button>
            <button type="button" class="btn btn-danger mb-3 text-center" data-bs-dismiss="modal">Cancel</button>
        </div>
    </form>

    <?php
} elseif ($_POST['id'] == 2) {

    $id = $_POST['id'];

    ?>
    <form action="data/send.php?id=<?=$id?>" enctype="multipart/form-data" method="POST">
        <div class="mb-3">
            <label for="no" class="form-label">Brand ID</label>
            <input type="text" class="form-control" id="no" disabled />
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Brand Name</label>
            <input type="text" class="form-control" id="nama" placeholder="Brand Name" name="brand"
                />
        </div>

        <div class="mb-3">
            <label for="nama" class="form-label">Brand Logo</label>
            <input type="file" class="form-control" id="nama" name="image" />
        </div>

        <div class=" d-flex justify-content-center">
            <button type="submit" class="btn btn-primary mb-3 text-center mx-4">Submit</button>
            <button type="button" class="btn btn-danger mb-3 text-center" data-bs-dismiss="modal">Cancel</button>
        </div>
    </form>
<?php } elseif ($_POST['id'] == 3) {

    $id = $_POST['id'];
    
    ?>
    <form action="data/send.php?id=<?=$id?>" enctype="multipart/form-data" method="POST">
        <div class="mb-3">
            <label for="no" class="form-label">Category ID</label>
            <input type="text" class="form-control" id="no" disabled />
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Category</label>
            <input type="text" class="form-control" id="nama" placeholder="Category" name="category"/>
        </div>

        <div class=" d-flex justify-content-center">
            <button type="submit" class="btn btn-primary mb-3 text-center mx-4">Submit</button>
            <button type="button" class="btn btn-danger mb-3 text-center" data-bs-dismiss="modal">Cancel</button>
        </div>
    </form>

<?php } elseif ($_POST['id'] == 4) {

    $id = $_POST['id'];


    ?>
    <form action="data/send.php?id=<?=$id?>" enctype="multipart/form-data" method="POST">
        <div class="mb-3">
            <label for="no" class="form-label">Unit of Measure ID</label>
            <input type="text" class="form-control" id="no" disabled />
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Unit of Measure</label>
            <input type="text" class="form-control" id="nama" placeholder="Unit of Measure" name="unit"/>
        </div>

        <div class=" d-flex justify-content-center">
            <button type="submit" class="btn btn-primary mb-3 text-center mx-4">Submit</button>
            <button type="button" class="btn btn-danger mb-3 text-center" data-bs-dismiss="modal">Cancel</button>
        </div>
    </form>

<?php } ?>