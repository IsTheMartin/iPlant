<?php

require_once('../config/dbconnect.php');

class IoTActions
{

    function IoTActions()
    { }

    function addUpdateValues($macaddress, $sensorValue)
    {
        $dbconn = new DbConnect();
        try {
            $conn = $dbconn->connect();
            if (isset($conn)) {
                $stmt = $conn->prepare("call usp_sensorvalue_addupdate(:p_sensorvalue,:p_macaddress)");
                $stmt->bindParam("p_sensorvalue", $sensorValue);
                $stmt->bindParam("p_macaddress", $macaddress);

                $stmt->execute();
            } else {
                echo "Cannot create a connection class.";
            }
        } catch (Exception $ex) {
            echo $ex;
        }
    }
}


if (isset($_REQUEST['sensor']) && isset($_REQUEST['macaddress'])) {
    $iotAction = new IoTActions();
    $iotAction->addUpdateValues($_REQUEST['macaddress'], $_REQUEST['sensor']);
} else {
    echo "sensor or macaddress has not been set";
}
