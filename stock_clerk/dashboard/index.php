<?php
include '../includes/connection.php';
include '../includes/sidebar.php';

?>

<hr>


<div class="container-fluid">
    <div class="row">

        <!-- Purchase Order Card -->
        <div class="col-md-3 mb-3">
            <a href="customer.php" style="text-decoration: none; color: inherit;">
                <div class="card border-left-primary shadow h-100 py-2 custom-card">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-0">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Purchase Order</div>
                                <div class="h6 mb-0 font-weight-bold text-gray-800">
                                    <?php 
                                        $result = $conn->query("SELECT * FROM `purchase_order_list`");
                                        echo $result->num_rows; 
                                    ?>
                                    PO Record(s)
                                </div>
                            </div>
                            <div class="col-auto">
                                <i href="customer.php" class="fas fa-users fa-3x" style="color: #007bff;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Receiving Records Card -->
        <div class="col-md-3 mb-3">
            <a href="receiving.php" style="text-decoration: none; color: inherit;">
                <div class="card border-left-warning shadow h-100 py-2 custom-card">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-0">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Receiving Records</div>
                                <div class="h6 mb-0 font-weight-bold text-gray-800">
                                    <?php echo $conn->query("SELECT * FROM `receiving_list`")->num_rows; ?>
                                    Record(s)
                                </div>
                            </div>
                            <div class="col-auto">
                                <i href="receiving.php" class="fas fa-boxes fa-3x" style="color: #ffc107;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- BO Records Card -->
        <div class="col-md-3 mb-3">
            <a href="back_order.php" style="text-decoration: none; color: inherit;">
                <div class="card border-left-primary shadow h-100 py-2 custom-card">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-0">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">BO Records</div>
                                <div class="h6 mb-0 font-weight-bold text-gray-800">
                                    <?php echo $conn->query("SELECT * FROM `back_order_list`")->num_rows; ?>
                                    Record(s)
                                </div>
                            </div>
                            <div class="col-auto">
                                <i href="back_order.php" class="fas fa-exchange-alt fa-3x" style="color: #007bff;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Return Records Card -->
        <div class="col-md-3 mb-3">
            <a href="return.php" style="text-decoration: none; color: inherit;">
                <div class="card border-left-danger shadow h-100 py-2 custom-card">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-0">
                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Return Records</div>
                                <div class="h6 mb-0 font-weight-bold text-gray-800">
                                    <?php echo $conn->query("SELECT * FROM `return_list`")->num_rows; ?>
                                    Record(s)
                                </div>
                            </div>
                            <div class="col-auto">
                                <i href="return.php" class="fas fa-undo fa-3x" style="color: #dc3545;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Sales Records Card -->
        <div class="col-md-3 mb-3">
            <a href="sales.php" style="text-decoration: none; color: inherit;">
                <div class="card border-left-success shadow h-100 py-2 custom-card">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-0">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Sales Records</div>
                                <div class="h6 mb-0 font-weight-bold text-gray-800">
                                    <?php echo $conn->query("SELECT * FROM `sales_list`")->num_rows; ?>
                                    Record(s)
                                </div>
                            </div>
                            <div class="col-auto">
                                <i href="sales.php" class="fas fa-file-invoice-dollar fa-3x" style="color: #28a745;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Suppliers Card -->
        <div class="col-md-3 mb-3">
            <a href="suppliers.php" style="text-decoration: none; color: inherit;">
                <div class="card border-left-primary shadow h-100 py-2 custom-card">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-0">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Suppliers</div>
                                <div class="h6 mb-0 font-weight-bold text-gray-800">
                                    <?php echo $conn->query("SELECT * FROM `supplier_list` WHERE `status` = 1")->num_rows; ?>
                                    Supplier(s)
                                </div>
                            </div>
                            <div class="col-auto">
                                <i href="suppliers.php" class="fas fa-truck-loading fa-3x" style="color: #007bff;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Items Card -->
        <div class="col-md-3 mb-3">
            <a href="items.php" style="text-decoration: none; color: inherit;">
                <div class="card border-left-light shadow h-100 py-2 custom-card">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-0">
                                <div class="text-xs font-weight-bold text-muted text-uppercase mb-1">Items</div>
                                <div class="h6 mb-0 font-weight-bold text-gray-800">
                                    <?php echo $conn->query("SELECT * FROM `item_list` WHERE `status` = 1")->num_rows; ?>
                                    Item(s)
                                </div>
                            </div>
                            <div class="col-auto">
                                <i href="items.php" class="fas fa-th-list fa-3x" style="color: #6c757d;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Users Card -->
        <div class="col-md-3 mb-3">
            <a href="users.php" style="text-decoration: none; color: inherit;">
                <div class="card border-left-teal shadow h-100 py-2 custom-card">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-0">
                                <div class="text-xs font-weight-bold text-teal text-uppercase mb-1">Users</div>
                                <div class="h6 mb-0 font-weight-bold text-gray-800">
                                    <?php echo $conn->query("SELECT * FROM `users` WHERE id != 1")->num_rows; ?>
                                    User(s)
                                </div>
                            </div>
                            <div class="col-auto">
                                <i href="users.php" class="fas fa-users fa-3x" style="color: #20c997;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>



    <div class="row mt-4">
    <div class="col-md-12">
        <div class="card shadow mb-4 ">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Business Analytics</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <canvas id="analyticsChart" style="width: 100%; height: 400px;"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
