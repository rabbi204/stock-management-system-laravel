<?php


use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\Auth\ForgotPasswordController;
use App\Http\Controllers\Backend\Auth\LoginController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CartController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\CustomerController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\ExpenseCategoryController;
use App\Http\Controllers\Backend\ExpenseController;
use App\Http\Controllers\Backend\PosController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\PurchaseController;
use App\Http\Controllers\Backend\ReportController;
use App\Http\Controllers\Backend\RolesController;
use App\Http\Controllers\Backend\SalesController;
use App\Http\Controllers\Backend\StockManageController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\SupplierController;
use App\Http\Controllers\Backend\UnitController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('backend.auth.login');
});

// Route::get('/', function () {
//     return view('welcome');
// });

/**************************************************************************
 *                      ADMIN PANEL ROUTES
 *************************************************************************/

    // login route
     Route::view('admin/login', 'backend.auth.login')->name('admin.login');
     

// Route::group(['middleware' => 'auth:admin'], function () {

    // role permission route
    Route::prefix('/admin')->group(function(){
        Route::resource('/roles', RolesController::class);

        //admin route
        Route::get('/list', [AdminController::class, 'index'])->name('admin.list');
        Route::get('/create', [AdminController::class, 'create'])->name('admin.create');
        Route::post('/store', [AdminController::class, 'store'])->name('admin.store');
        Route::get('/edit/{id}', [AdminController::class, 'edit'])->name('admin.edit');
        Route::post('/update/{id}', [AdminController::class, 'update'])->name('admin.update');
        Route::get('/delete/{id}', [AdminController::class, 'delete'])->name('admin.delete');
        Route::get('/details/{id}', [AdminController::class, 'details'])->name('admin.details');
        Route::get('/profile', [AdminController::class, 'adminProfile'])->name('admin.profile');

        //login and logout route
        Route::post('admin/login', [LoginController::class, 'login'])->name('admin.login.submit');
        Route::get('/logout', [LoginController::class, 'logout'])->name('admin.logout');

        //forget password
        Route::get('/password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('admin.password.request');
        Route::get('/password/reset/submit', [ForgotPasswordController::class, 'index'])->name('admin.password.update');

        //dashboard route
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');



    });

    Route::prefix('/expense/category')->group(function(){
        //expense category route
        Route::get('/list', [ExpenseCategoryController::class, 'index'])->name('expense.category.list');
        Route::get('/create', [ExpenseCategoryController::class, 'create'])->name('expense.category.create');
        Route::post('/store', [ExpenseCategoryController::class, 'store'])->name('expense.category.store');
        Route::get('/edit/{id}', [ExpenseCategoryController::class, 'edit'])->name('expense.category.edit');
        Route::post('/update/{id}', [ExpenseCategoryController::class, 'update'])->name('expense.category.update');
        Route::get('/delete/{id}', [ExpenseCategoryController::class, 'delete'])->name('expense.category.delete');
    });

    Route::prefix('/expense')->group(function(){
        //expense route
        Route::get('/list', [ExpenseController::class, 'index'])->name('expense.list');
        Route::get('/create', [ExpenseController::class, 'create'])->name('expense.create');
        Route::post('/store', [ExpenseController::class, 'store'])->name('expense.store');
        Route::get('/edit/{id}', [ExpenseController::class, 'edit'])->name('expense.edit');
        Route::post('/update/{id}', [ExpenseController::class, 'update'])->name('expense.update');
        Route::get('/delete/{id}', [ExpenseController::class, 'delete'])->name('expense.delete');
    });

    Route::prefix('/category')->group(function(){
        //category route
        Route::get('/list', [CategoryController::class, 'index'])->name('category.list');
        Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
        Route::post('/store', [CategoryController::class, 'store'])->name('category.store');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
        Route::post('/update/{id}', [CategoryController::class, 'update'])->name('category.update');
        Route::get('/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');
    });

    Route::prefix('/subcategory')->group(function(){
        //SubCategory route
        Route::get('/list', [SubCategoryController::class, 'index'])->name('sub.category.list');
        Route::get('/create', [SubCategoryController::class, 'create'])->name('sub.category.create');
        Route::post('/store', [SubCategoryController::class, 'store'])->name('sub.category.store');
        Route::get('/edit/{id}', [SubCategoryController::class, 'edit'])->name('sub.category.edit');
        Route::post('/update/{id}', [SubCategoryController::class, 'update'])->name('sub.category.update');
        Route::get('/delete/{id}', [SubCategoryController::class, 'delete'])->name('sub.category.delete');
    });

    Route::prefix('/brand')->group(function(){
        //brand route
        Route::get('/list', [BrandController::class, 'index'])->name('brand.list');
        Route::get('/create', [BrandController::class, 'create'])->name('brand.create');
        Route::post('/store', [BrandController::class, 'store'])->name('brand.store');
        Route::get('/edit/{id}', [BrandController::class, 'edit'])->name('brand.edit');
        Route::post('/update/{id}', [BrandController::class, 'update'])->name('brand.update');
        Route::get('/delete/{id}', [BrandController::class, 'delete'])->name('brand.delete');
    });

    Route::prefix('/unit')->group(function(){
        //unit route
        Route::get('/list', [UnitController::class, 'index'])->name('unit.list');
        Route::get('/create', [UnitController::class, 'create'])->name('unit.create');
        Route::post('/store', [UnitController::class, 'store'])->name('unit.store');
        Route::get('/edit/{id}', [UnitController::class, 'edit'])->name('unit.edit');
        Route::post('/update/{id}', [UnitController::class, 'update'])->name('unit.update');
        Route::get('/delete/{id}', [UnitController::class, 'delete'])->name('unit.delete');
    });

    Route::prefix('/supplier')->group(function(){
        //unit route
        Route::get('/list', [SupplierController::class, 'index'])->name('supplier.list');
        Route::get('/create', [SupplierController::class, 'create'])->name('supplier.create');
        Route::post('/store', [SupplierController::class, 'store'])->name('supplier.store');
        Route::get('/edit/{id}', [SupplierController::class, 'edit'])->name('supplier.edit');
        Route::post('/update/{id}', [SupplierController::class, 'update'])->name('supplier.update');
        Route::get('/delete/{id}', [SupplierController::class, 'delete'])->name('supplier.delete');
    });

    Route::prefix('/purchase')->group(function(){
        //purchase route
        Route::get('/list', [PurchaseController::class, 'index'])->name('purchase.list');
        Route::get('/create', [PurchaseController::class, 'create'])->name('purchase.create');
        Route::post('/store', [PurchaseController::class, 'store'])->name('purchase.store');
        Route::get('/edit/{id}', [PurchaseController::class, 'edit'])->name('purchase.edit');
        Route::post('/update/{id}', [PurchaseController::class, 'update'])->name('purchase.update');
        Route::get('/delete/{id}', [PurchaseController::class, 'delete'])->name('purchase.delete');
        Route::get('/details/{id}', [PurchaseController::class, 'details'])->name('purchase.details');
    });

    Route::prefix('/customer')->group(function(){
        //customer route
        Route::get('/list', [CustomerController::class, 'index'])->name('customer.list');
        Route::get('/create', [CustomerController::class, 'create'])->name('customer.create');
        Route::post('/store', [CustomerController::class, 'store'])->name('customer.store');
        Route::get('/edit/{id}', [CustomerController::class, 'edit'])->name('customer.edit');
        Route::post('/update/{id}', [CustomerController::class, 'update'])->name('customer.update');
        Route::get('/delete/{id}', [CustomerController::class, 'delete'])->name('customer.delete');
        Route::get('/details/{id}', [CustomerController::class, 'details'])->name('customer.details');
    });

    Route::prefix('/product')->group(function(){
        //product route
        Route::get('/list', [ProductController::class, 'index'])->name('product.list');
        Route::get('/create', [ProductController::class, 'create'])->name('product.create');
        Route::post('/store', [ProductController::class, 'store'])->name('product.store');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
        Route::post('/update/{id}', [ProductController::class, 'update'])->name('product.update');
        Route::get('/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');
        Route::get('/details/{id}', [ProductController::class, 'details'])->name('product.details');
    });


    Route::get('/pos', [PosController::class, 'index'])->name('pos.index');

    // cart route
    Route::post('/add-cart', [CartController::class, 'index'])->name('add.cart');
    Route::post('/cart/qty/update/{rowId}', [CartController::class, 'cartQtyUpdate'])->name('cart.qty.update');
    Route::post('/cart/price/update/{rowId}', [CartController::class, 'cartPriceUpdate'])->name('cart.price.update');
    Route::get('/cart/remove/{rowId}', [CartController::class, 'cartRemove'])->name('cart.remove');

    Route::post('/create/invoice', [CartController::class, 'createInvoice'])->name('create.invoice');
    Route::post('/final/invoice', [CartController::class, 'finalInvoice'])->name('final.invoice');

    Route::prefix('/sales')->group(function(){
        // Sales route
        Route::get('/list', [SalesController::class, 'index'])->name('sales.list');
        Route::get('/details/{id}', [SalesController::class, 'salesDetails'])->name('sales.details');
        Route::get('/delete/{id}', [SalesController::class, 'salesDelete'])->name('sales.delete');
    });

    Route::prefix('/stock')->group(function(){
        // stock manage route
        Route::get('/list', [StockManageController::class, 'index'])->name('product.stock.list');
        Route::get('/add', [StockManageController::class, 'create'])->name('product.stock.add');
        Route::get('/category/{id}', [StockManageController::class, 'getProduct']);
        Route::get('/category/product/{id}', [StockManageController::class, 'getProductDetails']);
        Route::post('/store', [StockManageController::class, 'update'])->name('product.stock.update');

    });

    Route::prefix('/report')->group(function(){
        // report route
        Route::get('/sales', [ReportController::class, 'salesReport'])->name('sales.report');
        Route::post('/sales/search/data', [ReportController::class, 'getSalesSearchData']);
        
        Route::get('/purchase', [ReportController::class, 'purchaseReport'])->name('purchase.report');
        Route::post('/purchase/search/data', [ReportController::class, 'getPurchaseSearchData']);

        Route::get('/expense', [ReportController::class, 'expenseReport'])->name('expense.report');
        Route::post('/expense/search/data', [ReportController::class, 'getExpenseSearchData']);

        Route::get('/due', [ReportController::class, 'dueReport'])->name('due.report');
        Route::get('/stock', [ReportController::class, 'stockReport'])->name('stock.report');

    });

// });

// registration route 
if (!env('ALLOW_REGISTRATION', false)) {
    Route::any('/admin/register', function() {
        // abort(403);
        return redirect()->back();
    });
}

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
