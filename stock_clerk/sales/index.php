<?php 
include '../includes/connection.php';
include '../includes/sidebar.php';

?>



<div class="card card-outline card-primary">
	<div class="card-header">
		<h3 class="card-title">List of Sales</h3>
        <div class="card-tools">
			<a href="manage_sale.php" class="btn btn-flat btn-primary"><span class="fas fa-plus"></span>  Create New</a>
		</div>
	</div>
	<div class="card-body">
		<div class="container-fluid">
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
                            <th>Sale Code</th>
                            <th>Client</th>
                            <th>Items</th>
                            <th>Amount</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $i = 1;
                        $qry = $conn->query("SELECT * FROM `sales_list` order by `date_created` desc");
                        while($row = $qry->fetch_assoc()):
                            $row['items'] = count(explode(',',$row['stock_ids']));
                        ?>
                            <tr>
                                <td class="text-center"><?php echo $i++; ?></td>
                                <td><?php echo date("Y-m-d H:i",strtotime($row['date_created'])) ?></td>
                                <td><?php echo $row['sales_code'] ?></td>
                                <td><?php echo $row['client'] ?></td>
                                <td class="text-right"><?php echo number_format($row['items']) ?></td>
                                <td class="text-right"><?php echo number_format($row['amount'],2) ?></td>
                                <td class="center">

                                <a class="dropdown-item view_data" href="view_sale.php?id=<?php echo $row['id']; ?>" data-id="<?php echo $row['id']; ?>"><span class="fa fa-eye text-dark"></span> View</a>


                                        
                                <a class="dropdown-item view_data" href="manage_sale.php?id=<?php echo $row['id']; ?>" data-id="<?php echo $row['id']; ?>"><span class="fa fa-eye text-primary"></span> Edit</a>
                                
                    
                                        <a class="dropdown-item delete_data" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>"><span class="fa fa-trash text-danger"></span> Delete</a>
                               
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
		</div>
		</div>
	</div>
</div>


<?php include '../includes/footer.php';?>
<script>
	$(document).ready(function(){
		$('.delete_data').click(function(){
			_conf("Are you sure to delete this Sales Record permanently?","delete_sale",[$(this).attr('data-id')])
		})
		$('.table td,.table th').addClass('py-1 px-2 align-middle')
		$('.table').dataTable();
	})
	function delete_sale($id){
		start_loader();
		$.ajax({
			url:_base_url_+"classes/Master.php?f=delete_sale",
			method:"POST",
			data:{id: $id},
			dataType:"json",
			error:err=>{
				console.log(err)
				alert_toast("An error occured.",'error');
				end_loader();
			},
			success:function(resp){
				if(typeof resp== 'object' && resp.status == 'success'){
					location.reload();
				}else{
					alert_toast("An error occured.",'error');
					end_loader();
				}
			}
		})
	}
</script>