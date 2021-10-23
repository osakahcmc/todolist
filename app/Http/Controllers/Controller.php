<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Works;
use Illuminate\Support\Collection;
Use App\Models\Event;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(){
        $works = DB::table('works')->paginate(15);
        $calendar = DB::table('events')->get();
        $works_calendar = DB::table('works')->get()->toJson();

        return view('layouts.content',['works'=>$works,'calendar'=>$calendar,'works_calendar'=>$works_calendar]);
    }

    public function add(Request $request){

        $request->validate([
            'work_name' => 'bail|required|string|max:255',
            'starting_date' => 'bail|required|date',
            'ending_date' => 'bail|required|date|after_or_equal:starting_date'
        ]);

        $works = new Works;
        $works->work_name = $request->work_name;
        $works->starting_date = $request->starting_date;
        $works->ending_date = $request->ending_date;
        $works->created_at = Carbon::now("Asia/Ho_Chi_Minh");
        $works->updated_at = Carbon::now("Asia/Ho_Chi_Minh");
        $works->save();

        return redirect('/')->with('success','Add Work Successfully !');
    }

    public function delete(Request $request){
        $work_name_delete = explode(",",$request->work_name_delete);

        DB::table('works')
            ->whereIn('work_name',$work_name_delete)
            ->delete();

        return redirect('/');
    }

    public function change(Request $request){
        $work_name_edit = explode(" ,",$request->work_name_edit);
        $WorkEdit = [];
        for($i = 0; $i < count($work_name_edit); $i++){
            $work_name_edit[$i] = substr($work_name_edit[$i], 0, -1);
            $WorkEdit[$i] = explode(',',$work_name_edit[$i]);
            $WorkEdit[$i]['work_name'] = $WorkEdit[$i][0];
            $WorkEdit[$i]['status'] = $WorkEdit[$i][1];
            unset($WorkEdit[$i][0],$WorkEdit[$i][1]);
            if($WorkEdit[$i]['status'] == 'Planing'){
                $WorkEdit[$i]['status'] = "0";
            }elseif ($WorkEdit[$i]['status'] == 'Doing'){
                $WorkEdit[$i]['status'] = "1";
            }else{
                $WorkEdit[$i]['status'] = "2";
            }

            DB::table('works')
                ->where('work_name','=',$WorkEdit[$i]['work_name'])
                ->update(array(
                    'status' => $WorkEdit[$i]['status']
                ));

        }

        return redirect('/')->with('success', 'Update successfully !');
    }

}
