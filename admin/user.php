<?php
include '../includes/connection.php';
include '../includes/sidebar.php';

$query = 'SELECT ID, t.TYPE
          FROM users u
          JOIN type t ON t.TYPE_ID=u.TYPE_ID WHERE ID = '.$_SESSION['MEMBER_ID'].'';
$result = mysqli_query($conn, $query) or die (mysqli_error($conn));

while ($row = mysqli_fetch_assoc($result)) {
    $Aa = $row['TYPE'];

    if ($Aa == 'User') {
?>
    <script type="text/javascript">
        alert("Restricted Page! You will be redirected to POS");
        window.location = "pos.php";
    </script>
<?php
    }
}
?>

<!-- ADMIN TABLE -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h4 class="m-2 font-weight-bold text-primary">Admin Account(s)</h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Type</th>
                        <th style="text-align: center;">Action</th>
                    </tr>
                </thead>
                <tbody>
<?php
    $query = 'SELECT ID, FIRST_NAME, LAST_NAME, USERNAME, t.TYPE
              FROM users u
              JOIN employee e ON e.EMPLOYEE_ID=u.EMPLOYEE_ID
              JOIN type t ON t.TYPE_ID=u.TYPE_ID
              WHERE u.TYPE_ID=1';
    $result = mysqli_query($conn, $query) or die (mysqli_error($conn));

    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>'. $row['FIRST_NAME'].' '. $row['LAST_NAME'].'</td>';
        echo '<td>'. $row['USERNAME'].'</td>';
        echo '<td>'. $row['TYPE'].'</td>';
        echo '<td align="center" style="white-space: nowrap;">
                <div class="btn-group">
                    <a type="button" class="btn btn-primary bg-gradient-primary btn-sm" href="us_searchfrm.php?action=edit&id=' . $row['ID'] . '">
                        <i class="fas fa-fw fa-list-alt"></i> View
                    </a>
                    <a type="button" class="btn btn-warning bg-gradient-warning btn-sm" href="us_edit.php?action=edit&id=' . $row['ID'] . '">
                        <i class="fas fa-fw fa-edit"></i> Edit
                    </a>
                </div>
              </td>';
        echo '</tr>';
    }
?>         
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- STOCK CLERK TABLE -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h4 class="m-2 font-weight-bold text-primary">Stock Clerk Account(s)</h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Type</th>
                        <th style="text-align: center;">Action</th>
                    </tr>
                </thead>
                <tbody>
<?php
    $query = 'SELECT ID, FIRST_NAME, LAST_NAME, USERNAME, t.TYPE
              FROM users u
              JOIN employee e ON e.EMPLOYEE_ID=u.EMPLOYEE_ID
              JOIN type t ON t.TYPE_ID=u.TYPE_ID
              WHERE u.TYPE_ID=3'; // Assuming 3 is for Stock Clerk
    $result = mysqli_query($conn, $query) or die (mysqli_error($conn));

    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>'. $row['FIRST_NAME'].' '. $row['LAST_NAME'].'</td>';
        echo '<td>'. $row['USERNAME'].'</td>';
        echo '<td>'. $row['TYPE'].'</td>';
        echo '<td align="center" style="white-space: nowrap;">
                <div class="btn-group">
                    <a type="button" class="btn btn-primary bg-gradient-primary btn-sm" href="us_searchfrm.php?action=edit&id=' . $row['ID'] . '">
                        <i class="fas fa-fw fa-list-alt"></i> View
                    </a>
                    <a type="button" class="btn btn-warning bg-gradient-warning btn-sm" href="us_edit.php?action=edit&id=' . $row['ID'] . '">
                        <i class="fas fa-fw fa-edit"></i> Edit
                    </a>
                </div>
              </td>';
        echo '</tr>';
    }
?>         
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- CASHIER TABLE -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h4 class="m-2 font-weight-bold text-primary">Cashier Account(s)</h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Type</th>
                        <th style="text-align: center;">Action</th>
                    </tr>
                </thead>
                <tbody>
<?php
    $query = 'SELECT ID, FIRST_NAME, LAST_NAME, USERNAME, t.TYPE
              FROM users u
              JOIN employee e ON e.EMPLOYEE_ID=u.EMPLOYEE_ID
              JOIN type t ON t.TYPE_ID=u.TYPE_ID
              WHERE u.TYPE_ID=4'; // Assuming 4 is for Cashier
    $result = mysqli_query($conn, $query) or die (mysqli_error($conn));

    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>'. $row['FIRST_NAME'].' '. $row['LAST_NAME'].'</td>';
        echo '<td>'. $row['USERNAME'].'</td>';
        echo '<td>'. $row['TYPE'].'</td>';
        echo '<td align="center" style="white-space: nowrap;">
                <div class="btn-group">
                    <a type="button" class="btn btn-primary bg-gradient-primary btn-sm" href="us_searchfrm.php?action=edit&id=' . $row['ID'] . '">
                        <i class="fas fa-fw fa-list-alt"></i> View
                    </a>
                    <a type="button" class="btn btn-warning bg-gradient-warning btn-sm" href="us_edit.php?action=edit&id=' . $row['ID'] . '">
                        <i class="fas fa-fw fa-edit"></i> Edit
                    </a>
                </div>
              </td>';
        echo '</tr>';
    }
?>         
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- User Account Modal-->
<div class="modal fade" id="supplierModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add User Account</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" method="post" action="us_transac.php?action=add">
                    <div class="form-group">
                        <?php
                        $sql = "SELECT EMPLOYEE_ID, FIRST_NAME, LAST_NAME, j.JOB_TITLE
                                FROM employee e
                                JOIN job j ON j.JOB_ID=e.JOB_ID
                                ORDER BY e.LAST_NAME ASC";
                        $res = mysqli_query($conn, $sql) or die ("Bad SQL: $sql");

                        $opt = "<select class='form-control' name='empid' required>
                                <option value='' disabled selected hidden>Select Employee</option>";
                        while ($row = mysqli_fetch_assoc($res)) {
                            $opt .= "<option value='".$row['EMPLOYEE_ID']."'>".$row['LAST_NAME'].', '.$row['FIRST_NAME'].' - '.$row['JOB_TITLE']."</option>";
                        }
                        $opt .= "</select>";

                        echo $opt;
                        ?>
                    </div>
                    <div class="form-group">
                        <input class="form-control" placeholder="Username" name="username" required>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Password" name="password" required>
                    </div>
                    <hr>

                    <div style="display: flex; justify-content: center; gap: 55px;">
                        <button type="submit" class="btn btn-success" style="flex: 0 0 auto;"><i class="fa fa-check fa-fw"></i>Save</button>
                        <button type="reset" class="btn btn-danger" style="flex: 0 0 auto;"><i class="fa fa-times fa-fw"></i>Reset</button>
                        <button class="btn btn-secondary" type="button" data-dismiss="modal" style="flex: 0 0 auto;"><i class="fa fa-times fa-fw"></i>Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
