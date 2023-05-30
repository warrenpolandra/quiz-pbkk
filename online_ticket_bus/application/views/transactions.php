<div class="container-fluid">
    <h3>TRANSACTION HISTORY</h3>
    <table class="table table-bordered">
        <tr>
            <th>DATE</th>
            <th>TIME</th>
            <th>FROM</th>
            <th>TO</th>
            <th>TICKET(S)</th>
            <th>TRANSACTION</th>
            <th>PAYMENT METHOD</th>
            <th colspan="2">DETAILS</th>

            <?php
            foreach($transactions as $transaction) : ?>

            <tr>
                <td style="text-align: center;"><?php echo $transaction->date ?></td>
                <td style="text-align: center;"><?php echo $transaction->time ?></td>
                <td style="text-align: center;"><?php echo $transaction->route_from ?></td>
                <td style="text-align: center;"><?php echo $transaction->route_to ?></td>
                <td style="text-align: center;"><?php echo $transaction->ticket_number ?></td>
                <td style="text-align: center;"><?php echo $transaction->profit ?></td>
                <td style="text-align: center;"><?php echo $transaction->payment_method ?></td>
                <td style="text-align: center; vertical-align: middle;"><?php echo anchor('transactions/detail/' .$transaction->id, '<div class="btn btn-primary btn-sm"><i class="fa fa-info"></i></div>')?></td>
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