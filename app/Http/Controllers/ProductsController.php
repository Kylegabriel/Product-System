<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\Category;
use App\Models\Products;
use App\Models\Purchase;
use App\Models\SuffixName;
use App\Models\Designation;
use Session;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $supplier;

    public function __construct(){

        $this->supplier = Supplier::all();

        $suffix = SuffixName::all();
        $this->suf= array();
        foreach ($suffix as $suffixes) {
            $this->suf[$suffixes->suffix_code] = $suffixes->suffix_desc;
        }
    }

    public function index()
    {
        //
        $product = Purchase::all();
        // echo($product);
        return view('products.index')->with([
        'products' => $product
        ]);
    }

    public function getSupplierList(Request $request)
    {
        $category = Category::
                    select('category_name','category_code')
                    ->where("supplier_code",'LIKE','%'.$request->input('supplier_id').'%')
                    ->pluck("category_name","category_code");
        return $category;
    }

    public function getCategoryList(Request $request)
    {
        $products = Products::
                    select('product_name','product_code')
                    ->where("category_code",'LIKE','%'.$request->input('category_id').'%')
                    ->pluck("product_name","product_code");
        return $products;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('products.form')->with([
            'suppliers' => $this->supplier,
            'suffix' => $this->suf,
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $purchase = new Purchase;

        $purchase->desig_id = $request->input('desig_id');
        $purchase->last_name = $request->input('last_name');
        $purchase->first_name = $request->input('first_name');
        $purchase->middle_name = $request->input('middle_name');
        $purchase->suffix_name = $request->input('suffix_name');
        $purchase->supplier_code = $request->input('supplier_code');
        $purchase->category_code = $request->input('category_code');
        $purchase->product_code = $request->input('product_code');

        $purchase->save();

        Session::flash('success','Facility was Successfully Save');

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $editPurchase = Purchase::find($id);

        $supp = array();
        foreach ($this->supplier as $supply) {
            $supp[$supply->supplier_code] = $supply->supplier_name;
        }

        $categories = Category::select('category_code','category_name')
                                    ->where('supplier_code','=',$editPurchase->supplier_code)
                                    ->get();
        $categor = array();
        foreach ($categories as $category) {
            $categor[$category->category_code] = $category->category_name;
        }

        $products = Products::select('product_code','product_name')
                                    ->where('category_code','=',$editPurchase->category_code)
                                    ->get();
        $product = array();
        foreach ($products as $producty) {
            $product[$producty->product_code] = $producty->product_name;
        }

        $designations = Designation::get();
        $desig = array();
        foreach ($designations as $designation) {
            $desig[$designation->id] = $designation->designation;
        }

        return view('products.form')->with([
        'purchase' =>  $editPurchase,
        'supplierr' => $supp,
        'categoryy' => $categor,
        'productss' => $product,
        'suffix' => $this->suf,
        'designationss' => $desig,
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $purchase = Purchase::find($id);

        $purchase->desig_id = $request->input('desig_id');
        $purchase->last_name = $request->input('last_name');
        $purchase->first_name = $request->input('first_name');
        $purchase->middle_name = $request->input('middle_name');
        $purchase->suffix_name = $request->input('suffix_name');
        $purchase->supplier_code = $request->input('supplier_code');
        $purchase->category_code = $request->input('category_code');
        $purchase->product_code = $request->input('product_code');

        $purchase->save();

        Session::flash('success','Purchase was Successfully Updated');

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $purchase = Purchase::find($id);

        $purchase->delete();

        Session::flash('repeat','Purchase was Successfully Deleted');
        return redirect()->route('products.index');
    }
}
