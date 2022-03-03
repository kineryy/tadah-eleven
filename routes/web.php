<?php

use GuzzleHttp\Psr7\Request;
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

// Main page
Route::get('/', [App\Http\Controllers\WelcomeController::class, 'welcome'])->name('welcome');

// Authentication routes
Auth::routes();

// Home
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Rules
Route::get('/rules', function () {
    return view('terms.rules');
});

Route::get('/credits', function () {
    return view('terms.credits');
});

// Users routes
Route::get('/settings', [App\Http\Controllers\UsersController::class, 'settings'])->name('users.settings');
Route::post('/settings', [App\Http\Controllers\UsersController::class, 'savesettings'])->name('users.savesettings');
Route::get('/users', [App\Http\Controllers\UsersController::class, 'index'])->name('users.index');
Route::get('/user', [App\Http\Controllers\UsersController::class, 'me'])->name('users.me');
Route::get('/users/{id}/thumbnail', [App\Http\Controllers\UsersController::class, 'getthumbnail'])->name('users.thumbnail');
Route::get('/users/{id}/profile', [App\Http\Controllers\UsersController::class, 'profile'])->name('users.profile');
Route::get('/banned', [App\Http\Controllers\UsersController::class, 'banned'])->name('users.banned');

// Catalog routes
Route::get('/catalog/upload', [App\Http\Controllers\CatalogController::class, 'upload'])->name('catalog.upload');
Route::post('/catalog/upload', [App\Http\Controllers\CatalogController::class, 'processupload'])->name('catalog.processupload');
Route::get('/catalog/thumb/{id}', [App\Http\Controllers\CatalogController::class, 'getthumbnail'])->name('catalog.getthumbnail');
Route::get('/catalog/{type}', [App\Http\Controllers\CatalogController::class, 'index'])->name('catalog.index');
Route::get('/catalog', function () { return redirect(route('catalog.index', 'hats')); });
Route::post('/item/buy/{id}', [App\Http\Controllers\CatalogController::class, 'buyitem'])->name('catalog.buy');
Route::get('/item/{id}', [App\Http\Controllers\CatalogController::class, 'item'])->name('catalog.item');
Route::get('/item/{id}/configure', [App\Http\Controllers\CatalogController::class, 'configure'])->name('catalog.configure');
Route::post('/item/{id}/configure', [App\Http\Controllers\CatalogController::class, 'processconfigure'])->name('catalog.processconfigure');

// Forum routes
Route::get('/forum', [App\Http\Controllers\ForumController::class, 'index'])->name('forum.index');
Route::get('/forum/{id}', [App\Http\Controllers\ForumController::class, 'getcategory'])->name('forum.category');
Route::get('/forum/thread/{id}', [App\Http\Controllers\ForumController::class, 'getthread'])->name('forum.getthread');
Route::get('/forum/create/{id}', [App\Http\Controllers\ForumController::class, 'createthread'])->name('forum.createthread');
Route::post('/forum/create/{id}', [App\Http\Controllers\ForumController::class, 'docreatethread'])->name('forum.docreatethread');
Route::get('/forum/createreply/{id}', [App\Http\Controllers\ForumController::class, 'createreply'])->name('forum.createreply');
Route::post('/forum/createreply/{id}', [App\Http\Controllers\ForumController::class, 'docreatereply'])->name('forum.docreatereply');
Route::get('/forum/editthread/{id}', [App\Http\Controllers\ForumController::class, 'editthread'])->name('forum.editthread');
Route::post('/forum/editthread/{id}', [App\Http\Controllers\ForumController::class, 'doeditthread'])->name('forum.doeditthread');
Route::post('/forum/togglestickythread/{id}', [App\Http\Controllers\ForumController::class, 'togglestickythread'])->name('forum.togglesticky');
Route::post('/forum/togglelock/{id}', [App\Http\Controllers\ForumController::class, 'togglelock'])->name('forum.togglelock');
Route::post('/forum/deletethread/{id}', [App\Http\Controllers\ForumController::class, 'deletethread'])->name('forum.deletethread');
Route::get('/forum/editreply/{id}', [App\Http\Controllers\ForumController::class, 'editreply'])->name('forum.editreply');
Route::post('/forum/editreply/{id}', [App\Http\Controllers\ForumController::class, 'doeditreply'])->name('forum.doeditreply');
Route::post('/forum/deletereply/{id}', [App\Http\Controllers\ForumController::class, 'deletereply'])->name('forum.deletereply');

// Admin routes
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index');
Route::get('/admin/truncategametokens', [App\Http\Controllers\AdminController::class, 'truncategametokens']);
Route::get('/admin/truncateservers', [App\Http\Controllers\AdminController::class, 'truncateservers']);
Route::get('/admin/invitekeys', [App\Http\Controllers\AdminController::class, 'invitekeys']);
Route::post('/admin/invitekeys/{id}/disable', [App\Http\Controllers\AdminController::class, 'disableinvitekey'])->name('admin.disableinvitekey');
Route::get('/admin/createinvitekey', [App\Http\Controllers\AdminController::class, 'createinvitekey']);
Route::post('/admin/createinvitekey', [App\Http\Controllers\AdminController::class, 'generateinvitekey'])->name('admin.generateinvitekey');
Route::get('/admin/ban', [App\Http\Controllers\AdminController::class, 'ban']);
Route::post('/admin/ban', [App\Http\Controllers\AdminController::class, 'banuser'])->name('admin.banuser');
Route::get('/admin/unban', [App\Http\Controllers\AdminController::class, 'unban']);
Route::post('/admin/unban', [App\Http\Controllers\AdminController::class, 'unbanuser'])->name('admin.unbanuser');
Route::get('/admin/newxmlitem', [App\Http\Controllers\AdminController::class, 'xmlitem']);
Route::post('/admin/newxmlitem', [App\Http\Controllers\AdminController::class, 'createxmlitem'])->name('admin.createxmlitem');
Route::get('/admin/robloxitemdata/{id}', [App\Http\Controllers\AdminController::class, 'robloxitemdata']);
Route::get('/admin/robloxxmldata/{id}/{version}', [App\Http\Controllers\AdminController::class, 'robloxxmldata']);
Route::get('/admin/regenalluserthumbs', [App\Http\Controllers\AdminController::class, 'regenalluserthumbs']);

