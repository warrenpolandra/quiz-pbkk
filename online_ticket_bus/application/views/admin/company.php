<div class="container-fluid">
    <button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#add_new_company"><i class="fas fa-plus fa-sm"></i>Add New Company</button>
    
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>FLEET NUMBER</th>
            <th>IMAGE</th>
            <th colspan="3">ACTION</th>

            <?php
            foreach($companies as $company) : ?>

            <tr>
                <td style="text-align: center; vertical-align: middle;"><?php echo $company->id ?></td>
                <td style="vertical-align: middle;"><?php echo $company->name ?></td>
                <td style="text-align: center; vertical-align: middle;"><?php echo $company->fleet_number ?></td>
                <td style="text-align: center; vertical-align: middle;"><img src="<?php echo base_url().'/images/'. $company->image ?>" style="width: 200px; height: auto;"></td>
                <td style="text-align: center; vertical-align: middle;"><?php echo anchor('admin/company/edit_company/' .$company->id, '<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>')?></td>
                <td style="text-align: center; vertical-align: middle;"><?php echo anchor('admin/company/delete/' .$company->id, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>')?></td>
            </tr>

            <?php endforeach; ?>

        </tr>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="add_new_company" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add A New Company</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url(). 'admin/company/add_company'?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Fleet_number</label>
                <input type="number" name="fleet_number" min="0" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Image</label>
                <input type="file" name="image" min="0" class="form-control" required>
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