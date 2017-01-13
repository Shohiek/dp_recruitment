<?php
//C# web service
	// $webServiceUrl = 'http://www.essdp.com:8080/Service.svc?wsdl';
	// $webServiceUrl = 'http://www.kippraservice.com:8095/Service.svc?wsdl';//dev on .31 
	$webServiceUrl = 'http://www.kipraservice.com:8084/Service.svc?wsdl';//bakasa local
//C# web service
	
	if(isset($_POST['action'])){
		$action = $_POST['action'];

		if($action == "FILTERVACANCIES"){
			$criteria = $_POST['criteria'];
			$searchValue = $_POST['searchValue'];

		    $client = new SoapClient($webServiceUrl);
			try {
				$res = $client->filterVacancies(array(
												"criteria"=>$criteria,
												"searchValue"=>$searchValue
												)
											);
			} catch (SoapFault $e) {
				//$res = 3;
			    $res = "Error: {$e->faultstring}";
			}
			print_r($res);die;
		}else if($action == "GETVACANCIES"){
			$client = new SoapClient($webServiceUrl);
			try {
				$res = $client->getAllVacancies();
			} catch (SoapFault $e) {
				//$res = 3;
			    $res = "Error: {$e->faultstring}";
			}
			$resp = (array)$res;
			print_r($resp);die();
			$response = $resp["getAllVacanciesResult"];
			echo $response;
		}else if($action == "VIEWVACANCYDETAILS"){
			$adID = $_POST['adID'];

			$client = new SoapClient($webServiceUrl);
			try {
				$res = $client->getVacancyDetails(array(
													"adID"=>$adID
													)
												);
			} catch (SoapFault $e) {
				//$res = 3;
			    $res = "Error: {$e->faultstring}";
			}
			$resp = (array)$res;			
			$response = $resp["getVacancyDetailsResult"];
			echo $response;
		}else if($action == "GETSPECIFICVACANCY"){
			$adID = $_POST['adID'];

			$client = new SoapClient($webServiceUrl);
			try {
				$res = $client->getSpecificVacancy(array(
													"adID"=>$adID
													)
												);
			} catch (SoapFault $e) {
				//$res = 3;
			    $res = "Error: {$e->faultstring}";
			}
			$resp = (array)$res;
			$response = $resp["getSpecificVacancyResult"];
			echo $response;	
		}else if($action == "REGISTERUSER"){
			$register_email = $_POST['register_email'];
			$register_name = $_POST['register_name'];
			$register_password = $_POST['register_password'];

			$client = new SoapClient($webServiceUrl);
			try {
				$res = $client->registerUser(array(
													"emailAddress"=>$register_email,
													"username"=>$register_name,
													"password"=>$register_password
													)
												);
			} catch (SoapFault $e) {				
			    $res = "Error: {$e->faultstring}";
			}
			
			$response = $res->registerUserResult;
			echo $response;	
		}else if($action == "VALIDATEEMAIL"){
			$register_email = $_POST['register_email'];

			$client = new SoapClient($webServiceUrl);
			try {
				$res = $client->validateEmailAddress(array(
													"emailAddress"=>$register_email
													)
												);
			} catch (SoapFault $e) {				
			    $res = "Error: {$e->faultstring}";
			}
			echo($res->validateEmailAddressResult);
		}else if($action == "LOGINUSER"){
			$emailAddress = $_POST['emailAddress'];
			$password = $_POST['password'];

			$client = new SoapClient($webServiceUrl);
			try {
				$res = $client->loginUser(array(
											"emailAddress"=>$emailAddress,
											"password"=>$password
											)
										);
			} catch (SoapFault $e) {				
			    $res = "Error: {$e->faultstring}";
			}
			echo($res->loginUserResult);
		}else if($action == "SAVEPERSONALDETAILS"){
			$fname = $_POST['fname'];
			$mname = $_POST['mname'];
			$lname = $_POST['lname'];
			$mobileNo = $_POST['mobileNo'];
			$address =$_POST['address'];
			$country = $_POST['country'];
			$pin = $_POST['pin'];
			$passportNo = $_POST['passportNo'];
			$disabledStatus = $_POST['disabledStatus'];
			$maritalStatus = $_POST['maritalStatus'];
			$email = $_POST['email'];
			$nationalIDNO = $_POST['nationalIDNO'];
			$currentLocation = $_POST['currentLocation'];

			$client = new SoapClient($webServiceUrl);
			try {
				$res = $client->insertPersonalDetails(array(
											"email"=>$email,
											"fname"=>$fname,
											"mname"=>$mname,
											"lname"=>$lname,
											"mobileNo"=>$mobileNo,
											"address"=>$address,
											"country"=>$country,
											"pin"=>$pin,
											"passportNo"=>$passportNo,
											"disabledStatus"=>$disabledStatus,
											"maritalStatus"=>$maritalStatus,
											"currentLocation"=>$currentLocation,
											"nationalIDNO"=>$nationalIDNO
											)
										);
			} catch (SoapFault $e) {				
			    $res = "Error: {$e->faultstring}";
			}
			echo $res->updatePersonalDetailsResult;
		}else if($action == "SAVEQUALIFICATIONS"){
			$qualifications = $_POST['qualifications'];
			$email = $_POST['email'];

			$client = new SoapClient($webServiceUrl);
			try {
				$res = $client->insertQualificationDetails(array(
											"email"=>$email,
											"qualifications"=>$qualifications
											)
										);
			} catch (SoapFault $e) {				
			    $res = "Error: {$e->faultstring}";
			}
			echo $res->insertQualificationDetailsResult;
		}else if($action == "SAVEEMPLOYMENTHISTORY"){
			$employmentHistory = $_POST['employmentHistory'];
			$email = $_POST['email'];

			$client = new SoapClient($webServiceUrl);
			try {
				$res = $client->insertEmploymentHistoryDetails(array(
											"email"=>$email,
											"employmentHistory"=>$employmentHistory
											)
										);
			} catch (SoapFault $e) {				
			    $res = "Error: {$e->faultstring}";
			}
			echo $res->insertEmploymentHistoryDetailsResult;
		}else if($action == "SAVEREFEREES"){
			$referee = $_POST['referee'];
			$email = $_POST['email'];

			$client = new SoapClient($webServiceUrl);
			try {
				$res = $client->insertRefereeDetails(array(
											"email"=>$email,
											"referee"=>$referee
											)
										);
			} catch (SoapFault $e) {				
			    $res = "Error: {$e->faultstring}";
			}
			echo $res->insertRefereeDetailsResult;
		}else if($action == "MAKEJOBAPPLICATION"){
			$dateOfApplication = $_POST['dateOfApplication'];
			$adID = $_POST['adID'];
			$emailAddress = $_POST['emailAddress'];

			$client = new SoapClient($webServiceUrl);
			try {
				$res = $client->applyForPosition(array(
											"adID"=>$adID,
											"emailAddress"=>$emailAddress,
											"dateOfApplication"=>$dateOfApplication
											)
										);
			} catch (SoapFault $e) {				
			    $res = "Error: {$e->faultstring}";
			}
			echo $res->applyForPositionResult;
		}else if($action == "GETPERSONALDETAILS"){
			$emailAddress = $_POST['emailAddress'];

			$client = new SoapClient($webServiceUrl);
			try {
				$res = $client->getPersonalDetails(array(
											"emailAddress"=>$emailAddress
											)
										);
			} catch (SoapFault $e) {				
			    $res = "Error: {$e->faultstring}";
			}
			//print_r($res);
			echo $res->getPersonalDetailsResult;
		}else if($action == "GETQUALIFICATIONDETAILS"){
			$emailAddress = $_POST['emailAddress'];

			$client = new SoapClient($webServiceUrl);
			try {
				$res = $client->getQualificationDetails(array(
											"emailAddress"=>$emailAddress
											)
										);
			} catch (SoapFault $e) {				
			    $res = "Error: {$e->faultstring}";
			}
			//print_r($res);
			echo $res->getQualificationDetailsResult;
		}else if($action == "GETREFEREEDETAILS"){
			$emailAddress = $_POST['emailAddress'];

			$client = new SoapClient($webServiceUrl);
			try {
				$res = $client->getRefereeDetails(array(
											"emailAddress"=>$emailAddress
											)
										);
			} catch (SoapFault $e) {				
			    $res = "Error: {$e->faultstring}";
			}
			// print_r($res);
			echo $res->getRefereeDetailsResult;
		}else if($action == "GETEMPLOYMENTHISTORY"){
			$emailAddress = $_POST['emailAddress'];

			$client = new SoapClient($webServiceUrl);
			try {
				$res = $client->getEmploymentHistory(array(
											"emailAddress"=>$emailAddress
											)
										);
			} catch (SoapFault $e) {				
			    $res = "Error: {$e->faultstring}";
			}
			print_r($res);
			//echo $res->getEmploymentHistoryResult;
		}
		else{
			echo "Invalid Action";
		}
	}