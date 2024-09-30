<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\TodayRateController;
use App\Http\Controllers\SaleTypeController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\StockController;

use App\Http\Controllers\ZoneController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\CustomerCategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\TermsAndConditionsController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\BookingTermsAndConditionsController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PayrollController;
use App\Http\Controllers\ExpenseController;

use App\Http\Controllers\SettingController;
use App\Http\Controllers\RoleAndPermissionController;
use App\Http\Controllers\CustomerTransactionController;
use App\Http\Controllers\SupplierTransactionController;

#### CLEAR ALL IN ONE ####
use Illuminate\Support\Facades\Artisan;
Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    // Artisan::call('optimize:clear');
    Artisan::call('route:clear');
    // Artisan::call('optimize');
    return 'Caches cleared and configuration files regenerated.';
});


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->middleware('guest');
Route::get('/home', [CustomAuthController::class, 'dashboard'])->name('dashboard');
Route::get('/login', [CustomAuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
Route::get('/register', [CustomAuthController::class, 'registration'])->name('register')->middleware('guest');
Route::post('/custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom');
Route::post('/signout', [CustomAuthController::class, 'signOut'])->name('signout');
Route::get('/password_reset', [CustomAuthController::class, 'password_reset'])->name('password_reset');
//new password set
Route::post('/new_password_set',[App\Http\Controllers\CustomAuthController::class,'new_password_set']);


Route::middleware('auth')->group(function () {

//booking
Route::resource('booking', BookingController::class);
Route::get('/preview_last_booking', [BookingController::class, 'preview_last_booking'])->name('preview_last_booking');
Route::get('/preview_booking/{booking_id}', [BookingController::class, 'preview_booking'])->name('preview_booking');


//sales
Route::resource('sale', SaleController::class);
Route::get('/preview_last_sale', [SaleController::class, 'preview_last_sale'])->name('preview_last_sale');
Route::get('/preview_sale/{sale_id}', [SaleController::class, 'preview_sale'])->name('preview_sale');


//stocks
Route::resource('stock', StockController::class);
Route::get('/stock_list', [StockController::class, 'stock_list'])->name('stock_list');

//product-category
Route::get('/product_category_list', [ProductCategoryController::class, 'index'])->name('product_category_list');
Route::get('/add_product_category', [ProductCategoryController::class, 'add_product_category'])->name('add_product_category');
Route::post('/submit_product_category', [ProductCategoryController::class, 'submit_product_category'])->name('submit_product_category');
Route::get('/edit_product_category/{product_category_id}', [ProductCategoryController::class, 'edit_product_category'])->name('edit_product_category');
Route::post('/update_product_category', [ProductCategoryController::class, 'update_product_category'])->name('update_product_category');
Route::get('/delete_product_category/{product_category_id}', [ProductCategoryController::class, 'delete_product_category'])->name('delete_product_category');

//today_rate
Route::get('/today_rate_list', [TodayRateController::class, 'index'])->name('today_rate_list');
Route::get('/add_today_rate', [TodayRateController::class, 'create'])->name('add_today_rate');
Route::post('/submit_today_rate', [TodayRateController::class, 'store'])->name('submit_today_rate');
Route::get('/edit_today_rate/{today_rate_id}', [TodayRateController::class, 'edit'])->name('edit');
Route::post('/update_today_rate', [TodayRateController::class, 'update'])->name('update');
Route::get('/delete_today_rate/{today_rate_id}', [TodayRateController::class, 'delete'])->name('delete');

//sale_type
Route::resource('sale_type', SaleTypeController::class);

//zone
Route::resource('zone', ZoneController::class);

//supllier
Route::resource('supplier', SupplierController::class);
Route::get('/delete_supplier/{delete_id}', [SupplierController::class, 'delete_supplier'])->name('delete_supplier');

//customer category
Route::resource('customer_category', CustomerCategoryController::class);

//customer
Route::resource('customer', CustomerController::class);
Route::get('/customer_import', [CustomerController::class, 'customer_import_form'])->name('customer_import');
Route::post('/customer_excel_file_import', [CustomerController::class, 'customer_excel_file_import'])->name('upload_customer_excel');
Route::post('/submit_customer_data', [CustomerController::class, 'submitCustomerData'])->name('submit_customer.data');

//customer transaction
Route::resource('customer_transaction', CustomerTransactionController::class);
Route::get('/delete_customer_transaction/{delete_id}', [CustomerTransactionController::class, 'delete_customer_transaction'])->name('delete_customer_transaction');

//supplier transaction
Route::resource('supplier_transaction', SupplierTransactionController::class);
Route::get('/supplier_transaction_list', [SupplierTransactionController::class, 'supplier_transaction_list'])->name('supplier_transaction.transaction_list');
Route::get('/delete_supplier_transaction/{delete_id}', [SupplierTransactionController::class, 'delete_supplier_transaction'])->name('delete_supplier_transaction');
Route::get('/view_supplier_transaction/{supplier_id}', [SupplierTransactionController::class, 'view_supplier_transaction'])->name('supplier_transaction.view');

//product
Route::resource('product', ProductController::class);
Route::get('/delete_product/{delete_id}', [ProductController::class, 'delete_product'])->name('delete_product');
Route::get('/product_import', [ProductController::class, 'product_import_form'])->name('product_import');
Route::post('/excel_file_import', [ProductController::class, 'excel_file_import'])->name('upload_excel');
// Route::get('/excel_file_download', [ProductController::class, 'excel_file_download'])->name('download');
// Route::get('/clear_import_product', [ProductController::class, 'clear_import_product'])->name('clear_import_product');
// Route::get('/testing_data', [ProductController::class, 'testing_data'])->name('testing_data');
Route::post('/submit-data', [ProductController::class, 'submitData'])->name('submit.data');


//payment method
Route::resource('payment_method', PaymentMethodController::class);

//terms and condition
Route::resource('terms_and_conditions', TermsAndConditionsController::class);


//booking terms and condition
Route::resource('booking_terms_and_conditions', BookingTermsAndConditionsController::class);

//setting
Route::resource('settings', SettingController::class);

//employees
Route::resource('employee', EmployeeController::class);
Route::get('/employee_renew/{emp_id}', [EmployeeController::class, 'renew'])->name('employee.renew');


//-----********* Expenses (start)*********-------

//daily payments
Route::get('/daily_payment_list', [ExpenseController::class, 'daily_payment_list'])->name('daily_payment_list');
Route::get('/create_daily_payment', [ExpenseController::class, 'create_daily_payment'])->name('create_daily_payment');
Route::post('/store_daily_payment', [ExpenseController::class, 'store_daily_payment'])->name('store_daily_payment');
Route::get('/edit_daily_expense/{expense_id}', [ExpenseController::class, 'edit_daily_expense'])->name('edit_daily_expense');
Route::post('/update_daily_payment', [ExpenseController::class, 'update_daily_payment'])->name('update_daily_payment');
Route::get('/delete_daily_payment/{delete_id}', [ExpenseController::class, 'delete_daily_payment'])->name('delete_daily_payment');


//monthly payments
Route::get('/monthly_payment_list', [ExpenseController::class, 'monthly_payment_list'])->name('monthly_payment_list');
Route::get('/create_monthly_payment', [ExpenseController::class, 'create_monthly_payment'])->name('create_monthly_payment');
Route::post('/store_monthly_payment', [ExpenseController::class, 'store_monthly_payment'])->name('store_monthly_payment');
Route::get('/edit_monthly_expense/{expense_id}', [ExpenseController::class, 'edit_monthly_expense'])->name('edit_monthly_expense');
Route::get('/monthly_payment_dependancy/{expense_id}', [ExpenseController::class, 'monthly_payment_dependancy']);
Route::post('/update_monthly_payment', [ExpenseController::class, 'update_monthly_payment'])->name('update_monthly_payment');
Route::get('/delete_monthly_payment/{delete_id}', [ExpenseController::class, 'delete_monthly_payment'])->name('delete_monthly_payment');

//yearly payments
Route::get('/yearly_payment_list', [ExpenseController::class, 'yearly_payment_list'])->name('yearly_payment_list');
Route::get('/create_yearly_payment', [ExpenseController::class, 'create_yearly_payment'])->name('create_yearly_payment');
Route::post('/store_yearly_payment', [ExpenseController::class, 'store_yearly_payment'])->name('store_yearly_payment');
Route::get('/edit_yearly_expense/{expense_id}', [ExpenseController::class, 'edit_yearly_expense'])->name('edit_yearly_expense');
Route::post('/update_yearly_payment', [ExpenseController::class, 'update_yearly_payment'])->name('update_yearly_payment');
Route::get('/delete_yearly_payment/{delete_id}', [ExpenseController::class, 'delete_yearly_payment'])->name('delete_yearly_payment');

//marketing Cost
Route::get('/marketing_cost_list', [ExpenseController::class, 'marketing_cost_list'])->name('marketing_cost_list');
Route::get('/create_marketing_cost', [ExpenseController::class, 'create_marketing_cost'])->name('create_marketing_cost');
Route::post('/store_marketing_cost', [ExpenseController::class, 'store_marketing_cost'])->name('store_marketing_cost');
Route::get('/edit_marketing_cost/{expense_id}', [ExpenseController::class, 'edit_marketing_cost'])->name('edit_marketing_cost');
Route::post('/update_marketing_cost', [ExpenseController::class, 'update_marketing_cost'])->name('update_marketing_cost');
Route::get('/delete_marketing_cost/{delete_id}', [ExpenseController::class, 'delete_marketing_cost'])->name('delete_marketing_cost');

//payments
Route::resource('expense', ExpenseController::class);
Route::get('/delete_payment_expense/{delete_id}', [ExpenseController::class, 'delete_payment_expense'])->name('delete_payment_expense');

//investment expenses
Route::get('/investment_expense_list', [ExpenseController::class, 'investment_expense_list'])->name('investment_expense_list');
Route::get('/create_investment_expense', [ExpenseController::class, 'create_investment_expense'])->name('create_investment_expense');
Route::post('/store_investment_expense', [ExpenseController::class, 'store_investment_expense'])->name('store_investment_expense');
Route::get('/edit_investment_expense/{expense_id}', [ExpenseController::class, 'edit_investment_expense'])->name('edit_investment_expense');
Route::post('/update_investment_expense', [ExpenseController::class, 'update_investment_expense'])->name('update_investment_expense');
Route::get('/delete_investment_expense/{delete_id}', [ExpenseController::class, 'delete_investment_expense'])->name('delete_investment_expense');

//loan/advances
Route::get('/loan_or_advance_list', [ExpenseController::class, 'loan_or_advance_list'])->name('loan_or_advance_list');
Route::get('/create_loan_or_advance', [ExpenseController::class, 'create_loan_or_advance'])->name('create_loan_or_advance');
Route::post('/store_loan_or_advance', [ExpenseController::class, 'store_loan_or_advance'])->name('store_loan_or_advance');
Route::get('/edit_loan_or_advance/{expense_id}', [ExpenseController::class, 'edit_loan_or_advance'])->name('edit_loan_or_advance');
Route::post('/update_loan_or_advance', [ExpenseController::class, 'update_loan_or_advance'])->name('update_loan_or_advance');
Route::get('/delete_loan_or_advance/{delete_id}', [ExpenseController::class, 'delete_loan_or_advance'])->name('delete_loan_or_advance');


//report
Route::get('/expense_ledger', [ExpenseController::class, 'expense_ledger'])->name('expense_ledger');

//-----********* Expenses (end)*********-------



//payrolls
Route::resource('payroll', PayrollController::class);
Route::get('/payroll_list', [PayrollController::class, 'payroll_list'])->name('payroll_list');
// Route::get('/payroll_show_data', [PayrollController::class, 'payroll_show_data'])->name('payroll_show_data');
Route::get('/payroll_show_data/{last_payroll_id}', [PayrollController::class, 'payroll_show_data'])->name('payroll_show_data');

//dependencies
Route::post('/employee_details_dependancy', [PayrollController::class, 'employee_details_dependancy']);
Route::post('/district_and_zone_dependancy', [CustomerController::class, 'districtAndZoneDependancy']);
Route::post('/product_dependancy', [BookingController::class, 'productDependancy']);
Route::post('/client_dependancy', [BookingController::class, 'clientDependancy']);
// Route::post('/payment_method_dependancy', [BookingController::class, 'paymentMethodDependancy']);

// Route::get('/payroll_show_data', [PayrollController::class, 'payroll_show_data'])->name('payroll_show_data');
Route::post('/generate-csv', [PayrollController::class, 'generateCsv'])->name('generate-csv');

//roles and permissions
Route::resource('roles_and_permissions',RoleAndPermissionController::class);
Route::get('/delete_role/{delete_id}', [RoleAndPermissionController::class, 'delete_role'])->name('delete_role');
Route::get('/menus/{role_id}', [RoleAndPermissionController::class, 'menus'])->name('menus');
Route::post('/menu_permission_store', [RoleAndPermissionController::class, 'menu_permission_store'])->name('menu_permission_store');

//users
Route::get('/user_list', [CustomAuthController::class, 'user_list'])->name('user_list');
Route::get('/edit_user/{user_id}', [CustomAuthController::class, 'edit_user'])->name('edit_user');
Route::post('/update_user', [CustomAuthController::class, 'update_user'])->name('update_user');


});





