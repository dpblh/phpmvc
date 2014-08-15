<?php 

use config\Config;
use db\Data_base as Data_base;
use core\Model as Model;

$config = Config::data();

Data_base::$config = $config['db'];
Model::$data_base = $config['db']['db_provider'];

?>