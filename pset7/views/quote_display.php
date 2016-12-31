<p><h4>Here is the quote of <?=$symbol?></h4></p>
<p><strong><?= "Name:     " . $name . "<br/>"; ?></strong>
<strong><?= "Symbol:     " . $symbol . "<br/>"; ?></strong>
<strong><?= "Price:     $" . number_format($price, 2) . "<br/>"; ?></strong>
</p>
<ul class="nav nav-tabs nav-justified" align="center">
        <li><a href="quote.php">Check another Quote</a></li>
</ul>