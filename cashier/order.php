<?php
include 'includes/sidebar.php';
include('includes/connection.php'); 
?>

<!-- Cashier Dashboard -->
<div class="container-fluid">
    <div class="row">
        <!-- Products -->
        <div class="col-md-3 mb-3">
            <div class="card border-left-danger shadow h-100 py-2 custom-cardboard">
                <div class="card-body">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Canceled Orders</div>
                    <div class="h6 mb-0 font-weight-bold text-gray-800">
                        <?php 
                            $product_count = 3; // Sample data
                            echo "$product_count Order(s)";
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Customer Total -->
        <div class="col-md-3 mb-3">
            <div class="card border-left-info shadow h-100 py-2 custom-cardboard">
                <div class="card-body">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Customer Total</div>
                    <div class="h6 mb-0 font-weight-bold text-gray-800">
                        <?php 
                            $customer_total = 6; // Sample data
                            echo "$customer_total Customer(s)";
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Orders -->
        <div class="col-md-3 mb-3">
            <div class="card border-left-info shadow h-100 py-2 custom-cardboard">
                <div class="card-body">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Orders</div>
                    <div class="h6 mb-0 font-weight-bold text-gray-800">
                        <?php 
                            $total_orders = 19; // Sample data
                            echo "$total_orders Order(s)";
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Pending Orders -->
        <div class="col-md-3 mb-3">
            <div class="card border-left-warning shadow h-100 py-2 custom-cardboard">
                <div class="card-body">
                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Pending Orders</div>
                    <div class="h6 mb-0 font-weight-bold text-gray-800">
                        <?php 
                            $pending_orders = 5; // Sample data
                            echo "$pending_orders Order(s)";
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Completed Orders -->
        <div class="col-md-3 mb-3">
            <div class="card border-left-success shadow h-100 py-2 custom-cardboard">
                <div class="card-body">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Completed Orders</div>
                    <div class="h6 mb-0 font-weight-bold text-gray-800">
                        <?php 
                            $completed_orders = 14; // Sample data
                            echo "$completed_orders Order(s)";
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
<div>
    <h1>diri ang mga na fetched na orders ↓</h1>
</div>

<?php
include 'includes/footer.php';
?>

<style>
    .custom-cardboard {
        background-color: #fff;
        border-radius: 10px;
        border: 1px solid #e4e4e4;
        transition: box-shadow 0.3s ease-in-out;
    }

    .custom-cardboard:hover {
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
</style>
