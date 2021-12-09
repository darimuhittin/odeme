<x-layout>
    <div class="mx-auto w-1/3 bg-yellow-100 bg-opacity-75 py-8 px-10 rounded-xl shadow-lg">
        <h1 class="text-xl lg:text-4xl mb-4 border-b-2 border-gray-800">Ödeme Detay</h1>
        <div class="flex justify-between">
            <p>Tutar : </p> <span class="text-green-600 text-xl">{{ $odeme->tutar }} TL</span>
        </div>
        <div class="flex justify-between">
            <p>Açıklama : </p> <span class="text-green-600 text-xl">{{ $odeme->aciklama }}</span>
        </div>

        <a class="bg-green-200 px-4 py-1 rounded float-right mt-4" href="/odemeler/{{ $odeme->kod }}/tamamla"> Ödemeyi Gerçekleştir</a>
    </div>
</x-layout>
