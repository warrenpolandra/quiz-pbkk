<div class="container-fluid">
    <button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#add_new_route"><i class="fas fa-plus fa-sm"></i>Add New Route</button>
    
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>FROM</th>
            <th>TO</th>
            <th>DURATION</th>
            <th>BASE PRICE</th>
            <th colspan="3">ACTION</th>

            <?php
            foreach($routes as $route) : ?>

            <tr>
                <td style="text-align: center;"><?php echo $route->id ?></td>
                <td><?php echo $route->route_from ?></td>
                <td><?php echo $route->route_to ?></td>
                <td style="text-align: center;"><?php echo $route->duration ?></td>
                <td style="text-align: center;"><?php echo $route->base_price ?></td>
                <td style="text-align: center; vertical-align: middle;"><?php echo anchor('admin/routes/edit_route/' .$route->id, '<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>')?></td>
                <td style="text-align: center; vertical-align: middle;"><?php echo anchor('admin/routes/delete/' .$route->id, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>')?></td>
            </tr>

            <?php endforeach; ?>

        </tr>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="add_new_route" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add A New Route</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url(). 'admin/routes/add_route'?>" method="post">
            <div class="form-group">
                <label>From</label>
                <input type="text" name="route_from" class="form-control" required>
            </div>
            <div class="form-group">
                <label>To</label>
                <input type="text" name="route_to" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Duration</label>
                <input type="time" name="duration" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Base Price</label>
                <input type="number" name="base_price" class="form-control" required>
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