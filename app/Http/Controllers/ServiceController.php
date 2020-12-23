<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;

use App;

class ServiceController extends Controller
{
	/*===================================
	=            USER CREATE            =
	===================================*/
	
	static public function ctrServiceCreate(){
		if (session('id')) {
				if (isset($_POST['newService'])) {
					   	/*======================================
					   	=            Validar Imagen            =
					   	======================================*/
					   	$ruta="";
					   	if (isset($_FILES['photo']['tmp_name']) && !empty($_FILES['photo']['tmp_name'])) {
					   		list($ancho,$alto) = getimagesize($_FILES['photo']['tmp_name']);
					   		$nuevoAncho = 500;
					   		$nuevoAlto = 500;
					   		/*==========================================
					   		=            CREANDO DIRECTORIO            =
					   		==========================================*/
					   		$directorio = "Views/img/servicios";
					   		/*===========================================================================
					   		=            Funciones defecto PHP dependiendo de tipo de imagen            =
					   		===========================================================================*/
					   		switch ($_FILES['photo']['type']) {
					   			case 'image/jpeg':
					   				$preruta = date('Y-m-d_his');
					   				$preruta = (string)$preruta;
					   				$ruta = $directorio.'/'.$preruta.'.jpg';
					   				$origen = imagecreatefromjpeg($_FILES['photo']['tmp_name']);
					   				$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
					   				imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
					   				imagejpeg($destino,$ruta);
					   				break;
					   			case 'image/png':
					   				$preruta = date('Y-m-d_his');
					   				$preruta = (string)$preruta;
					   				$ruta = $directorio.'/'.$preruta.'.png';
					   				$origen = imagecreatefrompng($_FILES['photo']['tmp_name']);
					   				$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
					   				imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
					   				imagepng($destino,$ruta);
					   				break;
					   			default:
					   				# code...
					   				break;
					   		}
					   	}
					   	$answer = new App\Service();
					   	$answer->name = $_POST['newName'];
					   	$answer->service1 = $_POST['newService1'];
					   	$answer->service2 = $_POST['newService2'];
					   	$answer->observations1 = $_POST['newObservations1'];
					   	$answer->observations2 = $_POST['newObservations2'];
					   	$answer->vpn = $_POST['newVPN'];
				   		$answer->photo = $ruta;
					   if ($answer->save()) {
					   	return redirect('/servicios');
					   }
				}else{
					return redirect('/');
				}
			
		}else{
			return redirect('/');
		}

	}
	/*===================================
	=            USER EDIT            =
	===================================*/
	static public function ctrServiceEdit(){
		if (session('id')) {
				if (isset($_POST['editService'])) {
				   	/*======================================
				   	=            Validar Imagen             =
				   	======================================*/
				   	$ruta=$_POST['lastPhoto'];
				   	if (isset($_FILES['photo']['tmp_name']) && !empty($_FILES['photo']['tmp_name'])) {
				   		list($ancho,$alto) = getimagesize($_FILES['photo']['tmp_name']);
				   		$nuevoAncho = 500;
				   		$nuevoAlto = 500;
				   		/*==========================================
				   		=            CREANDO DIRECTORIO            =
				   		==========================================*/
				   		$directorio = "Views/img/servicios";
				   		if (!empty($_POST['lastPhoto'])) {
				   			unlink($_POST['lastPhoto']);
				   		}
				   		
				   		
				   		/*===========================================================================
				   		=            Funciones defecto PHP dependiendo de tipo de imagen            =
				   		===========================================================================*/
				   		switch ($_FILES['photo']['type']) {
				   			case 'image/jpeg':
				   				$preruta = date('Y-m-d_his');
				   				$preruta = (string)$preruta;
				   				$ruta = $directorio.'/'.$preruta.'.jpg';
				   				$origen = imagecreatefromjpeg($_FILES['photo']['tmp_name']);
				   				$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
				   				imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
				   				imagejpeg($destino,$ruta);
				   				break;
				   			case 'image/png':
				   				$preruta = date('Y-m-d_his');
				   				$preruta = (string)$preruta;
				   				$ruta = $directorio.'/'.$preruta.'.jpg';
				   				$origen = imagecreatefrompng($_FILES['photo']['tmp_name']);
				   				$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
				   				imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
				   				imagepng($destino,$ruta);
				   				break;
				   			default:
				   				# code...
				   				break;
				   		}
				   		
				   		
				   	}
					$answer = App\Service::find($_POST['editId']);
				   	$answer->name = $_POST['newName'];
				   	$answer->service1 = $_POST['newService1'];
				   	$answer->service2 = $_POST['newService2'];
				   	$answer->observations1 = $_POST['newObservations1'];
				   	$answer->observations2 = $_POST['newObservations2'];
				   	$answer->vpn = $_POST['newVPN'];
			   		$answer->photo = $ruta;
				   if ($answer->save()) {
				   	return redirect('/servicios');
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
	static public function ctrServiceDelete(){
		$answer=App\Service::find($_POST['idServicio']);
		if (session('id')) {
			if (isset($_POST['idServicio'])) {
				if ($_POST['fotoServicio'] != "") {
					unlink($_POST["fotoServicio"]);
				}
			$answer->subscriptions()->delete();
			$answer->delete();
			}
		}else{
		 	return view('layouts.permisions_error');
		}
	}
	public function ajaxServiceEdit(){
		if (session('id')) {
			$answer = App\Service::find($_POST['idServicio']);
			echo json_encode($answer);
		}
	} 
	/*===============================================
	=            Mostrar tabla servicios           =
	===============================================*/
	
	public function ajaxDatatableServicios(){
		if (session('id')) {
  			$services = App\Service::all();
		  	echo '{
					"data": [';

				for($i = 0; $i < count($services)-1; $i++){
					/*=============================
					=            Stock            =
					=============================*/
					if ($services[$i]->vpn == 1) {
						$vpn ="<button class='btn btn-success btn-sm'>SI</button>";
					}else{
						$vpn ="<button class='btn btn-danger btn-sm'>NO</button>";
					}
					if ($services[$i]->photo != null && $services[$i]->photo != "") {
						$img ="<img src='".$services[$i]->photo."' class='img-thumbnail' width='40px'>";
					}else{
						$img ="<img src='Views/img/usuarios/anonymous.png' class='img-thumbnail' width='40px'>";
					}
	                    $buttons ="<div class='btn-group'><button class='btn btn-warning btnEditarServicio' idServicio='".$services[$i]->id."' data-toggle='modal' data-target='#modalEditarServicio'><i class='fa fa-pen'></i></button><button class='btn btn-danger btnBorrarServicio' idServicio='".$services[$i]->id."' fotoServicio='".$services[$i]->photo."'><i class='fa fa-times'></i></button></div>";
					 echo '[
				      "'.($i+1).'",
				      "'.$img.'",
				      "'.$services[$i]->name.'",
				      "'.$services[$i]->service1.'",
				      "'.$services[$i]->service2.'",
				      "'.$vpn.'",
				      "'.$services[$i]->observations1.'",
				      "'.$services[$i]->observations2.'",
				      "'.$buttons.'"
				    ],';

				}
					if ($services[count($services)-1]->vpn == 1) {
						$vpn ="<button class='btn btn-success btn-sm'>SI</button>";
					}else{
						$vpn ="<button class='btn btn-danger btn-sm'>NO</button>";
					}
					if ($services[count($services)-1]->photo != null && $services[count($services)-1]->photo != "") {
						$img ="<img src='".$services[count($services)-1]->photo."' class='img-thumbnail' width='40px'>";
					}else{
						$img ="<img src='Views/img/usuarios/anonymous.png' class='img-thumbnail' width='40px'>";
					}
	                    $buttons ="<div class='btn-group'><button class='btn btn-warning btnEditarServicio' idServicio='".$services[count($services)-1]->id."' data-toggle='modal' data-target='#modalEditarServicio'><i class='fa fa-pen'></i></button><button class='btn btn-danger btnBorrarServicio' idServicio='".$services[count($services)-1]->id."' fotoServicio='".$services[count($services)-1]->photo."'><i class='fa fa-times'></i></button></div>";
					 echo '[
				      "'.(count($services)).'",
				      "'.$img.'",
				      "'.$services[count($services)-1]->name.'",
				      "'.$services[count($services)-1]->service1.'",
				      "'.$services[count($services)-1]->service2.'",
				      "'.$vpn.'",
				      "'.$services[count($services)-1]->observations1.'",
				      "'.$services[count($services)-1]->observations2.'",
				      "'.$buttons.'"
				    ]
				]
			}';
		}else{
			echo "Wrong Auth!";
			
		}
	}
}
