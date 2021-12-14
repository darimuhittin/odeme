<x-layout>
    <div class="mx-auto w-1/3 bg-yellow-100 bg-opacity-75 py-8 px-10 rounded-xl shadow-lg">
        <h1 class="text-xl lg:text-4xl mb-4 border-b-2 border-gray-800">Ödeme Sonuc Detay</h1>
        <div class="flex justify-between">
            <p>KOD : </p> <span class="text-green-600 text-xl">{{ $odeme->kod }} TL</span>
        </div>
        <div class="flex justify-between">
            <p>Tutar : </p> <span class="text-green-600 text-xl">{{ $odeme->tutar }} TL</span>
        </div>
        <div class="flex justify-between">
            <p>Açıklama : </p> <span class="text-green-600 text-xl">{{ $odeme->aciklama }}</span>
        </div>

        <p>Yukarıda bilgileri verilen ödemeniz başarı ile gerçekleştirilmiştir.</p>
        {{ ddd($odeme) }}
    </div>
</x-layout>
