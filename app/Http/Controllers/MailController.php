<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;

use App;

use Carbon\Carbon;

class MailController extends Controller
{
	/*===================================
	=           MAIL CREATE            =
	===================================*/
	
	static public function ctrMailCreate(){
			if (session('id')) {
				if (isset($_POST['newMail'])) {
					   	$answer = new App\Mail();
					   	if ($_POST['newBirthDate']!=null && $_POST['newBirthDate']!="") {
						   	$answer->birth_date = Carbon::createFromFormat('d/m/Y',$_POST['newBirthDate']);
					   	}else{
					   		$answer->birth_date = null;
					   	}
					   	$answer->mail = $_POST['newMailAddress'];
					   	$answer->password = $_POST["newPassword"];
					   	$answer->recovery = $_POST['newRecovery'];
					   if ($answer->save()) {
					   	return redirect('/correos');
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
	static public function ctrMailEdit(){
			if (session('id')) {
				if (isset($_POST['editMail'])) {
					   	$answer = App\Mail::find($_POST['editId']);
					   	if ($_POST['newBirthDate']!=null && $_POST['newBirthDate']!="") {
						   	$answer->birth_date = Carbon::createFromFormat('d/m/Y',$_POST['newBirthDate']);
					   	}else{
					   		$answer->birth_date = null;
					   	}
					   	$answer->mail = $_POST['newMailAddress'];
					   	$answer->password = $_POST["newPassword"];
					   	$answer->recovery = $_POST['newRecovery'];
					   if ($answer->save()) {
					   	return redirect('/correos');
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
	static public function ctrMailDelete(){
		if (session('id')) {
			if (isset($_POST['idCorreo'])) {
				$answer=App\Mail::find($_POST['idCorreo']);
				$answer->delete();
			}
		}else{
		 	return view('layouts.permisions_error');
		}
	}
	public function ajaxMailEdit(){
		if (session('id')) {
			$answer = App\Mail::find($_POST['idCorreo']);
			echo json_encode($answer);
		}
	}
	/*===============================================
	=            Mostrar tabla suscripciones           =
	===============================================*/
	
	public function ajaxDatatableCorreos(){
		if (session('id')) {
  			$mails = App\Mail::all();
		  	echo '{
					"data": [';

				for($i = 0; $i < count($mails)-1; $i++){
					if ($mails[$i]->birth_date != null && $mails[$i]->birth_date != "") {
						$fecha =Carbon::parse($mails[$i]->birth_date)->format('d/m/Y');
					}else{
						$fecha = "";
					}
	                    $buttons ="<div class='btn-group'><button class='btn btn-warning btnEditarCorreo' idCorreo='".$mails[$i]->id."' data-toggle='modal' data-target='#modalEditarCorreo'><i class='fa fa-pen'></i></button><button class='btn btn-danger btnBorrarCorreo' idCorreo='".$mails[$i]->id."'><i class='fa fa-times'></i></button></div>";
					 echo '[
				      "'.($i+1).'",
				      "'.$mails[$i]->mail.'",
				      "'.$mails[$i]->password.'",
				      "'.$mails[$i]->recovery.'",
				      "'.$fecha.'",
				      "'.$buttons.'"
				    ],';

				}
					if ($mails[count($mails)-1]->birth_date != null && $mails[count($mails)-1]->birth_date != "") {
						$fecha =Carbon::parse($mails[count($mails)-1]->birth_date)->format('d/m/Y');
					}else{
						$fecha = "";
					}
	                    $buttons ="<div class='btn-group'><button class='btn btn-warning btnEditarCorreo' idCorreo='".$mails[count($mails)-1]->id."' data-toggle='modal' data-target='#modalEditarCorreo'><i class='fa fa-pen'></i></button><button class='btn btn-danger btnBorrarCorreo' idCorreo='".$mails[count($mails)-1]->id."'><i class='fa fa-times'></i></button></div>";
					 echo '[
				      "'.(count($mails)-1+1).'",
				      "'.$mails[count($mails)-1]->mail.'",
				      "'.$mails[count($mails)-1]->password.'",
				      "'.$mails[count($mails)-1]->recovery.'",
				      "'.$fecha.'",
				      "'.$buttons.'"
				    ]
				]
			}';
		}else{
			echo "Wrong Auth!";
			
		}
	}
}
