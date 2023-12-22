<x-layout>
    <div class="flex min-h-screen justify-center items-center flex-col">
        <h1 class="text-3xl text-white mb-6">Contatti da te referenziati:</h1>
        <ul>
            @foreach (Auth::user()->referees as $referee)
                <li class="text-white my-2">{{ $referee->name }}</li>
            @endforeach
        </ul>
    </div>
</x-layout>
