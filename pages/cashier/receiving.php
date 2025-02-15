<?php
include 'includes/connection.php';
include 'includes/sidebar.php';
?>

<div class="container" style="max-width: 1800px; margin: 20px auto; padding: 20px; background-color: #f9f9f9; border-radius: 8px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);">
    <div class="header" style="font-size: 24px; font-weight: bold; text-align: center; padding-bottom: 20px;">List of Received Orders</div>

    <!-- Search and Filter Section -->
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

    <!-- Received Orders Table -->
    <table class="received-orders-table" style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr>
                <th style="border: 1px solid #ddd; padding: 10px;">#</th>
                <th style="border: 1px solid #ddd; padding: 10px;">Date Created</th>
                <th style="border: 1px solid #ddd; padding: 10px;">From</th>
                <th style="border: 1px solid #ddd; padding: 10px;">Items</th>
                <th style="border: 1px solid #ddd; padding: 10px;">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="border: 1px solid #ddd; padding: 10px;">1</td>
                <td style="border: 1px solid #ddd; padding: 10px;">2025-02-13 21:12</td>
                <td style="border: 1px solid #ddd; padding: 10px;">PO-0005</td>
                <td style="border: 1px solid #ddd; padding: 10px;">1</td>
                <td style="border: 1px solid #ddd; padding: 10px;">
                    <!-- Action Dropdown -->
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
                </td>
            </tr>
            <tr>
                <td style="border: 1px solid #ddd; padding: 10px;">2</td>
                <td style="border: 1px solid #ddd; padding: 10px;">2025-02-13 20:55</td>
                <td style="border: 1px solid #ddd; padding: 10px;">PO-0004</td>
                <td style="border: 1px solid #ddd; padding: 10px;">1</td>
                <td style="border: 1px solid #ddd; padding: 10px;">
                    <!-- Action Dropdown -->
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
                </td>
            </tr>
            <!-- Add other rows similarly -->
        </tbody>
    </table>

    <!-- Pagination Section -->
    <div class="pagination" style="margin-top: 20px; text-align: center;">
        <span>Showing 1 to 9 of 9 entries</span>

    </div>

    <div style="margin-top: -35px; text-align: right;">
            <button style="padding: 5px 10px; background-color: #f8f9fa; color: #007bff; border: 1px solid #ddd; border-radius: 4px;">Previous</button>
            <button style="padding: 5px 10px; background-color: #f8f9fa; color: #007bff; border: 1px solid #ddd; border-radius: 4px;">1</button>
            <button style="padding: 5px 10px; background-color: #f8f9fa; color: #007bff; border: 1px solid #ddd; border-radius: 4px;">Next</button>
        </div>

</div>

<?php
include 'includes/footer.php';
?>

<script>
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
