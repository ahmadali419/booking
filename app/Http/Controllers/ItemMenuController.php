<?php

namespace App\Http\Controllers;

use App\Models\ItemMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ItemMenuController extends Controller
{
    public function index(){
        $items = getItems();
        $lists = getItemMenus();
        return view('item-menus.list',get_defined_vars());
    }

    public function store(Request $request){
        $validate = true;
        $id = $request->id;
        $validateInput = $request->all();
        $rules = [
            'item_id' => 'required',
            'menu_name' => 'required|unique:item_menus,name,'.$id,
            'price' => 'required',

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
            $item = new ItemMenu();
            if ($id > 0) {
                $item = ItemMenu::findOrFail($id);
            } 

           
            // isset($request->item_id) ? $item->parent_id = $request->item_id : NULL;
            $item->item_id = $request->item_id;
            $item->name = $request->menu_name;
            $item->price = $request->price;
            $query = $item->save();
            $return = [
                'status' => 'error',
                'message' => 'Item Menu is not save successfully',
            ];
            if ($query) {
                $return = [
                    'status' => 'success',
                    'message' => 'Item Menu is save successfully',
                ];
            }


            return response()->json($return);
        }
    }


    public function destroy(Request $request)
    {

        $id = $request->id;
        if ($id) {
              ItemMenu::where('id',$id)->delete();
            return response()->json(['status' => 'success', 'message' => 'Item menu is deleted successfully']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Item  menu not deleted because it is assigned to permission']);
        }
    }

}
