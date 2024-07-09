<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductCategory;
use DB;
use Auth;

class ProductCategoryController extends Controller
{
    public function index(){
        
        $user_role = Auth::user()->role_id;

        $menu_data = DB::table('menu_permissions')
                ->where('role',$user_role)
                ->first();
        $permitted_menus = $menu_data->menus;
        $permitted_menus_array = explode(',', $permitted_menus);

        $product_categories = DB::table('product_categories')->get();                               
        return view('product_categories.index',compact('product_categories','permitted_menus_array'));
    }

    public function add_product_category(){
        
        $user_role = Auth::user()->role_id;

        $menu_data = DB::table('menu_permissions')
                ->where('role',$user_role)
                ->first();
        $permitted_menus = $menu_data->menus;
        $permitted_menus_array = explode(',', $permitted_menus);
        
        return view('product_categories.create',compact('permitted_menus_array'));
    }

    public function submit_product_category(Request $request){

                $request->validate([
                    'product_category_name' => 'required'
                ]);
                $product_category = new ProductCategory();
                $product_category->product_category_name = $request->product_category_name;
                $product_category->save();

                return redirect()->route('product_category_list')->withSuccess('Product Category is created successfully');
        
    }

    public function edit_product_category($id){
        
        
        $user_role = Auth::user()->role_id;

        $menu_data = DB::table('menu_permissions')
                ->where('role',$user_role)
                ->first();
        $permitted_menus = $menu_data->menus;
        $permitted_menus_array = explode(',', $permitted_menus);
        
        $product_category = DB::table('product_categories')
                 ->where('id',$id)
                 ->first();

        return view('product_categories.edit',compact('product_category','permitted_menus_array'));

    }

    public function update_product_category(Request $request){

        $data = array();
        $data['product_category_name'] = $request->product_category_name;
        $updated = DB::table('product_categories')
                  ->where('id', $request->id)
                  ->update($data);

        return redirect()->route('product_category_list')->withSuccess('Product Category is updated successfully');
       

    }

    public function delete_product_category($id){
        $deleted = DB::table('product_categories')->where('id', $id)->delete();
        return redirect()->route('product_category_list');
    }
}
