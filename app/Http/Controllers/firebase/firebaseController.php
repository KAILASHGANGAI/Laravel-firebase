<?php

namespace App\Http\Controllers\firebase;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Kreait\Firebase\Contract\Database;


class firebaseController extends Controller
{
public $database;
public $table = 'contact';
    public function __construct(Database $database)
    {
        $this->database = $database;
    }
    public function index(){
        $contacts = $this->database->getReference($this->table)->getValue();
        $count_item = $this->database->getReference($this->table)->getSnapshot()->numChildren();

        return view('firebase.contact',compact('contacts','count_item'));
    }
    public function create(){
        return view('firebase.add_contact');
    }
    Public function store(Request $req){
       
        $postData = [
            'name'=>$req->name,
            'phone'=>$req->phone,
            'email'=>$req->email
         ];
        $postRef = $this->database->getReference($this->table)->push($postData);

        $postKey = $postRef->getKey();
        if($postKey){
            return redirect('contact')->with('status','contact saved successfully');
        }else{
            return back()->withInput($req->all())->with('status','contact saved successfully');

        }
    }
    public function edit($id){
        $key = $id;
       $data = $this->database->getReference($this->table)->getChild($id)->getValue(); // returns an array of key names
       return view('firebase.edit_contact',compact('data','key'));

    }

    public function update(Request $req, $key){
         
        $updatedata = [
            'name'=>$req->name,
            'phone'=>$req->phone,
            'email'=>$req->email
         ];
        $update = $this->database->getReference($this->table.'/'.$key)->update($updatedata);
        if ($update) {
            return redirect('contact')->with('status','Updated Successfully');
         }else{
            return redirect('contact')->with('status','Update failed. Try Again Later');

         }
       
        
    }

    public function delete($id){
        $delete = $this->database->getReference($this->table."/".$id)->remove(); // returns an array of key names
        
       
         if ($delete) {
            return redirect('contact')->with('status','deleted Successfully');
         }else{
            return redirect('contact')->with('status','not Deleted failed. Try Again Later');

         }
     }
}
