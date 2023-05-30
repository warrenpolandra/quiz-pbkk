<div class="container-fluid">
    <h3><i class="fas fa-edit"></i>EDIT SCHEDULE</h3>

    <?php foreach($schedule as $schedule) : ?>
        <form method="post" action="<?php echo base_url(). 'admin/schedules/update' ?>">
            <div class="for-group">
                <label>Date</label>
                <input type="hidden" name="id" class="form-control" value="<?php echo $schedule->id?>">
                <input type="date" name="date" class="form-control" required value="<?php echo $schedule->date?>">
            </div>

            <div class="for-group">
                <label>Departure Time</label>
                <input type="time" name="time" required class="form-control" value="<?php echo $schedule->time?>">
            </div>

            <div class="for-group">
                <label>Bus ID</label>
                <input type="number" min="0" name="capacity" required class="form-control" value="<?php echo $schedule->bus_id?>">
            </div>

            <div class="for-group">
                <label>Route ID</label>
                <input type="number" min="0" name="capacity" required class="form-control" value="<?php echo $schedule->route_id?>">
            </div>
            <button type="submit" class="btn btn-primary btn-sm mt-3">Save</button>
        </form>
    <?php endforeach; ?>
</div>