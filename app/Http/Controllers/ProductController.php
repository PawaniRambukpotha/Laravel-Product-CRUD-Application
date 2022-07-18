<?php

namespace App\Http\Controllers;

use domain\Facades\ProductFacade;
use Illuminate\Http\Request;

class ProductController extends ParentController
{
    public function index()
    {
        $response['products'] = ProductFacade::all();
        return view('pages.product.index')->with($response);
    }

    public function store(Request $request)
    {
        ProductFacade::store($request->all());
        return redirect()->back();
    }

    public function delete($product_id)
    {
       ProductFacade::delete($product_id);
        return redirect()->back();
    }

    public function status($product_id)
    {
        ProductFacade::status($product_id);
        return redirect()->back();
    }

    public function edit(Request $request)
    {
        $response['product'] = ProductFacade::get($request['product_id']);
        return view('pages.product.edit')->with($response);
    }

    public function update(Request $request, $product_id)
    {
        ProductFacade::update($request->all(), $product_id);
        return redirect()->back();
    }
}
