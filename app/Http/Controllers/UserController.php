<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $users=User::get();
       return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, User $user)
    {
        return view('users.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'name'=>'required|min:1',
            'event_type_id'=>'required',
            'location_id'=>'required',
            'event_dates'=>'required',
            ]);
        //в frd Данные с формы
        $frd=$request->all();
        //в фрп уже есть пароль, но он не хэширован, поэтому заменяем его
        //хешируем для безопасносного хранения, при авторизации введенный пользователем тоже хешируется
        //и сравнивается уже хеш из бд и хеш введенный пользователем, расхешировать его нельзя
        $frd['password']=Hash::make(Arr::get($frd, 'password'));
        /*Тут мы создаем пользователя, все как в update методе, оторый мы делали
        только там мы прописывали каждое поле и его значение, но это не обязательно, потому
        что перменные на форме имеют имена, как поля в базе данных
         */
        $user=User::create($frd); //юзер готов он уже в бд
        //2 также можно подругом создать юзера
        //создать экземпляр класса юзер и закинуть в него фрд, он сам заполнит себя из $frd
        $user=new User($frd);
        //и затем сохранить его
        $user->save();
        /*
         * в большистве в ответе контроллера используется вохвращение view
         * return view('users.show', compact('user'));
         * Также в update мы использовали возвращение на предыдущую страницу
         * return redirect()->back();
         * Тут мы используем перезод на указанный раут из web.php
         */
        return redirect()->route('users.index');
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
    public function edit(Request $request, User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'=>'required|min:1',
            'event_type_id'=>'required',
            'location_id'=>'required',
            'event_dates'=>'required',
        ]);
        $frd=$request->all();
        $user->update([
            'name'=>$frd['name']??'',
            'email'=>Arr::get($frd, 'email'),
            'password'=>Arr::get($frd,'password'),
        ]);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return redirect()->route('products.index');
    }

}
