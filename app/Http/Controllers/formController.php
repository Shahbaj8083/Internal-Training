<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\employee;

class formController extends Controller
{
    public function index(){
        $title = 'Employee Registration Form';
        $url = url('/myform');
        $data = compact('url', 'title');
        return view('myform')->with($data);
    }

    public function store(Request $request){
        $request->validate(
            [
                'fname' => 'required',
                'lname' => 'required',
                'email' => 'required|email',
                'addproof' => 'required',
            ]
            );
            
            echo "<pre>";
            print_r($request->all());

        //insert query  
        $emp = new employee;
        $emp->fname = $request['fname'];
        $emp->lname = $request['lname'];
        $emp->email = $request['email'];
        $emp->address_proof = $request['addproof'];
        $emp->proof_status = $request['proofstat'];
        $emp->save();

        return redirect('/myform/view-employee');
        //end -----------------


    }
    public function view(){
        $emp = employee::all();
        $data = compact('emp');
        return view('employee-view')->with($data);
    }
    // public function view(){
    //     $emp = employee::all();
    //     $data = compact('emp');
    //     return response()->json($employees, Response::HTTP_OK);
    // }

    public function delete($id){
        employee::find($id)->delete();
        return redirect()->back();
        
    }
    public function edit($id){
        $title = 'Update Employee';
        $url = url('/myform/update')."/".$id;
        $emp = employee::find($id);
        $data = compact('emp', 'url', 'title');
        return view('myform')->with($data);

        
    }
    public function update($id, Request $request){
        $emp = employee::find($id);
        $emp->fname = $request['fname'];
        $emp->lname = $request['lname'];
        $emp->email = $request['email'];
        $emp->address_proof = $request['addproof'];
        $emp->proof_status = $request['proofstat'];
        $emp->save();

        return redirect('/myform/view-employee');

    }
}
?>
