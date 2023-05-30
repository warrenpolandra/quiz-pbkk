<div class="container-fluid">
    <h3><i class="fas fa-edit"></i>EDIT COMPANY</h3>

    <?php foreach($company as $company) : ?>
        <form method="post" action="<?php echo base_url(). 'admin/company/update' ?>">
            <div class="for-group">
                <label>Company Name</label>
                <input type="hidden" name="id" class="form-control" value="<?php echo $company->id?>">
                <input type="text" name="name" class="form-control" required value="<?php echo $company->name?>">
            </div>

            <div class="for-group">
                <label>Fleet Number</label>
                <input type="number" min="0" name="fleet_number" required class="form-control" value="<?php echo $company->fleet_number?>">
            </div>
            <button type="submit" class="btn btn-primary btn-sm mt-3">Save</button>
        </form>
    <?php endforeach; ?>
</div>