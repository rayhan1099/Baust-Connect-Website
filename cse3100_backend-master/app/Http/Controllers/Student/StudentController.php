<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\ContactChannel;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Support\Facades\Response;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * Create new account
     *
     * @param  \App\Http\Requests\StoreStudentRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreStudentRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        try {
            Student::create($data);
            return \response()->json(['status'=>'ok']);
        }catch (\Exception $e){

        }
        return \response()->json(['status'=>'error', 'message'=>"Failed to create account!"], \Illuminate\Http\Response::HTTP_BAD_REQUEST);
    }

    /**
     * Display the student info
     *
     * @param  string  $student
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($student)
    {
        $student_resource = null;
        if (strtolower(substr($student, 0,4)) == 'uni-'){
            $id = substr($student, 4);
            $student_resource = Student::where('student_id', $id)
                ->with('currentAddress')
                ->with('department')
                ->with('contacts');
        }elseif ($student == 'me'){
            if (Auth::check()){
                $student_resource = Student::where('id', Auth::user()->id)
                    ->with('currentAddress')
                    ->with('department')
                    ->with('contacts');
            }else{
                $student_resource = Student::where('id', 0)
                    ->with('currentAddress')
                    ->with('department')
                    ->with('contacts');
            }
        }else{
            $student_resource = Student::where('id', $student)
                ->with('currentAddress')
                ->with('department')
                ->with('contacts');
        }
        $student = $student_resource->first();
        if ($student){
            //retrieve $student contacts
            $student = $this->transformContactToObject($student);
            if (!Auth::check()){
                //hide email
                $student->email = null;
            }

            return Response::json([
                'status'=>'ok',
                'message'=>'Success',
                'data'=>[
                    'info'=>$student,
                ]
            ]);
        }
        return Response::json([
            'status'=>'error',
            'message'=>'Profile not Found!',
            'data'=>null
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStudentRequest  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }
    /**
     * Login user
     */
    public function login(Request $request){

        $id = $request->post('emailorid');
        $password = $request->post('password');

        $student = Student::where('student_id', $id)
            ->with('department')
            ->first();
        if ($student){
            if (Hash::check($password, $student->password)){
                Auth::login($student);
                return Response::json(['status'=>'ok','data'=>Auth::user()]);
            }
        }
        return Response::json(['status'=>'error','message'=>'Invalid user or password'], \Symfony\Component\HttpFoundation\Response::HTTP_UNAUTHORIZED);
    }
    /**
     * Login user
     */
    public function logout(Request $request){
        if (Auth::check()){
            Auth::logout();
            return Response::json(['status'=>'ok','message'=>'Logged out successfully!']);

        }
        return Response::json(['status'=>'error','message'=>'Failed to logout'], \Symfony\Component\HttpFoundation\Response::HTTP_UNAUTHORIZED);
    }

    private function transformContactToObject($student)
    {
        foreach ($student['contacts'] as $key=>$contact){
            $student['contacts'][$key]['channel_data'] = json_decode($contact['channel_data']);
        }
        return $student;
    }
}
