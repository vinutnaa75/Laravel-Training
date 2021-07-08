<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Form;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class FormController extends Controller
{
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'mobile' => ['required', 'string', 'min:10'],       
        ]);
    }

    //
    public function insert(Request $request)
    {
        $name = $request->fname;
        $email = $request->email;
        $mobile = $request->contact;
        $address = $request->address;

        $object = new  Form;

        $object->name = $name;
        $object->email = $email;
        $object->mobile = $mobile;
        $object->address = $address;
        $object->save();
        
        return back()->with('message','Sucessfully Registered');
    }

    
}
