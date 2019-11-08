<?php
require_once('../config/dbconnect.php');
class Dashi
{

    function Dashi()
    { }

    function getAllDevices()
    {
        $dbconn = new DbConnect();
        
        try {
            $conn = $dbconn->connect();
            if (isset($conn)) {
                echo "prepare";
                $stmt = $conn->prepare("select macaddress from sensoring");
                $stmt->execute();

                $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

                foreach ($stmt->fetchAll() as $k => $v) {
                    echo $v;
                    echo $k;
                }
            } else {
                echo "Cannot create a connection class.";
            }
        } catch (Exception $ex) {
            echo $ex;
        }
    }

    function getDevice($macadress)
    {
        if (isset($macadress)) { } else {
            echo "Has not been choice a device";
        }
    }
}

$dash = new Dashi();
$dash->getAllDevices();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
</head>

<body>
</body>

</html>