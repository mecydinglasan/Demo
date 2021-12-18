<?php
  
namespace App\Http\Controllers;

use Gate;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Validator;
use App\Models\Product;
use Illuminate\Http\Response;

  
class ProductController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
   
    
    public function index()
    {
        $data = Product::all();
        return Inertia::render('products', ['data' => $data]);
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
            'description' => ['required'],
            'quantity' => ['required'],
        ])->validate();
  
        Product::create($request->all());
  
        return redirect()->back()
                    ->with('message', 'Product Added Successfully.');
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
            'description' => ['required'],
            'quantity' => ['required'],
        ])->validate();
  
        if ($request->has('id')) {
            Product::find($request->input('id'))->update($request->all());
            return redirect()->back()
                    ->with('message', 'Product Updated Successfully.');
        }
    }
  
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function destroy(Request $request)
    {
        //abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, 'FORBIDDEN: You are not authorized to delete');
        //$admins = Admin::with('roles')->get();
        if ($request->has('id')) {
            Product::find($request->input('id'))->delete();
            return redirect()->back();
        }
    }
}