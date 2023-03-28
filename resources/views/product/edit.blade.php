<x-layout>

    {{-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 d-flex justify-content-center">
                <h1 class="text-center">Modifica prodotto {{$product->name}}</h1>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <form class="p-5 shadow" method="POST" action="{{route('updateProduct', compact('product'))}}" enctype="multipart/form-data">

                    @method('put')

                    @csrf

                    <div class="mb-3">
                        <label for="exampleInputName" class="form-label">Nome prodotto</label>
                        <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputName" aria-describedby="nameHelp" value="{{$product->name}}">
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPrice" class="form-label">Prezzo</label>
                        <input name="price" type="text" class="form-control @error('price') is-invalid @enderror" id="exampleInputPrice" aria-describedby="priceHelp" value="{{$product->price}}">
                        @error('price')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputDescription" class="form-label">Descrizione:</label>
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="exampleInputDescription" cols="30" rows="10">{{$product->description}}</textarea>
                        @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        @if($product->image)
                            <div class="d-flex justify-content-center">
                                <img style="width: 200px; height:auto;" src="{{Storage::url($product->image)}}" alt="">
                            </div>  
                        @else
                            <p>Non ci sono immagini per questo negozio!</p>
                        @endif
                    </div>
                    
                    <div class="mb-3">
                        <label for="exampleInputImage" class="form-label">Immagine</label>
                        <input name="image" type="file" class="form-control @error('image') is-invalid @enderror" id="exampleInputImage" aria-describedby="imageHelp" accept="image/jpg, image/bmp, image/png, image/webp">
                        @error('image')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="mb-3">
                        <label for="exampleInputShop" class="form-label">Scegli negozi:</label>
                        <select name="shops[]" multiple class="form-select" id="exampleInputShop" aria-label="Default select example">
                            {{-- <option selected>Open this select menu</option> --}}
                            @foreach ($shops as $shop)
                            {{-- il value indica la tipologia di dato che gestiró a livello BE, quello che inseriamo nei tag sará il valore
                            effettivo che verrá mortato all'utente --}}
                                <option value="{{$shop->id}}" @if($shop->products->contains($product->id)) disabled @endif>{{$shop->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Modifica prodotto</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>







