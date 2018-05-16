<?php
function latlong()
{
    include_once '../database/createConnection.php';

    $conn = createConnectionFromConfigFileCredentials();

    $sql = "SELECT street_fk,streetNumber,city_fk,state_fk FROM w2final.Address";
    $result = $conn->query($sql);

    $i = 0;
    while ($rows = $result->fetch_assoc()) {
        $sql1 = "SELECT streetName FROM w2final.Street WHERE id = " . $rows['street_fk'];
        $result1 = $conn->query($sql1);
        while ($row = $result1->fetch_assoc()) {
            $address = $row['streetName'];
        }
        $address = $address . "+" . $rows['streetNumber'];
        $sql2 = "SELECT cityName FROM w2final.City WHERE id = " . $rows['city_fk'];
        $result2 = $conn->query($sql2);
        while ($row = $result2->fetch_assoc()) {
            $address = $address . "+" . str_replace(" ", "+", $row['cityName']);
        }
        $sql3 = "SELECT stateName FROM w2final.State WHERE id = " . $rows['state_fk'];
        $result3 = $conn->query($sql3);
        while ($row = $result3->fetch_assoc()) {
            $address = $address . "+" . str_replace(" ", "+", $row['stateName']);
        }
        $latlng[$i][0] = NULL;
        $latlng[$i][1] = NULL;
        while ($latlng[$i][0] == NULL || $latlng[$i][1] == NULL){
            $geocode = file_get_contents('http://maps.google.com/maps/api/geocode/json?address=' . $address . '&sensor=false');
            $output = json_decode($geocode);
            $latlng[$i][0] = $output->results[0]->geometry->location->lat;
            $latlng[$i][1] = $output->results[0]->geometry->location->lng;
        }
        $i++;
    }
    $conn->close();
    return $latlng;
}
?>