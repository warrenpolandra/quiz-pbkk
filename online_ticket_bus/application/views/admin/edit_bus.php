<div class="container-fluid">
    <h3><i class="fas fa-edit"></i>EDIT BUS</h3>

    <?php foreach($bus as $bus) : ?>
        <form method="post" action="<?php echo base_url(). 'admin/buses/update' ?>">
            <div class="for-group">
                <label>Bus Company ID</label>
                <input type="hidden" name="id" class="form-control" value="<?php echo $bus->id?>">
                <input type="number" name="company_id" class="form-control" required value="<?php echo $bus->company_id?>">
            </div>

            <div class="for-group">
                <label>Bus Type</label>
                <label>Type</label>
                <select name="type" class="form-control" required>
                    <option vvalue="<?php echo $bus->type?>"><?php echo $bus->type?></option>
                    <option value="Small">Small</option>
                    <option value="Medium">Medium</option>
                    <option value="Large">Large</option>
                </select>
            </div>

            <div class="for-group">
                <label>Bus Plate Number</label>
                <input type="text" name="plate_number" required class="form-control" value="<?php echo $bus->plate_number?>">
            </div>

            <div class="for-group">
                <label>Bus Capacity</label>
                <input type="number" min="0" name="capacity" required class="form-control" value="<?php echo $bus->capacity?>">
            </div>
            <button type="submit" class="btn btn-primary btn-sm mt-3">Save</button>
        </form>
    <?php endforeach; ?>
</div>