

<?php
include 'includes/connection.php';
include 'includes/inventory_connection.php';include 'includes/sidebar.php';



?>



<div class="card card-outline card-primary">
	<div class="card-header">
		<h3 class="card-title">List of Received Orders</h3>
         <div class="card-tools">
			<a href="manage_po.php" class="btn btn-flat btn-primary"><span class="fas fa-plus"></span>  Create New</a>
		</div> 
	</div>
	<div class="card-body">
		<div class="container-fluid">
        <div class="container-fluid">
			<table class="table table-bordered table-stripped">
                    <colgroup>
                        <col width="5%">
                        <col width="25%">
                        <col width="25%">
                        <col width="25%">
                        <col width="20%">
                    </colgroup>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Date Created</th>
                            <th>From</th>
                           

                            <th class="text-center">Items</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $i = 1;
                        $qry = $conn->query("SELECT * FROM `receiving_list` order by `date_created` desc");
                        while($row = $qry->fetch_assoc()):
                            $row['items'] = explode(',',$row['stock_ids']);
                            if($row['from_order'] == 1){
                                $code = $conn->query("SELECT po_code from `purchase_order_list` where id='{$row['form_id']}' ")->fetch_assoc()['po_code'];
                            }else{
                                $code = $conn->query("SELECT bo_code from `back_order_list` where id='{$row['form_id']}' ")->fetch_assoc()['bo_code'];
                            }
                        ?>
                            <tr>
                                <td class="text-center"><?php echo $i++; ?></td>
                                <td><?php echo date("Y-m-d H:i",strtotime($row['date_created'])) ?></td>
                                <td><?php echo $code ?></td>
                                <td class="text-center"><?php echo number_format(count($row['items'])) ?></td>
                        

                                <td class="text-center">
                                        <div class="d-flex justify-content-center">
                                            <a class="btn btn-sm btn-info mr-2" href="view_receiving.php?id=<?php echo $row['id']; ?>" data-id="<?php echo $row['id']; ?>">
                                                <span class="fa fa-eye"></span> View
                                            </a>
                                            <a class="btn btn-sm btn-warning mr-2" href="manage_receiving.php?id=<?php echo $row['id']; ?>" data-id="<?php echo $row['id']; ?>">
                                                <span class="fa fa-edit"></span> Edit
                                            </a>
                                            <a class="btn btn-sm btn-danger delete_data" href="javascript:void(0)" data-id="<?php echo $row['id']; ?>">
                                                <span class="fa fa-trash"></span> Delete
                                            </a>
                                        </div>
                                    </td>


                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
		</div>
		</div>
	</div>
</div>

<?php include 'includes/footer.php';?>
<script>
	$(document).ready(function(){
		$('.delete_data').click(function(){
			_conf("Are you sure to delete this Received Orders permanently?","delete_receiving",[$(this).attr('data-id')])
		})
		$('.view_details').click(function(){
			uni_modal("Receiving Details","receiving/view_receiving.php?id="+$(this).attr('data-id'),'mid-large')
		})
		$('.table td,.table th').addClass('py-1 px-2 align-middle')
		$('.table').dataTable();
	})
	function delete_receiving($id){
		start_loader();
		$.ajax({
			url:_base_url_+"classes/Master.php?f=delete_receiving",
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