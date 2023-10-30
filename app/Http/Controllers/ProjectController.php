<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ProjectController extends Controller
{
    //

    public function getProjectsPage(){
        $projects=Project::all();

        return view('home.projects',compact('projects',));
    }

    public function addProjectPage(){
        return view('home.projectAdd');
    }

    public function addProject(Request $request){
        $username=Auth::user()->username;
        $validatedProjectData=$request->validate([
            'name'=>'required|string',
            'address'=>'required',
            'city'=>'required|string',
            'region'=>'required|string',
            'total_plots'=>'required',
            'available_plots'=>'required',
            'available_plots'=>'required',
            'installment_period'=>'required',
            'description'=>'',
            'status'=>'required',
            'plots_number'=>'',
            'file_path'=>'',
            'block'=>'',
            'price_per_sqm'=>'required',
            'start_date'=>'',

        ],[
            'name.required' => 'The project name is required.',
            'address.required' => 'Address is required.',
            'city.required' => 'City is required.',
            'region.required' => 'Region is required.',
            'total_plots.required'=>'Total plots is required',
            'available_plots.required'=>'Available plots is required',
            'status.required'=>'Status is required',
            'price_per_sqm.required'=>'Price is required',
            'installment_period.required'=>'Installment period is required',

        ]);
        $addProject = new Project;
        $addProject->name = $validatedProjectData['name'];
        $addProject->address = $validatedProjectData['address'];
        $addProject->city = $validatedProjectData['city'];
        $addProject->region = $validatedProjectData['region'];
        $addProject->total_plots = $validatedProjectData['total_plots'];
        $addProject->available_plots = $validatedProjectData['available_plots'];
        $addProject->status = $validatedProjectData['status'] ? 1 : 0;
        $addProject->price_per_sqm = $validatedProjectData['price_per_sqm'];
        $addProject->plots_no = $validatedProjectData['plots_number'];
        $addProject->description = $validatedProjectData['description'];
        $addProject->price_per_sqm = $validatedProjectData['price_per_sqm'];
        if ($request->hasFile('file_path')) {
            $file = $request->file('file_path');
            $addProject->file_path=$file->store('files', 'public');
        }
        $addProject->installment_period = $validatedProjectData['installment_period'];
        $addProject->block = $validatedProjectData['block'];
        $addProject->unavailable_plots=$validatedProjectData['total_plots']-$validatedProjectData['available_plots'];
        $addProject->start_date = $validatedProjectData['start_date'];
        $addProject->created_by = $username;
        $addProject->updated_by = $username;
        $addProject->created_at = now();
        $addProject->updated_at = now();
        $addProject->end_date=null;
        $addProject->save();
        Alert::success('Success','Role Updated Successfully!');
        return to_route('projects');

    }

    public function ProjectsDetails($id){
        $projectDetails=Project::findOrFail($id);
        return view('home.projectDetails',compact('projectDetails'));
    }

    public function editProjectsPage(Request $request,$id){
        $projectDetails=Project::findOrFail($id);
        return view('home.projectEdit',compact('projectDetails'));
    }

    public function editProject($id,Request $request){
        $projectDetails=Project::findOrFail($id);
        $validatedProjectData=$request->validate([
            'name'=>'required|string',
            'address'=>'required',
            'city'=>'required|string',
            'region'=>'required|string',
            'total_plots'=>'required',
            'available_plots'=>'required',
            'available_plots'=>'required',
            'installment_period'=>'required',
            'description'=>'',
            'status'=>'required',
            'plots_number'=>'',
            'file_path'=>'',
            'block'=>'',
            'price_per_sqm'=>'required',
            'start_date'=>'',
        ],[
            'name.required' => 'The project name is required.',
            'address.required' => 'Address is required.',
            'city.required' => 'City is required.',
            'region.required' => 'Region is required.',
            'total_plots.required'=>'Total plots is required',
            'available_plots.required'=>'Available plots is required',
            'status.required'=>'Status is required',
            'price_per_sqm.required'=>'Price is required',
            'installment_period.required'=>'Installment period is required',

        ]);
        $projectDetails->update($validatedProjectData);
        Alert::success('Success','Project Edited Successfully!');
        return to_route('projects');
    }

    public function deleteProject($id){
        $deleteProject=Project::findOrFail($id);
        $deleteProject->delete();
        Alert::success('Success','Project Deleted Successfully!');
        return to_route('projects');
    }
}
