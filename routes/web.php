<?php

use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketcategoryController;
use App\Http\Controllers\TicketingslaController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QueueController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TicketController;
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
//TESTING PAGE
Route::get('/test', [HomeController::class, 'test']);
//HOME
Route::get('/', [HomeController::class, 'index'])
    ->name('home');
Route::get('/home', [HomeController::class, 'index']);
//NONADMIN
Route::get('/tickets', [HomeController::class, 'tickets'])
    ->name('repTickets');
//TICKET CATEGORY
Route::get('/ticketcategory', [TicketcategoryController::class, 'index'])
    ->name('categories');
Route::get('/ticketcategory/create', [TicketcategoryController::class, 'create'])
    ->name('categoryCreate');
Route::post('/ticketcategory/store', [TicketcategoryController::class, 'store'])
    ->name('categoryStore');
Route::get('/ticketcategory/details/{ticketcategory:categoryid}', [TicketcategoryController::class, 'show'])
    ->name('categoryShow');
Route::get('/ticketcategory/edit/{ticketcategory:categoryid}', [TicketcategoryController::class, 'edit'])
    ->name('categoryEdit');
Route::put('/ticketcategory/update/{ticketcategory:categoryid}', [TicketcategoryController::class, 'update'])
    ->name('categoryUpdate');
    Route::get('/ticketcategory/archive/{ticketcategory:categoryid}', [TicketcategoryController::class, 'destroy'])
    ->name('categoryArchive');


//SLA
Route::get('/sla', [TicketingslaController::class, 'index'])
    ->name('sla');
Route::put('/sla/update/{ticketingsla:slaid}', [TicketingslaController::class, 'update'])
    ->name('slaUpdate');

//CUSTOMER
Route::get('/customer', [CustomerController::class, 'index'])
    ->name('customer');
Route::post('/customer/load',[CustomerController::class, 'load'])
    ->name('customerLoad');
Route::get('/customer/unload',[CustomerController::class, 'unload'])
    ->name('customerUnload');
Route::get('/customer/myticket',[CustomerController::class, 'myticket'])
    ->name('myTicket');
Route::get('/customer/newticket',[CustomerController::class, 'newticket'])
    ->name('newTicket');


//TICKET
Route::post('/ticket/store', [TicketController::class, 'store'])
    ->name('ticketStore');
Route::get('/ticket/show/{ticket}', [TicketController::class, 'show']);
Route::put('/ticket/{ticket}', [TicketController::class, 'closeTicket']);

//SESSION
Route::get('/login', [SessionController::class, 'login'])
    ->middleware('guest')
    ->name('login');
Route::post('/logout', [SessionController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');
Route::post('/sessionStore', [SessionController::class, 'store'])
    ->middleware('guest')
    ->name('sessionStore');

//QUEUE
Route::get('/queue', [QueueController::class, 'index'])
    ->name('queue');
Route::post('/queue/enqueue', [QueueController::class, 'enqueue'])
    ->name('enqueue');
Route::post('assignTicket', [QueueController::class, 'assign'])
    ->name('assign');
Route::get('queue/reset', [QueueController::class, 'reset'])
    ->name('resetQueue');
Route::get('queue/dequeue', [QueueController::class, 'dequeue'])
    ->name('dequeue');

//COMMENT
Route::post('/comment/customercomment', [CommentController::class, 'storeCustomerComment']);