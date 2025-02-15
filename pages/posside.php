<!-- SIDE PART NA SUMMARY -->
        <div class="card-body col-md-3">
        <?php   
        if(!empty($_SESSION['pointofsale'])):  
            
             $total = 0;  
        
             foreach($_SESSION['pointofsale'] as $key => $product): 
        ?>  
        <?php  
                  $total = $total + ($product['quantity'] * $product['price']);

                  $lessvat = 0;       // No VAT amount
                  $netvat  = $total;  // Keep total as is (no VAT exclusion)
                  $addvat  = $total;  // No added VAT yet


                //  future adding tax vat
             //     $lessvat = $total / 1.12 * 0.12;  VAT amount
               //   $netvat  = $total / 1.12;         Net of VAT (VAT-exclusive price)
                //  $addvat  = $netvat * 1.12;         VAT-inclusive price (original total)
                  

             endforeach;

//DROPDOWN FOR CUSTOMER
$sql = "SELECT CUST_ID, FIRST_NAME, LAST_NAME
        FROM customer
        order by FIRST_NAME asc";
$res = mysqli_query($db, $sql) or die ("Error SQL: $sql");

$opt = "<select class='form-control'  style='border-radius: 0px;' name='customer' required>
        <option value='' disabled selected hidden>Select Customer</option>";
  while ($row = mysqli_fetch_assoc($res)) {
    $opt .= "<option value='".$row['CUST_ID']."'>".$row['FIRST_NAME'].' '.$row['LAST_NAME']."</option>";
  }
$opt .= "</select>";
// END OF DROP DOWN
        ?>  
<?php 
          echo "Today's date is : "; 
          $today = date("Y-m-d H:i a"); 
          echo $today; 
?> 
          <input type="hidden" name="date" value="<?php echo $today; ?>">
          <div class="form-group row text-left mb-3">
            <div class="col-sm-12 text-primary btn-group">
            <?php echo $opt; ?>
            <a  href="#" data-toggle="modal" data-target="#poscustomerModal" type="button" class="btn btn-primary bg-gradient-primary" style="border-radius: 0px;"><i class="fas fa-fw fa-plus"></i></a>
            </div>

          </div>
          <div class="form-group row mb-2">

            <div class="col-sm-5 text-left text-primary py-2">
              <h6>
                Subtotal
              </h6>
            </div>
            <div class="col-sm-7">
              <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <span class="input-group-text">₱</span>
                </div>
                <input type="text" class="form-control text-right " value="<?php echo number_format($total, 2); ?>" readonly name="subtotal">
              </div>
            </div>

          </div>
          <div class="form-group row mb-2">

            <div class="col-sm-5 text-left text-primary py-2">
              <h6>
                Less VAT
              </h6>
            </div>

            <div class="col-sm-7">
              <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <span class="input-group-text">₱</span>
                </div>
                <input type="text" class="form-control text-right " value="<?php echo number_format($lessvat, 2); ?>" readonly name="lessvat">
              </div>
            </div>

          </div>
          <div class="form-group row mb-2">

            <div class="col-sm-5 text-left text-primary py-2">
              <h6>
                Net of VAT
              </h6>
            </div>

            <div class="col-sm-7">
              <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <span class="input-group-text">₱</span>
                </div>
                <input type="text" class="form-control text-right " value="<?php echo number_format($netvat, 2); ?>" readonly name="netvat">
              </div>
            </div>

          </div> 
          <div class="form-group row mb-2">

            <div class="col-sm-5 text-left text-primary py-2">
              <h6>
                Add VAT
              </h6>
            </div>

            <div class="col-sm-7">
              <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <span class="input-group-text">₱</span>
                </div>
                <input type="text" class="form-control text-right " value="<?php echo number_format($addvat, 2); ?>" readonly name="addvat">
              </div>
            </div>

          </div>
          <div class="form-group row text-left mb-2">

            <div class="col-sm-5 text-primary">
              <h6 class="font-weight-bold py-2">
                Total
              </h6>
            </div>

            <div class="col-sm-7">
              <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <span class="input-group-text">₱</span>
                </div>
                <input type="text" class="form-control text-right " value="<?php echo number_format($total, 2); ?>" readonly name="total">
              </div>
            </div>

          </div>
          <?php endif; ?>       
          <button type="button" class="btn btn-block btn-success" data-toggle="modal" data-target="#posMODAL">SUBMIT</button>



       
 <!-- Modal POS -->
<div class="modal fade" id="posMODAL" tabindex="-1" role="dialog" aria-labelledby="POS" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">SUMMARY</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group row text-left mb-2">
          <div class="col-sm-12 text-center">
            <h3 class="py-0">GRAND TOTAL</h3>
            <h3 class="font-weight-bold py-3 bg-light">
              ₱ <span id="grandTotal"><?php echo number_format($total, 2); ?></span>
            </h3>
          </div>
        </div>

        <!-- Cash Input -->
        <div class="col-sm-12 mb-2">
          <div class="input-group mb-2">
            <div class="input-group-prepend">
              <span class="input-group-text">₱</span>
            </div>
            <input class="form-control text-right" id="txtNumber" onkeypress="return isNumberKey(event)" type="text" name="cash" placeholder="ENTER CASH" required oninput="calculateChange()">
          </div>
        </div>

        <!-- Change Display -->
        <div class="col-sm-12 text-center mt-3">
          <h4>CHANGE</h4>
          <h3 class="font-weight-bold py-3 bg-light" id="changeBox">
            ₱ <span id="changeAmount">0.00</span>
          </h3>
        </div>

        <!-- Error Message (Hidden Initially) -->
        <div class="col-sm-12 text-center mt-3">
          <h4 id="errorMsg" class="text-danger font-weight-bold" style="display: none;">Payment Not Enough</h4>
        </div>

      </div>
      
      <div class="modal-footer">
        <button type="submit" id="paymentBtn" class="btn btn-primary btn-block" disabled>PROCEED TO PAYMENT</button>
      </div>
    </div>
  </div>
</div>
<!-- END OF Modal -->






        </form>
      </div> <!-- END OF CARD BODY -->

     </div>


  
<script>
  function calculateChange() {
    let grandTotal = parseFloat(document.getElementById("grandTotal").innerText.replace(/,/g, ""));
    let cashGiven = parseFloat(document.getElementById("txtNumber").value);
    let changeBox = document.getElementById("changeBox");
    let changeAmount = document.getElementById("changeAmount");
    let errorMsg = document.getElementById("errorMsg");
    let paymentBtn = document.getElementById("paymentBtn");

    if (!isNaN(cashGiven)) {
      let change = cashGiven - grandTotal;

      if (change < 0) {
        // If cash is not enough, show error and disable button
        errorMsg.style.display = "block";
        changeBox.style.display = "none";
        paymentBtn.disabled = true;
      } else {
        // If cash is enough, show change and enable button
        errorMsg.style.display = "none";
        changeBox.style.display = "block";
        changeAmount.innerText = change.toFixed(2);
        paymentBtn.disabled = false;
      }
    } else {
      // Reset display if input is not valid
      changeAmount.innerText = "0.00";
      errorMsg.style.display = "none";
      changeBox.style.display = "block";
      paymentBtn.disabled = true;
    }
  }

  // Allow only numbers in input
  function isNumberKey(evt) {
    let charCode = evt.which ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57) && charCode !== 46) return false;
    return true;
  }
</script>
