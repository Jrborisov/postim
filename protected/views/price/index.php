<a style="float: right" href="?r=price/insert">вставить запись</a>

<?php

foreach($model as $val ){
?>
<p><?=$val['id']?><span>) </span> Name:<?=$val['name']?> Price:<?=$val['price']?> Col:<?=$val['leng']?></p>
<?php
}