// Example of fetching sales data from your database
// Assuming you already have a query for products' total sales, average price, sold quantity, and last sale date.
$products = [
    ["name" => "Product A", "total_sales" => 1500, "avg_price" => 50, "sold_quantity" => 30, "last_sale" => "2025-02-10"],
    ["name" => "Product B", "total_sales" => 2500, "avg_price" => 100, "sold_quantity" => 25, "last_sale" => "2025-02-09"],
    ["name" => "Product C", "total_sales" => 1200, "avg_price" => 60, "sold_quantity" => 20, "last_sale" => "2025-02-08"],
    ["name" => "Product D", "total_sales" => 3000, "avg_price" => 120, "sold_quantity" => 25, "last_sale" => "2025-02-07"],
    ["name" => "Product E", "total_sales" => 1800, "avg_price" => 60, "sold_quantity" => 30, "last_sale" => "2025-02-06"]
];

$product_names = [];
$total_sales = [];
$avg_prices = [];
$sold_quantities = [];
$last_sale_dates = [];

foreach ($products as $product) {
    $product_names[] = $product["name"];
    $total_sales[] = $product["total_sales"];
    $avg_prices[] = $product["avg_price"];
    $sold_quantities[] = $product["sold_quantity"];
    $last_sale_dates[] = $product["last_sale"];
}
?>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('analyticsChart').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($product_names); ?>,
            datasets: [
                {
                    label: 'Total Sales ($)',
                    data: <?php echo json_encode($total_sales); ?>,
                    backgroundColor: 'rgba(0, 123, 255, 0.6)',
                    borderColor: 'rgba(0, 123, 255, 1)',
                    borderWidth: 1
                },
                {
                    label: 'Average Price ($)',
                    data: <?php echo json_encode($avg_prices); ?>,
                    type: 'line',
                    fill: false,
                    borderColor: 'rgba(255, 99, 132, 1)',
                    tension: 0.1
                },
                {
                    label: 'Sold Quantity',
                    data: <?php echo json_encode($sold_quantities); ?>,
                    type: 'line',
                    fill: false,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    tension: 0.1
                }
            ]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>


</div>







<?php include '../includes/footer.php'; ?>

<style>
    /* Inline CSS for custom card hover effect */
    .custom-card {
        transition: 0.3s ease-in-out;
    }

    .custom-card:hover {
        background-color: rgb(11, 102, 57) !important; /* Changes background color on hover */
        color: white !important; /* Changes text color on hover */
        box-shadow: 0px 0px 20px rgba(4, 243, 56, 0.8); /* Glowing effect */
        transform: scale(1.05); /* Slight zoom effect */
    }

    .custom-card:hover .text-primary,
    .custom-card:hover .h6,
    .custom-card:hover i {
        color: white !important;
    }
</style>
