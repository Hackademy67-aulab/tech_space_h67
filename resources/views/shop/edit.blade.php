<x-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 d-flex justify-content-center">
                <h1 class="text-center">Modifica negozio {{$shop->name}}</h1>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <form class="p-5 shadow" method="POST" action="{{route('updateShop', compact('shop'))}}" enctype="multipart/form-data">

                    @method('put')

                    @csrf

                    <div class="mb-3">
                        <label for="exampleInputName" class="form-label">Nome negozio</label>
                        <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputName" aria-describedby="nameHelp" value="{{$shop->name}}">
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputCity" class="form-label">Cittá</label>
                        <input name="city" type="text" class="form-control @error('city') is-invalid @enderror" id="exampleInputCity" aria-describedby="cityHelp" value="{{$shop->city}}">
                        @error('city')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputDescription" class="form-label">Descrizione:</label>
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="exampleInputDescription" cols="30" rows="10">{{$shop->description}}</textarea>
                        @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        @if($shop->image)
                            <div class="d-flex justify-content-center">
                                <img style="width: 200px; height:auto;" src="{{Storage::url($shop->image)}}" alt="">
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

                    <button type="submit" class="btn btn-primary">Modifica Negozio</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>