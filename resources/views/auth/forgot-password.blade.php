<x-layout>
    <x-navbar />
    <div class="mx-6 mt-6 grid grid-rows-1 place-items-center">
        <img alt="soypura.logo" class="w-[30%] sm:w-[20%]" src="/media/illustrazioni-12.png">
        <h1 class="my-6 text-center text-xl font-semibold tracking-wider text-white lg:text-4xl">Reset Password</h1>
        <p class="mb-6 text-center text-xl font-semibold tracking-wide text-white lg:text-3xl">Inserisci la tua mail e segui i passaggi <br>
            per resettare la tua Password
        </p>
    </div>
    <div class="flex w-full items-center justify-center">
        <form action="{{ route('password.email') }}" class="w-full max-w-2xl" method="POST">
            @csrf
            <div class="-mx-3 mt-24 mb-6 flex flex-wrap">
                @if (session('status'))
                    <div class="mb-4 text-sm font-medium text-green-600">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="mb-6 w-full px-3">
                    <label class="text-s mb-2 block tracking-wide text-white" for="grid_email">
                        Email
                    </label>
                    <input class="@error('email') border-red-500 @enderror block w-full appearance-none rounded-3xl border bg-white px-4 py-3 leading-tight text-gray-700" id="grid_email" name="email" placeholder="mail@example.com" type="text" value="{{ old('email') }}">
                    @error('email')
                        <p class="text-xs italic text-red-300">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="-mx-3 mb-6 flex flex-wrap">
                <div class="mt-6 w-full px-3 flex justify-center">
                    <button class="block w-1/2 appearance-none rounded-3xl bg-primary px-4 py-2 leading-tight text-white" type="submit">
                        RESETTA LA PASSWORD
                    </button>
                </div>
            </div>
        </form>
    </div>
</x-layout>
