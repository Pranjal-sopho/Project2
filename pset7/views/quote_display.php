<p style="font-size:15">
<strong><?= print "Name: " . $name; ?><strong>
</p>
<p style="font-size: 20">
<strong><?= print "Symbol: ". $symbol; ?><strong>
</p>
<p style="font-size:15">
$<?=print "Price: " . number_format($price, 2); ?>
</p>
<ul class="nav nav-tabs nav-justified" align="center">
        <li><a href="quote.php">Check another Quote</a></li>
</ul>