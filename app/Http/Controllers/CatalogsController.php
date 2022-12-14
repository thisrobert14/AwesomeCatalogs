<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
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

    public function listCatalog(Catalog $catalog)
    {
        return view('catalogs.list-catalog', [
            'catalog' => $catalog,
            'starsCount' => $catalog->stars()->count()
        ]);
    }

    public function listUpdate(Catalog $catalog)
    {
        return view('catalogs.update-catalog', [
            'catalog' => $catalog
        ]);
    }

    public function listDelete(Catalog $catalog)
    {
        return view('catalogs.delete-catalog', [
            'catalog' => $catalog
        ]);
    }
}
