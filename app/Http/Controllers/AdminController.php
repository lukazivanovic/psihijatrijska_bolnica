<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserModel;

class AdminController extends Controller
{
    //vraca spisak usera i pravi stranicu
    public function home()
    {
        // $users=UserModel::all();
        $users=UserModel::orderBy('role','desc')->get();
        return view('admin.home',['users'=>$users]);
    }

    //pravi formu za menjanje role usera
    public function formaRole($id)
    {
        $users=UserModel::where('id',$id)->firstOrFail();
        if($users->role<3)
        {
           return view('admin.forma',['users'=>$users]); 
        }
        else
        {
            return $this->home();
        }
    }

    //menjanje role usera
    public function change(Request $request)
    {
        $request->validate([
            'id'=>'required',
            'name'=>'required',
            'email'=>'required',
            'role'=>'required',
        ]);

        $id=$request->id;

        $user=UserModel::findOrFail($id);

        if($user->role<3)
        {
            $user->name=$request->name;
            $user->email=$request->meil;

            $role=$request->role;
            if($role>=3)
            {
                $role=0;
            }

            $user->role=$role;
            $user->save();
        }

        return $this->home();
    }

    

    //funkcija za uklanjanje usera
    public function delete($id)
    {
        
        $user=UserModel::findOrFail($id);
        if($user->role<3)
        {
          $user->delete();  
        }
        
        return redirect('/admin');
    }

}
