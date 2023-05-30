<div class="container-fluid">
    <button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#add_new_bus"><i class="fas fa-plus fa-sm"></i>Add New Bus</button>
    
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>COMPANY</th>
            <th>TYPE</th>
            <th>PLATE NUMBER</th>
            <th>CAPACITY</th>
            <th colspan="3">ACTION</th>

            <?php
            foreach($buses as $bus) : ?>

            <tr>
                <td style="text-align: center;"><?php echo $bus->id ?></td>
                <td><?php echo $bus->name ?></td>
                <td style="text-align: center;"><?php echo $bus->type ?></td>
                <td style="text-align: center;"><?php echo $bus->plate_number ?></td>
                <td style="text-align: center;"><?php echo $bus->capacity ?></td>
                <td style="text-align: center; vertical-align: middle;"><?php echo anchor('admin/buses/edit_bus/' .$bus->id, '<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>')?></td>
                <td style="text-align: center; vertical-align: middle;"><?php echo anchor('admin/buses/delete/' .$bus->id, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>')?></td>
            </tr>

            <?php endforeach; ?>

        </tr>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="add_new_bus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add A New Bus</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url(). 'admin/buses/add_bus'?>" method="post">
            <div class="form-group">
                <label>Company ID</label>
                <input type="number" name="company_id" min="0" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Type</label>
                <select name="type" class="form-control" required>
                    <option value="">Select a type</option>
                    <option value="Small">Small</option>
                    <option value="Medium">Medium</option>
                    <option value="Large">Large</option>
                </select>
            </div>
            <div class="form-group">
                <label>Plate Number</label>
                <input type="text" name="plate_number" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Capacity</label>
                <input type="number" name="capacity" min="0" class="form-control" required>
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