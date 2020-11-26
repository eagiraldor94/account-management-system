<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;

use App;

use Carbon\Carbon;

class SubscriptionController extends Controller
{
	/*===================================
	=            SUBSCRIPTION CREATE            =
	===================================*/
	
	static public function ctrSubscriptionCreate(){
			if (session('id')) {
				if (isset($_POST['newSubscription'])) {
					   	$answer = new App\Subscription();
					   	$answer->client_id = $_POST['newClientId'];
					   	$answer->service_id = $_POST['newServiceId'];
					   	if ($_POST['newServiceStart2']!=null && $_POST['newServiceStart2']!="") {
						   	$answer->service_start2 = Carbon::createFromFormat('d/m/Y',$_POST['newServiceStart2']);
						   	$answer->service_expiration2 = Carbon::createFromFormat('d/m/Y',$_POST['newServiceExpiration2']);
					   		$answer->credit_card2 = $_POST['newCreditCard2'];
					   		$answer->card_code2 = $_POST['newCardCode2'];
					   	}else{
					   		$answer->credit_card2 = null;
					   		$answer->card_code2 = null;
					   	}
					   	$answer->service_start1 = Carbon::createFromFormat('d/m/Y',$_POST['newServiceStart1']);
					   	$answer->service_expiration1 = Carbon::createFromFormat('d/m/Y',$_POST['newServiceExpiration1']);
					   	$answer->contract_start = Carbon::createFromFormat('d/m/Y',$_POST['newContractStart']);;
					   	$answer->contract_expiration = Carbon::createFromFormat('d/m/Y',$_POST['newContractExpiration']);
					   	$answer->username1 = $_POST['newUsername1'];
					   	$answer->password1 = $_POST["newPassword1"];
					   	$answer->username2 = $_POST['newUsername2'];
					   	$answer->password2 = $_POST["newPassword2"];
					   	$answer->periodicity = $_POST['newPeriodicity'];
					   	$answer->cost = $_POST['newCost'];
					   	$answer->country1 = $_POST['newCountry1'];
					   	$answer->country2 = $_POST['newCountry2'];
					   	$answer->postal_code1 = $_POST['newPostalCode1'];
					   	$answer->postal_code2 = $_POST['newPostalCode2'];
					   	$answer->language = $_POST['newLanguage'];
					   	$answer->devices = $_POST['newDevices'];
					   	$answer->observations = $_POST['newObservations'];
					   	$answer->credit_card1 = $_POST['newCreditCard1'];
					   	$answer->card_date1 = $_POST['newCardDate1'];
					   	$answer->card_code1 = $_POST['newCardCode1'];
					   	$answer->card_date2 = $_POST['newCardDate2'];
					   	$answer->acc_owner1 = $_POST['newAccOwner1'];
					   	$answer->acc_owner2 = $_POST['newAccOwner2'];
					   if ($answer->save()) {
					   	return redirect('/suscripciones');
					   }
				}else{
					return redirect('/');
				}
			}else{
			 	return view('layouts.permisions_error');
			}

	}
	/*===================================
	=            USER EDIT            =
	===================================*/
	static public function ctrSubscriptionEdit(){
			if (session('id')) {
				if (isset($_POST['editSubscription'])) {
					   	$answer = App\Subscription::find($_POST['editId']);
					   	$answer->client_id = $_POST['newClientId'];
					   	$answer->service_id = $_POST['newServiceId'];
					   	$answer->service_start1 = Carbon::createFromFormat('d/m/Y',$_POST['newServiceStart1']);
					   	if ($_POST['newServiceStart2']!=null && $_POST['newServiceStart2']!="") {
						   	$answer->service_start2 = Carbon::createFromFormat('d/m/Y',$_POST['newServiceStart2']);
						   	$answer->service_expiration2 = Carbon::createFromFormat('d/m/Y',$_POST['newServiceExpiration2']);
					   		$answer->credit_card2 = $_POST['newCreditCard2'];
					   		$answer->card_code2 = $_POST['newCardCode2'];
					   	}else{
					   		$answer->credit_card2 = null;
					   		$answer->card_code2 = null;
					   	}
					   	$answer->service_expiration1 = Carbon::createFromFormat('d/m/Y',$_POST['newServiceExpiration1']);
					   	$answer->contract_start = Carbon::createFromFormat('d/m/Y',$_POST['newContractStart']);;
					   	$answer->contract_expiration = Carbon::createFromFormat('d/m/Y',$_POST['newContractExpiration']);
					   	$answer->username1 = $_POST['newUsername1'];
					   	$answer->password1 = $_POST["newPassword1"];
					   	$answer->username2 = $_POST['newUsername2'];
					   	$answer->password2 = $_POST["newPassword2"];
					   	$answer->periodicity = $_POST['newPeriodicity'];
					   	$answer->cost = $_POST['newCost'];
					   	$answer->country1 = $_POST['newCountry1'];
					   	$answer->country2 = $_POST['newCountry2'];
					   	$answer->postal_code1 = $_POST['newPostalCode1'];
					   	$answer->postal_code2 = $_POST['newPostalCode2'];
					   	$answer->language = $_POST['newLanguage'];
					   	$answer->devices = $_POST['newDevices'];
					   	$answer->observations = $_POST['newObservations'];
					   	$answer->credit_card1 = $_POST['newCreditCard1'];
					   	$answer->card_date1 = $_POST['newCardDate1'];
					   	$answer->card_code1 = $_POST['newCardCode1'];					   	
					   	$answer->card_date2 = $_POST['newCardDate2'];
					   	$answer->acc_owner1 = $_POST['newAccOwner1'];
					   	$answer->acc_owner2 = $_POST['newAccOwner2'];
					   if ($answer->save()) {
					   	return redirect('/suscripciones');
					   }
				}else{
					return redirect('/');
				}
			}else{
			 	return view('layouts.permisions_error');
			}
	}
	/*======================================
	=            Borrar usuario            =
	======================================*/
	static public function ctrSubscriptionDelete(){
		if (session('id')) {
			if (isset($_POST['idSuscripcion'])) {
				$answer=App\Subscription::find($_POST['idSuscripcion']);
				$answer->delete();
			}
		}else{
		 	return view('layouts.permisions_error');
		}
	}
	public function ajaxSubscriptionEdit(){
		if (session('id')) {
			$answer = App\Subscription::find($_POST['idSuscripcion']);
			echo json_encode($answer);
		}
	} 
	public function ajaxSubscriptionActivation(){
		if (session('id')) {
			$answer = App\Subscription::find($_POST['idSuscripcion']);
			$answer->state = $_POST['estadoSuscripcion'];
			$answer->save();
		}
	} 
	static public function ctrSubscriptionImport(){
		if (session('id')) {
			$row = 1;
			if (($handle = fopen("Views/documents/subscriptions.csv", "r")) !== FALSE) {
			    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        			$data = array_map("utf8_encode", $data);
			        $num = count($data);
				   	$answer = new App\Subscription();
				   	$answer->client_id = $data[1];
				   	$answer->service_id = $data[2];
				   	if ($data[4]!=null && $data[4]!="") {
					   	$answer->service_start2 = Carbon::parse($data[4]);
					   	$answer->service_expiration2 = Carbon::parse($data[6]);
				   		$answer->credit_card2 = $data[27];
				   		$answer->card_code2 = $data[29];
				   	}else{
				   		$answer->credit_card2 = 0;
				   		$answer->card_code2 = 0;
				   	}
				   	$answer->service_start1 = Carbon::parse($data[3]);
				   	$answer->service_expiration1 = Carbon::parse($data[5]);
				   	$answer->contract_start = Carbon::parse($data[7]);
				   	$answer->contract_expiration = Carbon::parse($data[8]);
				   	$answer->username1 = $data[10];
				   	$answer->password1 = $data[11];
				   	$answer->username2 = $data[12];
				   	$answer->password2 = $data[13];
				   	$answer->periodicity = $data[14];
				   	$answer->cost = $data[15];
				   	$answer->country1 = $data[16];
				   	$answer->country2 = $data[17];
				   	$answer->postal_code1 = $data[18];
				   	$answer->postal_code2 = $data[19];
				   	$answer->language = $data[20];
				   	$answer->devices = $data[21];
				   	$answer->observations = $data[22];
				   	$answer->credit_card1 = $data[23];
				   	$answer->card_date1 = $data[24];
				   	$answer->card_code1 = $data[25];
				   	$answer->card_date2 = $data[28];
				   	$answer->acc_owner1 = $data[26];
				   	$answer->acc_owner2 = $data[30];
				   	$answer->save();
			        $row++;
			    }
			    fclose($handle);
			}
		}
	}
	/*===============================================
	=            Mostrar tabla suscripciones           =
	===============================================*/
	
	public function ajaxDatatableSuscripciones(){
		if (session('id')) {
  			$subscriptions = App\Subscription::all();
		  	echo '{
					"data": [';

				for($i = 0; $i < count($subscriptions)-1; $i++){
					if ($subscriptions[$i]->state == 1) {
						$state ="<button class='btn btn-success btn-sm btnActivar' idSuscripcion='".$subscriptions[$i]->id."' estadoSuscripcion='0'>Activado</button>";
					}else{
						$state ="<button class='btn btn-danger btn-sm btnActivar' idSuscripcion='".$subscriptions[$i]->id."' estadoSuscripcion='1'>Desactivado</button>";
					}
					if ($subscriptions[$i]->service_expiration2 == null) {
						$vto =Carbon::parse($subscriptions[$i]->service_expiration1)->format('d/m/Y');
					}else{
						$vto =Carbon::parse($subscriptions[$i]->service_expiration1)->format('d/m/Y').'<br>'.Carbon::parse($subscriptions[$i]->service_expiration2)->format('d/m/Y');
					}
	                    $buttons ="<div class='btn-group'><button class='btn btn-info btnImprimirDetalles' idSuscripcion='".$subscriptions[$i]->id."'><i class='fa fa-print'></i></button><button class='btn btn-warning btnEditarSuscripcion' idSuscripcion='".$subscriptions[$i]->id."' data-toggle='modal' data-target='#modalEditarSuscripcion'><i class='fa fa-pen'></i></button><button class='btn btn-danger btnBorrarSuscripcion' idSuscripcion='".$subscriptions[$i]->id."'><i class='fa fa-times'></i></button></div>";
					 echo '[
				      "'.($i+1).'",
				      "'.$subscriptions[$i]->client->name.'",
				      "'.Carbon::parse($subscriptions[$i]->contract_expiration)->format('d/m/Y').'",
				      "'.$state.'",
				      "'.$subscriptions[$i]->service->service1.'<br>'.$subscriptions[$i]->service->service2.'",
				      "'.$vto.'",
				      "'.$subscriptions[$i]->username1.'<br>'.$subscriptions[$i]->username2.'",
				      "'.$subscriptions[$i]->password1.'<br>'.$subscriptions[$i]->password2.'",
				      "'.$subscriptions[$i]->observations.'",
				      "'.$subscriptions[$i]->credit_card1.'<br>'.$subscriptions[$i]->credit_card2.'",
				      "'.$subscriptions[$i]->card_date1.'<br>'.$subscriptions[$i]->card_date2.'",
				      "'.$subscriptions[$i]->card_code1.'<br>'.$subscriptions[$i]->card_code2.'",
				      "'.$subscriptions[$i]->country1.'<br>'.$subscriptions[$i]->country2.'",
				      "'.$subscriptions[$i]->postal_code1.'<br>'.$subscriptions[$i]->postal_code2.'",
				      "'.$subscriptions[$i]->acc_owner1.'<br>'.$subscriptions[$i]->acc_owner2.'",
				      "'.$subscriptions[$i]->periodicity.' mes(es)",
				      "'.$subscriptions[$i]->cost.'",
				      "'.$subscriptions[$i]->language.'",
				      "'.$subscriptions[$i]->devices.'",
				      "'.$subscriptions[$i]->client->phone.'",
				      "'.$subscriptions[$i]->client->email.'",
				      "'.$buttons.'"
				    ],';

				}
					if ($subscriptions[count($subscriptions)-1]->state == 1) {
						$state ="<button class='btn btn-success btn-sm btnActivar' idSuscripcion='".$subscriptions[count($subscriptions)-1]->id."' estadoSuscripcion='0'>Activado</button>";
					}else{
						$state ="<button class='btn btn-danger btn-sm btnActivar' idSuscripcion='".$subscriptions[count($subscriptions)-1]->id."' estadoSuscripcion='1'>Desactivado</button>";
					}
					if ($subscriptions[count($subscriptions)-1]->service_expiration2 == null) {
						$vto =Carbon::parse($subscriptions[count($subscriptions)-1]->service_expiration1)->format('d/m/Y');
					}else{
						$vto =Carbon::parse($subscriptions[count($subscriptions)-1]->service_expiration1)->format('d/m/Y').'<br>'.Carbon::parse($subscriptions[count($subscriptions)-1]->service_expiration2)->format('d/m/Y');
					}
	                    $buttons ="<div class='btn-group'><button class='btn btn-info btnImprimirDetalles' idSuscripcion='".$subscriptions[count($subscriptions)-1]->id."'><i class='fa fa-print'></i></button><button class='btn btn-warning btnEditarSuscripcion' idSuscripcion='".$subscriptions[count($subscriptions)-1]->id."' data-toggle='modal' data-target='#modalEditarSuscripcion'><i class='fa fa-pen'></i></button><button class='btn btn-danger btnBorrarSuscripcion' idSuscripcion='".$subscriptions[count($subscriptions)-1]->id."'><i class='fa fa-times'></i></button></div>";
					 echo '[
				      "'.(count($subscriptions)).'",
				      "'.$subscriptions[count($subscriptions)-1]->client->name.'",
				      "'.Carbon::parse($subscriptions[count($subscriptions)-1]->contract_expiration)->format('d/m/Y').'",
				      "'.$state.'",
				      "'.$subscriptions[count($subscriptions)-1]->service->service1.'<br>'.$subscriptions[count($subscriptions)-1]->service->service2.'",
				      "'.$vto.'",
				      "'.$subscriptions[count($subscriptions)-1]->username1.'<br>'.$subscriptions[count($subscriptions)-1]->username2.'",
				      "'.$subscriptions[count($subscriptions)-1]->password1.'<br>'.$subscriptions[count($subscriptions)-1]->password2.'",
				      "'.$subscriptions[count($subscriptions)-1]->observations.'",
				      "'.$subscriptions[count($subscriptions)-1]->credit_card1.'<br>'.$subscriptions[count($subscriptions)-1]->credit_card2.'",
				      "'.$subscriptions[count($subscriptions)-1]->card_date1.'<br>'.$subscriptions[count($subscriptions)-1]->card_date2.'",
				      "'.$subscriptions[count($subscriptions)-1]->card_code1.'<br>'.$subscriptions[count($subscriptions)-1]->card_code2.'",
				      "'.$subscriptions[count($subscriptions)-1]->country1.'<br>'.$subscriptions[count($subscriptions)-1]->country2.'",
				      "'.$subscriptions[count($subscriptions)-1]->postal_code1.'<br>'.$subscriptions[count($subscriptions)-1]->postal_code2.'",
				      "'.$subscriptions[count($subscriptions)-1]->acc_owner1.'<br>'.$subscriptions[count($subscriptions)-1]->acc_owner2.'",
				      "'.$subscriptions[count($subscriptions)-1]->periodicity.' mes(es)",
				      "'.$subscriptions[count($subscriptions)-1]->cost.'",
				      "'.$subscriptions[count($subscriptions)-1]->language.'",
				      "'.$subscriptions[count($subscriptions)-1]->devices.'",
				      "'.$subscriptions[count($subscriptions)-1]->client->phone.'",
				      "'.$subscriptions[count($subscriptions)-1]->client->email.'",
				      "'.$buttons.'"
				    ]
				]
			}';
		}else{
			echo "Wrong Auth!";
			
		}
	}
}
