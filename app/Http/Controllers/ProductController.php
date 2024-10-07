<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    
    protected $products;

     public function __construct() {
        $this->products = new product();
    }
    
    
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$products = $this->products->all();
       // $categories = category::pluck('name','id');
                   
        //return view('pages.products.index', compact('products','categories'));
        $products = product::all(); // Fetch all products
        $categories = Category::pluck('name', 'id'); // Fetch categories as a name-id pair
    
        return view('pages.products.index', compact('products', 'categories'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validate the request input data
    $validatedData = $request->validate([
        'productname' => 'required',
        'cat_id' => 'required|exists:_category,id',
        'description' => 'required',
        'price' => 'required|numeric',
        'photo' => 'nullable|image|mimes:jpeg,png,jfif,jpg,gif|max:2048',
    ]);

    // Handle the file upload
    if ($request->hasFile('photo')) {
        $fileName = time() . '_' . $request->file('photo')->getClientOriginalName();
        $request->file('photo')->move(public_path('images'), $fileName);
        $validatedData['photo'] = $fileName;  // Save the file name to the database
    }

    try {
        Product::create($validatedData);  // Insert the product into the database
        return redirect()->back()->with('success', 'Product added successfully!');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Error adding product: ' . $e->getMessage());
    }
}

    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
