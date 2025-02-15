<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "inventory_system";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch suppliers from the database for the dropdown
$sql_suppliers = "SELECT * FROM supplier_list";
$result_suppliers = $conn->query($sql_suppliers);

// Fetch items from the database for the dropdown
$sql_items = "SELECT * FROM item_list";
$result_items = $conn->query($sql_items);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Purchase Order</title>

    <!-- Add Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Inline CSS for additional styling -->
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        .container {
            max-width: 1200px;
            margin: auto;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-row .col-md-4 {
            margin-bottom: 10px;
        }

        table {
            margin-top: 20px;
            width: 100%;
        }

        table th, table td {
            text-align: center;
            vertical-align: middle;
        }

        textarea {
            width: 100%;
        }

        .btn {
            margin-right: 10px;
        }

        .form-label {
            font-weight: bold;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Create New Purchase Order</h1>
        <form action="save_purchase_order.php" method="post">
            <!-- P.O. Code and Supplier Section -->
            <div class="form-row">
                <div class="col-md-4 form-group">
                    <label for="po_code" class="form-label">P.O. Code:</label>
                    <input type="text" id="po_code" name="po_code" class="form-control" disabled>
                </div>
                <div class="col-md-4 form-group">
                    <label for="supplier" class="form-label">Supplier:</label>
                    <select id="supplier" name="supplier_id" class="form-control" required>
                        <option value="">Please select here</option>
                        <?php
                        while($supplier = $result_suppliers->fetch_assoc()) {
                            echo "<option value='".$supplier['id']."'>".$supplier['supplier_name']."</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>

            <!-- Item Form Section -->
            <h4>Item Form</h4>
            <div class="form-row">
                <div class="col-md-3 form-group">
                    <label for="item" class="form-label">Item:</label>
                    <select id="item" name="item_id" class="form-control" required>
                        <option value="">Please select item</option>
                        <?php
                        while($item = $result_items->fetch_assoc()) {
                            echo "<option value='".$item['id']."'>".$item['item_name']."</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-2 form-group">
                    <label for="unit" class="form-label">Unit:</label>
                    <input type="text" id="unit" name="unit" class="form-control" required>
                </div>
                <div class="col-md-2 form-group">
                    <label for="qty" class="form-label">Quantity:</label>
                    <input type="number" id="qty" name="quantity" class="form-control" required>
                </div>
                <div class="col-md-2 form-group">
                    <label for="cost" class="form-label">Cost:</label>
                    <input type="number" id="cost" name="cost" class="form-control" step="0.01" required>
                </div>
                <div class="col-md-2 form-group">
                    <label for="discount" class="form-label">Discount %:</label>
                    <input type="number" id="discount" name="discount" class="form-control" value="0" step="0.01">
                </div>
                <div class="col-md-1 form-group">
                    <label for="tax" class="form-label">Tax %:</label>
                    <input type="number" id="tax" name="tax" class="form-control" value="0" step="0.01">
                </div>
            </div>

            <button type="button" onclick="addItemToList()" class="btn btn-primary">Add to List</button>

            <!-- Item List Table -->
            <table class="table table-bordered" id="itemListTable">
                <thead>
                    <tr>
                        <th>Qty</th>
                        <th>Unit</th>
                        <th>Item</th>
                        <th>Cost</th>
                        <th>Sub Total</th>
                        <th>Discount</th>
                        <th>Tax</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Item rows will be inserted here -->
                </tbody>
            </table>

            <!-- Remarks Section -->
            <div class="form-group">
                <label for="remarks" class="form-label">Remarks:</label><br>
                <textarea id="remarks" name="remarks" class="form-control" rows="4"></textarea>
            </div>

            <!-- Save and Cancel Buttons -->
            <div class="form-group">
                <input type="submit" value="Save" class="btn btn-success">
                <button type="reset" class="btn btn-secondary">Cancel</button>
            </div>
        </form>
    </div>

    <!-- Add Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>

// Function to add new item to the list or update quantity if the item already exists
function addItemToList() {
    // Get input values
    var item = document.getElementById("item").value.trim();
    var unit = document.getElementById("unit").value.trim();
    var qty = parseInt(document.getElementById("qty").value);
    var cost = parseFloat(document.getElementById("cost").value);
    var discount = parseFloat(document.getElementById("discount").value) || 0; // Default to 0 if not provided
    var tax = parseFloat(document.getElementById("tax").value) || 0; // Default to 0 if not provided

    // Validate inputs
    if (!item || !unit || isNaN(qty) || isNaN(cost)) {
        alert("Please fill out all fields with valid values.");
        return; // Prevent adding the item if there's an invalid input
    }

    if (qty <= 0 || cost <= 0) {
        alert("Please enter valid values: Quantity and Cost must be positive.");
        return; // Prevent adding the item if values are out of valid range
    }

    var table = document.getElementById("itemListTable");
    var rows = table.getElementsByTagName("tr");
    var itemExists = false;

    // Check if the item already exists in the table
    for (var i = 1; i < rows.length; i++) {
        var row = rows[i];
        var itemCell = row.cells[2].innerHTML; // Item name is in the 3rd column (index 2)
        if (itemCell == item) {
            // Item exists, update quantity and totals
            var existingQty = parseInt(row.cells[0].innerHTML);
            row.cells[0].innerHTML = existingQty + qty;
            updateRow(row, existingQty + qty, cost, discount, tax);
            itemExists = true;
            break;
        }
    }

    // If item does not exist, add a new row
    if (!itemExists) {
        var row = table.insertRow(-1);
        row.insertCell(0).innerHTML = qty;
        row.insertCell(1).innerHTML = unit;
        row.insertCell(2).innerHTML = item;
        row.insertCell(3).innerHTML = cost.toFixed(2);
        row.insertCell(4).innerHTML = (qty * cost).toFixed(2);
        row.insertCell(5).innerHTML = discount + "%";
        row.insertCell(6).innerHTML = tax + "%";
        row.insertCell(7).innerHTML = calculateTotal(qty, cost, discount, tax).toFixed(2);

        // Add buttons to increase/decrease quantity
        var qtyCell = row.cells[0];
        var increaseBtn = document.createElement('button');
        increaseBtn.innerHTML = '+';
        increaseBtn.classList.add('btn', 'btn-sm', 'btn-success');
        increaseBtn.onclick = function () { updateQuantity(row, 1); };
        var decreaseBtn = document.createElement('button');
        decreaseBtn.innerHTML = '-';
        decreaseBtn.classList.add('btn', 'btn-sm', 'btn-danger');
        decreaseBtn.onclick = function () { updateQuantity(row, -1); };

        qtyCell.appendChild(increaseBtn);
        qtyCell.appendChild(decreaseBtn);

        // Add a remove button
        var removeBtn = document.createElement('button');
        removeBtn.innerHTML = 'Remove';
        removeBtn.classList.add('btn', 'btn-sm', 'btn-warning');
        removeBtn.onclick = function () { removeRow(row); };
        row.insertCell(8).appendChild(removeBtn);
    }

    // After adding the item, reset the input fields
    resetFormFields();

    // Recalculate the grand total
    calculateGrandTotal();
}

// Function to update quantity
function updateQuantity(row, change) {
    var qtyCell = row.cells[0];
    var currentQty = parseInt(qtyCell.innerHTML);
    var newQty = currentQty + change;

    if (newQty < 1) {
        alert("Quantity cannot be less than 1.");
        return;
    }

    qtyCell.innerHTML = newQty;
    var cost = parseFloat(row.cells[3].innerHTML);
    var discount = parseFloat(row.cells[5].innerHTML.replace('%', '')) || 0;
    var tax = parseFloat(row.cells[6].innerHTML.replace('%', '')) || 0;

    updateRow(row, newQty, cost, discount, tax);

    // Recalculate the grand total
    calculateGrandTotal();
}

// Function to update row totals
function updateRow(row, qty, cost, discount, tax) {
    var subTotal = qty * cost;
    row.cells[4].innerHTML = subTotal.toFixed(2);

    var discountAmount = (subTotal * discount) / 100;
    row.cells[5].innerHTML = discount + "%";

    var taxAmount = (subTotal * tax) / 100;
    row.cells[6].innerHTML = tax + "%";

    row.cells[7].innerHTML = calculateTotal(qty, cost, discount, tax).toFixed(2);
}

// Function to calculate the total for a row
function calculateTotal(qty, cost, discount, tax) {
    var subTotal = qty * cost;
    var discountAmount = (subTotal * discount) / 100;
    var taxAmount = (subTotal * tax) / 100;
    return subTotal - discountAmount + taxAmount;
}

// Function to remove a row
function removeRow(row) {
    row.remove();

    // Recalculate the grand total
    calculateGrandTotal();
}

// Function to calculate the grand total
function calculateGrandTotal() {
    var table = document.getElementById("itemListTable");
    var rows = table.getElementsByTagName("tr");
    var grandTotal = 0;

    for (var i = 1; i < rows.length; i++) {
        var row = rows[i];
        var totalCell = row.cells[7].innerHTML;
        grandTotal += parseFloat(totalCell);
    }

    // Update the grand total display
    document.getElementById("grandTotal").innerHTML = grandTotal.toFixed(2);
}

// Function to reset the form fields
function resetFormFields() {
    document.getElementById("item").value = "";
    document.getElementById("unit").value = "";
    document.getElementById("qty").value = "";
    document.getElementById("cost").value = "";
    document.getElementById("discount").value = "0"; // Reset discount to 0
    document.getElementById("tax").value = "0"; // Reset tax to 0
}
</script>
</body>
</html>

<?php
$conn->close();
?>
