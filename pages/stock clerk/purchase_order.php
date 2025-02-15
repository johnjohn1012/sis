<?php

include 'includes/connection.php';

include 'includes/sidebar.php';  ?>



<div class="container">
    <div class="header">Create New Purchase Order</div>
    
    <form method="POST" action="process_purchase_order.php">
        <!-- P.O. Code -->
        <div class="form-group">
            <label for="po_code">P.O. Code</label>
            <input type="text" id="po_code" name="po_code" required>
        </div>
        
        <!-- Supplier -->
        <div class="form-group">
            <label for="supplier">Supplier</label>
            <select id="supplier" name="supplier" required>
                <option value="Supplier 102">Supplier 102</option>
                <option value="Supplier 103">Supplier 103</option>
                <option value="Supplier 104">Supplier 104</option>
            </select>
        </div>

        <!-- Item Form -->
        <div class="form-group">
            <label for="item">Item</label>
            <select id="item" name="item" required>
                <option value="Item 102">Item 102</option>
                <option value="Item 103">Item 103</option>
                <option value="Item 104">Item 104</option>
            </select>
        </div>

        <div class="form-group">
            <label for="unit">Unit</label>
            <input type="text" id="unit" name="unit" required>
        </div>

        <div class="form-group">
            <label for="quantity">Qty</label>
            <input type="text" id="quantity" name="quantity" required>
        </div>

        <button type="button" class="btn" id="add-item-btn">Add to List</button>
        
        <!-- Items Table -->
        <table class="item-table">
            <thead>
                <tr>
                    <th>Qty</th>
                    <th>Unit</th>
                    <th>Item</th>
                    <th>Cost</th>
                    <th>Sub Total</th>
                    <th>Discount %</th>
                    <th>Tax %</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody id="items-list">
                <!-- Item rows will be added here -->
            </tbody>
        </table>

        <!-- Remarks -->
        <div class="remarks form-group">
            <label for="remarks">Remarks</label>
            <textarea id="remarks" name="remarks"></textarea>
        </div>

        <!-- Footer Buttons -->
        <div class="footer">
            <button type="submit" class="btn">Save</button>
            <button type="button" class="btn">Cancel</button>
        </div>
    </form>


                    <?php
                include 'includes/footer.php';
                ?>
</div>

<script>
    // Add item to the table when the button is clicked
    document.getElementById('add-item-btn').addEventListener('click', function() {
        var item = document.getElementById('item').value;
        var unit = document.getElementById('unit').value;
        var qty = document.getElementById('quantity').value;

        var table = document.getElementById('items-list');
        var row = table.insertRow();
        row.innerHTML = `
            <td>${qty}</td>
            <td>${unit}</td>
            <td>${item}</td>
            <td><input type="text" name="cost[]" value="0" class="cost"></td>
            <td><input type="text" name="sub_total[]" value="0" class="sub-total" disabled></td>
            <td><input type="text" name="discount[]" value="0" class="discount"></td>
            <td><input type="text" name="tax[]" value="0" class="tax"></td>
            <td><input type="text" name="total[]" value="0" class="total" disabled></td>
        `;

        // Clear input fields
        document.getElementById('unit').value = '';
        document.getElementById('quantity').value = '';
    });

    // Additional JavaScript to calculate totals, discounts, taxes, etc. can be added here
</script>



