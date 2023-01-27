<div class="rounded p-3">
    <h3 class="mb-4 mt-2 ">Warehouse Stock</h3>
    <table class="table table-bordered text-center" style="width:100%">
        <thead>
            <tr>
                <th scope="col"> No</th>
                <th scope="col"> Item Code</th>
                <th scope="col"> Item Name</th>
                <th scope="col"> Item Brand</th>
                <th scope="col"> Item Category</th>
                <th scope="col"> Unit of Measure</th>
                <th scope="col"> Unit Price</th>
                <th scope="col"> Qty</th>
                <th><button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#new">
                        New </button> </th>
            </tr>
        </thead>
        <tbody>
            <?php
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                $no = 1;
                while ($row = $result->fetch_assoc()) {

                    ?>

                    <tr>
                        <th scope="row">
                            <?= $no++ ?>
                        </th>
                        <td>
                            <?= $row["id"] ?>
                        </td>
                        <td>
                            <?= $row["item_name"] ?>
                        </td>
                        <td>
                            <?= $row["merek"] ?>
                        </td>
                        <td>
                            <?= $row["jenis"] ?>
                        </td>
                        <td>
                            <?= $row["satuan"] ?>
                        </td>
                        <td>
                            <?= $row["price"] ?>
                        </td>
                        <td>
                            <?= $row["quantity"] ?>
                        </td>
                        <td>
                            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                data-bs-id="<?= $row["id"] ?>">
                                Edit</button>
                            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete"
                                data-bs-id="<?= $row["id"] ?>">
                                Delete</button>

                        </td>
                    </tr>
                    <?php

                }


            }

            ?>
              </tbody>


</table>
<?php include_once('layout/pagination.php') ?>
</div>