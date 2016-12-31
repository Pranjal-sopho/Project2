<div>
   <?php if(empty($positions)): ?>
      <h3>History is empty</h3>
   <?php else: ?>
      <table class="table table-striped">
         <thead>
            <tr>
               <th>Symbol</th>
               <th>Shares</th>
               <th>Transaction</th>
            </tr>
         </thead>
         <tbody>
            <?php foreach ($positions as $row): ?>
               <tr align="left">
                  <td><?= $row["symbol"] ?></td>
                  <td><?= $row["shares"] ?></td>
                  <td><?= $row["transaction"] ?></td>
               </tr>
            <?php endforeach ?>
         </tbody>
      </table>
   <?php endif ?>
</div>
