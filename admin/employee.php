<?php
include '../includes/connection.php';
include '../includes/sidebar.php';

$query = 'SELECT ID, t.TYPE
          FROM users u
          JOIN type t ON t.TYPE_ID=u.TYPE_ID WHERE ID = '.$_SESSION['MEMBER_ID'].'';
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

while ($row = mysqli_fetch_assoc($result)) {
    $Aa = $row['TYPE'];

    if ($Aa == 'User') {
        echo '<script type="text/javascript">
                alert("Restricted Page! You will be redirected to POS");
                window.location = "pos.php";
              </script>';
    }
}
?>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h4 class="m-2 font-weight-bold text-primary">Employee&nbsp;<a href="#" data-toggle="modal" data-target="#employeeModal" type="button" class="btn btn-primary bg-gradient-primary" style="border-radius: 0px;"><i class="fas fa-fw fa-plus"></i></a></h4>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Role</th>
                        <th style="text-align: center;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = 'SELECT EMPLOYEE_ID, FIRST_NAME, LAST_NAME, j.JOB_TITLE FROM employee e JOIN job j ON e.JOB_ID=j.JOB_ID';
                    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<tr>';
                        echo '<td>' . $row['FIRST_NAME'] . '</td>';
                        echo '<td>' . $row['LAST_NAME'] . '</td>';
                        echo '<td>' . $row['JOB_TITLE'] . '</td>';
                        echo '<td align="center" style="white-space: nowrap;">
                                <div class="btn-group">
                                    <a type="button" class="btn btn-primary bg-gradient-primary btn-sm" href="emp_searchfrm.php?action=edit&id=' . $row['EMPLOYEE_ID'] . '">
                                        <i class="fas fa-fw fa-list-alt"></i> View
                                    </a>
                                    <a type="button" class="btn btn-warning bg-gradient-warning btn-sm" href="emp_edit.php?action=edit&id=' . $row['EMPLOYEE_ID'] . '">
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

<?php
include '../includes/footer.php';
?>