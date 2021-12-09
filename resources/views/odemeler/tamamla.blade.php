<x-layout>
    <div class="mx-auto bg-yellow-100 bg-opacity-75 py-8 px-10 rounded-xl shadow-lg">
        <form class="space-y-2" action="/odemeler/{{ $odeme->kod }}/tamamla" method="POST">
            @csrf
            <div class="flex flex-col md:flex-row md:justify-between space-x-8">
                <label for="fullname">Kart sahibinin adı soyadı :</label>
                <input type="text" name="fullname">
            </div>
            @error('fullname')
                <p class="text-red-400 text-sm">{{ $message }}</p>
            @enderror
            <div class="flex flex-col md:flex-row md:justify-between  space-x-8">
                <label for="cardnumber">Kart numarası :</label>
                <input type="text" name="cardnumber">
            </div>

            @error('cardnumber')
                <p class="text-red-400 text-sm">{{ $message }}</p>
            @enderror
            <div class="flex ">
                <p>SKT Ay-Yıl | CVC :</p>
                <div class="ml-auto">
                    <input class="w-14 text-center" type="text" name="month" placeholder="AA">
                    <input class="w-14 text-center" type="text" name="year" placeholder="YY">
                    <input class="ml-8 w-14 text-center"type="text" name="cvc" placeholder="CVC" id="cvc" >
                </div>
            </div>

            @error('month')
                <p class="text-red-400 text-sm">{{ $message }}</p>
            @enderror

            @error('year')
                <p class="text-red-400 text-sm">{{ $message }}</p>
            @enderror

            @error('cvc')
                <p class="text-red-400 text-sm">{{ $message }}</p>
            @enderror
            <p> Tutar : </p>
            <div class="w-full flex">
                <p class="text-green-500 text-4xl font-mono ml-auto">{{ $odeme->tutar }} TL</p>
            </div>
            <input type="hidden" name="amount" value="{{ $odeme->tutar }}">

            @error('amount')
                <p class="text-red-400 text-sm">{{ $message }}</p>
            @enderror
            <div class="flex">
                <input class="ml-auto px-4 py-2 border hover:bg-green-300 cursor-pointer bg-transparent rounded" type="submit" value="Tamamla">
            </div>
        </form>
    </div>
</x-layout>
