<?php

namespace App\Http\Controllers;

use App\Models\PostalCode;
use Illuminate\Http\Request;

class PostalCodeController extends Controller
{
    public function index(Request $request)
    {
        
        $lists = PostalCode::get();        
        return view('postalcode.list', get_defined_vars());
    }
   
    public function store(Request $request){
        try {
            //   echo "<pre>";  print_r($request->all());exit;
                $id = $request->id;
                $postalCode = new PostalCode();
                if ($id > 0) {
                    $postalCode = PostalCode::findOrFail($id);
                } 
               
               
                // isset($request->category_id) ? $category->parent_id = $request->category_id : NULL;
                $postalCode->code = $request->code;
                $query = $postalCode->save();
                $return = [
                    'status' => 'error',
                    'message' => 'Postal Code is not save successfully',
                ];
                if ($query) {
                    $return = [
                        'status' => 'success',
                        'message' => 'Postal Code is save successfully',
                    ];
                }
                return response()->json($return);
            } catch (\Exception $e) {
                $response['status'] = 'error';
                $response['message'] = $e->getMessage();
                return response()->json($response);
            }
    }

    public function destroy(Request $request)
    {

        $id = $request->id;
        if ($id) {
              PostalCode::where('id',$id)->delete();
            return response()->json(['status' => 'success', 'message' => 'Postal Code is deleted successfully']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Postal code not deleted because it is assigned to permission']);
        }
    }
}
