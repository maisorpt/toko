<?php
 include '../../koneksi.php';
if(isset($_POST['id']))
{
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
    <form action="data/update.php?no=<?= $result['id'] ?>" enctype="multipart/form-data" method="POST">
        <div class="mb-3">
            <label for="no" class="form-label">Item Code</label>
            <input type="text" class="form-control" id="no" value="<?= $result['id']?>" disabled />
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Item Name</label>
            <input type="text" class="form-control" id="nama" placeholder="Item Name" name="nama" value="<?= $result['item_name']?>" />
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
            <input type="text" class="form-control" id="nohp" placeholder="jumlah Stock" name="jumlah" value="<?= $result['quantity']?>" />
        </div>
        <div class="mb-3">
            <label for="nohp" class="form-label">Unit Price</label>
            <input type="text" class="form-control" id="nohp" placeholder="Harga" name="harga" value="<?= $result['price']?>" />
        </div>
        <div class=" d-flex justify-content-center">
            <button type="submit" class="btn btn-success mb-3 text-center mx-4">Update</button>
            <button type="button" class="btn btn-danger mb-3 text-center" data-bs-dismiss="modal">Cancel</button>
        </div>
    </form>

  <?php
} elseif (isset($_POST['stuff_id'])) {

    $id = $_POST['stuff_id'];
    $sql = "SELECT * FROM barang where id = '$id'";
    $result = $conn->query($sql)->fetch_assoc();




    ?>
    <form action="data/update.php?stuff_id=<?= $result['id'] ?>" enctype="multipart/form-data" method="POST">
    <div class="mb-3">
        <label for="no" class="form-label">Brand ID</label>
        <input type="text" class="form-control" id="no"  value="<?= $result['id'] ?>" disabled />
    </div>
    <div class="mb-3">
        <label for="nama" class="form-label">Brand Name</label>
        <input type="text" class="form-control" id="nama" placeholder="Brand Name" name="brand" value="<?= $result['merek'] ?>" />
    </div>

    <div class="mb-3">
        <label for="nama" class="form-label">Brand Logo</label>
        <input type="file" class="form-control" id="nama"  name="image" value="<?= $result['brand_image'] ?>" />
    </div>

    <div class=" d-flex justify-content-center">
        <button type="submit" class="btn btn-success mb-3 text-center mx-4">Update</button>
        <button type="button" class="btn btn-danger mb-3 text-center" data-bs-dismiss="modal">Cancel</button>
    </div>
</form>
<?php }elseif (isset($_POST['category_id'])) {

$id = $_POST['category_id'];
$sql = "SELECT * FROM kategori where id = '$id'";
$result = $conn->query($sql)->fetch_assoc();



?>
    <form action="data/update.php?category_id=<?= $result['id'] ?>" enctype="multipart/form-data" method="POST">
    <div class="mb-3">
        <label for="no" class="form-label">Category ID</label>
        <input type="text" class="form-control" id="no"  value="<?= $result['id'] ?>" disabled />
    </div>
    <div class="mb-3">
        <label for="nama" class="form-label">Category</label>
        <input type="text" class="form-control" id="nama" placeholder="Category" name="category" value="<?= $result['jenis'] ?>" />
    </div>

    <div class=" d-flex justify-content-center">
        <button type="submit" class="btn btn-success mb-3 text-center mx-4">Update</button>
        <button type="button" class="btn btn-danger mb-3 text-center" data-bs-dismiss="modal">Cancel</button>
    </div>
</form>

<?php }elseif (isset($_POST['unit_id'])) {

$id = $_POST['unit_id'];
$sql = "SELECT * FROM satuan where id = '$id'";
$result = $conn->query($sql)->fetch_assoc();



?>
    <form action="data/update.php?unit_measure_id=<?= $result['id'] ?>" enctype="multipart/form-data" method="POST">
    <div class="mb-3">
        <label for="no" class="form-label">Unit of Measure ID</label>
        <input type="text" class="form-control" id="no"  value="<?= $result['id'] ?>" disabled />
    </div>
    <div class="mb-3">
        <label for="nama" class="form-label">Unit of Measure</label>
        <input type="text" class="form-control" id="nama" placeholder="Unit of Measure" name="unit" value="<?= $result['satuan'] ?>" />
    </div>

    <div class=" d-flex justify-content-center">
        <button type="submit" class="btn btn-success mb-3 text-center mx-4">Update</button>
        <button type="button" class="btn btn-danger mb-3 text-center" data-bs-dismiss="modal">Cancel</button>
    </div>
</form>

<?php }?>