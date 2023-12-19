<x-layout>
    <div class="flex min-h-screen flex-col items-center justify-center">
        <h1 class="text-center text-3xl text-white">
            SOYDURO - Referral Materassi
        </h1>
        @if (Auth::check())
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="mt-12 rounded-lg border border-white p-2 text-white">
                    LOG OUT
                </button>
            </form>
            <h2 class="mt-24 text-center text-xl text-white">Di seguito il tuo Referral link:</h2>
            <a class="text-decoration-none mt-6 cursor-pointer rounded-lg border border-blue-300 p-2 text-center text-blue-300" href="{{ Auth::user()->referral_link }}"> !!! REFEREE FORM !!!</a>
        @endif
    </div>
</x-layout>
