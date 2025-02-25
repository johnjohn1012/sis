<?php
include '../includes/connection.php'; // Adjust the path as needed

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Initialize response array
$resp = array('status' => 'failed', 'msg' => '');

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Generate PO code if ID is empty (new PO)
    if (empty($_POST['id'])) {
        $prefix = "PO";
        $code = sprintf("%'.04d", 1);
        while (true) {
            $check_code = $conn->query("SELECT * FROM `purchase_order_list` WHERE po_code = '" . $prefix . '-' . $code . "'")->num_rows;
            if ($check_code > 0) {
                $code = sprintf("%'.04d", $code + 1);
            } else {
                break;
            }
        }
        $_POST['po_code'] = $prefix . "-" . $code;
    }

    // Extract POST data
    extract($_POST);

    // Prepare data for SQL query
    $data = "";
    foreach ($_POST as $k => $v) {
        if (!in_array($k, array('id', 'item_id', 'qty', 'price', 'unit', 'total', 'discount_perc', 'tax_perc')) && !is_array($_POST[$k])) {
            if (!is_numeric($v)) {
                $v = $conn->real_escape_string($v);
            }
            if (!empty($data)) {
                $data .= ", ";
            }
            $data .= "`{$k}` = '{$v}'";
        }
    }

    // Insert or update purchase order
    if (empty($id)) {
        $sql = "INSERT INTO `purchase_order_list` SET {$data}";
    } else {
        $sql = "UPDATE `purchase_order_list` SET {$data} WHERE id = '{$id}'";
    }

    $save = $conn->query($sql);
    if ($save) {
        $resp['status'] = 'success';
        if (empty($id)) {
            $po_id = $conn->insert_id;
        } else {
            $po_id = $id;
        }
        $resp['id'] = $po_id;

        // Save PO items
        $data = "";
        foreach ($item_id as $k => $v) {
            if (!empty($data)) {
                $data .= ", ";
            }
            $data .= "('{$po_id}', '{$v}', '{$qty[$k]}', '{$price[$k]}', '{$unit[$k]}', '{$total[$k]}')";
        }

        if (!empty($data)) {
            // Delete existing items for this PO
            $conn->query("DELETE FROM `po_items` WHERE po_id = '{$po_id}'");

            // Insert new items
            $save_items = $conn->query("INSERT INTO `po_items` (`po_id`, `item_id`, `quantity`, `price`, `unit`, `total`) VALUES {$data}");
            if (!$save_items) {
                $resp['status'] = 'failed';
                if (empty($id)) {
                    $conn->query("DELETE FROM `purchase_order_list` WHERE id = '{$po_id}'");
                }
                $resp['msg'] = 'PO items failed to save. Error: ' . $conn->error;
            }
        }
    } else {
        $resp['status'] = 'failed';
        $resp['msg'] = 'An error occurred. Error: ' . $conn->error;
    }
} else {
    $resp['msg'] = 'Invalid request method.';
}

// Return JSON response
header('Content-Type: application/json');
echo json_encode($resp);
?>