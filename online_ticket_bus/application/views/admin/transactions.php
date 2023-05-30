<div class="container-fluid">    
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>DATE</th>
            <th>TIME</th>
            <th>CLIENT</th>
            <th>FROM</th>
            <th>TO</th>
            <th>TICKET(S)</th>
            <th>PROFIT</th>
            <th>PAYMENT METHOD</th>
            <th colspan="2">ACTION</th>

            <?php
            foreach($transactions as $transaction) : ?>

            <tr>
                <td style="text-align: center;"><?php echo $transaction->id ?></td>
                <td style="text-align: center;"><?php echo $transaction->date ?></td>
                <td style="text-align: center;"><?php echo $transaction->time ?></td>
                <td style="text-align: center;"><?php echo $transaction->name ?></td>
                <td style="text-align: center;"><?php echo $transaction->route_from ?></td>
                <td style="text-align: center;"><?php echo $transaction->route_to ?></td>
                <td style="text-align: center;"><?php echo $transaction->ticket_number ?></td>
                <td style="text-align: center;"><?php echo $transaction->profit ?></td>
                <td style="text-align: center;"><?php echo $transaction->payment_method ?></td>
                <td style="text-align: center; vertical-align: middle;"><?php echo anchor('admin/transactions/delete/' .$transaction->id, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>')?></td>
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