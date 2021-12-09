<x-adminLayout>


    <div class="px-10 py-4">

        <div class=" mx-auto w-max py-4 px-10 rounded-xl">
            <form action="/admin/cariler/{{ $cari->slug}}/odemeler" method="POST">
                @csrf
                <x-form-input for="tutar" />
                <x-form-input for="açıklama" />

                <x-form-submit>Oluştur</x-form-submit>
            </form>
        </div>
    </div>
</x-adminLayout>
