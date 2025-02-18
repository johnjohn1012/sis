<?php
include '../includes/connection.php';
include '../includes/sidebar.php';
?><?php 

                $query = 'SELECT ID, t.TYPE
                          FROM users u
                          JOIN type t ON t.TYPE_ID=u.TYPE_ID WHERE ID = '.$_SESSION['MEMBER_ID'].'';
                $result = mysqli_query($db, $query) or die (mysqli_error($db));
      
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
                                            $result = mysqli_query($db, $query) or die(mysqli_error($db));
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
                                    $result = mysqli_query($db, $query) or die(mysqli_error($db));
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
                                $result = mysqli_query($db, $query) or die(mysqli_error($db));
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
                                $result = mysqli_query($db, $query) or die(mysqli_error($db));
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
                                $result = mysqli_query($db, $query) or die(mysqli_error($db));
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
                                $result = mysqli_query($db, $query) or die(mysqli_error($db));
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
                                $result = mysqli_query($db, $query) or die(mysqli_error($db));
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
                            $result = mysqli_query($db, $query) or die(mysqli_error($db));
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

    </div>

    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card shadow mb-4 custom-card">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Business Analytics</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="analyticsTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Total Sales</th>
                                    <th>Average Price</th>
                                    <th>Sold Quantity</th>
                                    <th>Last Sale Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Product A</td>
                                    <td>1500</td>
                                    <td>50</td>
                                    <td>30</td>
                                    <td>2025-02-10</td>
                                </tr>
                                <tr>
                                    <td>Product B</td>
                                    <td>2500</td>
                                    <td>100</td>
                                    <td>25</td>
                                    <td>2025-02-09</td>
                                </tr>
                                <tr>
                                    <td>Product C</td>
                                    <td>1200</td>
                                    <td>60</td>
                                    <td>20</td>
                                    <td>2025-02-08</td>
                                </tr>
                                <tr>
                                    <td>Product D</td>
                                    <td>3000</td>
                                    <td>120</td>
                                    <td>25</td>
                                    <td>2025-02-07</td>
                                </tr>
                                <tr>
                                    <td>Product E</td>
                                    <td>1800</td>
                                    <td>60</td>
                                    <td>30</td>
                                    <td>2025-02-06</td>
                                </tr>
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