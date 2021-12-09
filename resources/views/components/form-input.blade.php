@props(['for'])

<div class="mt-4 flex items-center justify-between">
    <label class="block flex-shrink-0 mr-4" for="{{ $for }}"> {{ ucfirst($for) }} : </label>
<input class=" block border border-gray-700 focus:ring-2 flex-shrink-0 border border-gray-200 px-4 py-2 rounded-xl" type="{{ $for }}" name="{{ $for }}"
    id="{{ $for }}" autocomplete="{{ $for }}">

</div>
