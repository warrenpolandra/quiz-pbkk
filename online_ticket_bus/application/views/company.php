<div class="container-fluid">    
    <table class="table table-bordered">
        <tr>
            <th>NAME</th>
            <th>FLEET NUMBER</th>
            <th>IMAGE</th>

            <?php
            foreach($companies as $company) : ?>

            <tr>
                <td style="text-align: center; vertical-align: middle;"><?php echo $company->name ?></td>
                <td style="text-align: center; vertical-align: middle;"><?php echo $company->fleet_number ?></td>
                <td style="text-align: center; vertical-align: middle;"><img src="<?php echo base_url().'/images/'. $company->image ?>" style="width: 200px; height: auto;"></td>
            </tr>

            <?php endforeach; ?>

        </tr>
    </table>
</div>
<style>
  th {
    text-align: center;
  }
</style>