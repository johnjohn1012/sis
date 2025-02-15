<?php
include 'includes/connection.php';
include 'includes/sidebar.php';
?>

<div class="container" style="max-width: 1800px; margin: 20px auto; padding: 20px; background-color: #f9f9f9; border-radius: 8px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);">
    <div class="header" style="font-size: 24px; font-weight: bold; text-align: center; padding-bottom: 20px;">Create New Purchase Order</div>
    
    <form method="POST" action="process_purchase_order.php" style="display: flex; flex-direction: column; gap: 20px;">

        <div class="form-group" style="display: flex; flex-direction: column; gap: 5px;">
            <label for="po_code" style="font-size: 16px; font-weight: 600;">P.O. Code</label>
            <input type="text" id="po_code" name="po_code" required style="padding: 10px; font-size: 14px; border: 1px solid #ddd; border-radius: 4px;">
        </div>
        
        <div class="form-group" style="display: flex; flex-direction: column; gap: 5px;">
            <label for="supplier" style="font-size: 16px; font-weight: 600;">Supplier</label>
            <select id="supplier" name="supplier" required style="padding: 10px; font-size: 14px; border: 1px solid #ddd; border-radius: 4px;">
                <option value="Supplier 102">Supplier 102</option>
                <option value="Supplier 103">Supplier 103</option>
                <option value="Supplier 104">Supplier 104</option>
            </select>
        </div>

        <div class="form-group" style="display: flex; flex-direction: column; gap: 5px;">
            <label for="item" style="font-size: 16px; font-weight: 600;">Item</label>
            <select id="item" name="item" required style="padding: 10px; font-size: 14px; border: 1px solid #ddd; border-radius: 4px;">
                <option value="Item 102">Item 102</option>
                <option value="Item 103">Item 103</option>
                <option value="Item 104">Item 104</option>
            </select>
        </div>

        <div class="form-group" style="display: flex; flex-direction: column; gap: 5px;">
            <label for="unit" style="font-size: 16px; font-weight: 600;">Unit</label>
            <input type="text" id="unit" name="unit" required style="padding: 10px; font-size: 14px; border: 1px solid #ddd; border-radius: 4px;">
        </div>

        <div class="form-group" style="display: flex; flex-direction: column; gap: 5px;">
            <label for="quantity" style="font-size: 16px; font-weight: 600;">Qty</label>
            <input type="text" id="quantity" name="quantity" required style="padding: 10px; font-size: 14px; border: 1px solid #ddd; border-radius: 4px;">
        </div>

        <button type="button" class="btn" id="add-item-btn" style="padding: 10px 20px; background-color: #007bff; color: white; border: none; border-radius: 4px; cursor: pointer;">Add to List</button>
        
        <table class="item-table" style="width: 100%; border-collapse: collapse; margin-top: 20px;">
            <thead>
                <tr>
                    <th style="border: 1px solid #ddd; padding: 10px;">Qty</th>
                    <th style="border: 1px solid #ddd; padding: 10px;">Unit</th>
                    <th style="border: 1px solid #ddd; padding: 10px;">Item</th>
                    <th style="border: 1px solid #ddd; padding: 10px;">Cost</th>
                    <th style="border: 1px solid #ddd; padding: 10px;">Sub Total</th>
                    <th style="border: 1px solid #ddd; padding: 10px;">Discount %</th>
                    <th style="border: 1px solid #ddd; padding: 10px;">Tax %</th>
                    <th style="border: 1px solid #ddd; padding: 10px;">Total</th>
                </tr>
            </thead>
            <tbody id="items-list">
                <!-- Item rows will be added here -->
            </tbody>
        </table>

        <div class="remarks form-group" style="display: flex; flex-direction: column; gap: 5px;">
            <label for="remarks" style="font-size: 16px; font-weight: 600;">Remarks</label>
            <textarea id="remarks" name="remarks" style="padding: 10px; font-size: 14px; border: 1px solid #ddd; border-radius: 4px;"></textarea>
        </div>

        <div class="footer" style="display: flex; justify-content: flex-end; gap: 20px; margin-top: 20px;">
            <button type="submit" class="btn" style="padding: 10px 20px; background-color: #28a745; color: white; border: none; border-radius: 4px; cursor: pointer;">Save</button>
            <button type="button" class="btn" style="padding: 10px 20px; background-color: #dc3545; color: white; border: none; border-radius: 4px; cursor: pointer;">Cancel</button>
        </div>
    </form>

    <!-- List of Purchase Orders Table -->
    <div class="purchase-order-list" style="margin-top: 40px;">
        <div class="table-header" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px;">
            <span style="font-size: 18px; font-weight: bold;">List of Purchase Orders</span>
         <!--   <button style="padding: 5px 10px; background-color: #007bff; color: white; border: none; border-radius: 4px; cursor: pointer;">+ Create New</button> -->
        </div>
        <div style="display: flex; justify-content: space-between; margin-bottom: 20px;">
        <div style="font-size: 16px; font-weight: 600;">
            <label for="show-entries" style="margin-right: 10px;">Show</label>
            <select id="show-entries" style="padding: 5px 10px; border-radius: 4px;">
                <option value="10">10 entries</option>
                <option value="25">25 entries</option>
                <option value="50">50 entries</option>
            </select>
            <span style="margin-left: 10px;">entries</span>
        </div>
        <input type="text" placeholder="Search" style="padding: 5px 10px; border-radius: 4px; border: 1px solid #ddd;">
    </div>

        <table class="purchase-order-table" style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr>
                    <th style="border: 1px solid #ddd; padding: 10px;">#</th>
                    <th style="border: 1px solid #ddd; padding: 10px;">Date Created</th>
                    <th style="border: 1px solid #ddd; padding: 10px;">PO Code</th>
                    <th style="border: 1px solid #ddd; padding: 10px;">Supplier</th>
                    <th style="border: 1px solid #ddd; padding: 10px;">Items</th>
                    <th style="border: 1px solid #ddd; padding: 10px;">Status</th>
                    <th style="border: 1px solid #ddd; padding: 10px;">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="border: 1px solid #ddd; padding: 10px;">1</td>
                    <td style="border: 1px solid #ddd; padding: 10px;">2025-02-15 12:43</td>
                    <td style="border: 1px solid #ddd; padding: 10px;">PO-0006</td>
                    <td style="border: 1px solid #ddd; padding: 10px;">Supplier 102</td>
                    <td style="border: 1px solid #ddd; padding: 10px;">1</td>
                    <td style="border: 1px solid #ddd; padding: 10px;"><span style="background-color: #007bff; color: white; padding: 5px;">Pending</span></td>
                    <div class="dropdown" style="position: relative;">
                        <button class="dropdown-btn" style="background-color: #007bff; color: white; padding: 5px 10px; border: none; border-radius: 4px; cursor: pointer;">
                            Action <span style="font-size: 12px; margin-left: 5px;">▼</span>
                        </button>
                        <div class="dropdown-menu" style="position: absolute; top: 100%; left: 0; background-color: white; border: 1px solid #ddd; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); width: 100%; display: none;">
                            <a href="#" class="dropdown-item" style="display: block; padding: 8px 10px; color: #333; text-decoration: none; font-size: 14px;">View</a>
                            <a href="#" class="dropdown-item" style="display: block; padding: 8px 10px; color: #007bff; text-decoration: none; font-size: 14px;">Edit</a>
                            <a href="#" class="dropdown-item" style="display: block; padding: 8px 10px; color: #dc3545; text-decoration: none; font-size: 14px;">Delete</a>
                        </div>
                    </div>
                </tr>
                <tr>
                    <td style="border: 1px solid #ddd; padding: 10px;">2</td>
                    <td style="border: 1px solid #ddd; padding: 10px;">2025-02-13 21:11</td>
                    <td style="border: 1px solid #ddd; padding: 10px;">PO-0005</td>
                    <td style="border: 1px solid #ddd; padding: 10px;">Supplier 102</td>
                    <td style="border: 1px solid #ddd; padding: 10px;">1</td>
                    <td style="border: 1px solid #ddd; padding: 10px;"><span style="background-color: #28a745; color: white; padding: 5px;">Received</span></td>
                    <div class="dropdown" style="position: relative;">
                        <button class="dropdown-btn" style="background-color: #007bff; color: white; padding: 5px 10px; border: none; border-radius: 4px; cursor: pointer;">
                            Action <span style="font-size: 12px; margin-left: 5px;">▼</span>
                        </button>
                        <div class="dropdown-menu" style="position: absolute; top: 100%; left: 0; background-color: white; border: 1px solid #ddd; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); width: 100%; display: none;">
                            <a href="#" class="dropdown-item" style="display: block; padding: 8px 10px; color: #333; text-decoration: none; font-size: 14px;">View</a>
                            <a href="#" class="dropdown-item" style="display: block; padding: 8px 10px; color: #007bff; text-decoration: none; font-size: 14px;">Edit</a>
                            <a href="#" class="dropdown-item" style="display: block; padding: 8px 10px; color: #dc3545; text-decoration: none; font-size: 14px;">Delete</a>
                        </div>
                    </div>
                </tr>
                <!-- Add other rows similarly -->
            </tbody>
        </table>

        <div class="pagination" style="margin-top: 20px; text-align: right;">
            <span>Showing 1 to 6 of 6 entries</span>
        </div>
        <div style="margin-top: -35px; text-align: right;">
            <button style="padding: 5px 10px; background-color: #f8f9fa; color: #007bff; border: 1px solid #ddd; border-radius: 4px;">Previous</button>
            <button style="padding: 5px 10px; background-color: #f8f9fa; color: #007bff; border: 1px solid #ddd; border-radius: 4px;">1</button>
            <button style="padding: 5px 10px; background-color: #f8f9fa; color: #007bff; border: 1px solid #ddd; border-radius: 4px;">Next</button>
        </div>



    </div>
