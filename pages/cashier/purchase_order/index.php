<?php 

include '../includes/connection1.php' 



?>

<?php 

include '../includes/connection.php' 


?>


<?php 

include '../includes/sidebar.php' 

?>





<!-- Include Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Include FontAwesome CSS for icons -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

<!-- Include DataTable CSS for table features (search, pagination, entries) -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">

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
                    $qry = $conn->query("SELECT p.*, s.name as supplier FROM `purchase_order_list` p inner join supplier_list s on p.supplier_id = s.id order by p.`date_created` desc");
                    while($row = $qry->fetch_assoc()):
                        $row['items'] = $conn->query("SELECT count(item_id) as `items` FROM `po_items` where po_id = '{$row['id']}' ")->fetch_assoc()['items'];
                    ?>
                        <tr>
                            <td class="text-center"><?php echo $i++; ?></td>
                            <td><?php echo date("Y-m-d H:i",strtotime($row['date_created'])) ?></td>
                            <td><?php echo $row['po_code'] ?></td>
                            <td><?php echo $row['supplier'] ?></td>
                            <td class="text-left"><?php echo number_format($row['items']) ?></td>
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
                            <td align="center">
                                <div class="d-flex justify-content-center">
                                    <?php if($row['status'] == 0): ?>
                                        <a class="btn btn-sm btn-primary mr-1" href="receiving/manage_receiving.php&po_id=<?php echo $row['id']; ?>" data-id="<?php echo $row['id']; ?>"><span class="fa fa-boxes text-dark"></span> Receive</a>
                                    <?php endif; ?>
                                    <a class="btn btn-sm btn-info mr-1" href="view_po.php?id=<?php echo $row['id']; ?>" data-id="<?php echo $row['id']; ?>"><span class="fa fa-eye text-dark"></span> View</a>
                                    <a class="btn btn-sm btn-warning mr-1" href="manage_po.php?id=<?php echo $row['id']; ?>" data-id="<?php echo $row['id']; ?>"><span class="fa fa-edit text-primary"></span> Edit</a>
                                    <a class="btn btn-sm btn-danger delete_data" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>"><span class="fa fa-trash text-dark"></span> Delete</a>
                                </div>
                            </td>


                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
include '../includes/footer.php';
?>

<!-- Include jQuery (needed for Bootstrap JS components) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

<!-- Include Popper.js for Bootstrap tooltips, dropdowns, and modals -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>

<!-- Include Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>

<!-- Include DataTable JS for search, pagination, and show entries -->
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

<!-- Custom JS for handling events -->
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
            _conf("Are you sure to delete this Purchase Order permanently?", "delete_po",[$(this).attr('data-id')])
        });

        // Handle viewing details
        $('.view_details').click(function(){
            uni_modal("Payment Details","transaction/view_payment.php?id="+$(this).attr('data-id'),'mid-large');
        });

        // Formatting table cells
        $('.table td,.table th').addClass('py-1 px-2 align-middle');
    });

    // Function to delete Purchase Order
    function delete_po($id){
        start_loader();
        $.ajax({
            url: "Master.php?page=delete_po",  // Use the base_url here
            method: "POST",
            data: {id: $id},
            dataType: "json",
            error: err => {
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
