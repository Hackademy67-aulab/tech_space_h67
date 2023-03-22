<x-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 d-flex justify-content-center">
                <h1 class="text-center">Dettaglio di {{$product->name}}</h1>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-4 d-flex justify-content-center">
                <div class="card" style="width: 18rem;">
                    @if($product->image)
                        <img src="{{Storage::url($product->image)}}" class="card-img-top" alt="{{$product->name}}">
                    @else
                        <img src="/img/default.jpg" class="card-img-top" alt="...">
                    @endif
                    
                    <div class="card-body">
                        <h5 class="card-title">{{$product->name}}</h5>
                        <p>{{$product->price}}</p>
                        <p>{{$product->description}}</p>
                        <a href="{{route('indexProduct')}}" class="btn btn-primary">Indietro</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-layout>