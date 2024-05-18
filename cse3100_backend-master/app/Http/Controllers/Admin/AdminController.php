<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminActionRequest;
use App\Http\Requests\AdminSearchRequest;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Http\Requests\ViewAdminRequest;
use App\Http\Resources\AdminResource;
use App\Models\Admin;
use App\Models\Department;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return AdminResource
     */
    public function index(ViewAdminRequest $request)
    {
        return new AdminResource(Admin::paginate(50));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAdminRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreAdminRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        try {
            $data['profile_picture'] = 'none';
            Admin::create($data);
            return response()->json(['status'=>'ok', 'message'=>'Admin created successfully']);
        }catch (\Exception $e){
        }
        return response()->json(['status'=>'error', 'message'=>"Failed to create admin!"], \Illuminate\Http\Response::HTTP_BAD_REQUEST);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAdminRequest  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdminRequest $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }
    public function login(Request $request){

        $id = $request->post('emailorid');
        $password = $request->post('password');
        if (Auth::guard("admins")->attempt([
            'uni_per_id'=>$id,
            'password'=>$password
        ])){
            //$request->session()->regenerate();
            return Response::json(['status'=>'ok','data'=>Auth::guard("admins")->user()]);
        }
        return \response()->json(['status'=>'error','message'=>'Invalid user or password'], \Symfony\Component\HttpFoundation\Response::HTTP_UNAUTHORIZED);
    }
    /**
     * logout user
     */
    public function logout(Request $request){
        if (Auth::guard("admins")->check()){
            Auth::guard("admins")->logout();
            return Response::json(['status'=>'ok','message'=>'Logged out successfully!']);

        }
        return Response::json(['status'=>'error','message'=>'Failed to logout'], \Symfony\Component\HttpFoundation\Response::HTTP_UNAUTHORIZED);
    }

    /**
     * other actions
     */
    public function action(AdminActionRequest $request)
    {

    }
    /**
     * search actions
     */
    public function search(AdminSearchRequest $request)
    {

    }

    public function admin_summary(ViewAdminRequest $request)
    {
        $data = [
            'dept_count'=>Department::count(),
            'student_count'=>Student::count(),
            'admin_count'=>Admin::count(),
        ];

        return \response()->json(['status'=>'ok','message'=>'success','data'=>$data]);
    }

}
