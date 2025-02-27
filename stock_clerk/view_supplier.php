<?php
include '../includes/connection.php';
include '../includes/sidebar.php';


// Check if 'id' is set in the URL query string
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $supplier_id = $_GET['id'];

    // Query the supplier's details based on the provided 'id'
    $qry = $conn->query("SELECT * FROM `supplier_list` WHERE id = '{$supplier_id}'");

    // Check if the query returns any results
    if ($qry->num_rows > 0) {
        // Fetch supplier details and assign them to variables
        $data = $qry->fetch_assoc();
        $name = $data['name'];
        $address = isset($data['address']) ? $data['address'] : '';
        $cperson = isset($data['cperson']) ? $data['cperson'] : '';
        $contact = isset($data['contact']) ? $data['contact'] : '';
        $status = isset($data['status']) ? $data['status'] : 0; // Default to 0 if status is not set
        $date_created = isset($data['date_created']) ? $data['date_created'] : '';
        $date_updated = isset($data['date_updated']) ? $data['date_updated'] : '';
    } else {
        // If no supplier found, display a message or handle accordingly
        echo "Supplier not found.";
        exit;
    }
} else {
    // If 'id' is not set, handle the error or redirect the user
    echo "No supplier ID provided.";
    exit;
}
?>

<style>
    /* Inline CSS for page layout */
    .container-fluid {
        background-color: #f8f9fa;
        padding: 20px;
    }

    .modal-footer {
        display: none;
    }

    #transaction-printable-details {
        background-color: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .row {
        margin-bottom: 15px;
    }

    .col-12 {
        font-family: Arial, sans-serif;
        font-size: 16px;
    }

    dl {
        margin-bottom: 0;
    }

    dt {
        font-weight: bold;
        color: #007bff;
        margin-bottom: 5px;
    }

    dd {
        margin-left: 20px;
        margin-bottom: 10px;
    }

    .badge {
        font-size: 14px;
    }

    .btn {
        font-size: 16px;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
    }

    .btn-dark {
        background-color: #343a40;
        border-color: #343a40;
        color: white;
    }

    .btn-dark:hover {
        background-color: #23272b;
        border-color: #1d2124;
    }
</style>

<div class="container-fluid" id="print_out">
    <div id="transaction-printable-details" class="position-relative">
        <div class="row">
            <fieldset class="w-100">
                <div class="col-12">
                    <dl>
                        <dt class="text-info">Name:</dt>
                        <dd class="pl-3"><?php echo $name ?></dd>
                        <dt class="text-info">Address:</dt>
                        <dd class="pl-3"><?php echo $address ?></dd>
                        <dt class="text-info">Contact Person:</dt>
                        <dd class="pl-3"><?php echo $cperson ?></dd>
                        <dt class="text-info">Contact #:</dt>
                        <dd class="pl-3"><?php echo $contact ?></dd>
                        <dt class="text-info">Status:</dt>
                        <dd class="pl-3">
                            <?php if ($status == 1): ?>
                                <span class="badge badge-success rounded-pill">Active</span>
                            <?php else: ?>
                                <span class="badge badge-danger rounded-pill">Inactive</span>
                            <?php endif; ?>
                        </dd>
                        <dt class="text-info">Date Created:</dt>
                        <dd class="pl-3"><?php echo isset($date_created) ? date("Y-m-d H:i", strtotime($date_created)) : ''; ?></dd>
                        <dt class="text-info">Date Updated:</dt>
                        <dd class="pl-3"><?php echo isset($date_updated) ? date("Y-m-d H:i", strtotime($date_updated)) : ''; ?></dd>
                    </dl>
                </div>
            </fieldset>
        </div>
    </div>
</div>

<div class="form-group">
    <div class="col-12">
        <div class="d-flex justify-content-end align-items-center">
            <a href="supplier.php" class="btn btn-dark btn-flat" type="button" id="cancel" data-dismiss="modal">
                Close
            </a>
        </div>
    </div>
</div>


<?php include '../includes/footer.php'; ?>

<script>
    $(function () {
        $('.table td, .table th').addClass('py-1 px-2 align-middle');
    })
</script>
