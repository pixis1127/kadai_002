@extends('layouts.app')
 
 @section('content')
 
 <div class="d-flex justify-content-center">
     <div class="row w-75">
         <div class="col-5 offset-1">
             <img src="{{ asset('img/dummy.png')}}" class="w-100 img-fluid">
         </div>
         <div class="col">
             <div class="d-flex flex-column">
                 <h1 class="">
                     {{$store->name}}
                 </h1>
                 <p class="">
                     {{$store->description}}
                 </p>
                 <hr>
                 <p class="d-flex align-items-end">
                     ￥{{$store->price}}(税込)
                 </p>
                 <hr>
             </div>
             @auth
             <form method="POST" class="m-3 align-items-end">
                 @csrf
                 <input type="hidden" name="id" value="{{$store->id}}">
                 <input type="hidden" name="name" value="{{$store->name}}">
                 <input type="hidden" name="price" value="{{$store->price}}">
                 <div class="row">
                     <div class="col-5">
                         <a href="/stores/{{ $store->id }}/favorite" class="btn kadai_002-favorite-button text-dark w-100">
                             <i class="fa fa-heart"></i>
                             お気に入り
                         </a>
                     </div>
                 </div>
             </form>
             @endauth
         </div>
 
         <div class="offset-1 col-11">
             <hr class="w-100">
             <h3 class="float-left">カスタマーレビュー</h3>
         </div>
 
         <div class="offset-1 col-10">
             <!-- レビューを実装する箇所になります -->
         </div>
     </div>
 </div>
 @endsection