
<!DOCTYPE html>
<html lang="en">

<head>
    @include('components._head')
</head>

<body>
    <!-- This example requires Tailwind CSS v2.0+ -->

    <nav class="bg-gray-800">
        <div class="flex text-white">
            <div>
                <a class="block py-2 px-4 hover:bg-gray-600" href="/admin/cariler"> Cariler </a>
            </div>
        </div>
    </nav>

  {{ $slot }}



  @if (session()->has('message'))
  <div x-data="{open: true}" x-show="open" x-init="setTimeout(()=> open = false,3000)" class="fixed bottom-4 right-4 border bg-green-300 px-4 py-2 rounded-xl " x-transition.duration.1000ms>
    {{ session('message'); }}
</div>
  @endif

  <script src="{{ asset('js/app.js') }}" defer></script>
</body>

</html>
