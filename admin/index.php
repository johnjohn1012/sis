<?php
include '../includes/connection.php';
include '../includes/sidebar.php';
?><?php 

                $query = 'SELECT ID, t.TYPE
                          FROM users u
                          JOIN type t ON t.TYPE_ID=u.TYPE_ID WHERE ID = '.$_SESSION['MEMBER_ID'].'';
                $result = mysqli_query($conn, $query) or die (mysqli_error($conn));
      
                while ($row = mysqli_fetch_assoc($result)) {
                          $Aa = $row['TYPE'];
                   
if ($Aa=='User'){
           
             ?>    <script type="text/javascript">
                      //then it will be redirected
                      alert("Restricted Page! You will be redirected to POS");
                      window.location = "pos.php";
                  </script>
             <?php   }
                         
           
}   







            ?>

            <style>
                .custom-card {
                    transition: 0.3s ease-in-out;
                }

                .custom-card:hover {
                    background-color:rgb(11, 102, 57) !important; /* Changes background color on hover */
                    color: white !important; /* Changes text color on hover */
                    box-shadow: 0px 0px 20px rgba(4, 243, 56, 0.8); /* Glowing effect */
                    transform: scale(1.05); /* Slight zoom effect */
                }

                /* Ensures inner text remains white on hover */
                .custom-card:hover .text-primary {
                    color: white !important;
                }

                .custom-card:hover .h6 {
                    color: white !important;
                }

                .custom-card:hover i {
                    color: white !important;
                }

            </style>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<div class="container-fluid">
    <div class="row">
        <!-- Customer record -->
                <div class="col-md-3 mb-3">
                    <a href="customer.php" style="text-decoration: none; color: inherit;">
                        <div class="card border-left-primary shadow h-100 py-2 custom-card">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-0">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Customers</div>
                                        <div class="h6 mb-0 font-weight-bold text-gray-800">
                                            <?php 
                                            $query = "SELECT COUNT(*) FROM customer";
                                            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                                            while ($row = mysqli_fetch_array($result)) {
                                                echo "$row[0]";
                                            }
                                            ?> Record(s)
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i  href="customer.php" class="fas fa-users fa-3x" style="color: #007bff;"></i> <!-- Colorful and larger icon -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
        
        <!-- Supplier record -->
            <div class="col-md-3 mb-3">
            <a href="supplier.php" style="text-decoration: none; color: inherit;">
                <div class="card border-left-warning shadow h-100 py-2 custom-card">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-0">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Supplier</div>
                                <div class="h6 mb-0 font-weight-bold text-gray-800">
                                    <?php 
                                    $query = "SELECT COUNT(*) FROM supplier";
                                    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                                    while ($row = mysqli_fetch_array($result)) {
                                        echo "$row[0]";
                                    }
                                    ?> Record(s)
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-truck fa-3x" style="color: #f39c12;"></i> <!-- Modern icon with color -->
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            </div>

        <!-- Employee record -->
        <div class="col-md-3 mb-3">
        <a href="employee.php" style="text-decoration: none; color: inherit; ">
            <div class="card border-left-success shadow h-100 py-2 custom-card">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-0">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Employees</div>
                            <div class="h6 mb-0 font-weight-bold text-gray-800">
                                <?php 
                                $query = "SELECT COUNT(*) FROM employee";
                                $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                                while ($row = mysqli_fetch_array($result)) {
                                    echo "$row[0]";
                                }
                                ?> Record(s)
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-tie fa-3x" style="color: #28a745;"></i> <!-- Colorful icon for employees -->
                        </div>
                    </div>
                </div>
            </div>
        </a>
        </div>

        <!-- Registered Account record -->
        <div class="col-md-3 mb-3">
            <a href="user.php" style="text-decoration: none; color: inherit; ">
            <div class="card border-left-danger shadow h-100 py-2 custom-card">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-0">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Registered Account</div>
                            <div class="h6 mb-0 font-weight-bold text-gray-800">
                                <?php 
                                $query = "SELECT COUNT(*) FROM users WHERE TYPE_ID=2";
                                $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                                while ($row = mysqli_fetch_array($result)) {
                                    echo "$row[0]";
                                }
                                ?> Record(s)
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-id-card fa-3x" style="color: #e74a3b;"></i> <!-- Red color for ID card -->
                        </div>
                    </div>
                </div>
            </div>
            </a>
        </div>
    </div>

    <div class="row">
        <!-- Product record -->
        <div class="col-md-3 mb-3">
        <a href="product.php" style="text-decoration: none; color: inherit; custom-card">
            <div class="card border-left-info shadow h-100 py-2 custom-card">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-0">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Products</div>
                            <div class="h6 mb-0 font-weight-bold text-gray-800">
                                <?php 
                                $query = "SELECT COUNT(*) FROM product";
                                $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                                while ($row = mysqli_fetch_array($result)) {
                                    echo "$row[0]";
                                }
                                ?> Record(s)
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-box fa-3x" style="color: #17a2b8;"></i> <!-- Blue icon for products -->
                        </div>
                    </div>
                </div>
            </div>
        </a>
        </div>

        <!-- Transaction record -->
        <div class="col-md-3 mb-3">
        <a href="transaction.php" style="text-decoration: none; color: inherit; custom-card">
            <div class="card border-left-info shadow h-100 py-2 custom-card">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-0">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Transaction</div>
                            <div class="h6 mb-0 font-weight-bold text-gray-800">
                                <?php 
                                $query = "SELECT COUNT(*) FROM transaction";
                                $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                                while ($row = mysqli_fetch_array($result)) {
                                    echo "$row[0]";
                                }
                                ?> Record(s)
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-exchange-alt fa-3x" style="color: #ffc107;"></i> <!-- Yellow icon for transactions -->
                        </div>
                    </div>
                </div>
            </div>
        </a>
        </div>

        <!-- Orders record -->
        <div class="col-md-3 mb-3">
        <a href="transaction.php" style="text-decoration: none; color: inherit; custom-card">
            <div class="card border-left-info shadow h-100 py-2 custom-card">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-0">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Orders</div>
                            <div class="h6 mb-0 font-weight-bold text-gray-800">
                            <?php 
                                $query = "SELECT COUNT(*) FROM transaction";
                                $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                                while ($row = mysqli_fetch_array($result)) {
                                    echo "$row[0]";
                                }
                                ?> Record(s)
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-shopping-cart fa-3x" style="color: #6c757d;"></i> <!-- Icon for orders -->
                        </div>
                    </div>
                </div>
            </div>
        </a>
        </div>

        <!-- Total Sales record -->
        <div class="col-md-3 mb-3">
            <div class="card border-left-info shadow h-100 py-2 custom-card">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-0">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Sales</div>
                            <div class="h6 mb-0 font-weight-bold text-gray-800">
                                <?php 
                                    // Query to sum the GRANDTOTAL from the transaction table
                                    $query = "SELECT SUM(GRANDTOTAL) AS total_sales FROM transaction";
                                    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                                    $row = mysqli_fetch_assoc($result);
                                    
                                    // Display the total sales, formatted as currency
                                    echo "₱ " . number_format($row['total_sales'], 2);
                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-money-bill fa-3x" style="color:rgb(137, 77, 216);"></i> <!-- Green icon for total sales -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
 
                                  <!-- Purchase Order -->
        <div class="col-md-3 mb-3">
            <a href="purchase_order.php" style="text-decoration: none; color: inherit;">
                <div class="card border-left-primary shadow h-100 py-2 custom-card">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-0">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Purchase Order</div>
                                <div class="h6 mb-0 font-weight-bold text-gray-800">
                                    2 PO Record(s) <!-- Example data -->
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-box-open fa-3x" style="color: #007bff;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Receiving -->
        <div class="col-md-3 mb-3">
            <a href="receiving.php" style="text-decoration: none; color: inherit;">
                <div class="card border-left-warning shadow h-100 py-2 custom-card">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-0">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Receiving</div>
                                <div class="h6 mb-0 font-weight-bold text-gray-800">
                                    6 Record(s) <!-- Example data -->
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-truck-loading fa-3x" style="color: #f39c12;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Back Order -->
        <div class="col-md-3 mb-3">
            <a href="back_order.php" style="text-decoration: none; color: inherit;">
                <div class="card border-left-info shadow h-100 py-2 custom-card">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-0">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Back Order</div>
                                <div class="h6 mb-0 font-weight-bold text-gray-800">
                                    4 Record(s) <!-- Example data -->
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-arrow-left fa-3x" style="color: #17a2b8;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Return List -->
        <div class="col-md-3 mb-3">
            <a href="return_list.php" style="text-decoration: none; color: inherit;">
                <div class="card border-left-danger shadow h-100 py-2 custom-card">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-0">
                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Return List</div>
                                <div class="h6 mb-0 font-weight-bold text-gray-800">
                                    1 Record(s) <!-- Example data -->
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-undo fa-3x" style="color: #e74a3b;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <div class="row">
        <!-- Sale List -->
        <div class="col-md-3 mb-3">
            <a href="cancelled_orders.php" style="text-decoration: none; color: inherit;">
                <div class="card border-left-danger shadow h-100 py-2 custom-card">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-0">
                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Order Cancelled</div>
                                <div class="h6 mb-0 font-weight-bold text-gray-800">
                                    3 Record(s) <!-- Example data, replace with dynamic PHP data -->
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-times-circle fa-3x" style="color: #e74a3b;"></i> <!-- Red icon for cancelled orders -->
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Supplier List -->
        <div class="col-md-3 mb-3">
            <a href="supplier_list.php" style="text-decoration: none; color: inherit;">
                <div class="card border-left-info shadow h-100 py-2 custom-card">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-0">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Supplier List</div>
                                <div class="h6 mb-0 font-weight-bold text-gray-800">
                                    2 Supplier(s) <!-- Example data -->
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-truck fa-3x" style="color: #17a2b8;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Item List -->
        <div class="col-md-3 mb-3">
            <a href="item_list.php" style="text-decoration: none; color: inherit;">
                <div class="card border-left-warning shadow h-100 py-2 custom-card">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-0">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Item List</div>
                                <div class="h6 mb-0 font-weight-bold text-gray-800">
                                    4 Item(s) <!-- Example data -->
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-cogs fa-3x" style="color: #f39c12;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>


                                   <!-- Stock Summary -->
        <div class="col-md-3 mb-3">
            <div class="card border-left-info shadow h-100 py-2 custom-card">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-0">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Stock Summary</div>
                            <div class="h6 mb-0 font-weight-bold text-gray-800">
                                320 units <!-- Static Example Data -->
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-cogs fa-3x" style="color: #17a2b8;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <!-- Customer Total -->
        <div class="col-md-3 mb-3">
            <div class="card border-left-info shadow h-100 py-2 custom-card">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-0">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Customer Total</div>
                            <div class="h6 mb-0 font-weight-bold text-gray-800">
                                6 Record(s) <!-- Static Example Data -->
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-3x" style="color: #17a2b8;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Orders -->
        <div class="col-md-3 mb-3">
            <div class="card border-left-warning shadow h-100 py-2 custom-card">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-0">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Orders</div>
                            <div class="h6 mb-0 font-weight-bold text-gray-800">
                                19 Record(s) <!-- Static Example Data -->
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-shopping-cart fa-3x" style="color: #f39c12;"></i>
                        </div>
                    </div>
                </div>
            </div>
            </div>

            <!-- Pending Orders -->
            <div class="col-md-3 mb-3">
                <div class="card border-left-danger shadow h-100 py-2 custom-card">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-0">
                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Pending Orders</div>
                                <div class="h6 mb-0 font-weight-bold text-gray-800">
                                    5 Record(s) <!-- Static Example Data -->
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-hourglass-half fa-3x" style="color: #e74a3b;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


                  <!-- Completed Orders -->
        <div class="col-md-3 mb-3">
            <div class="card border-left-success shadow h-100 py-2 custom-card">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-0">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Completed Orders</div>
                            <div class="h6 mb-0 font-weight-bold text-gray-800">
                                14 Record(s) <!-- Static Example Data -->
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-check-circle fa-3x" style="color: #28a745;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
    <!-- Bar Chart for Sales vs Orders -->
    <div class="col-md-6 mb-4">
        <div class="card shadow mb-4 custom-cardboard">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Sales vs Orders (Bar Chart)</h6>
            </div>
            <div class="card-body">
                <canvas id="salesOrdersChart"></canvas>
                <script>
                    var ctx = document.getElementById('salesOrdersChart').getContext('2d');
                    var salesOrdersChart = new Chart(ctx, {
                        type: 'bar', // Bar chart type
                        data: {
                            labels: ['Total Sales', 'Orders', 'Pending Orders', 'Completed Orders'], // Categories
                            datasets: [{
                                label: 'Data',
                                data: [3625, 19, 5, 14], // Example data: Sales, Orders, Pending Orders, Completed Orders
                                backgroundColor: ['#007bff', '#ffc107', '#dc3545', '#28a745'], // Color for each bar
                                borderColor: ['#0056b3', '#e0a800', '#c82333', '#218838'], // Border color for each bar
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                </script>
            </div>
        </div>
    </div>

                    
            <!-- Line Chart for Total Sales Over Time -->
            <div class="col-md-6 mb-3">
                <div class="card shadow mb-3 custom-cardboard">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Sales Trend Over Time (Line Chart)</h6>
                    </div>
                    <div class="card-body">
                        <canvas id="salesTrendChart"></canvas>
                        <script>
                            var ctx = document.getElementById('salesTrendChart').getContext('2d');
                            var salesTrendChart = new Chart(ctx, {
                                type: 'line', // Line chart type
                                data: {
                                    labels: ['January', 'February', 'March', 'April'], // Time period (e.g., months)
                                    datasets: [{
                                        label: 'Total Sales (₱)',
                                        data: [1500, 1200, 2500, 1800], // Example sales data
                                        fill: false,
                                        borderColor: '#007bff', // Line color
                                        tension: 0.1,
                                        borderWidth: 2
                                    }]
                                },
                                options: {
                                    responsive: true,
                                    scales: {
                                        x: {
                                            title: {
                                                display: true,
                                                text: 'Months'
                                            }
                                        },
                                        y: {
                                            title: {
                                                display: true,
                                                text: 'Total Sales (₱)'
                                            },
                                            beginAtZero: true
                                        }
                                    }
                                }
                            });
                        </script>
                    </div>
                </div>
            </div>


</div>



        <div class="row">
            <!-- Doughnut Chart for Product Categories (e.g., Products, Suppliers) -->
            <div class="col-md-6 mb-3">
                <div class="card shadow mb-3 custom-cardboard">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Product Categories (Doughnut Chart)</h6>
                    </div>
                    <div class="card-body">
                        <canvas id="productCategoriesChart"></canvas>
                        <script>
                            var ctx = document.getElementById('productCategoriesChart').getContext('2d');
                            var productCategoriesChart = new Chart(ctx, {
                                type: 'doughnut', // Doughnut chart type
                                data: {
                                    labels: ['Products', 'Suppliers'], // Labels
                                    datasets: [{
                                        label: 'Product Categories',
                                        data: [125, 5], // Example data: Products vs Suppliers
                                        backgroundColor: ['#17a2b8', '#f39c12'], // Color for each segment
                                        borderWidth: 1
                                    }]
                                },
                                options: {
                                    responsive: true
                                }
                            });
                        </script>
                    </div>
                </div>
            </div>


                <!-- Pie Chart for Order Status (Pending vs Completed) -->
                <div class="col-md-6 mb-4">
                    <div class="card shadow mb-4 custom-cardboard">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Order Status (Pie Chart)</h6>
                        </div>
                        <div class="card-body">
                            <canvas id="orderStatusChart"></canvas>
                            <script>
                                var ctx = document.getElementById('orderStatusChart').getContext('2d');
                                var orderStatusChart = new Chart(ctx, {
                                    type: 'pie', // Pie chart type
                                    data: {
                                        labels: ['Completed Orders', 'Pending Orders'], // Labels
                                        datasets: [{
                                            label: 'Order Status',
                                            data: [14, 5], // Example data: Completed vs Pending Orders
                                            backgroundColor: ['#28a745', '#dc3545'], // Color for each segment
                                            borderWidth: 1
                                        }]
                                    },
                                    options: {
                                        responsive: true
                                    }
                                });
                            </script>
                        </div>
                    </div>
                </div>

        </div>







</div>



                            


<?php
include '../includes/footer.php';
?>




<script>


// Prevent right-click and F12 shortcuts
    document.addEventListener("contextmenu", function (e) {
      e.preventDefault();
    });

    document.addEventListener("keydown", function (e) {
      if (e.key === "F12" || (e.ctrlKey && e.shiftKey && (e.key === "I" || e.key === "i"))) {
        e.preventDefault();
        // Use SweetAlert2 instead of alert
        Swal.fire({
          icon: 'warning',
          title: 'Access Denied',
          text: 'This page is protected from inspection.',
          confirmButtonText: 'OK'
        });
      }
    });
  </script>