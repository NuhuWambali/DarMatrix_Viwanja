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

        $validatedPlotData=$request->validate([
            'plot_number'=>'required|numeric|min:0',
            'plot_size'=>'required|numeric|min:0',
            'land_use'=>'required',
            'monthly_installment_price'=>'required|numeric|min:0',
            'cash_price_per_sqm'=>'required|numeric|min:0',
            'status'=>'required',
        ]);
            $username = Auth::user()->username;
            $addPlot = new Plot;
            $project_id=$request->project_id;
            $project = Project::findOrFail($project_id);
            $addPlot->project_id = $project_id;
            $addPlot->plot_number = $validatedPlotData['plot_number'];
            $addPlot->land_use = $validatedPlotData['land_use'];
            $addPlot->plot_size =$validatedPlotData['plot_size'];
            $addPlot->price_per_sqm =$project->price_per_sqm;
            $addPlot->monthly_installment_price =$validatedPlotData['monthly_installment_price'];
            $addPlot->cash_price_per_sqm =$validatedPlotData['cash_price_per_sqm'];
            $addPlot->installment_period =$project->installment_period;
            $addPlot->cash_total_value= $validatedPlotData['plot_size'] *  $validatedPlotData['cash_price_per_sqm'];
            $addPlot->installment_total_price = $validatedPlotData['monthly_installment_price'] * $project->installment_period;
            $addPlot->description1 = $request->description1;
            $addPlot->description2 = $request->description2;
            $addPlot->description3 = $request->description3;
            if($request->file){
                $fileName = time() . '_' . $request->file->getClientOriginalName();
                $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');
                $addPlot->file = '/storage/' . $filePath;
            }
            $addPlot->created_by = $username;
            $addPlot->updated_by = $username;
            $addPlot->created_at = now();
            $addPlot->updated_at = now();
            $addPlot->status = $validatedPlotData['status'];
            $addPlot->save();
            Alert::success('Success', 'Plot Added Successfully!');
            return to_route('viewPlots',$project_id);
    }

    public function plotDetails($id){
        $plot=Plot::findOrFail($id);
        return view('home.plotDetails', compact('plot'));
    }

    public function plotEdit($id){
        $plot=Plot::findOrFail($id);
        return view('home.plotEdit',compact('plot'));
    }

    public function createPlotEdit(Request $request,$id){
        $validatedPlotData=$request->validate([
            'plot_number'=>'required|numeric|min:0',
            'plot_size'=>'required|numeric|min:0',
            'land_use'=>'required',
            'monthly_installment_price'=>'required|numeric|min:0',
            'cash_price_per_sqm'=>'required|numeric|min:0',
            'status'=>'required',
        ]);
        $username = Auth::user()->username;
        $project_id=$request->project_id;
        $project = Project::findOrFail($project_id);
        $editPlot=Plot::findOrFail($id);
        $editPlot->project_id = $project_id;
        $editPlot->plot_number = $validatedPlotData['plot_number'];
        $editPlot->land_use = $validatedPlotData['land_use'];
        $editPlot->plot_size = $validatedPlotData['plot_size'];
        $editPlot->price_per_sqm =$project->price_per_sqm;
        $editPlot->monthly_installment_price = $validatedPlotData['monthly_installment_price'];
        $editPlot->cash_price_per_sqm =$validatedPlotData['cash_price_per_sqm'];
        $editPlot->installment_period =$project->installment_period;
        $editPlot->cash_total_value= $validatedPlotData['plot_size'] * $validatedPlotData['cash_price_per_sqm'];
        $editPlot->installment_total_price = $validatedPlotData['monthly_installment_price']* $project->installment_period;
        $editPlot->description1 = $request->description1;
        $editPlot->description2 = $request->description2;
        $editPlot->description3 = $request->description3;
        if($request->file){
            $fileName = time() . '_' . $request->file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');
            $editPlot->file = '/storage/' . $filePath;
        }
        $editPlot->created_by = $username;
        $editPlot->updated_by = $username;
        $editPlot->created_at = now();
        $editPlot->updated_at = now();
        $editPlot->status = $request->status;
        $editPlot->save();
        Alert::success('Success', 'Plot Edited Successfully!');
        return to_route('viewPlots',$project_id);
    }

    public function deletePlot($id){
        $deletePlot=Plot::findOrFail($id);
        $project_id=$deletePlot->project_id;
        $deletePlot->delete();
        Alert::success('Success', 'Plot Deleted Successfully!');
        return to_route('viewPlots',$project_id);
    }

}
