<x-adminLayout>


    <div class="px-10 py-4">
        <div class=" mb-2 flex">
            <a class="ml-auto px-4 py-2 border hover:bg-green-100" href="/admin/cariler/create">
                Cari Ekle +
            </a>
        </div>
        <div class="gap-4 grid grid-cols-3">

            @foreach ($cariler as $cari)
            <div>

                <a class="" href="/admin/cariler/{{ $cari->slug }}">
                    <div class="text-sm rounded shadow-lg py-2 px-10  hover:bg-gray-200 bg-gray-300">
                        <h1> ID : {{ $cari->id }}</h1>
                        <p> Ad : {{ $cari->ad }}</p>
                        <p> Numara :{{ $cari->telefon }}</p>
                        <p> Email : {{ $cari->email }}</p>
                        <p> Link : {{ $cari->slug }}</p>
                    </div>
                </a>
                <div class="flex">
                    <a class="border px-4 py-1 ml-auto bg-gray-300 text-black rounded-xl rounded-t-none" href="/admin/cariler/{{ $cari->slug }}/odemeler/create">Ödeme Gir</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    </x-adminLayout>
