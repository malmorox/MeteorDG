<?php
    function showLastTransactions() {
        foreach ($transactions as $transaction) {
            echo '<tr>';
            echo '<td>' . $row['TRANSACTION_ID'] . '</td>';
            echo '<td>' . $row['NIF_ORIGIN'] . '</td>';
            echo '<td>' . $row['NIF_DESTINATION'] . '</td>';
            echo '<td>' . $row['AMOUNT'] . '</td>';
            echo '<td>' . $row['BADGE'] . '</td>';
            echo '<td>' . date("d/m/Y", strtotime($row['TRANSACTION_DATE'])) . '</td>';
            echo '</tr>';
        }
    }

?>