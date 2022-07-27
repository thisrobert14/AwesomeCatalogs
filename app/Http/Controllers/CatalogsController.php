<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CatalogsController extends Controller
{
    public function listCatalogs()
    {
        return view('catalogs.list-catalogs');
    }

    public function listCreateCatalog()
    {
        return view('catalogs.create-catalog');
    }

    public function listIndividualCatalogs()
    {
        return view('catalogs.individual-catalogs');
    }
}
