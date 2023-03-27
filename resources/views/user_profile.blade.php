<x-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <h1 class="text-center">Profilo di {{Auth::user()->name}}</h1>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <h1 class="text-center">I miei negozi</h1>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#id</th>
                        <th scope="col">Name</th>
                        <th scope="col">City</th>
                        <th scope="col">Description</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach (Auth::user()->shops as $shop)
                            <tr>
                                <td>{{$shop->id}}</td>
                                <td>{{$shop->name}}</td>
                                <td>{{$shop->city}}</td>
                                <td>{{$shop->description}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 d-flex justify-content-center">
            <form action="{{route('deleteUser')}}" method="POST">
                @method('delete')
                @csrf
                <button type="submit" class="btn btn-danger">Cancellati</button>
            </form>
            </div>
        </div>
    </div>

</x-layout>