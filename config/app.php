<?php 
const APPNAME = 'The six hospital';
const TIMEZONE = 'Asia/Ho_Chi_Minh';
const DATETIME = 'Y-m-d H:i:s';
const DBHOST = 'localhost';
const DBNAME = 'thesixhospital';
const DBUSER = 'root';
const DBPASS = '';
const DBUTF8 = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");

date_default_timezone_set(TIMEZONE);
?>