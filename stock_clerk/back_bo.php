<?php
include 'includes/connection.php';
include 'includes/sidebar.php';

?>

<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">List of Back Orders</h3>
        <div class="card-tools">
            <a href="manage_bo.php" class="btn btn-flat btn-primary"><span class="fas fa-plus"></span> Create New</a>
        </div>
    </div>
    <div class="card-body">
        <div class="container-fluid">
            <table class="table table-bordered table-stripped">
                <colgroup>
                    <col width="5%">
                    <col width="15%">
                    <col width="20%">
                    <col width="20%">
                    <col width="10%">
                    <col width="10%">
                    <col width="10%">
                </colgroup>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Date Created</th>
                        <th>BO Code</th>
                        <th>Supplier</th>
                        <th>Items</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $i = 1;
                    $qry = $conn->query("SELECT p.*, s.name as supplier FROM `back_order_list` p INNER JOIN supplier_list s ON p.supplier_id = s.id ORDER BY p.`date_created` DESC");
                    while($row = $qry->fetch_assoc()):
                        $row['items'] = $conn->query("SELECT count(item_id) as `items` FROM `bo_items` WHERE bo_id = '{$row['id']}'")->fetch_assoc()['items'];
                    ?>
                        <tr>
                            <td class="text-center"><?php echo $i++; ?></td>
                            <td><?php echo date("Y-m-d H:i",strtotime($row['date_created'])) ?></td>
                            <td><?php echo $row['bo_code'] ?></td>
                            <td><?php echo $row['supplier'] ?></td>
                            <td class="text-right"><?php echo number_format($row['items']) ?></td>
                            <td class="text-center">
                                <?php if($row['status'] == 0): ?>
                                    <span class="badge badge-primary rounded-pill">Pending</span>
                                <?php elseif($row['status'] == 1): ?>
                                    <span class="badge badge-warning rounded-pill">Partially received</span>
                                <?php elseif($row['status'] == 2): ?>
                                    <span class="badge badge-success rounded-pill">Received</span>
                                <?php else: ?>
                                    <span class="badge badge-danger rounded-pill">N/A</span>
                                <?php endif; ?>
                            </td>
                            <td class="text-center">
                                <?php if($row['status'] == 0): ?>
                                    <a class="dropdown-item" href="receiving/manage_receiving.php?bo_id=<?php echo $row['id']; ?>" data-id="<?php echo $row['id']; ?>"><span class="fa fa-boxes text-dark"></span> Receive</a>
                                    <div class="dropdown-divider"></div>
                                <?php endif; ?>
                                <a class="dropdown-item" href="back_order/view_bo.php?id=<?php echo $row['id']; ?>" data-id="<?php echo $row['id']; ?>"><span class="fa fa-eye text-dark"></span> View</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>

<script>
    $(document).ready(function(){
        $('.delete_data').click(function(){
            _conf("Are you sure you want to delete this Back Order permanently?", "delete_bo", [$(this).attr('data-id')]);
        });
        $('.view_details').click(function(){
            uni_modal("Payment Details", "transaction/view_payment.php?id=" + $(this).attr('data-id'), 'mid-large');
        });
        $('.table td, .table th').addClass('py-1 px-2 align-middle');
        $('.table').dataTable();
    });

    function delete_bo(id) {
        start_loader();
        $.ajax({
            url: _base_url_ + "classes/Master.php?f=delete_bo",
            method: "POST",
            data: {id: id},
            dataType: "json",
            error: function(err) {
                console.log(err);
                alert_toast("An error occurred.", 'error');
                end_loader();
            },
            success: function(resp) {
                if (typeof resp == 'object' && resp.status == 'success') {
                    location.reload();
                } else {
                    alert_toast("An error occurred.", 'error');
                    end_loader();
                }
            }
        });
    }
</script>
