<div class="container-fluid">
    <h3>PAYMENT CONFIRMATION</h3>
    <div class="container" style="display: flex; padding: 0; margin: 0;">
        <?php foreach($ticket as $ticket) : ?>
            <div class="column" style="flex: 1;">
                <img src="<?php echo base_url().'/images/'. $ticket->image ?>" width="500" height="340" style="border: 2px double blue;">
            </div>
            <div class="column" style="flex: 1;">
                <h5 class="element"><span class="ticket-detail">Provider</span> <?php echo ': '. $ticket->name ?></h5>
                <h5 class="element"><span class="ticket-detail">From</span> <?php echo ': '. $ticket->route_from ?></h5>
                <h5 class="element"><span class="ticket-detail">To</span> <?php echo ': '. $ticket->route_to ?></h5>
                <h5 class="element"><span class="ticket-detail">Date</span> <?php echo ': '. $ticket->date ?></h5>
                <h5 class="element"><span class="ticket-detail">Departure Time</span> <?php echo ': '. $ticket->time ?></h5>
                <h5 class="element"><span class="ticket-detail">Arrival Time</span> <?php echo ': '. $ticket->arrival_time ?></h5>
                <h5 class="element"><span class="ticket-detail">Price/pax</span> <?php echo ': Rp '. number_format($ticket->base_price, 0, '.', '.') ?></h5>
                <form method="post" action="<?php echo base_url(). 'tickets/insert' ?>">
                    <div class="for-group" style="display: flex; align-items: center;">
                        <span class="ticket-detail">
                            <h5>Passenger Number</h5>
                        </span>
                        <input type="hidden" name="schedule_id" class="form-control" value="<?php echo $ticket->schedule_id?>">
                        <input type="number" id="quantityInput" min="1" name="ticket_number" required class="form-control" style="width: 80px; margin-left: 10px;">
                    </div>
                    <h4 class="element"><span class="ticket-detail"><strong>Total Price</span><span id="priceDisplay"></span></strong></h5>
                    <div class="form-group">
                        <h5 for="payment_method">Payment Method:</h5>
                        <div class="radio-group">
                            <label>
                                <input type="radio" name="payment_method" value="BCA" required> BCA
                            </label>
                            <label>
                                <input type="radio" name="payment_method" value="Mandiri" required> Mandiri
                            </label>
                            <label>
                                <input type="radio" name="payment_method" value="OVO" required> OVO
                            </label>
                            <label>
                                <input type="radio" name="payment_method" value="GoPay" required> GoPay
                            </label>
                            <label>
                                <input type="radio" name="payment_method" value="DANA" required> DANA
                            </label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm">Buy Now</button>
                </form>
            </div>
            <script>
                const quantityInput = document.getElementById('quantityInput');
                const priceDisplay = document.getElementById('priceDisplay');
                const pricePerItem = <?php echo $ticket->base_price ?>;
                quantityInput.addEventListener('input', updatePrice);
                function updatePrice() {
                    const quantity = quantityInput.value;
                    const totalPrice = (quantity * pricePerItem);
                    const price = formatPrice(totalPrice);
                    priceDisplay.textContent = '\u00A0: Rp ' + price;
                    priceDisplay.classList.add('ticket-detail');
                }
                function formatPrice(price) {
                    return price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.'); // Use dot as the separator
                }
                updatePrice();
            </script>
        <?php endforeach; ?>
    </div>
</div>
<style>
.element {
    margin-top: 10px;
}

.ticket-detail {
    width: 200px;
    display: inline-block;
}
.radio-group label {
    display: inline-block;
    margin-right: 10px;
}
</style>