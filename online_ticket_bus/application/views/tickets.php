<div class="container" style="display: flex; margin: 30px; padding: 10px;">
    <div class="column" style="flex: 1; margin-right: 10px;">
        <h1 class="h3 mb-0 text-gray-800">Ticket Details</h1>
        <div class="column" style="flex: 0 0 200px; margin-right: 10px; margin-top: 10px;">
            <form action="<?php echo base_url(). 'tickets/find_bus'?>" method="post">
                <div class="form-group">
                    <label>Date</label>
                    <input type="date" name="date" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>From</label>
                    <select name="from" class="form-control" required>
                        <option value="">Select a Route</option>
                        <option value="Jakarta">Jakarta</option>
                        <option value="Surabaya">Surabaya</option>
                        <option value="Bandung">Bandung</option>
                        <option value="Malang">Malang</option>
                        <option value="Sidoarjo">Sidoarjo</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>To</label>
                    <select name="to" class="form-control" required>
                        <option value="">Select a Route</option>
                        <option value="Jakarta">Jakarta</option>
                        <option value="Surabaya">Surabaya</option>
                        <option value="Bandung">Bandung</option>
                        <option value="Malang">Malang</option>
                        <option value="Sidoarjo">Sidoarjo</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Find</button>
                </div>
            </form>
        </div>
    </div>

    <div class="column" style="flex: 1;">
        <h1 class="h3 mb-4 text-gray-800">Available Buses:</h1>
        <?php if (!empty($tickets)): ?>
            <?php
            foreach($tickets as $ticket) : ?>
                <div class="card mb-3" style="width: 550px">
                    <div class="card-header">
                        <div class="card-bus-name"><b><?php echo $ticket->name ?></b></div>
                    </div>
                    <div class="card-body">
                        <div class="bus-info">
                            <div class="row">
                                <div class="col-5">
                                    <img src="<?php echo base_url().'/images/'. $ticket->image ?>" style="width: 200px; height: auto;">
                                </div>
                                <div class="col-5">
                                    <div class="d-flex flex-column justify-content-center h-100">
                                        <div class="bus-date"><?php echo date('d/m/Y', strtotime($ticket->date)); ?></div>
                                        <div class="bus-time"><?php echo $ticket->time ?> - <?php echo $ticket->arrival_time ?></div>
                                        <div class="bus-price">Rp <?php echo number_format($ticket->base_price, 0, '.', '.') ?>/pax</div>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="d-flex flex-column justify-content-center h-100">
                                        <?php echo anchor('tickets/buy_ticket/' .$ticket->id, '<div class="btn btn-primary btn-sm">BUY</i></div>')?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>        
        </div>
    </div>
</div>
