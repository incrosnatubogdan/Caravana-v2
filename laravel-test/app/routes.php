<?php
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::get('en/caravane/{page_name}', function($page_name) {
    return View::make('en.caravane.'.$page_name);
});

Route::get('caravane/{page_name}', function($page_name) {
    return View::make('caravane.'.$page_name);
});

Route::get('/media', function() {
    $path = storage_path() . "/json/media.json";
    $mediaJSON = json_decode(file_get_contents($path), true);
    return View::make('/media')->with('mediaJSON', $mediaJSON);
});

Route::get('/en/media', function() {
    $path = storage_path() . "/json/media_en.json";
    $mediaJSON = json_decode(file_get_contents($path), true);
    return View::make('/en/media')->with('mediaJSON', $mediaJSON);
});

Route::get('/echipa', function() {
    $path = storage_path() . "/json/echipa.json";
    $echipaJSON = json_decode(file_get_contents($path), true);
    return View::make('/echipa')->with('echipaJSON', $echipaJSON);
});

Route::get('/en/team', function() {
    $path = storage_path() . "/json/echipa.json";
    $echipaJSON = json_decode(file_get_contents($path), true);
    return View::make('/en/team')->with('echipaJSON', $echipaJSON);
});

Route::get('/index', function() {
    $path = storage_path() . "/json/acasa.json";
    $acasaJSON = json_decode(file_get_contents($path), true);

    $path = storage_path() . "/json/parteneri.json";
    $partners = json_decode(file_get_contents($path), true);
    $mainPartners = $partners['main'];

    return View::make('/index')->with('acasaJSON', $acasaJSON)->with('mainPartners', $mainPartners);
    
});

Route::get('/en/index', function() {
    $path = storage_path() . "/json/home.json";
    $acasaJSON = json_decode(file_get_contents($path), true);

    $path = storage_path() . "/json/parteneri.json";
    $partners = json_decode(file_get_contents($path), true);
    $mainPartners = $partners['main'];

    return View::make('/en/index')->with('acasaJSON', $acasaJSON)->with('mainPartners', $mainPartners);
    
});

Route::get('/get-involved', function() {
    return View::make('/implica');
});

Route::get('/parteneri', function() {
    $path = storage_path() . "/json/parteneri.json";
    $partners = json_decode(file_get_contents($path), true);
    $mainPartners = $partners['main'];
    $localPartners = $partners['locali'];
    $organisationPartners = $partners['organisations'];

    return View::make('/parteneri')->with('mainPartners', $mainPartners)->with('localPartners', $localPartners)->with('organisationPartners', $organisationPartners);
    
});

Route::get('/en/partners', function() {
    $path = storage_path() . "/json/parteneri.json";
    $partners = json_decode(file_get_contents($path), true);
    $mainPartners = $partners['main'];
    $localPartners = $partners['locali'];
    $organisationPartners = $partners['organisations'];

    return View::make('/en/partners')->with('mainPartners', $mainPartners)->with('localPartners', $localPartners)->with('organisationPartners', $organisationPartners);
    
});

Route::get('en/{page_name}', function($page_name)
{
    return View::make('en.'.$page_name);
});

Route::get('{page_name}', function($page_name) {
    if (strpos($page_name, '.html') !== false) {
        
        $page_name = str_replace(".html", "", $page_name);
        
        $path = storage_path() . "/json/media.json";
        $mediaJSON = json_decode(file_get_contents($path), true);
        $path = storage_path() . "/json/echipa.json";
        $echipaJSON = json_decode(file_get_contents($path), true);
        $path = storage_path() . "/json/parteneri.json";
        $partners = json_decode(file_get_contents($path), true);
        $path = storage_path() . "/json/echipa.json";
        $echipaJSON = json_decode(file_get_contents($path), true);
        return View::make('/'.$page_name)->with('mediaJSON', $mediaJSON);
    } else {
        return View::make('/'.$page_name);
    }
});
