<?php
namespace App\Http\Controllers;
use App\Models\products;
use App\Models\category;
use App\Helper\ImageUploadHelper\ImageUploadHelper;
use Illuminate\Http\Request;
use App\Http\Requests\productstorerequest;
use Image;
use DB;


class ProductsController extends Controller
{

  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       
       
        $products=products::get();
        return view('adminpanel.view_products',compact('products'));
     
    }
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminpanel/add_product');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(productstorerequest $request)
    {
       $validatedData=$request->validated();
    
 
     $files = [];
     if($request->hasfile('product_images'))
     {
       foreach($request->file('product_images') as $file)
       {
           $name = time().rand(1,50).'.'.$file->extension();
           $file->move(public_path() . "/images/products/", $name);
           $files[] = $name; 
            
       }
    
     }

       try{
        $products = new products();
        $products->product_name=$request->product_name;
        $products->category=$request->category;
        $products->unit_type=$request->unit_type;
        $products->product_images=implode(',',$files);
        
        $products->product_price=$request->product_price;
        $products->discount_pre=$request->discount_pre;
        $products->discount_amount=$request->discount_amount;
        $products->discount_rangefrom=$request->discount_rangefrom;
        $products->discount_rangeto=$request->discount_rangeto;
        $products->tax=$request->tax;
        $products->tax_amount=$request->tax_amount;
        $products->stock=$request->stock;
    // dd($products);
        $products->save();
		 return redirect()->back()->with('message','Product Stored Successfully');
      
       }
       catch (\Throwable $th) {

     
       return redirect('products.index')->withErrors($validatedData)->withInput();
    }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(products $products)
    {
        $products=products::get();
        return view('adminpanel/view_products',compact('products')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit(products $products,$id)
    {
        $products = products::findOrFail($id);
        return view('adminpanel/product_edit', compact('products'));
    }
	
	public function update(Request $request,$id)
    {
		
        products:: where('id',$id)->update(
            ['product_name' => $request->product_name,
            'product_price'=>$request->product_price,
            'unit_type' => $request->unit_type,
            'category' => $request->category,
            'discount_pre' => $request->discount_pre,
            'discount_amount' => $request->discount_amount,
            'discount_rangefrom' => $request->discount_rangefrom,
            'discount_rangeto' => $request->discount_rangeto,
            'tax' => $request->tax,
            'tax_amount' => $request->tax_amount,
            'stock' => $request->stock,
            ]);
        return response()->json(['success' => 'Product updated successfully']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
  

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

      
        products::find($id)->delete($id);
        return response()->json(['success' => 'Product deleted successfully!']);
    }
}
