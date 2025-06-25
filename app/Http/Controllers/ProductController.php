<?php

namespace App\Http\Controllers;
use App\Models\Product;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    function index() {
        return response()->json($products = Product::all(), 200);
        // Product::all();
    }
    function save(Request $request) {
        try { 
            $request->validate([
            'name' => 'required|string',
            'description' => 'required',
        ]);

        $product = new Product();
        $product->name = $request->get('name');
        $product->description = $request->get('description');
        $product->save();
        return response()->json([
            'message' => 'Product created successfully',
            'product' => $product
        ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => "Error creating product: " . $e->getMessage()
            ], 500);
        }
            

    }

    function delete($id) {
        try {
            $product = Product::findOrFail($id);
            $product->delete();
            return response()->json([
                'message' => 'Product deleted successfully'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => "Error deleting product: " . $e->getMessage()
            ], 500);
        }
    }
}
