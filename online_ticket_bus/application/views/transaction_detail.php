<div class="container-fluid">
    <h3>TRANSACTION DETAILS</h3>
    <div class="container" style="display: flex; padding: 0; margin: 0;">
        <?php foreach($transactions as $transaction) : ?>
            <div class="column" style="flex: 1;">
                <img src="<?php echo base_url().'/images/'. $transaction->image ?>" width="500" height="340" style="border: 2px double blue;">
            </div>
            <div class="column" style="flex: 1;">
                <h5 class="element"><span class="ticket-detail">Customer</span> <?php echo ': '. $transaction->username ?></h5>
                <h5 class="element"><span class="ticket-detail">Bus Provider</span> <?php echo ': '. $transaction->name ?></h5>
                <h5 class="element"><span class="ticket-detail">From</span> <?php echo ': '. $transaction->route_from ?></h5>
                <h5 class="element"><span class="ticket-detail">To</span> <?php echo ': '. $transaction->route_to ?></h5>
                <h5 class="element"><span class="ticket-detail">Date</span> <?php echo ': '. $transaction->schedule_date ?></h5>
                <h5 class="element"><span class="ticket-detail">Departure Time</span> <?php echo ': '. $transaction->schedule_time ?></h5>
                <h5 class="element"><span class="ticket-detail">Arrival Time</span> <?php echo ': '. $transaction->arrival_time ?></h5>
                <h5 class="element"><span class="ticket-detail">Price/pax</span> <?php echo ': Rp '. number_format($transaction->base_price, 0, '.', '.') ?></h5>
                <h5 class="element"><span class="ticket-detail">Ticket Number</span> <?php echo ': '. $transaction->ticket_number ?></h5>
                <h5 class="element"><span class="ticket-detail">Payment Method</span> <?php echo ': '. $transaction->payment_method ?></h5>
                <h4 class="element"><span class="ticket-detail"><strong>Total Transaction</span><?php echo ': Rp '. number_format($transaction->profit, 0, '.', '.') ?><span></span></strong></h5>
            </div>
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