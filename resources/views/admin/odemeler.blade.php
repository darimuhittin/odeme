<x-adminLayout>


    <div class="px-10 py-4">
        <div class="mb-2 flex">
            {{-- <a class="ml-auto px-4 py-2 border hover:bg-green-100" href="/admin/cariler/create">
                Cari Ekle +
            </a> --}}
        </div>
        <div class="gap-4 grid grid-cols-3">
            @foreach ($odemeler as $odeme)
                <div class="{{ !$odeme->odendi_mi ? 'bg-red-300' : 'bg-green-300' }} px-4 py-2 text-sm bg-opacity-50">
                    <div class="flex items-center space-x-8" x-data="{show : false}">
                        KOD : <h1 class="cursor-pointer hover:text-green-400" @click="show=true;setTimeout(()=>show=false,1000)"  onclick="copyClip(this)" >
                            {{ $odeme->kod }}
                        </h1>
                            <div x-show="show" class="text-pink-700 bg-green-200 px-4 text-sm rounded-xl rounded-tl-none" >Kod kopyalandi !</div>
                    </div>
                    <p>{{ $odeme->aciklama }}</p>
                    <h2>Odeyecek kisi :</h2>
                    <div class="pl-8">
                        <p>AD : {{ $odeme->cari->ad }}</p>
                        <p>EMAIL : {{ $odeme->cari->email }}</p>
                        <p>TELEFON : {{ $odeme->cari->telefon }}</p>
                        <p>SLUG : {{ $odeme->cari->slug }}</p>
                    </div>
                    <p>{{ $odeme->tutar }}</p>
                    @if ($odeme->odendi_mi)
                    <div class="flex bg-green-400 p-2 items-center">

                        <i class="fas fa-check"></i>
                        <p class="block ml-auto">{{ $odeme->updated_at->diffForHumans() }} ödendi</p>
                    </div>
                    @else
                        <div class="flex bg-red-400 p-2 items-center">
                            <i class="fas fa-times-square"></i>
                            <p class="block ml-auto">Ödeme bekleniyor.</p>
                        </div>
                    @endif

                </div>

                @endforeach
            </div>
    </div>
</x-adminLayout>
