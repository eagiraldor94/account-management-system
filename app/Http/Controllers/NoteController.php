<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;

use App;

class NoteController extends Controller
{
	/*===================================
	=           Note CREATE            =
	===================================*/
	
	static public function ctrNoteCreate(){
			if (session('id')) {
				if (isset($_POST['newNote'])) {
					   	$answer = new App\Note();
					   	$answer->content = $_POST['newContent'];
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
	/*===================================
	=            USER EDIT            =
	===================================*/
	static public function ctrNoteEdit(){
			if (session('id')) {
				if (isset($_POST['editNote'])) {
					   	$answer = App\Note::find($_POST['editId']);
					   	$answer->content = $_POST['newContent'];
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
	/*======================================
	=            Borrar usuario            =
	======================================*/
	static public function ctrNoteDelete(){
		if (session('id')) {
			if (isset($_POST['idNota'])) {
				$answer=App\Note::find($_POST['idNota']);
				$answer->delete();
			}
		}else{
		 	return view('layouts.permisions_error');
		}
	}
	public function ajaxNoteEdit(){
		if (session('id')) {
			$answer = App\Note::find($_POST['idNota']);
			echo json_encode($answer);
		}
	}
	/*===============================================
	=            Mostrar tabla suscripciones           =
	===============================================*/
	
	public function ajaxDatatableNotas(){
		if (session('id')) {
  			$notes = App\Note::all();
		  	echo '{
					"data": [';

				for($i = 0; $i < count($notes)-1; $i++){
                    $buttons ="<div class='btn-group'><button class='btn btn-warning btnEditarNota' idNota='".$notes[$i]->id."' data-toggle='modal' data-target='#modalEditarNota'><i class='fa fa-pen'></i></button><button class='btn btn-danger btnBorrarNota' idNota='".$notes[$i]->id."'><i class='fa fa-times'></i></button></div>";
					 echo '[
				      "'.($i+1).'",
				      "'.$notes[$i]->content.'",
				      "'.$buttons.'"
				    ],';

				}
                    $buttons ="<div class='btn-group'><button class='btn btn-warning btnEditarNota' idNota='".$notes[count($notes)-1]->id."' data-toggle='modal' data-target='#modalEditarNota'><i class='fa fa-pen'></i></button><button class='btn btn-danger btnBorrarNota' idNota='".$notes[count($notes)-1]->id."'><i class='fa fa-times'></i></button></div>";
					 echo '[
				      "'.(count($notes)).'",
				      "'.$notes[count($notes)-1]->content.'",
				      "'.$buttons.'"
				    ]
				]
			}';
		}else{
			echo "Wrong Auth!";
			
		}
	}
}
