<?php
include '../includes/connection.php';
include '../includes/sidebar.php';
include '../includes/connection1.php';
?>

<hr>
<div class="row">
    <div class="col-12 col-sm-6 col-md-3">
        <div class="card shadow-sm border-info">
            <div class="card-body">
                <h5 class="card-title text-info"><i class="fas fa-th-list"></i> PO Records</h5>
                <p class="card-text">
                    <?php 
                        echo $conn->query("SELECT * FROM `purchase_order_list`")->num_rows;
                    ?>
                </p>
            </div>
        </div>
    </div>
        
    <div class="col-12 col-sm-6 col-md-3">
        <div class="card shadow-sm border-warning">
            <div class="card-body">
                <h5 class="card-title text-warning"><i class="fas fa-boxes"></i> Receiving Records</h5>
                <p class="card-text">
                    <?php 
                        echo $conn->query("SELECT * FROM `receiving_list`")->num_rows;
                    ?>
                </p>
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-md-3">
        <div class="card shadow-sm border-primary">
            <div class="card-body">
                <h5 class="card-title text-primary"><i class="fas fa-exchange-alt"></i> BO Records</h5>
                <p class="card-text">
                    <?php 
                        echo $conn->query("SELECT * FROM `back_order_list`")->num_rows;
                    ?>
                </p>
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-md-3">
        <div class="card shadow-sm border-danger">
            <div class="card-body">
                <h5 class="card-title text-danger"><i class="fas fa-undo"></i> Return Records</h5>
                <p class="card-text">
                    <?php 
                        echo $conn->query("SELECT * FROM `return_list`")->num_rows;
                    ?>
                </p>
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-md-3">
        <div class="card shadow-sm border-success">
            <div class="card-body">
                <h5 class="card-title text-success"><i class="fas fa-file-invoice-dollar"></i> Sales Records</h5>
                <p class="card-text">
                    <?php 
                        echo $conn->query("SELECT * FROM `sales_list`")->num_rows;
                    ?>
                </p>
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-md-3">
        <div class="card shadow-sm border-navy">
            <div class="card-body">
                <h5 class="card-title text-primary"><i class="fas fa-truck-loading"></i> Suppliers</h5>
                <p class="card-text">
                    <?php 
                        echo $conn->query("SELECT * FROM `supplier_list` WHERE `status` = 1")->num_rows;
                    ?>
                </p>
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-md-3">
        <div class="card shadow-sm border-light">
            <div class="card-body">
                <h5 class="card-title text-muted"><i class="fas fa-th-list"></i> Items</h5>
                <p class="card-text">
                    <?php 
                        echo $conn->query("SELECT * FROM `item_list` WHERE `status` = 1")->num_rows;
                    ?>
                </p>
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-md-3">
        <div class="card shadow-sm border-teal">
            <div class="card-body">
                <h5 class="card-title text-teal"><i class="fas fa-users"></i> Users</h5>
                <p class="card-text">
                    <?php 
                        echo $conn->query("SELECT * FROM `users` WHERE id != 1")->num_rows;
                    ?>
                </p>
            </div>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>
