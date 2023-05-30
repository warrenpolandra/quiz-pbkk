<div class="container-fluid">
    <h3><i class="fas fa-edit"></i>EDIT ROUTE</h3>

    <?php foreach($route as $route) : ?>
        <form method="post" action="<?php echo base_url(). 'admin/routes/update' ?>">
            <div class="for-group">
                <label>From</label>
                <input type="hidden" name="id" class="form-control" value="<?php echo $route->id?>">
                <input type="text" name="route_from" class="form-control" required value="<?php echo $route->route_from?>">
            </div>

            <div class="for-group">
                <label>To</label>
                <input type="text" name="route_to" required class="form-control" value="<?php echo $route->route_to?>">
            </div>

            <div class="for-group">
                <label>Duration</label>
                <input type="time" name="duration" required class="form-control" value="<?php echo $route->duration?>">
            </div>

            <div class="for-group">
                <label>Base Price</label>
                <input type="number" min="0" name="base_price" required class="form-control" value="<?php echo $route->base_price?>">
            </div>
            <button type="submit" class="btn btn-primary btn-sm mt-3">Save</button>
        </form>
    <?php endforeach; ?>
</div>