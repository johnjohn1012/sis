
<?php
include '../includes/connection.php';

include '../includes/sidebar.php';

include '../includes/connection1.php';

?>


<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">List of Purchase Orders</h3>
        <div class="card-tools">
            <a href="manage_po.php" class="btn btn-flat btn-primary"><span class="fas fa-plus"></span> Create New</a>
        </div>
    </div>
    <div class="card-body">
        <div class="container-fluid">
            <table class="table table-bordered table-striped" id="poTable">
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
                        <th>PO Code</th>
                        <th>Supplier</th>
                        <th>Items</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    $qry = $conn->query("SELECT p.*, s.name as supplier FROM `purchase_order_list` p INNER JOIN supplier_list s ON p.supplier_id = s.id ORDER BY p.`date_created` DESC");
                    while ($row = $qry->fetch_assoc()):
                        // Count items in PO
                        $row['items'] = $conn->query("SELECT COUNT(item_id) AS items FROM `po_items` WHERE po_id = '{$row['id']}'")->fetch_assoc()['items'];
                    ?>
                        <tr>
                            <td class="text-center"><?php echo $i++; ?></td>
                            <td><?php echo date("Y-m-d H:i", strtotime($row['date_created'])); ?></td>
                            <td><?php echo $row['po_code']; ?></td>
                            <td><?php echo $row['supplier']; ?></td>
                            <td class="text-left"><?php echo number_format($row['items']); ?></td>
                            <td class="text-center">
                                <?php if ($row['status'] == 0): ?>
                                    <span class="badge badge-primary rounded-pill">Pending</span>
                                <?php elseif ($row['status'] == 1): ?>
                                    <span class="badge badge-warning rounded-pill">Partially received</span>
                                <?php elseif ($row['status'] == 2): ?>
                                    <span class="badge badge-success rounded-pill">Received</span>
                                <?php else: ?>
                                    <span class="badge badge-danger rounded-pill">N/A</span>
                                <?php endif; ?>
                            </td>
                            <td align="center">
                                <div class="d-flex justify-content-center">
                                    <?php if ($row['status'] == 0): ?>
                                        <a class="btn btn-sm btn-primary mr-1" href="receiving/manage_receiving.php?po_id=<?php echo $row['id']; ?>" data-id="<?php echo $row['id']; ?>"><span class="fa fa-boxes text-dark"></span> Receive</a>
                                    <?php endif; ?>
                                    <a class="btn btn-sm btn-info mr-1" href="view_po.php?id=<?php echo $row['id']; ?>" data-id="<?php echo $row['id']; ?>"><span class="fa fa-eye text-dark"></span> View</a>
                                    <a class="btn btn-sm btn-warning mr-1" href="manage_po.php?id=<?php echo $row['id']; ?>" data-id="<?php echo $row['id']; ?>"><span class="fa fa-edit text-primary"></span> Edit</a>
                                    <a class="btn btn-sm btn-danger delete_data" href="javascript:void(0)" data-id="<?php echo $row['id']; ?>"><span class="fa fa-trash text-dark"></span> Delete</a>
                                </div>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include '../includes/footer.php'; ?>


<script>
    $(document).ready(function(){
        // Initialize DataTable with search, pagination, and show entries options
        $('#poTable').DataTable({
            "paging": true,
            "searching": true,
            "lengthChange": true,
            "ordering": true,
            "info": true,
            "autoWidth": false
        });

        // Delete action
        $('.delete_data').click(function(){
            const dataId = $(this).attr('data-id');
            if (confirm("Are you sure to delete this Purchase Order permanently?")) {
                delete_po(dataId);
            }
        });

        // Handle viewing details
        $('.view_details').click(function(){
            uni_modal("Payment Details", "transaction/view_payment.php?id=" + $(this).attr('data-id'), 'mid-large');
        });

        // Formatting table cells
        $('.table td, .table th').addClass('py-1 px-2 align-middle');
    });

    // Function to delete Purchase Order
    function delete_po($id){
        start_loader();
        $.ajax({
            url: "../classes/Master.php?page=delete_po",  // Use the correct path here
            method: "POST",
            data: {id: $id},
            dataType: "json",
            error: function(err){
                console.log(err);
                alert_toast("An error occurred.", 'error');
                end_loader();
            },
            success: function(resp){
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
