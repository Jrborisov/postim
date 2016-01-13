
<h1>заголовок</h1>
<div style="float: right"><a href="?r=test/insert">вставить</a></div>
<?php
 foreach ($data as $k=>$v){
 echo "<p>имя: {$v['name']} фомилия: {$v['lastname']}</p>";
 }
?>