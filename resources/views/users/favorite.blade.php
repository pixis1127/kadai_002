@extends('layouts.app')
 
 @section('content')
 <div class="container  d-flex justify-content-center mt-3">
     <div class="w-75">
         <h1>お気に入り</h1>
 
         <hr>
 
         <div class="row">
             @foreach ($favorites as $fav)
             <div class="col-md-7 mt-2">
                 <div class="d-inline-flex">
                     <a href="{{route('stores.show', $fav->favoriteable_id)}}" class="w-25">
                         <img src="{{ asset('img/dummy.png')}}" class="img-fluid w-100">
                     </a>
                     <div class="container mt-3">
                         <h5 class="w-100 kadai_002-favorite-item-text">{{App\Models\Store::find($fav->favoriteable_id)->name}}</h5>
                         <h6 class="w-100 kadai_002-favorite-item-text">&yen;{{App\Models\Store::find($fav->favoriteable_id)->price}}</h6>
                     </div>
                 </div>
             </div>
             <div class="col-md-2 d-flex align-items-center justify-content-end">
                 <a href="{{ route('stores.favorite', $fav->favoriteable_id) }}" class="kadai_002-favorite-item-delete">
                     削除
                 </a>
             </div>
             @endforeach
         </div>
 
         <hr>
     </div>
 </div>
 @endsection