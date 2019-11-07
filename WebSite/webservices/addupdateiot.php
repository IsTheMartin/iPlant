<?php

    require_once('../config/dbconnect.php');

    Class IoTActions{

        function addUpdateValues($macaddress, $sensorValue){
            $dbconn = new DbConnect();
            $conn = $dbconn.connect();

            if(isset($conn)){
                try{
                $stmt = $conn->prepare("call usp_sensoring_addupdate(?,?)");
                $stmt->bindParam(1,$sensorValue,PDO::PARAM_STR);
                $stmt->bindValue(2,$macaddress,PDO::PARAM_STR);

                $stmt->execute();
                } catch (Exception $ex) {
                    echo $ex;
                }
            } else{
                echo "Cannot create a connection class.";
            }
        }

    }

    if(isset($_REQUEST['sensor']) && isset($_REQUEST['macaddress'])){
        $iotAction = new IoTActions();
        $iotAction.addUpdateValues($_REQUEST['sensor'], $_REQUEST['macaddress']);
    } else {
        echo "sensor or macaddress has not been set";
    }
