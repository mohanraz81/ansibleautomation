<?php
echo "<h1> This is the Three Tier Architecture Test</h1>";
echo "<h3> Your Web Running Apache with php on Frontend container </h3>";
echo "<h3> Your APP Running Apache and PHP providing API services for User information on url http://backend/get_user_details </h2>";
echo "<h3> Your Database running Mysql/Mariadb holding user information in userdb on users Table </h1>";
function querymultirowlab($dbo,$sql)
{
        $dbo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $dbo->prepare($sql);
        $stmt->execute();
        $r = $stmt->fetchall();
        return $r;
}
$labdbhost_name =  "testdb1.vadclass.tk";
$labdatabase =  "testdb";
$labusername = "myadmin";
$labpassword = "user12345";
try
{
        $dbo = new PDO('mysql:host='.$labdbhost_name.';dbname='.$labdatabase, $labusername, $labpassword);
}
catch (PDOException $e)
{
        print "We have trouble in our System we will be back soon.";
        die();
}
$candl_backend_query = "CREATE TABLE IF NOT EXISTS `users` (`id` int(11) NOT NULL AUTO_INCREMENT,  `Name` varchar(50) NOT NULL, `Age` smallint(2) NOT NULL, `Email` varchar(50) NOT NULL, PRIMARY KEY (`id`)) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4; INSERT INTO `users` (`id`, `Name`, `Age`, `Email`) VALUES(1, 'Mohan', 18, 'mohanraz@gmail.com'),(2, 'Raj', 22, 'mohan@y2ytech.com'),(3, 'veer', 18, 'mohanraz@gmail.com'),(4, 'Raj', 22, 'mohan@y2ytech.com');";
$candl_backend_array = insertlabassoc($dbo, $candl_backend_query );
$candl_backend_query = "select * from users";
$candl_backend_array = querymultirowlab($dbo, $candl_backend_query );
foreach($candl_backend_array as $value)
{
        echo "Name"."=>".$value['Name']."<br>";
        echo "Age"."=>".$value['Age']."<br>";
        echo "Email"."=>".$value['Email']."<br>";
        echo "==========================================="."<br>";
}
?>