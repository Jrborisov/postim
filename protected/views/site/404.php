<?php
if($error['code']==500){
    echo "<p>пользователь не найден</p>" ;
}elseif($error['code']==400)
{
    echo "<p>страница не найдена</p>" ;
}else{
    echo "<p>страница не найдена</p>" ;
}
