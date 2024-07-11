<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ProductExcelImport;
use Auth;
// use App\Imports\CsvImport;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $user_role = Auth::user()->role_id;

        $menu_data = DB::table('menu_permissions')
                ->where('role',$user_role)
                ->first();
        $permitted_menus = $menu_data->menus;
        $permitted_menus_array = explode(',', $permitted_menus);
        
        
        $products = DB::table('products')
                  ->leftJoin('product_categories','products.product_category','=','product_categories.id')
                  ->leftJoin('suppliers','products.supplier','=','suppliers.id')
                  ->select('products.*','suppliers.name as supplier_name','product_categories.product_category_name as product_category_name')
                  ->orderBy('products.id','DESC')
                  ->get();
        return view('products.index',compact('products','permitted_menus_array'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user_role = Auth::user()->role_id;

        $menu_data = DB::table('menu_permissions')
                ->where('role',$user_role)
                ->first();
        $permitted_menus = $menu_data->menus;
        $permitted_menus_array = explode(',', $permitted_menus);
        
        $product_categories = DB::table('product_categories')->get();
        $suppliers = DB::table('suppliers')->get();

        return view('products.create',compact('product_categories','suppliers','permitted_menus_array'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = DB::table('products')
        ->insertGetId([
        'product_nr'=>$request->product_nr,
        'product_details'=>$request->product_details,
        'product_category'=>$request->product_category,
        'product_type'=>$request->product_type,
        'weight'=>$request->weight,
        'carat'=>$request->carat,
        // 'quantity'=>$request->quantity,
        'quantity'=>1,
        'st_or_dia'=>$request->st_or_dia,
        'st_or_dia_price'=>$request->st_or_dia_price,
        'wage'=>$request->wage,
        'wage_type'=>$request->wage_type,
        'supplier'=>$request->supplier,
        'purchase_price'=>$request->purchase_price,
        'stock_type'=>$request->stock_type
        ]);
        return redirect()->route('product.index')->withSuccess('Product is added successfully'); 
    }

 
    public function edit(string $id)
    {
        
        $user_role = Auth::user()->role_id;

        $menu_data = DB::table('menu_permissions')
                ->where('role',$user_role)
                ->first();
        $permitted_menus = $menu_data->menus;
        $permitted_menus_array = explode(',', $permitted_menus);
        
        $product_categories = DB::table('product_categories')->get();
        $suppliers = DB::table('suppliers')->get();

        $product = DB::table('products')
                ->leftJoin('product_categories','products.product_category','=','product_categories.id')
                ->leftJoin('suppliers','products.supplier','=','suppliers.id')
                ->select('products.*','suppliers.name as supplier_name','product_categories.product_category_name as product_cat')
                ->where('products.id',$id)
                ->first();
    
     return view('products.edit',compact('product_categories','suppliers','product','permitted_menus_array'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = array();
        $data['product_nr'] = $request->product_nr;
        $data['product_details']=$request->product_details;
        $data['product_category']=$request->product_category;
        $data['product_type']=$request->product_type;
        $data['weight']=$request->weight;
        $data['carat']=$request->carat;
        $data['quantity']=$request->quantity;
        $data['st_or_dia']=$request->st_or_dia;
        $data['st_or_dia_price']=$request->st_or_dia_price;
        $data['wage']=$request->wage;
        $data['wage_type']=$request->wage_type;
        $data['supplier']=$request->supplier;
        $data['purchase_price']=$request->purchase_price;
        $data['stock_type']=$request->stock_type;

        $updated = DB::table('products')
                  ->where('id', $request->id)
                  ->update($data);
        return redirect()->route('product.index')->withSuccess('Product is updated successfully');
    }

    

    public function delete_product($id){

        $deleted = DB::table('products')
                  ->where('id', $id)
                  ->delete();
        return redirect()->route('product.index')->withSuccess('Product is deleted successfully');   
    }

    public function product_import_form(){
        
        $user_role = Auth::user()->role_id;

        $menu_data = DB::table('menu_permissions')
                ->where('role',$user_role)
                ->first();
        $permitted_menus = $menu_data->menus;
        $permitted_menus_array = explode(',', $permitted_menus);

        return view('products.import',compact('permitted_menus_array'));
    }

    public function excel_file_import(Request $request){

    
        $request->validate([
            'excel_file' => 'required|mimes:csv',
        ], [
            'excel_file.mimes' => 'Please upload file with .csv format',
        ]);

        $filePath = $request->file('excel_file')->move(public_path('import_csv_files'));

        $file = fopen($filePath, 'r');

        $csvData = [];
        while (($row = fgetcsv($file)) !== false) {
            $csvData[] = $row;
        }
        fclose($file);

        unlink($filePath);


        $user_role = Auth::user()->role_id;

        $menu_data = DB::table('menu_permissions')
                ->where('role',$user_role)
                ->first();
        $permitted_menus = $menu_data->menus;
        $permitted_menus_array = explode(',', $permitted_menus);

        return view('products.import')->with([
            'csvData' => $csvData,
            'permitted_menus_array' => $permitted_menus_array
        ]);
    }


    // public function excel_file_download()
    // {
    //     return Excel::download(new ProductExcelImport, 'your-exported-file.xlsx');
    // }


//testing
    // public function testing_data(){
    //     return view('testing');
    // }

    public function submitData(Request $request)
    {
        
        $product_nrs = $request->input('product_nr');
        $product_details = $request->input('product_details');
        $weights = $request->input('weight');
        $st_or_dias = $request->input('st_or_dia');
        $st_or_dia_prices = $request->input('st_or_dia_price');
        $wages = $request->input('wage');
        $wage_types = $request->input('wage_type');

        foreach($product_nrs as $index => $product_nr) {
              if(!empty($product_nr)){

                $product_detail = $product_details[$index];
                $weight = $weights[$index];
                $st_or_dia = $st_or_dias[$index];
                $st_or_dia_price = $st_or_dia_prices[$index];
                $wage = $wages[$index];
                $wage_type = $wage_types[$index];
               
                $product = DB::table('products')
                            ->insertGetId([
                            'product_nr'=>$product_nr,
                            'product_details'=>$product_detail, 
                            'weight'=>$weight, 
                            'st_or_dia'=>$st_or_dia, 
                            'st_or_dia_price'=>$st_or_dia_price, 
                            'wage'=>$wage, 
                            'wage_type'=>$wage_type 
                            ]);
              }
                
        }
        // return response()->json(['message' => 'Data submitted successfully']);
        return redirect()->route('product.index')->withSuccess('Products are added successfully');
    }
}
