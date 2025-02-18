<?php
include '../includes/connection1.php'; 
include '../includes/connection.php';
include '../includes/sidebar.php';
?>

<div class="card card-outline card-primary">
	<div class="card-header">
		<h3 class="card-title">List of Return</h3>
        <div class="card-tools">
			<a href="manage_return.php" class="btn btn-flat btn-primary">
                <span class="fas fa-plus"></span>  Create New
            </a>
		</div>
	</div>
	<div class="card-body">
		<div class="container-fluid">
            <table class="table table-bordered table-striped">
                <colgroup>
                    <col width="5%">
                    <col width="15%">
                    <col width="25%">
                    <col width="25%">
                    <col width="10%">
                    <col width="10%">
                </colgroup>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Date Created</th>
                        <th>Return Code</th>
                        <th>Supplier</th>
                        <th>Items</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $i = 1;
                    $qry = $conn->query("SELECT r.*, s.name as supplier FROM `return_list` r 
                                         INNER JOIN supplier_list s ON r.supplier_id = s.id 
                                         ORDER BY r.`date_created` DESC");
                    while ($row = $qry->fetch_assoc()):
                        $row['items'] = count(explode(',', $row['stock_ids']));
                    ?>
                        <tr>
                            <td class="text-center"><?php echo $i++; ?></td>
                            <td><?php echo date("Y-m-d H:i", strtotime($row['date_created'])); ?></td>
                            <td><?php echo $row['return_code']; ?></td>
                            <td><?php echo $row['supplier']; ?></td>
                            <td class="text-right"><?php echo number_format($row['items']); ?></td>
                            <td class="center">
                                <a class="dropdown-item" href="view_return.php?id=<?php echo $row['id']; ?>" 
                                   data-id="<?php echo $row['id']; ?>">
                                    <span class="fa fa-eye text-dark"></span> View
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="manage_return.php?id=<?php echo $row['id']; ?>" 
                                   data-id="<?php echo $row['id']; ?>">
                                    <span class="fa fa-edit text-primary"></span> Edit
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item delete_data" href="javascript:void(0)" 
                                   data-id="<?php echo $row['id']; ?>">
                                    <span class="fa fa-trash text-danger"></span> Delete
                                </a>
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
	$(document).ready(function() {
		$('.delete_data').click(function() {
			_conf("Are you sure to delete this Return Record permanently?", "delete_return", [$(this).attr('data-id')]);
		});

		$('.table td, .table th').addClass('py-1 px-2 align-middle');
		$('.table').dataTable();
	});

	function delete_return($id) {
		start_loader();
		$.ajax({
			url: _base_url_ + "classes/Master.php?f=delete_return",
			method: "POST",
			data: { id: $id },
			dataType: "json",
			error: err => {
				console.log(err);
				alert_toast("An error occurred.", 'error');
				end_loader();
			},
			success: function(resp) {
				if (typeof resp === 'object' && resp.status === 'success') {
					location.reload();
				} else {
					alert_toast("An error occurred.", 'error');
					end_loader();
				}
			}
		});
	}
</script>
