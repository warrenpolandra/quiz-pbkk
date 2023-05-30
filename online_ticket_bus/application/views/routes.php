<div class="container-fluid">    
    <table class="table table-bordered">
        <tr>
            <th>FROM</th>
            <th>TO</th>
            <th>DURATION</th>
            <th>AVERAGE PRICE</th>

            <?php
            foreach($routes as $route) : ?>

            <tr>
                <td><?php echo $route->route_from ?></td>
                <td><?php echo $route->route_to ?></td>
                <td style="text-align: center;"><?php echo $route->duration ?></td>
                <td style="text-align: center;"><?php echo $route->base_price ?></td>
            </tr>

            <?php endforeach; ?>

        </tr>
    </table>
</div>
<style>
  th, td {
    text-align: center;
  }
</style>