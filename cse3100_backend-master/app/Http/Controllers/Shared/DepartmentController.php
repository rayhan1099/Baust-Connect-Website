<?php

namespace App\Http\Controllers\Shared;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDepartmentRequest;
use App\Http\Requests\UpdateDepartmentRequest;
use App\Http\Requests\ViewDepartmentStudentListRequest;
use App\Http\Resources\DepartmentResource;
use App\Models\Department;
use App\Models\Student;
use Illuminate\Database\QueryException;
use Illuminate\Http\Response;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return DepartmentResource
     */
    public function index()
    {
        return new DepartmentResource(Department::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreDepartmentRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreDepartmentRequest $request)
    {
        try {
            Department::create($request->validated());
            return response()->json(["status" => "ok", "message" => 'Department added successfully!']);
        } catch (QueryException $e) {
            if ($e->errorInfo[1] == 1062) {
                //duplicate
                return response()->json(["status" => "error", "message" => 'One such department already exist in database!'], Response::HTTP_UNPROCESSABLE_ENTITY);
            }
        }
        //error
        return response()->json(["status" => "error", "message" => 'Something went wrong.'], Response::HTTP_BAD_REQUEST);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Department $department
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Department $department)
    {
        $data = [
            "students" => Student::where('department_id', $department->id)->count(),
            "batches" => Student::where('department_id', $department->id)->groupBy("batch")->count(),
            "department" => $department,
        ];
        return \response()->json([
            'status' => "ok",
            'message' => 'Department data',
            "data" => $data,
        ]);
    }
    public function showStudentList(Department $department, ViewDepartmentStudentListRequest $request)
    {
        $data = [
            "students" => Student::where('department_id', $department->id)
                ->with('currentAddress')
                ->paginate(100),
            "department"=>$department,
            "student_count" => Student::where('department_id', $department->id)->count(),
        ];
        return \response()->json([
            'status' => "ok",
            'message' => 'Department data',
            "data" => $data,
        ]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Department $department
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateDepartmentRequest $request
     * @param \App\Models\Department $department
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateDepartmentRequest $request, Department $department)
    {
        try{
            $department->update($request->validated());
            return \response()->json(["status"=>"ok","message"=>"Updated successfully"]);
        }catch (\Exception $e){

        }
        return \response()->json(["status"=>"error","message"=>"Update failed"], Response::HTTP_BAD_REQUEST);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Department $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {

    }
}
