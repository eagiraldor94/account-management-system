<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;

use App;

class ClientController extends Controller
{/*===================================
	=            USER CREATE            =
	===================================*/
	
	static public function ctrClientCreate(){
		if (session('id')) {
				if (isset($_POST['newClient'])) {
					if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ \-\_\.]+$/', $_POST["newName"])) {
					   	$answer = new App\Client();
					   	$answer->name = $_POST['newName'];
					   	$answer->phone = $_POST['newPhone'];
					   	$answer->country = $_POST['newCountry'];
					   	$answer->email = $_POST['newEmail'];
					   if ($answer->save()) {
					   	return redirect('/clientes');
					   }
					 } else {
					 	return view('layouts.clients_error');
					 }
				}else{
					return redirect('/');
				}
			}else{
			 	return view('layouts.permisions_error');
			}

	}
	static public function ctrClientImport(){
		if (session('id')) {
			$row = 1;
			if (($handle = fopen("Views/documents/clients.csv", "r")) !== FALSE) {
			    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        			$data = array_map("utf8_encode", $data);
			        $num = count($data);
				   	$answer = new App\Client();
				   	$answer->name = $data[1];
				   	$answer->phone = $data[2];
				   	$answer->country = $data[4];
				   	$answer->email = $data[3];
				   	$answer->save();
			        $row++;
			    }
			    fclose($handle);
			}
		}
	}
	/*===================================
	=            USER EDIT            =
	===================================*/
	static public function ctrClientEdit(){
		if (session('id')) {
			if (isset($_POST['editClient'])) {
				if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ \-\_\.]+$/', $_POST["newName"])) {
					$answer = App\Client::find($_POST['editId']);
				   	$answer->name = $_POST['newName'];
				   	$answer->phone = $_POST['newPhone'];
				   	$answer->country = $_POST['newCountry'];
				   	$answer->email = $_POST['newEmail'];
				   if ($answer->save()) {
				   	return redirect('/clientes');			   
				   }
				 } else {
				 	return view('layouts.clients_error');
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
	static public function ctrClientDelete(){
		if (session('id')) {
			if (isset($_POST['idCliente'])) {
			$answer = App\Client::find($_POST['idCliente']);
			$answer->delete();
			$answer->subscriptions()->delete();
			}
		}else{
		 	return view('layouts.permisions_error');
		}
	}
	public function ajaxClientEdit(){
		if (session('id')) {
			$answer = App\Client::find($_POST['idCliente']);
			echo json_encode($answer);
		}
	} 
	/*===============================================
	=            Mostrar tabla propiedades           =
	===============================================*/
	
	public function ajaxDatatableClientes(){
		if (session('id')) {
  			$clients = App\Client::all();
		  	echo '{
					"data": [';

				for($i = 0; $i < count($clients)-1; $i++){
					$subscriptions = "";
					$subRegisters = $clients[$i]->subscriptions;
					foreach ($subRegisters as $value) {
						$subscriptions.= "<img src='".$value->service->photo."' class='img-thumbnail' width='30px'>";
					}
                    $buttons ="<div class='btn-group'><button class='btn btn-warning btnEditarCliente' idCliente='".$clients[$i]->id."' data-toggle='modal' data-target='#modalEditarCliente'><i class='fa fa-pen'></i></button><button class='btn btn-danger btnBorrarCliente' idCliente='".$clients[$i]->id."'><i class='fa fa-times'></i></button></div>";
					 echo '[
				      "'.($i+1).'",
				      "'.$clients[$i]->name.'",
				      "'.$subscriptions.'",
				      "'.$clients[$i]->phone.'",
				      "'.$clients[$i]->email.'",
				      "'.$clients[$i]->country.'",
				      "'.$buttons.'"
				    ],';

				}
					$subscriptions = "";
					$subRegisters = $clients[count($clients)-1]->subscriptions;
					foreach ($subRegisters as $value) {
						$subscriptions.= "<img src='".$value->service->photo."' class='img-thumbnail' width='30px'>";
					}
                    $buttons ="<div class='btn-group'><button class='btn btn-warning btnEditarCliente' idCliente='".$clients[count($clients)-1]->id."' data-toggle='modal' data-target='#modalEditarCliente'><i class='fa fa-pen'></i></button><button class='btn btn-danger btnBorrarCliente' idCliente='".$clients[count($clients)-1]->id."'><i class='fa fa-times'></i></button></div>";
					 echo '[
				      "'.(count($clients)).'",
				      "'.$clients[count($clients)-1]->name.'",
				      "'.$subscriptions.'",
				      "'.$clients[count($clients)-1]->phone.'",
				      "'.$clients[count($clients)-1]->email.'",
				      "'.$clients[count($clients)-1]->country.'",
				      "'.$buttons.'"
				    ]
				]
			}';
		}else{
			echo "Wrong Auth!";
			
		}
	}
}
