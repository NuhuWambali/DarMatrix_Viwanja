<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\{Project,Plot};
use RealRashid\SweetAlert\Facades\Alert;

class PlotsController extends Controller
{
    //
    public function viewPlots(){
        return view('home.plots');
    }

    public function viewAddPlot(){
        return view('home.plotsAdd');
    }


    public function addPlot(Request $request,Project $project){

            $username = Auth::user()->username;
            $addPlot = new Plot;
            $addPlot->price_per_sqm = $project->price_per_sqm;
            $addPlot->installment_period = $project->installment_period;
            $addPlot->project_id = $project->id;
            $addPlot->plot_number = $request->plot_number;

            $addPlot->monthly_installment_price = $request->monthly_installment_price;
            $addPlot->installment_total_price = $request->monthly_installment_price * $project->installment_period;
            $addPlot->plot_size = $request->size;
            $addPlot->land_use = $request->land_use;
            $fileName = time() . '_' . $request->file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');
            $addPlot->file = '/storage/' . $filePath;
            $addPlot->created_by = $username;
            $addPlot->updated_by = $username;
            $addPlot->created_at = now();
            $addPlot->updated_at = now();
            $addPlot->save();
            Alert::success('Success', 'Plot Added Successfully!');
            return to_route('viewPlots');
    }

}
