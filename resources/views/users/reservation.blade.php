@extends('layouts.app')
 
 @section('content')
 <div class="container  d-flex justify-content-center mt-3">
     <div class="w-75">
         <h1>予約一覧</h1>
 
         <hr>
 
         <div class="row">
             @foreach ($reservations as $reservation)
                 <div class="col-md-7 mt-2">
                     <div class="d-inline-flex">
                         <a href="{{ route('stores.show', $reservation->id) }}" class="w-25">
                             <img src="{{ asset('img/dummy.png')}}" class="img-fluid w-100">
                         </a>
                         <div class="container mt-3">
                             <h5 class="w-100 kadai_002-reservation-item-text">{{ $reservation->store->name }}</h5>
                             <h6 class="w-100 kadai_002-reservation-item-text">&yen;{{ $reservation->store->price }}</h6>
                         </div>
                     </div>
                 </div>
             @endforeach
         </div>
 
         <hr>
     </div>
 </div>
 @endsection