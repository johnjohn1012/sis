<?php
include './includes/sidebar.php';
include('./includes/connection.php'); 
?>

<!-- Cashier Dashboard -->
<div class="container-fluid">
    <div class="row">
        <!-- Products -->
        <div class="col-md-3 mb-3">
            <div class="card border-left-primary shadow h-100 py-2 custom-cardboard">
                <div class="card-body">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Products</div>
                    <div class="h6 mb-0 font-weight-bold text-gray-800">
                        <?php 
                            $product_count = 125; // Sample data
                            echo "$product_count Record(s)";
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Sales -->
        <div class="col-md-3 mb-3">
            <div class="card border-left-success shadow h-100 py-2 custom-cardboard">
                <div class="card-body">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Sales</div>
                    <div class="h6 mb-0 font-weight-bold text-gray-800">
                        <?php 
                            $total_sales = 3625.00; // Sample data
                            echo "₱ " . number_format($total_sales, 2);
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
                            echo "$customer_total Record(s)";
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Orders -->
        <div class="col-md-3 mb-3">
            <div class="card border-left-warning shadow h-100 py-2 custom-cardboard">
                <div class="card-body">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Orders</div>
                    <div class="h6 mb-0 font-weight-bold text-gray-800">
                        <?php 
                            $total_orders = 19; // Sample data
                            echo "$total_orders Record(s)";
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Pending Orders -->
        <div class="col-md-3 mb-3">
            <div class="card border-left-danger shadow h-100 py-2 custom-cardboard">
                <div class="card-body">
                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Pending Orders</div>
                    <div class="h6 mb-0 font-weight-bold text-gray-800">
                        <?php 
                            $pending_orders = 5; // Sample data
                            echo "$pending_orders Record(s)";
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
                            echo "$completed_orders Record(s)";
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Stock Summary -->
        <div class="col-md-3 mb-3">
            <div class="card border-left-info shadow h-100 py-2 custom-cardboard">
                <div class="card-body">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Stock Summary</div>
                    <div class="h6 mb-0 font-weight-bold text-gray-800">
                        <?php 
                            $total_stock = 320; // Sample data
                            echo "$total_stock units";
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Product Analytics Table -->
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4 custom-cardboard">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Product Analytics (Most Selling Products by Month)</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="analyticsTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Total Sales</th>
                                    <th>Sold Quantity</th>
                                    <th>Month</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Sample product analytics data
                                $products = [
                                    ['product_name' => 'Milk Tea', 'total_sales' => 1500.00, 'sold_quantity' => 30, 'month' => 'January'],
                                    ['product_name' => 'Soft Drink', 'total_sales' => 1000.00, 'sold_quantity' => 25, 'month' => 'February'],
                                    ['product_name' => 'Pizza', 'total_sales' => 2500.00, 'sold_quantity' => 40, 'month' => 'March'],
                                    ['product_name' => 'Coffee', 'total_sales' => 1200.00, 'sold_quantity' => 15, 'month' => 'April'],
                                ];

                                foreach ($products as $product) {
                                    echo "<tr>
                                            <td>" . $product['product_name'] . "</td>
                                            <td>₱ " . number_format($product['total_sales'], 2) . "</td>
                                            <td>" . $product['sold_quantity'] . "</td>
                                            <td>" . $product['month'] . "</td>
                                          </tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<?php
include '../includes/footer.php';
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
