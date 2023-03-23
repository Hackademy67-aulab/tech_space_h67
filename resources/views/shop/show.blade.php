<x-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 d-flex justify-content-center">
                <h1 class="text-center">Dettaglio di {{$shop->name}}</h1>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row justify-content-center">
                <div class="col-12 col-md-4 d-flex justify-content-center mt-5">
                    <div class="card" style="width: 18rem;">
                        {{-- @dd($shop) --}}
                        @if($shop->image)
                            <img src="{{Storage::url($shop->image)}}" class="card-img-top" alt="{{$shop->name}}">
                        @else
                            <img src="/img/default.jpg" class="card-img-top" alt="...">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{$shop->name}}</h5>
                            <p>{{$shop->city}}</p>
                            <p>{{$shop->description}}</p>
                            <a href="{{route('indexShop')}}" class="btn btn-primary">Torna indietro</a>
                        </div>
                    </div>
                </div>
        </div>
    </div>

</x-layout>