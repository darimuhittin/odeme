<x-adminLayout>


    <div class="px-10 py-4">
        <div class=" mb-2 flex">
            <a class="ml-auto px-4 py-2 border hover:bg-green-100" href="/admin/cariler/create">
                Cari Ekle +
            </a>
        </div>
        <div class=" mx-auto w-max py-4 px-10 rounded-xl">
            <form action="/admin/cariler" method="POST">
                @csrf
                <x-form-input for="ad" />
                <x-form-input for="telefon" />
                <x-form-input for="email" />
                <x-form-input for="slug" />

                <x-form-submit>Kaydet</x-form-submit>
            </form>
        </div>
    </div>
</x-adminLayout>
