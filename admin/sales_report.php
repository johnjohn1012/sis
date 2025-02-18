<?php
include'../includes/connection.php';
include'../includes/sidebar.php';

  // Check User Type (Admin Only)
  $query = 'SELECT ID, t.TYPE
            FROM users u
            JOIN type t ON t.TYPE_ID=u.TYPE_ID WHERE ID = '.$_SESSION['MEMBER_ID'].'';
  $result = mysqli_query($db, $query) or die (mysqli_error($db));

  while ($row = mysqli_fetch_assoc($result)) {
            $Aa = $row['TYPE'];

  if ($Aa == 'User') {
?>
  <script type="text/javascript">
    // Redirect to POS for non-admin users
    alert("Restricted Page! You will be redirected to POS");
    window.location = "pos.php";
  </script>
<?php
  }           
}
?>

<!-- Sales Report Card -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h4 class="m-2 font-weight-bold text-primary">Sales Report</h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width="19%">Transaction Number</th>
                        <th>Customer</th>
                        <th width="13%"># of Items</th>
                        <th width="15%">Total Amount</th> <!-- New column for Sales Amount -->
                        <th width="11%">Action</th>
                    </tr>
                </thead>
                <tbody>
<?php
    // Query to fetch sales-related data: transaction number, customer, items, and total sales amount
    $query = 'SELECT T.*, C.FIRST_NAME, C.LAST_NAME, T.NUMOFITEMS, T.GRANDTOTAL
              FROM transaction T
              JOIN customer C ON T.CUST_ID = C.CUST_ID
              ORDER BY T.TRANS_D_ID ASC';
    $result = mysqli_query($db, $query) or die(mysqli_error($db));

    while ($row = mysqli_fetch_assoc($result)) {
        // Convert the GRANDTOTAL to a float before passing it to number_format()
        $grandTotal = floatval($row['GRANDTOTAL']);
        echo '<tr>';
        echo '<td>' . $row['TRANS_D_ID'] . '</td>';
        echo '<td>' . $row['FIRST_NAME'] . ' ' . $row['LAST_NAME'] . '</td>';
        echo '<td>' . $row['NUMOFITEMS'] . '</td>';
        echo '<td>' . number_format($grandTotal, 2) . '</td>'; // Display total sales amount with formatting
        echo '<td align="right">
                <a type="button" class="btn btn-primary bg-gradient-primary" href="sales_view.php?action=edit&id=' . $row['TRANS_ID'] . '">
                    <i class="fas fa-fw fa-th-list"></i> View
                </a>
              </td>';
        echo '</tr>';
    }
?> 
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
include'../includes/footer.php';
?>
