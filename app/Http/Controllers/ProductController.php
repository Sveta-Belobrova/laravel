<?php

namespace App\Http\Controllers;
use App\Product;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $frd=$request->all();
        $products=Product::filter($frd)->get();
        return view('products.index', compact('products'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, Product $product)
    {
        return view('products.create', compact('product'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //в frd Данные с формы
        $frd=$request->all();

        $product=Product::create($frd); //юзер готов он уже в бд
        //2 также можно подругом создать юзера
        //создать экземпляр класса юзер и закинуть в него фрд, он сам заполнит себя из $frd
        $product=new Product($frd);
        //и затем сохранить его
        $product->save();
        /*
         * в большистве в ответе контроллера используется вохвращение view
         * return view('users.show', compact('user'));
         * Также в update мы использовали возвращение на предыдущую страницу
         * return redirect()->back();
         * Тут мы используем перезод на указанный раут из web.php
         */
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
     * @param  Request $request
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  Product $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Product $product)
    {
        $frd=$request->all();
        $product->update([
            'name'=>$frd['name']??'',
            'description'=>Arr::get($frd, 'description'),
            'price'=>Arr::get($frd,'price'),
        ]);
        return redirect()->back();
    }

}
