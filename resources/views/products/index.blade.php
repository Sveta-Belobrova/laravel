@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 my-5">
                {{Form::open(['url'=>route('products.index'),'method'=>'GET'])}}
                <div class="row">
                    <div class="col-10">
                        @include('forms._input', [
    'name'=>'search',
    'label'=>'Поиск',
    'placeholder'=>'продукт...',
])
                    </div>
                    <div class="col-2">
                        <button class="btn btn-secondary">
                            <i class="fas fa-search"></i>
                        </button>
                    </div></div>
                <div class="row justify-content-start mt-4">
                    <div class="col-auto">
                        <a href="{{route('products.create')}}" class="btn btn-success">
                            Создать новый продукт <i class="far fa-plus-square"></i>
                        </a>
                    </div>
                </div>
                <div class="row pb-2 mt-5">
                    <div class="col-12">Список продуктов</div></div>
                <div class="row pb-2 mt-5">
                    <div class="col-1">id</div>
                    <div class="col-2">Наименование</div>
                    <div class="col-2">Описание</div>
                    <div class="col-1">цена</div></div>
                @forelse($products as $product)
                    <div class="row pb-2">
                        <div class="col-1">
                            {{$product->getKey()}}
                        </div>
                        <div class="col-2">
                            {{$product->getName()}}
                        </div>
                        <div class="col-2">
                            {{$product->getDescription()}}
                        </div>
                        <div class="col-1">
                            {{$product->getPrice()}}
                        </div>
                        <div class="col-4">
                            <a href="{{route('products.edit', $product)}}" class="btn btn-success">
                                Редактировать
                            </a>
                        </div>
                        <div class="col-5">
                            {{Form::open(['method'=>'DELETE', 'url'=>route('products.destroy', $product)])}}
                            <button class="btn btn-danger">
                                удалить
                            </button>
                            {{Form::close()}}
                        </div>
                    </div>
                @empty
                @endforelse
            </div>
        </div></div>
@endsection
