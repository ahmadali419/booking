<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class ItemController extends Controller
{
    public function index(){
        $lists = getItems();
        $services = getServices();
        return view('items.list',get_defined_vars());
    }

    public function store(Request $request){
        $validate = true;
        $id = $request->id;
        $validateInput = $request->all();
        $rules = [
            'service_id' => 'required',
            'item_name' => 'required|unique:items,name,'.$id,

        ];
        $validator = Validator::make($validateInput, $rules);
        if ($validator->fails()) {
            $errors = $validator->errors();
            $allMsg = [];
            foreach ($errors->all() as $message) {
                $allMsg[] = $message;
            }
            $return['status'] = 'error';
            $return['message'] = collect($allMsg)->implode('<br />');
            $validate = false;
            return response()->json($return);
        }else{
            $item = new Item();
            if ($id > 0) {
                $item = Item::findOrFail($id);
            } 

            if ($request->hasFile('image')) {
                $fileAttach = $request->file('image');
                $uploadImage = uploadMedia($fileAttach, 'admin/asset/items');
                $item->image = $uploadImage;
                if (\File::exists(public_path($request->old_image))) {
                    \File::delete(public_path($request->old_image));
                }
            }
            // isset($request->item_id) ? $item->parent_id = $request->item_id : NULL;
            $item->service_id = $request->service_id;
            $item->name = $request->item_name;
            $query = $item->save();
            $return = [
                'status' => 'error',
                'message' => 'Item is not save successfully',
            ];
            if ($query) {
                $return = [
                    'status' => 'success',
                    'message' => 'Item is save successfully',
                ];
            }


            return response()->json($return);
        }
    }

    public function destroy(Request $request)
    {

        $id = $request->id;
        if ($id) {
              Item::where('id',$id)->delete();
            return response()->json(['status' => 'success', 'message' => 'Item is deleted successfully']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Item not deleted because it is assigned to permission']);
        }
    }
}