</div>

<?php
include 'includes/footer.php';
?>

<script>
    document.getElementById('add-item-btn').addEventListener('click', function() {
        var item = document.getElementById('item').value;
        var unit = document.getElementById('unit').value;
        var qty = document.getElementById('quantity').value;

        var table = document.getElementById('items-list');
        var row = table.insertRow();
        row.innerHTML = `
            <td style="border: 1px solid #ddd; padding: 10px;">${qty}</td>
            <td style="border: 1px solid #ddd; padding: 10px;">${unit}</td>
            <td style="border: 1px solid #ddd; padding: 10px;">${item}</td>
            <td style="border: 1px solid #ddd; padding: 10px;"><input type="text" name="cost[]" value="0" class="cost" style="width: 100%; padding: 5px;"></td>
            <td style="border: 1px solid #ddd; padding: 10px;"><input type="text" name="sub_total[]" value="0" class="sub-total" disabled style="width: 100%; padding: 5px;"></td>
            <td style="border: 1px solid #ddd; padding: 10px;"><input type="text" name="discount[]" value="0" class="discount" style="width: 100%; padding: 5px;"></td>
            <td style="border: 1px solid #ddd; padding: 10px;"><input type="text" name="tax[]" value="0" class="tax" style="width: 100%; padding: 5px;"></td>
            <td style="border: 1px solid #ddd; padding: 10px;"><input type="text" name="total[]" value="0" class="total" disabled style="width: 100%; padding: 5px;"></td>
        `;

        document.getElementById('unit').value = '';
        document.getElementById('quantity').value = '';
    });


    

    // Toggle the visibility of the dropdown menu
    const dropdownBtns = document.querySelectorAll('.dropdown-btn');

    dropdownBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const dropdownMenu = this.nextElementSibling;
            const isVisible = dropdownMenu.style.display === 'block';
            // Hide all dropdown menus first
            document.querySelectorAll('.dropdown-menu').forEach(menu => menu.style.display = 'none');
            // If it wasn't visible, show it
            if (!isVisible) {
                dropdownMenu.style.display = 'block';
            }
        });
    });

    // Close dropdowns when clicked outside
    window.addEventListener('click', function(event) {
        if (!event.target.matches('.dropdown-btn')) {
            document.querySelectorAll('.dropdown-menu').forEach(menu => menu.style.display = 'none');
        }
    });
</script>

