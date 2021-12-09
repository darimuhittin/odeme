
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <div class="h-screen flex justify-center">
        <div
            class="shadow-xl p-10 w-1/3 border border-gray-500 border-opacity-25 mx-auto my-auto rounded-3xl flex flex-col items-start">
            <h1 class="text-yellow-500 text-4xl border-b-2 border-yellow-200 py-2">Yönetici Panel</h1>
            <form class="w-full mt-10" action="/admin/" method="post">
                @csrf
                <input class="border border-gray-200 px-4 py-2 rounded-xl" placeholder="Kullanıcı Adı" type="text" name="username" id="username" autocomplete="username">
                @error('username')
                    <p class="ml-4 text-red-500 text-sm">{{ $message }}</p>
                @enderror
                <input class="mt-4 border border-gray-200 px-4 py-2 rounded-xl" placeholder="Şifre" type="password" name="password" id="password" autocomplete="password">
                @error('password')
                    <p class="ml-4 text-red-500 text-sm">{{ $message }}</p>
                @enderror
                <input class="mt-6 ml-auto block bg-gray-800 text-white px-10 py-2 rounded-xl cursor-pointer" type="submit" value="Giriş">
            </form>
        </div>
    </div>
    </div>
</body>

</html>
