<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Documents;
use \App\Property;
use \App\Assigns;
class Usercontroller extends Controller
{
    
	public function destroy($id)
	{			
		$passport = \App\User::find($id);
        $passport->delete();
        return redirect('home')->with('success','Information has been  deleted');
	}
	public function userstatus($id)
	{
		$passport = \App\User::find($id);
		
		if($passport->status == 0)
		{
		$status=1;
		}
		else
		{
			$status=0;
		}
		
		
		$flight = \App\User::find($id);

			$flight->status = $status;

			$flight->save();
		return redirect('home')->with('success','Information has been updated');
	}
	
	
	public function documentdelete($id)
	{
		$passport = \App\Documents::find($id);
        $passport->delete();
        return redirect()->back()->with('success','Information has been  deleted');		
	}
	
	public function downloads(Request $request)
	{
		$this->validate($request,[
    			'upload' => 'required|max:1024',  			
    			'uid' => 'required'  			
				]);
	   

    	$file = $request->file('upload');   
		$extn=$file->getClientOriginalExtension();
		$name=time().'.'.$extn;		
		$destinationPath = 'uploads/';
        $file->move($destinationPath,$name);
        $path=$destinationPath.$name;

		
			$flight=new Documents();	
	        $flight->uid=$request->uid;
	        $flight->upload=$path;
		    $flight->save();
			return redirect()->back()->with('success','Successfully Sent');
	}
	
	public function properties(Request $request)
	{
		
		$this->validate($request,[
    			'name' => 'required|max:100',  			
    			'price' => 'required|numeric',  			
    			'capacity' => 'required|numeric',  			
				]);
		
		
		$flight=new Property();	
	        $flight->name=$request->name;
	        $flight->price=$request->price;
	        $flight->capacity=$request->capacity;
		    $flight->save();		
		
		return redirect()->back()->with('success','Successfully Saved');
		
		
		
		
	}
	
	public function propertydelete($id)
	{
	    $passport = \App\Property::find($id);
        $passport->delete();
        return redirect()->back()->with('success','Information has been  deleted');	

	}
	
	public function propertyassign(Request $request)
	{
	   $this->validate($request,[
    			'pid' => 'required|not_in:0',  			
				'uid' => 'required|not_in:0',  
				'plotno' => 'required|numeric', 
				'duedate'=>'required',  
				'amount'=>'required|numeric',				
				]);		
		    $flight=new Assigns();	
	        $flight->pid=$request->pid;
			$flight->uid=$request->uid;	 
			$flight->plotno=$request->plotno;
			$flight->date=$request->duedate;
			$flight->amount=$request->amount;	   	         
		    $flight->save();		
		return redirect()->back()->with('success','Successfully Saved');
	}


	public function assigndelete($id)
	{
		$passport = \App\Assigns::find($id);
        $passport->delete();
        return redirect()->back()->with('success','Information has been  deleted');	
	}


	
	
	
	
	
	
	
	
	
	
	
	
}
