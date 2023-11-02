<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\{Project,Plot};
use RealRashid\SweetAlert\Facades\Alert;

class PlotsController extends Controller
{
    //
    public function viewPlots($id){
        $project=Project::findOrFail($id);
        $project_id=$project->id;
        $plots = Plot::where('project_id', $project_id)->get();

        return view('home.plots',compact('plots','project_id'));
    }

    public function viewAddPlot($id){
        $project=Project::findOrFail($id);
        $project_id=$project->id;
        $plots=Plot::where('project_id',$project_id);

        return view('home.plotsAdd',compact('project_id','plots'));
    }

    public function addPlot(Request $request){
            $username = Auth::user()->username;
            $addPlot = new Plot;
            $project_id=$request->project_id;
            $project = Project::findOrFail($project_id);
            $addPlot->project_id = $project_id;
            $addPlot->plot_number = $request->plot_number;
            $addPlot->land_use = $request->land_use;
            $addPlot->plot_size = $request->plot_size;
            $addPlot->price_per_sqm =$project->price_per_sqm;
            $addPlot->monthly_installment_price = $request->monthly_installment_price;
            $addPlot->cash_price_per_sqm = $request->cash_price_per_sqm;
            $addPlot->installment_period =$project->installment_period;
            $addPlot->cash_total_value= $request->plot_size *  $request->cash_price_per_sqm;
            $addPlot->installment_total_price = $request->monthly_installment_price * $project->installment_period;
            $addPlot->description1 = $request->description1;
            $addPlot->description2 = $request->description2;
            $addPlot->description3 = $request->description3;
            $fileName = time() . '_' . $request->file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');
            $addPlot->file = '/storage/' . $filePath;
            $addPlot->created_by = $username;
            $addPlot->updated_by = $username;
            $addPlot->created_at = now();
            $addPlot->updated_at = now();
            $addPlot->status = $request->status;
            $addPlot->installment_total_price = $request->monthly_installment_price * $project->installment_period;
            $addPlot->save();
            Alert::success('Success', 'Plot Added Successfully!');
            return to_route('viewPlots',$project_id);
    }

    public function plotDetails($id){
        $plot=Plot::findOrFail($id);
        return view('home.plotDetails', compact('plot'));
    }

}
