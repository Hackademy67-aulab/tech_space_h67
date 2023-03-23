<x-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 d-flex justify-content-center">
                <h1 class="text-center">Tutti i negozi</h1>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row justify-content-center">
            @foreach ($shops as $shop)
                <div class="col-12 col-md-4 d-flex justify-content-center mt-5">
                    <div class="card" style="width: 18rem;">
                        {{-- <img src="/img/nomefile.jpg" class="card-img-top" alt="..."> --}}
                        <div class="card-body">
                            <h5 class="card-title">{{$shop->name}}</h5>
                            <div class="d-flex">
                                <a href="{{route('showShop', compact('shop'))}}" class="btn btn-primary">Dettaglio</a>
                                <a href="{{route('editShop', compact('shop'))}}" class="btn btn-warning">Modifica</a>
                                {{-- <a href="Chiama la modale">Cancella</a> --}}
                                <a href="" onclick="event.preventDefault(); document.querySelector('#form-delete').submit();" class="btn btn-danger">Cancella</a>
                                <form id="form-delete" method="POST" action="{{route('deleteShop', compact('shop'))}}">
                                    @method('delete')
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</x-layout>