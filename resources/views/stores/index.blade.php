@extends('layouts.app')
 
 @section('content')
 <div class="row">
 <div class="col-2">
         @component('components.sidebar', ['categories' => $categories])
         @endcomponent
     </div>
     <div class="col-9">
     <div class="container">
             @if ($category !== null)
                 <a href="{{ route('stores.index') }}">トップ</a> > <a href="#"></a> > {{ $category->name }}
                 <h1>{{ $category->name }}の商品一覧{{$total_count}}件</h1>
             @endif
         </div>
         <div class="container mt-4">
             <div class="row w-100">
                 @foreach($stores as $store)
                 <div class="col-3">
                     <a href="{{route('stores.show', $store)}}">
                         <img src="{{ asset('img/dummy.png')}}" class="img-thumbnail">
                     </a>
                     <div class="row">
                         <div class="col-12">
                             <p class="kadai_002-store-label mt-2">
                                 {{$store->name}}<br>
                                 <label>￥{{$store->price}}</label>
                             </p>
                         </div>
                     </div>
                 </div>
                 @endforeach
             </div>
         </div>
         {{ $stores->links() }}
     </div>
 </div>
 @endsection