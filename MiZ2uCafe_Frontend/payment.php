<?php include('header.php'); // Include common header ?>

<div class="payment-container">
    <h2>Bill Payment</h2>
    <form id="paymentForm" action="process_payment.php" method="POST">
        <!-- Amount Input -->
        <div class="form-group">
            <label>Amount (RM)</label>
            <input type="number" name="amount" min="0.01" step="0.01" required 
                   class="form-control" placeholder="10.00">
        </div>

        <!-- Payment Method Selection -->
        <div class="form-group">
            <label>Payment Method</label>
            <select name="method" required class="form-control">
                <option value="">-- Select --</option>
                <option value="credit_card">Credit Card</option>
                <option value="touch_n_go">Touch 'n Go</option>
            </select>
        </div>

        <!-- Dynamic Fields (English comments only) -->
        <div id="creditCardSection" class="payment-details" style="display:none;">
            <!-- Credit Card Fields -->
            <div class="form-group">
                <label>Card Number</label>
                <input type="text" name="card_number" class="form-control" 
                       placeholder="4111 1111 1111 1111" pattern="\d{16}">
            </div>
        </div>

        <div id="tngSection" class="payment-details" style="display:none;">
            <!-- Touch 'n Go Fields -->
            <div class="form-group">
                <label>Phone Number</label>
                <input type="tel" name="tng_phone" class="form-control" 
                       placeholder="012-3456789" pattern="01[0-9]-?[0-9]{7,8}">
            </div>
        </div>

        <!-- Payment Remarks -->
        <div class="form-group">
            <label>Remarks (Optional)</label>
            <textarea name="remarks" class="form-control" 
                      placeholder="e.g., Table number, special requests"></textarea>
        </div>

        <button type="submit" class="btn btn-pay">Confirm Payment</button>
    </form>
</div>

<script>
// Show/hide payment method details
document.querySelector('[name="method"]').addEventListener('change', function() {
    const sections = document.querySelectorAll('.payment-details');
    sections.forEach(section => section.style.display = 'none');
    
    if(this.value === 'credit_card') {
        document.getElementById('creditCardSection').style.display = 'block';
    } else if(this.value === 'touch_n_go') {
        document.getElementById('tngSection').style.display = 'block';
    }
});
</script>

<?php include('footer.php'); ?>