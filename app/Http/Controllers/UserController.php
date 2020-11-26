<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;

use App;

class UserController extends Controller
{
/*=============================================
	=                    LOGIN               =
	=============================================*/
	static public function ctrUserLogin(){
		if (isset($_POST['user']) && isset($_POST['pass'])) {
			if (preg_match('/^[a-zA-Z-0-9 ]+$/', $_POST['user'])) {
				$answer = App\User::where('username',$_POST['user'])->first();
				$password = $_POST["pass"];
				if (is_object($answer)) {
			
					if (password_verify($password,$answer->password) ) {
							session(['user' => $answer->username]);
							session(['id' => $answer->id]);
								echo ' <script>
							window.location = "/"; </script> ';
					}else{
						return view('layouts.credentials_error');
					}
				}else{
					return view('layouts.credentials_error');
				}
			}else{
				return view('layouts.characters_error');
			}
		}else{
			return view('layouts.blank_error');
		}
	}
	/*===================================
	=            USER CREATE            =
	===================================*/
	
	static public function ctrUserCreate(){
		if (session('id')) {
				if (isset($_POST['newUser'])) {
					if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["newName"]) &&
					   preg_match('/^[a-zA-Z0-9 ]+$/', $_POST["newUsername"])) {
					   	$answer = new App\User();
					   	$answer->username = $_POST['newUsername'];
					   	$answer->password = password_hash($_POST["newPassword"], PASSWORD_DEFAULT);
					   if ($answer->save()) {
					   	return redirect('/usuarios');
					   }
					 } else {
					 	return view('layouts.users_error');
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
	static public function ctrUserEdit(){
		if (session('id')) {
				$answer = App\User::where('username',$_POST['newUsername'])->first();
			   	if ($_POST['newPassword'] != "") {
			   		$password = password_hash($_POST["newPassword"], PASSWORD_DEFAULT);
			   	}else{
			   		$password=$answer->password;
			   	}
				if (isset($_POST['editUser'])) {
					   	$answer->username = $_POST['newUsername'];
					   	$answer->password = $password;
					   if ($answer->save()) {
					   	return redirect('/usuarios');
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
	static public function ctrUserDelete(){
		if (session('id')) {
			if (isset($_POST['idUsuario'])) {
				$answer->delete();
			}
		}else{
		 	return view('layouts.permisions_error');
		}
	}
	static public function ctrUserLogout(){
		Session::flush();
		return redirect('/');
	}
	public function ajaxUserEdit(){
		if (session('id')) {
			$answer = App\User::find($_POST['idUsuario']);
			echo json_encode($answer);
		}
	} 
	public function ajaxEditMe(){
		$answer = App\User::find(session('id'));
		echo json_encode($answer);
	} 
	public function ajaxUserCheck(){
		if (session('id')) {
			$answer = App\User::where('username',$_POST['userCheck'])->first();
			echo json_encode($answer);
		}
	} 
	public function ctrEditMe(){
		if (session('id')) {
				$answer = App\User::find(session('id'));
			   	if ($_POST['newPassword'] != "") {
			   		$password = password_hash($_POST["newPassword"], PASSWORD_DEFAULT);
			   	}else{
			   		$password=$answer->password;
			   	}
				if (isset($_POST['editMe'])) {
					   	$answer->username = $_POST['newUsername'];
					   	$answer->password = $password;
					   if ($answer->save()) {
					   	return redirect('/');
					   }
				}else{
					return redirect('/');
				}
			}else{
			 	return view('layouts.permisions_error');
			}
	}
	/*===============================================
	=            Mostrar tabla usuarios           =
	===============================================*/
	
	public function ajaxDatatableUsuarios(){
		if (session('id')) {
  			$users = App\User::all();
		  	echo '{
					"data": [';

				for($i = 0; $i < count($users)-1; $i++){
					/*=============================
					=            Stock            =
					=============================*/
	                    $buttons ="<div class='btn-group'><button class='btn btn-warning btnEditarUsuario' idUsuario='".$users[$i]->id."' data-toggle='modal' data-target='#modalEditarUsuario'><i class='fa fa-pen'></i></button><button class='btn btn-danger btnBorrarUsuario' idUsuario='".$users[$i]->id."'><i class='fa fa-times'></i></button></div>";
					 echo '[
				      "'.($i+1).'",
				      "'.$users[$i]->username.'",
				      "'.$buttons.'"
				    ],';

				}
	                    $buttons ="<div class='btn-group'><button class='btn btn-warning btnEditarUsuario' idUsuario='".$users[count($users)-1]->id."' data-toggle='modal' data-target='#modalEditarUsuario'><i class='fa fa-pen'></i></button><button class='btn btn-danger btnBorrarUsuario' idUsuario='".$users[count($users)-1]->id."'><i class='fa fa-times'></i></button></div>";
					 echo '[
				      "'.(count($users)).'",
				      "'.$users[count($users)-1]->username.'",
				      "'.$buttons.'"
				    ]
				]
			}';
		}else{
			echo "Wrong Auth!";
			
		}
	}
}
