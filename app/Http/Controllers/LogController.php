<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\activity_log;
use Gate;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;

  
class LogController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function index()

    {
       // abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, 'FORBIDDEN: You are not authorized to view logfile');
       // $admins = Admin::with('roles')->get();
        $data = activity_log::all();
        return Inertia::render('activitylog', ['data' => $data]);
    }
  
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            
            'name' => ['required'],
            'email' => ['required'],
           // 'subject_type' => ['required'],
           // 'subject_id' => ['required'],
          //  'causer_type' => ['required'],
           // 'causer_id' => ['required'],
          //  'properties' => ['required'],
            'created_at' => ['required'],
            'updated_at' => ['required'],
        ])->validate();
  
        activity_log::create($request->all());
  
        return redirect()->back()
                    ->with('message', 'Post Created Successfully.');
    }
  
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function update(Request $request)
    {
        Validator::make($request->all(), [
            
            'name' => ['required'],
            'email' => ['required'],
           // 'subject_type' => ['required'],
            //'subject_id' => ['required'],
           // 'causer_type' => ['required'],
           // 'causer_id' => ['required'],
            //'properties' => ['required'],
            'created_at' => ['required'],
            'updated_at' => ['required'],
        ])->validate();
  
        if ($request->has('id')) {
            activity_log::find($request->input('id'))->update($request->all());
            return redirect()->back()
                    ->with('message', 'Post Updated Successfully.');
        }
    }
  
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function destroy(Request $request)
    {
        if ($request->has('id')) {
            activity_log::find($request->input('id'))->delete();
            return redirect()->back();
        }
    }
}