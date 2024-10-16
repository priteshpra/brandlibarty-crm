<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = Customers::all()->where('Status', 1);
        $roleData = Role::all()->where('Status', 1);
        foreach ($roleData as $role) {
            $roles[$role->RoleID] = $role->RoleName;
        }
        return view('admin.users.list', compact('users', 'roleData', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'FirstName' => 'required',
            'LastName' => 'required',
            'EmailID' => 'required',
            'MobileNo' => 'required',
            'City' => 'required',
            'State' => 'required',
            'RoleID' => 'required',
        ]);

        try {

            $ModifiedBy = Auth::user()->id;
            $User = new User();

            $User->name = $request->FirstName;
            $User->email = $request->EmailID;
            $User->role = $request->RoleID;
            $User->password = Hash::make('123456');
            $User->created_at = date('Y-m-d H:i:s');
            $User->save();
            $lastInsertId = $User->id;

            $Prompt = new Customers();
            $Prompt->userID = $lastInsertId;
            $Prompt->FirstName = $request->FirstName;
            $Prompt->LastName = $request->LastName;
            $Prompt->EmailID = $request->EmailID;
            $Prompt->MobileNo = $request->MobileNo;
            $Prompt->City = $request->City;
            $Prompt->State = $request->State;
            $Prompt->RoleID = $request->RoleID;
            $Prompt->password = Hash::make('123456');
            $Prompt->createdBy = $ModifiedBy;
            $Prompt->save();

            return redirect()->route('users.index')->with('success', 'User created successfully.');
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customers $user)
    {
        // dd($user);
        $request->validate([
            'FirstName' => 'required',
            'LastName' => 'required',
            'EmailID' => 'required',
            'MobileNo' => 'required',
            'City' => 'required',
            'State' => 'required',
            'RoleID' => 'required',
        ]);
        try {
            $Prompt = Customers::where('userID', $user->Id)->update([
                'FirstName' => $request->FirstName,
                'LastName' => $request->LastName,
                'EmailID' => $request->EmailID,
                'MobileNo' => $request->MobileNo,
                'City' => $request->City,
                'State' => $request->State,
                'RoleID' => $request->RoleID,
            ]);
            // dd($Prompt);
            // $Prompt->FirstName = $request->FirstName;
            // $Prompt->LastName = $request->LastName;
            // $Prompt->EmailID = $request->EmailID;
            // $Prompt->MobileNo = $request->MobileNo;
            // $Prompt->City = $request->City;
            // $Prompt->State = $request->State;
            // $Prompt->RoleID = $request->RoleID;
            // $Prompt->save();
            return redirect()->route('users.index')->with('success', 'User updated successfully.');
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $prompt = Customers::find($id);
            $prompt->status = 0;
            $prompt->save();

            $User = User::find($id);
            $User->status = 0;
            $User->save();

            return redirect()->route('users.index')
                ->with('success', 'User deleted successfully');
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    public function getUserData(Request $request)
    {
        $userId = $request->input('userID');
        $users = Customers::find($userId);
        return $users;
    }
}