// Thumbnail generator routes
Route::get('/thumbnail/getqueue', [App\Http\Controllers\RenderController::class, 'getQueue'])->name('thumbnails.getqueue');
Route::post('/thumbnail/upload', [App\Http\Controllers\RenderController::class, 'upload'])->name('thumbnails.uploadthumbnail');
Route::get('/thumbnail/clothingcharapp/{id}', [App\Http\Controllers\RenderController::class, 'getClothingCharApp'])->name('thumbnails.getclothingcharapp');

// Servers routes
Route::get('/servers', [App\Http\Controllers\ServersController::class, 'index'])->name('servers.index');
Route::get('/server/{id}', [App\Http\Controllers\ServersController::class, 'server'])->name('servers.server');
Route::get('/server/{id}/configure', [App\Http\Controllers\ServersController::class, 'configure'])->name('servers.configure');
Route::post('/server/{id}/configure', [App\Http\Controllers\ServersController::class, 'processconfigure'])->name('servers.processconfigure');
Route::post('/server/{id}/delete', [App\Http\Controllers\ServersController::class, 'delete'])->name('servers.delete');
Route::get('/servers/create', function () { return view('servers.create'); });
Route::post('/servers/create', [App\Http\Controllers\ServersController::class, 'create'])->name('servers.create');

// Launcher routes
Route::get('/client/versionstring', function () { return config('app.version_string'); });
Route::get('/client/join/{token}', [App\Http\Controllers\ClientController::class, 'join'])->name('client.join');
Route::get('/client/generate/{serverId}', [App\Http\Controllers\ClientController::class, 'generate'])->name('client.generate');

// Client routes
Route::get('/Asset/GetScriptState.ashx', function () { return '0 0 0 0'; });  // breaks script sig check in clients if removed
Route::get('/asset/GetScriptState.ashx', function () { return '0 0 0 0'; });  // breaks script sig check in clients if removed
Route::get('/Game/KeepAlivePinger.ashx', function () { return ''; });
Route::get('/UploadMedia/PostImage.aspx', function () { return 'lol, this stupid person meant to screenshot using their normal screenshotting tool but instead triggered the old Roblox one'; });
Route::get('/game/visit.ashx', function () { return view('client.playsolo'); });
Route::get('/game/studio.ashx', function () { return view('client.studioscript'); });
Route::get('/IDE/ClientToolbox.aspx', function () { return 'Toolbox not yet implemented!'; });
Route::get('/IDE/Landing.aspx', function () { return view('client.landing'); });
Route::get('/thumbs/avatar.ashx', [App\Http\Controllers\ClientController::class, 'getuserthumbnail'])->name('client.userthumbnail');
Route::get('/server/host/{secret}', [App\Http\Controllers\ClientController::class, 'host'])->name('client.host');
Route::get('/server/ping/{secret}', [App\Http\Controllers\ClientController::class, 'ping'])->name('client.ping');
Route::get('/server/admin/{secret}', [App\Http\Controllers\ClientController::class, 'admin'])->name('client.admin');
Route::get('/download', [App\Http\Controllers\UsersController::class, 'download'])->name('client.download');
Route::get('/signscript', [App\Http\Controllers\ClientController::class, 'signscript'])->name('client.signscript');

// Asset routes
Route::get('/asset', [App\Http\Controllers\AssetController::class, 'getasset'])->name('asset.getasset');
Route::get('/xmlasset', [App\Http\Controllers\AssetController::class, 'getxmlasset'])->name('asset.getxmlasset');
Route::get('/Asset', [App\Http\Controllers\AssetController::class, 'robloxredirect'])->name('asset.robloxredirect');

// Character routes
Route::get('/character', [App\Http\Controllers\BodyColorsController::class, 'characterBodyColors'])->name('users.characterbodycolors');
Route::post('/character/toggle/{id}', [App\Http\Controllers\UsersController::class, 'toggleWearing'])->name('users.togglewearing');
Route::post('/character/setcolor', [App\Http\Controllers\BodyColorsController::class, 'changeBodyColor'])->name('users.setbodycolor');
Route::post('/character/regen', [App\Http\Controllers\UsersController::class, 'regenThumbnail'])->name('users.regenthumbnail');
Route::get('/character/{type}', [App\Http\Controllers\UsersController::class, 'characterItems'])->name('users.characteritems');
Route::get('/users/{id}/bodycolors', [App\Http\Controllers\ClientController::class, 'bodycolors'])->name('users.bodycolors');
Route::get('/users/{id}/character', [App\Http\Controllers\ClientController::class, 'charapp'])->name('users.getcharacter');