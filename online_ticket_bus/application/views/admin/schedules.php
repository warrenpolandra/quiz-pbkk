<div class="container-fluid">
    <button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#add_new_schedule"><i class="fas fa-plus fa-sm"></i>Add New Schedule</button>
    
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>BUS COMPANY</th>
            <th>FROM</th>
            <th>TO</th>
            <th>DATE</th>
            <th>DEPARTURE TIME</th>
            <th>ARRIVAL TIME</th>
            <th>CAPACITY</th>
            <th colspan="3">ACTION</th>

            <?php
            foreach($schedules as $schedule) : ?>

            <tr>
                <td style="text-align: center;"><?php echo $schedule->id ?></td>
                <td><?php echo $schedule->name ?></td>
                <td><?php echo $schedule->route_from ?></td>
                <td><?php echo $schedule->route_to ?></td>
                <td style="text-align: center;"><?php echo date('d/m/Y', strtotime($schedule->date)); ?></td>
                <td style="text-align: center;"><?php echo $schedule->time ?></td>
                <td style="text-align: center;"><?php echo $schedule->arrival_time ?></td>
                <td style="text-align: center;"><?php echo $schedule->capacity ?></td>
                <td style="text-align: center; vertical-align: middle;"><?php echo anchor('admin/schedules/edit_schedule/' .$schedule->id, '<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>')?></td>
                <td style="text-align: center; vertical-align: middle;"><?php echo anchor('admin/schedules/delete/' .$schedule->id, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>')?></td>
            </tr>

            <?php endforeach; ?>

        </tr>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="add_new_schedule" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add A New Schedule</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url(). 'admin/schedules/add_schedule'?>" method="post">
            <div class="form-group">
                <label>Date</label>
                <input type="date" name="date" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Time</label>
                <input type="time" name="time" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Bus ID</label>
                <input type="number" name="bus_id" min="0" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Route ID</label>
                <input type="number" name="route_id" min="0" class="form-control" required>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Add</button>
        </div>
      </form>
    </div>
  </div>
</div>
<style>
  th {
    text-align: center;
  }
</style>