<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Resources\ProductResource;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{

    protected $user;
 
    public function __construct()
    {
        $this->user = JWTAuth::parseToken()->authenticate();
    }
    /**
    
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $products = Product::with('user')->get();

        return ProductResource::collection($products);
    }

    /**
     
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
   
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
     $data = $request->only( 'sku', 'price', 'quantity','location_id','category_id','subcatagory_id');
        //Validate data
        $validator = Validator::make($data, [
            'sku' => 'required',
            'price' => 'required',
            'location_id' => 'required',
            'category_id' => 'required',
            'subcatagory_id' => 'required',
            'quantity' => 'required'
        ]);

       
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }

      
        $product = $this->user->products()->create([
            'sku' => $request->sku,
            'price' => $request->price,
            'location_id' => $request->location_id,
            'category_id' => $request->category_id,
            'subcatagory_id' => $request->subcatagory_id,
            'quantity' => $request->quantity
        ]);

     
        return response()->json([
            'success' => true,
            'message' => 'Product created successfully',
            'data' => $product
        ], Response::HTTP_OK);
    }

    /**
    
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
    
        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, product not found.'
            ], 400);
        }
    
        return $product;
    }

    /**
     
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
   
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
          //Validate data
        $data = $request->only( 'sku', 'price', 'quantity','location_id','category_id','subcatagory_id');
        $validator = Validator::make($data, [
            
            'sku' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'location_id'=>'required',
            'category_id'=>'required',
            'subcatagory_id' => 'required'
        ]);

       
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }

       
        $product = $product->update([
            'sku' => $request->sku,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'location_id'=>$request->location_id,
             'category_id'=>$request->category_id,
              'subcatagory_id' => $request->subcatagory_id


        ]);

        //Product updated, return success response
        return response()->json([
            'success' => true,
            'message' => 'Product updated successfully',
            'data' => $product
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        
        return response()->json([
            'success' => true,
            'message' => 'Product deleted successfully'
        ], Response::HTTP_OK);
    }
    
}
