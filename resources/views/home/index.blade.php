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
        <div class="p-10 w-1/3 border border-gray-500 border-opacity-25 mx-auto my-auto rounded-3xl flex flex-col items-start">
            <h1 class="text-yellow-500 text-4xl">Ödeme Kodunuz :</h1>
            <form class="w-full mt-10 space-y-10" action="/" method="post">
                @csrf
                <input class="ring-4 placeholder-gray-200 border border-gray-200 border-8 focus:ring-8 ring-green-100 ring-opacity-25 outline-none border text-center block px-4 py-1 rounded-xl text-2xl uppercase mx-auto" type="text" name="kod" id="kod" placeholder="XUSOWLGKSUDMAKSD">
                <input class="block ml-auto px-10 py-2 bg-green-200 rounded-md cursor-pointer text-yellow-600" type="submit" value="Ara">
            </form>
        </div>
    </div>
</div>
</body>
</html>
