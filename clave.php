<?php 
$password = crypt('123', '$2a$07$usesomesillystringforsalt$');
echo $password;