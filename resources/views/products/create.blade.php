@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                {{Form::model($product, ['method'=>'GET', 'url'=>route('products.store', $product)])}}
                @include('users._form', $product)
                <button class="btn btn-success">
                    Сохранить
                </button>
                {{Form::close()}}
            </div></div></div>
@endsection
