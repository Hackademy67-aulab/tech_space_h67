<x-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 d-flex justify-content-center">
                <h1 class="text-center">Tutti i prodotti</h1>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row justify-content-center">
            @foreach ($products as $product)
            <div class="col-12 col-md-4 d-flex justify-content-center mt-5">
                <div class="card" style="width: 18rem;">
                    {{-- <img src="/img/nomefile.jpg" class="card-img-top" alt="..."> --}}
                    <div class="card-body">
                        <h5 class="card-title">{{$product->name}}</h5>
                        <div class="d-flex">
                            <a href="{{route('showProduct', compact('product'))}}" class="btn btn-primary">Dettaglio</a>
                            @auth
                                @if($product->user)
                                    @if(Auth::user()->id == $product->user->id || Auth::user()->id == 1)
                                        <a href="{{route('editProduct', compact('product'))}}" class="btn btn-warning">Modifica</a>
                                        {{-- <a href="Chiama la modale">Cancella</a> --}}
                                        <a href="" onclick="event.preventDefault(); document.querySelector('#form-delete-{{$product->id}}').submit();" class="btn btn-danger">Cancella</a>
                                        <form id="form-delete-{{$product->id}}" method="POST" action="{{route('deleteProduct', compact('product'))}}">
                                            @method('delete')
                                            @csrf
                                        </form>
                                    @endif
                                @elseif(Auth::user()->id == 1)
                                    <a href="{{route('editProduct', compact('product'))}}" class="btn btn-warning">Modifica</a>
                                    {{-- <a href="Chiama la modale">Cancella</a> --}}
                                    <a href="" onclick="event.preventDefault(); document.querySelector('#form-delete-{{$product->id}}').submit();" class="btn btn-danger">Cancella</a>
                                    <form id="form-delete-{{$product->id}}" method="POST" action="{{route('deleteProduct', compact('product'))}}">
                                        @method('delete')
                                        @csrf
                                    </form>
                                @endif
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

</x-layout>