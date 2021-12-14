
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
            <div>
                <a class="block py-2 px-4 hover:bg-gray-600" href="/admin/odemeler"> Ödemeler </a>
            </div>
            <div class="ml-auto my-auto mr-4">
                <button class="block" id="logout-button">
                    <i class="fas fa-sign-out-alt"></i>
                </button>
                <form id="logout-form" action="/admin/logout" method="post">
                    @csrf
                </form>
            </div>
        </div>
    </nav>

  {{ $slot }}



  @if (session()->has('message'))
  <div x-data="{open: true}" x-show="open" x-init="setTimeout(()=> open = false,3000)" class="fixed bottom-4 right-4 border bg-green-300 px-4 py-2 rounded-xl " x-transition.duration.1000ms>
    {{ session('message'); }}
</div>
  @endif

  <script src="{{ asset('js/admin-logout.js') }}"></script>
  <script src="{{ asset('js/app.js') }}" defer></script>
  <script src="{{ asset('js/fa-all.min.js') }}"></script>
</body>

</html>
