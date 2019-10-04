<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Zagon; 
use App\Zagonlog; 
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    //
	
	public function zagonlogstore(Request $request){
		
		$data = Zagonlog::create($request->all());
		
		if($data->type =='delete'){  
			Zagon::where('zag', '=' ,$data->zagid)->update(["count"=>DB::raw("count-".$data->count)]); 
		}else {
			Zagon::where('zag', '=' ,$data->zagid)->update(["count"=>DB::raw("count+".$data->count)]);  
		} 
		
		
		return response()->json(Zagon::all()); 
	}

	public function sheeps(){
		
		return response()->json(Zagon::all()); 
	}
	
	public function getHistory(){  
		
		return response()->json(Zagonlog::orderby("day","DESC")->paginate(50));   
	}
	
	public function getDay(){
		
		$data = Zagonlog::orderby("day","DESC")->first();
		if(isset($data->day) AND $data->day > 0 )
			return response()->json($data->day);  
		else
			return response()->json(0);
	} 
	
	
	
	public function otchets(Request $request){ 
		
		$data = array(
			"allsheep"=>Zagonlog::where([["type","=","add"],["day","<=",$request->day]])->count(),
			"killedsheep"=>Zagonlog::where([["type","=","delete"],["day","<=",$request->day]])->count(),
			"zag1"=>Zagonlog::select("zagid")->where([["day","<=",$request->day],["zagid","=",1]])->count(),  
			"zag2"=>Zagonlog::select("zagid")->where([["day","<=",$request->day],["zagid","=",2]])->count(), 			
			"zag3"=>Zagonlog::select("zagid")->where([["day","<=",$request->day],["zagid","=",3]])->count(), 			
			"zag4"=>Zagonlog::select("zagid")->where([["day","<=",$request->day],["zagid","=",4]])->count(), 			
			
		);  
		return response()->json($data); 
	}

	 
	
}
