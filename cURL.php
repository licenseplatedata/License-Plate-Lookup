<?php
  // LicensePlateData.com cURL request

  $licensePlate = ""; // US License Plate
  $state = ""; // State abbreviation ex: NJ = New Jersey or NY = New York (all 50 states)
  $key = ""; // consumer key found on portal https://portal.licenseplatedata.com/

  $curl = curl_init();
  curl_set_opt_array($curl, [
    CURLOPT_URL => "https://licenseplatedata.com/consumer-api/{$key}/{$state}/{$licensePlate}",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_CUSTOMREQUEST => "GET"
  ]);
  $response = curl_exec($curl);
  $licensePlateLookup = json_encode($repsone, true);

  if ($licensePlateLookup->error == true) {
    $message = $licensePlateLookup->message;
    echo "A error has occured. Message: {$message}";
  } else {
    // multiple variables such as Year, Make, Model, Color, Vehicle Image and more may be found on the the documentation page:
    // https://licenseplatedata.com/api-documentation
    $vin = $licensePlateLookup->licensePlateLookup->vin;
    echo "VIN: " . $vin;
  }

?>
