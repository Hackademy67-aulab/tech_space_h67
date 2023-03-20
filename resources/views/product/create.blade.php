<x-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 d-flex justify-content-center">
                <h1 class="text-center">Inserisci prodotto</h1>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <form class="p-5 shadow" method="POST" action="{{route('storeProduct')}}">

                    @csrf

                    <div class="mb-3">
                      <label for="exampleInputName" class="form-label">Nome prodotto</label>
                      <input name="name" type="text" class="form-control" id="exampleInputName" aria-describedby="nameHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPrice" class="form-label">Prezzo</label>
                        <input name="price" type="text" class="form-control" id="exampleInputPrice" aria-describedby="priceHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputDescription" class="form-label">Descrizione:</label>
                        <textarea name="description" class="form-control" id="exampleInputDescription" cols="30" rows="10"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Inserisci prodotto</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>