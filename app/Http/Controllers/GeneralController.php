<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;

use App;

use Mail; 

use Storage;

use Carbon\Carbon;

class GeneralController extends Controller
{
    public function homeView(Request $request){
      if (session('id')) {
          $usuarios = App\User::all();
          $clientes = App\Client::all();
          $servicios = App\Service::all();
          $suscripciones = App\Subscription::all();
          return view('layouts.home',['usuarios'=>$usuarios,'servicios'=>$servicios,'clientes'=>$clientes,'suscripciones'=>$suscripciones]);
      }else{
          return view('layouts.home');
      }
  }
    public function usersView(Request $request){
      if (session('id')) {
          return view('layouts.users');
      }else{
          return redirect('/');
      }
  }
    public function clientsView(Request $request){
      if (session('id')) {
          return view('layouts.clients');
      }else{
          return redirect('/');
      }
  }
    public function servicesView(Request $request){
      if (session('id')) {
          return view('layouts.services');
      }else{
          return redirect('/');
      }
  }
    public function subscriptionsView(Request $request){
      if (session('id')) {
          $clientes = App\Client::all();
          $servicios = App\Service::all();
          return view('layouts.subscriptions',['servicios'=>$servicios,'clientes'=>$clientes->sortBy('name')]);
      }else{
          return redirect('/');
      }
  }
  	public function printContract($id){
      if (session('id')) {
          setlocale(LC_TIME, 'es_ES');
          date_default_timezone_set('America/Bogota');
          Carbon::setLocale('es');
          $subscription = App\Subscription::find($id);
          $service = $subscription->service;
          $client = $subscription->client;
          $inicio = Carbon::parse($subscription['contract_start']);
          $inicio->toDateString();
          $inicio = substr($inicio, 0,-9);
          $fin = Carbon::parse($subscription['contract_expiration']);
          $fin->subDay();
          $fin->toDateString();
          $fin = substr($fin, 0,-9);
          $vpn = App\Service::where('name','vpn')->first();
          $details = "Señor@ ".$client->name.", gracias por su compra.<br><br>Detalles de su cuenta ".$service->service1.":<br>Usuario: ".$subscription->username1."<br>Contraseña: ".$subscription->password1."<br>Observaciones: ".$service->observations1."<br><br>";
          if ($service->service2 != null && $service->service2 !="") {
            $details.="Detalles de su cuenta ".$service->service2.":<br>Usuario: ".$subscription->username2."<br>Contraseña: ".$subscription->password2."<br>Observaciones: ".$service->observations2."<br><br>";
          }
          if ($service->vpn == 1) {
            $details .= "Detalles de su cuenta del VPN ".$vpn->service1.":<br>Usuario: a7anr2m6s@gmail.com<br>Contraseña: Hhuj783647@d07@<br>Observaciones: ".$vpn->observations1."<br><br>";
          }
          $details .= "Inicio del contrato: ".$inicio."<br>Terminación del contrato: ".$fin;
          return view('details',['details'=>$details]);
      }else{
          return redirect('/');
      }
  	}
}
