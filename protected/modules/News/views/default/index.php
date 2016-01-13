
<?php
DrowMenu::run();
echo '<table style="border:1px solid">';

foreach($data as $v){
?>
<tr>

    <td ><b>Name:</b><?=$v['name']?></td>
    <td><b>LastName:</b><?=$v['lastname']?></td>
    <td><b>Phone:</b><?=$v['mobphone']?></td>
</tr>
<?php

}
echo '</table>';