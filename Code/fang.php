<?php

require_once  './vendor/autoload.php';

use Ehann\RediSearch\Index;
use Ehann\RediSearch\Fields\TextField;
use Ehann\RediSearch\Fields\NumericField;
use Ehann\RediSearch\Redis\RedisClient;

set_time_limit(0);

$redis = new RedisClient('Redis', '127.0.0.1', 6379, 0, '');

$bookIndex = new Index($redis,'kaifang');

$bookIndex->addTextField('name',5)
->addTextField('address',5)
->addTextField('email',5)
->addTextField('mobile')
->addTextField('tel')
->addTextField('fax')
->addTextField('gender')
->addNumericField('birthday')
->addNumericField('zip')
->create();


$conn=mysqli_connect('127.0.0.1','root','a123654') or die("error connecting") ; //连接数据库

mysqli_query("set names 'utf8'"); //数据库输出编码 应该与你的数据库编码保持一致.南昌网站建设公司百恒网络PHP工程师建议用UTF-8 国际标准编码.

mysqli_select_db('db_2000w'); //打开数据库

$sql ="select * from news "; //SQL语句

$result = mysqli_query($sql,$conn); //查询


while($row = mysqli_fetch_array($result))

{

    //echo "<div style=\"height:24px; line-height:24px; font-weight:bold;\">"; //排版代码

    $bookIndex->add([
        new TextField('name', $row['Name']),
        new TextField('address', $row['Address']),
        new TextField('email', $row['Email']),
        new TextField('mobile', $row['Mobile']),
        new TextField('tel', $row['Tel']),
        new TextField('fax', $row['Fax']),
        new TextField('gender', $row['Gender']),
        new NumericField('birthday', $row['Birthday']),
        new NumericField('zip', $row['Zip']),
    ]);

    //echo "</div>"; //排版代码

}