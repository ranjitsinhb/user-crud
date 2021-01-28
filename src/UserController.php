<?php

namespace Txlabs\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use App\Http\Requests\UserFormRequest;
use Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // get all the users
        $users = User::all();
        // load the view and pass the users
        // return View::make('users.index')->with('users', $users);
        return view('user::user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {         
         return view('user::user.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {                                           
            $requestData = $request->all();            
            if ($request->has('password')) {
                $requestData['password'] = Hash::make($request->get('password'));
            }
            User::create($requestData); 
            return redirect('/user')->with('success', 'User has been created successfully.');
        } catch(\Exception $e) {
            return back()->with('error', 'Something Went Wrong.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $userData = User::find($id);
        return view('user::user.view')->with('data', $userData);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $userData = User::find($id);
        return view('user::user.add')->with('data', $userData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $userObj = User::findOrFail($id); 
            $requestData = $request->all();
            if ($request->has('password')) {
                $requestData['password'] = Hash::make($request->get('password'));
            }
            $userObj->update($requestData);
            return redirect('/user')->with('success', 'User has been updated successfully.');
        } catch(\Exception $e) {
            return back()->with('error', 'Something Went Wrong.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {                         
            $userObj = User::destroy($id);
            return response()->json([
                'success' => true,
                'message'   => 'User has been deleted successfully.'
            ], 200);
        } catch(\Exception $e) {
            return response()->json([
                'success' => false,
                'message'   => 'Something Went Wrong.'
            ], 200);
        }
    }
}
