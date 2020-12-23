<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    public function index(): Response
    {
        return response(Product::all(), Response::HTTP_OK);
    }

    public function show(int $id): Response
    {
        return response(Product::find($id), Response::HTTP_OK);
    }

    public function store(Request $request): Response
    {
        $product = Product::create($request->only('title', 'image'));

        return response($product, Response::HTTP_CREATED);
    }

    public function update(int $id, Request $request): Response
    {
        $product = Product::find($id);
        $product->update($request->only('title', 'image'));

        return response($product, Response::HTTP_ACCEPTED);
    }

    public function destroy(int $id): Response
    {
        Product::destroy($id);

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
