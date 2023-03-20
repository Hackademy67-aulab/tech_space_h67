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
                    <img src="https://picsum.photos/450/250?random={{$product->id}}" class="card-img-top" alt="...">
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