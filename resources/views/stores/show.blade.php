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
                 @if ($store->reviews()->exists())
                     <p>
                         <span class="kadai_002-star-rating" data-rate="{{ round($store->reviews->avg('score') * 2) / 2 }}"></span>
                         {{ round($store->reviews->avg('score'), 1) }}
                     </p>
                 @endif
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
                        @if($store->isFavoritedBy(Auth::user()))
                         <a href="{{ route('stores.favorite', $store) }}" class="btn kadai_002-favorite-button text-favorite w-100">
                             <i class="fa fa-heart"></i>
                             お気に入り解除
                         </a>
                         @else
                         <a href="{{ route('stores.favorite', $store) }}" class="btn kadai_002-favorite-button text-favorite w-100">
                             <i class="fa fa-heart"></i>
                             お気に入り
                         </a>
                         @endif

                     </div>
                 </div>
             </form>
                 <form id="favorites-store-form" action="{{ route('stores.favorite', $store->id) }}" method="POST" class="d-none">
                     @csrf
                 </form>
             @endauth
         </div>
 
         <div class="offset-1 col-11">
             <hr class="w-100">
             <h3 class="float-left">カスタマーレビュー</h3>
             @if ($store->reviews()->exists())
                 <p>
                     <span class="kadai_002-star-rating" data-rate="{{ round($store->reviews->avg('score') * 2) / 2 }}"></span>
                     {{ round($store->reviews->avg('score'), 1) }}
                 </p>
             @endif
         </div>
 
         <div class="offset-1 col-10">
         <div class="row">
                 @foreach($reviews as $review)
                 <div class="offset-md-5 col-md-5">
                 <h3 class="review-score-color">{{ str_repeat('★', $review->score) }}</h3>
                     <p class="h3">{{$review->content}}</p>
                     <label>{{$review->created_at}} {{$review->user->name}}</label>
                 </div>
                 @endforeach
             </div><br />
 
            <!-- ログインしているかではなく有料会員かどうかで分けたい -->
             @auth
             <div class="row">
                 <div class="offset-md-5 col-md-5">
                     <form method="POST" action="{{ route('reviews.store') }}">
                         @csrf
                         <h4>評価</h4>
                             <select name="score" class="form-control m-2 review-score-color">
                                 <option value="5" class="review-score-color">★★★★★</option>
                                 <option value="4" class="review-score-color">★★★★</option>
                                 <option value="3" class="review-score-color">★★★</option>
                                 <option value="2" class="review-score-color">★★</option>
                                 <option value="1" class="review-score-color">★</option>
                             </select>
                         <h4>レビュー内容</h4>
                         @error('content')
                             <strong>レビュー内容を入力してください</strong>
                         @enderror
                         <textarea name="content" class="form-control m-2"></textarea>
                         <input type="hidden" name="store_id" value="{{$store->id}}">
                         <button type="submit" class="btn kadai_002-submit-button ml-2">レビューを追加</button>
                     </form>
                 </div>
             </div>
             @endauth
         </div>
     </div>
 </div>
 @endsection