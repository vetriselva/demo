<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RegisterForm;
use App\Http\Controllers\FileController;
use App\Http\Requests\UpdateRegisterFormRequest;
use App\Http\Requests\CreateRegisterFormRequest;
use Yajra\DataTables\Facades\DataTables;
use Flash;
use Redirect;

class RegisterFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('register_form.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('register_form.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRegisterFormRequest $request)
    {
        $register_form = RegisterForm::create($request->all());
        if(isset($register_form->id)) {
            $FileController = new FileController();
            if($FileController->changeDir($register_form)) {
                Flash::success("Data inserted successfully");
                return ['status'=>'success'];
                // return redirect(route('admin.registerform.create'));
            }
        }
        Flash::error("Something went wrong please try again");
        return ['status'=>'fail'];
        // return redirect(route('admin.registerform.create'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $registration = RegisterForm::find($id);
        $files = $this->getfiles($id);
        return view('register_form.show', compact('registration','files'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $registration = RegisterForm::find($id);
        $files = $this->getfiles($id);
        return view('register_form.edit', compact('registration','files'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRegisterFormRequest $request, $id)
    {
        $register_form = RegisterForm::findorFail($id);
        $register_form->update($request->all());
        if(isset($register_form->id)) {
            Flash::success("Data updated successfully");
            return ['status'=>'success'];
        }
        Flash::error("Something went wrong please try again");
        return ['status'=>'fail'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $registerform = RegisterForm::find($id);
        if ($registerform) {
            $registerform->delete();
            Flash::success('deleted successfully.');
        } else {
            Flash::error('Something went wrong try again');
        }
        return Redirect::back();  
    }

    public function getRegistrationApi (Request $request) {
        $modal = RegisterForm::query();
        return Datatables::eloquent($modal)
                ->editColumn('created_at', function( RegisterForm $registration ) {
                    return date("Y-m-d", strtotime($registration->created_at));
                })
                ->addColumn('action', function( RegisterForm $registration ) {
                     $link = "<div class='edit-delete'>";
                     $link .= " <a href=".route('admin.registerform.show', $registration->id)." class='btn btn-success btn-sm '>view</a>";
                     $link .= " <a href=".route('admin.registerform.edit', $registration->id)." class='btn btn-info btn-sm '>edit</a>";
                     $link .=" <a href='#' class='btn btn-danger btn-sm delete-modal-popup' data-action=".route('admin.registerform.destroy', $registration->id) .">delete</a>";
                     $link .= "</div> ";
                     return $link;
                })
                ->toJson();
    }

    public function getFiles($id) {
        $dir = storage_path('app/uploads/'.$id.'/*');
        $file_name = [];
        return $files = glob($dir);
    }
}
