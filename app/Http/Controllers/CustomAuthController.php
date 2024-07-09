<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use DB;

class CustomAuthController extends Controller
{
    public function __construct()
    {
        // $this->middleware('guest')->except([
        //     'logout', 'dashboard'
        // ]);

        // $this->middleware('guest')->group(function () {
        //     Route::get('/login', [CustomAuthController::class, 'index'])->name('login');
        //     });
    }
    
    public function index()
    {
        return view('auth.login');
    }


    public function customLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials))
        {
            
            $user = Auth::user();

            if($user->status == 1){
                $request->session()->regenerate();
                return redirect()->route('dashboard')->withSuccess('You have successfully logged in!');
            }else{
                Auth::logout();
                $request->session()->invalidate();
                return back()->withErrors([
            'email' => 'User is not activated.',
        ])->onlyInput('email');
            }
            
        }

        return back()->withErrors([
            'email' => 'Your provided credentials do not match in our records.',
        ])->onlyInput('email');

    }

    public function registration()
    {

        $roles = DB::table('roles')
               ->where('id','<>',1)
               ->get();
        
        return view('auth.register',compact('roles'));
    }


    public function customRegistration(Request $request)
    {
        
           
        $request->validate([
            'name' => 'required|string|max:250',
            'email' => 'required|email|max:250|unique:users',
            'password' => 'required|min:8'
        ]);

        // User::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'role_id' => $request->role_id,
        //     'password' => Hash::make($request->password)
        // ]);


        $add_user = DB::table('users')
                                ->insertGetId([
                                    'name' => $request->name,
                                    'email' => $request->email,
                                    'role_id' => $request->role_id,
                                    'status' => 1,
                                    'password' => Hash::make($request->password)
                                    ]);

        $credentials = $request->only('email', 'password');
        Auth::attempt($credentials);
        $request->session()->regenerate();
        return redirect()->route('dashboard')
        ->withSuccess('You have successfully registered & logged in!');
    }


    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }


    public function dashboard()
    {
        if (Auth::check()){

            $user_role = Auth::user()->role_id;

            $menu_data = DB::table('menu_permissions')
                    ->where('role',$user_role)
                    ->first();
            $permitted_menus = $menu_data->menus;
            $permitted_menus_array = explode(',', $permitted_menus);
        
            
            return view('auth.dashboard',compact('permitted_menus_array'));
        }
        return redirect("login")->withSuccess('You are not allowed to access');
    }


    public function signOut(Request $request)
    {
        
        // Session::flush();
        // Auth::logout();
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return Redirect('login');
    }


    public function password_reset(){

        $user_role = Auth::user()->role_id;

            $menu_data = DB::table('menu_permissions')
                    ->where('role',$user_role)
                    ->first();
            $permitted_menus = $menu_data->menus;
            $permitted_menus_array = explode(',', $permitted_menus);

            return view('password_reset',compact('permitted_menus_array'));

    }


    public function new_password_set(Request $request){
        $user = Auth::user();

        // return $user;

        $validator = \Validator::make($request->all(),[
                'current_password' => 'required',
                'new_password' => [
                    'required',
                    'string',
                    'min:8',
                    
                    function ($attribute, $value, $fail) use ($user) {
                        if (Hash::check($value, $user->password)) {
                            $fail('The new password must be different from the current password.');
                        }
                    },
                ],
            ]);


            if ($validator->fails()) {
                // \Log::info('Validation failed.', ['errors' => $validator->errors()]);
                return response()->json($validator->errors(), 422);
            }

            if (!Hash::check($request->current_password, $user->password)) {
                return response()->json(['error' => 'Current password is incorrect'], 422);
            }

            $user->password = Hash::make($request->new_password);
            $user->save();

            // Auth::guard('web')->logout();
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return response()->json(['message' => 'Password is changed successfully!']);
    }


    public function user_list(){
        $user_role = Auth::user()->role_id;

        $menu_data = DB::table('menu_permissions')
                ->where('role',$user_role)
                ->first();
        $permitted_menus = $menu_data->menus;
        $permitted_menus_array = explode(',', $permitted_menus);

        $users = DB::table('users')
                     ->leftJoin('roles','users.role_id','roles.id')
                     ->select('users.*','roles.role_name')
                     ->get();

        return view('users.index',compact('permitted_menus_array','users'));
    }


    public function edit_user($id){
    
        $user_role = Auth::user()->role_id;

        $menu_data = DB::table('menu_permissions')
                ->where('role',$user_role)
                ->first();
        $permitted_menus = $menu_data->menus;
        $permitted_menus_array = explode(',', $permitted_menus);

        $roles = DB::table('roles')->get();
           
        $user = DB::table('users')
                ->leftJoin('roles','users.role_id','roles.id')
                ->select('users.*','roles.role_name as user_role_name')
                ->where('users.id',$id)
                ->first();
                
        return view('users.edit',compact('permitted_menus_array','user','roles'));     

    }

    
    public function update_user(Request $request){

        $user_id = $request->id;

        $data = array();
        $data['name'] = $request->name;
        $data['role_id'] = $request->role_id;
        $data['status'] = $request->status ? '1' : '2';

        $updated = DB::table('users')
                  ->where('id', $user_id)
                  ->update($data);

        return redirect()->route('user_list')->withSuccess('User Details is updated successfully');
    }



}