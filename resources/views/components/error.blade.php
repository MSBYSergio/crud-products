{{-- Recuerda que accedes con el parámetro como si fuera una variable --}}
@props(['for'])
@error($for)
<p class="text-red-500 italic text-sm">{{$message}}</p>
@enderror
