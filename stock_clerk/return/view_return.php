<?php
include '../includes/connection1.php'; 
include '../includes/connection.php';
include '../includes/sidebar.php';
?>

<?php 
$qry = $conn->query("SELECT r.*,s.name as supplier FROM return_list r inner join supplier_list s on r.supplier_id = s.id  where r.id = '{$_GET['id']}'");
if($qry->num_rows >0){
    foreach($qry->fetch_array() as $k => $v){
        $$k = $v;
    }
}
?>
<div class="card card-outline card-primary">
    <div class="card-header">
        <h4 class="card-title">Return Record - <?php echo $return_code ?></h4>
    </div>
    <div class="card-body" id="print_out">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <label class="control-label text-info">Return Code</label>
                    <div><?php echo isset($return_code) ? $return_code : '' ?></div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="supplier_id" class="control-label text-info">Supplier</label>
                        <div><?php echo isset($supplier) ? $supplier : '' ?></div>
                    </div>
                </div>
            </div>
            <h4 class="text-info">Items</h4>
            <table class="table table-striped table-bordered" id="list">
                <colgroup>
                    <col width="10%">
                    <col width="10%">
                    <col width="30%">
                    <col width="25%">
                    <col width="25%">
                </colgroup>
                <thead>
                    <tr class="text-light bg-navy">
                        <th class="text-center py-1 px-2">Qty</th>
                        <th class="text-center py-1 px-2">Unit</th>
                        <th class="text-center py-1 px-2">Item</th>
                        <th class="text-center py-1 px-2">Cost</th>
                        <th class="text-center py-1 px-2">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $total = 0;
                    $qry = $conn->query("SELECT s.*,i.name,i.description FROM `stock_list` s inner join item_list i on s.item_id = i.id where s.id in ({$stock_ids})");
                    while($row = $qry->fetch_assoc()):
                        $total += $row['total']
                    ?>
                    <tr>
                        <td class="py-1 px-2 text-center"><?php echo number_format($row['quantity']) ?></td>
                        <td class="py-1 px-2 text-center"><?php echo ($row['unit']) ?></td>
                        <td class="py-1 px-2">
                            <?php echo $row['name'] ?> <br>
                            <?php echo $row['description'] ?>
                        </td>
                        <td class="py-1 px-2 text-right"><?php echo number_format($row['price']) ?></td>
                        <td class="py-1 px-2 text-right"><?php echo number_format($row['total']) ?></td>
                    </tr>

                    <?php endwhile; ?>
                    
                </tbody>
                <tfoot>
                    <tr>
                        <th class="text-right py-1 px-2" colspan="4">Total</th>
                        <th class="text-right py-1 px-2 grand-total"><?php echo isset($amount) ? number_format($amount,2) : 0 ?></th>
                    </tr>
                </tfoot>
            </table>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="remarks" class="text-info control-label">Remarks</label>
                        <p><?php echo isset($remarks) ? $remarks : '' ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer py-1 text-center">
        <button class="btn btn-flat btn-success" type="button" id="print">Print</button>
        <a class="btn btn-flat btn-primary" href="<?php echo base_url.'/admin?page=return/manage_return&id='.(isset($id) ? $id : '') ?>">Edit</a>
        <a class="btn btn-flat btn-dark" href="<?php echo base_url.'/admin?page=return' ?>">Back To List</a>
    </div>
</div>
<table id="clone_list" class="d-none">
    <tr>
        <td class="py-1 px-2 text-center">
            <button class="btn btn-outline-danger btn-sm rem_row" type="button"><i class="fa fa-times"></i></button>
        </td>
        <td class="py-1 px-2 text-center qty">
            <span class="visible"></span>
            <input type="hidden" name="item_id[]">
            <input type="hidden" name="unit[]">
            <input type="hidden" name="qty[]">
            <input type="hidden" name="price[]">
            <input type="hidden" name="total[]">
        </td>
        <td class="py-1 px-2 text-center unit">
        </td>
        <td class="py-1 px-2 item">
        </td>
        <td class="py-1 px-2 text-right cost">
        </td>
        <td class="py-1 px-2 text-right total">
        </td>
    </tr>
</table>
<script>
    
    $(function() {
    $('#print').click(function() {
        start_loader(); // Start loading to show a loading spinner during the print preparation.

        // Create a new container for the print content
        var _el = $('<div>');
        
        // Clone the head and modify the title for the print view
        var _head = $('head').clone();
        _head.find('title').text("Return Record - Print View");

        // Clone the content to be printed
        var p = $('#print_out').clone();
        p.find('tr.text-light').removeClass("text-light bg-navy"); // Remove any background colors or styles for printing.

        // Prepare the header for the print page
        _el.append(_head);
        _el.append('<div class="d-flex justify-content-center">' +
                  '<div class="col-1 text-right">' +
                  '</div>' +
                  '<div class="col-10">' +
                  '<h4 class="text-center"><?php echo $_settings->info('name'); ?></h4>' +
                  '<h4 class="text-center">Return Record</h4>' +
                  '</div>' +
                  '<div class="col-1 text-right">' +
                  '</div>' +
                  '</div><hr/>');

        // Append the cloned content (the table and other content to print)
        _el.append(p.html());

        // Open a new window to print the content
        var nw = window.open("", "", "width=1200,height=900,left=250,location=no,titlebar=yes");

        // Write the generated HTML content to the new window
        nw.document.write(_el.html());
        nw.document.close();

        // After loading the content, trigger the print dialog and close the window after printing
        setTimeout(() => {
            nw.print(); // Trigger the print dialog
            setTimeout(() => {
                nw.close(); // Close the print window after the print job is finished
                end_loader(); // Stop the loading spinner
            }, 200);
        }, 500); // Wait a little before printing to allow the page to load properly
    });
});

</script>