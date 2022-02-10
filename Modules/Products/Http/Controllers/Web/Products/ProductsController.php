<?php

namespace Modules\Products\Http\Controllers\Web\Products;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Products\Http\Controllers\Actions\Categories\GetAllCategoriesAction;
use Modules\Products\Http\Controllers\Actions\Products\SearchProductsAction;
use Modules\Products\Http\Controllers\Actions\Products\SearchProductsQueryAction;
use Yajra\DataTables\Facades\DataTables;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            // Search the products
            $action = new SearchProductsAction;
            $products = $action->execute($request->input('categories_ids'));
            return DataTables::of($products)
                ->make(true);
        } else {
            return view('products::products.index')->with([
                'categories' => (new GetAllCategoriesAction)->execute()
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('products::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }
}
