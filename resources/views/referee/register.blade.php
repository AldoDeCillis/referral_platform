<x-layout>
    {{-- <x-navbar /> --}}
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="text-center text-red-300">
                {{ $error }}
            </div>
        @endforeach
    @endif

    <div class="flex min-h-screen items-center justify-center">
        <div class="grid w-full place-items-center px-6 py-6 sm:px-0">
            <div class="grid w-full rounded-2xl ring ring-white ring-offset-1 sm:w-1/2">
                <form action="{{ route('referee.register', ['hashed_id' => $hashed_id]) }}" class="place-items-around bg-primary m-1 grid rounded-2xl p-2 sm:p-5" method="POST">
                    @if (session('status'))
                        <div class="mb-4 text-sm font-medium text-green-600">
                            {{ session('status') }}
                        </div>
                    @endif
                    @csrf
                    <h1 class="mx-auto mb-2 text-3xl font-semibold tracking-wider text-white">Registrati</h1>
                    <div class="-mx-3 mb-6 flex flex-wrap">
                        <div class="mb-6 w-full px-3">
                            <label class="text-s mb-2 block tracking-wide text-white" for="grid_first_name">
                                Nome<span class="text-red-300">*</span>
                            </label>
                            <input class="@error('name') border-red-500 @enderror block w-full appearance-none rounded-3xl border bg-white px-4 py-3 leading-tight text-gray-700" id="grid_first_name" name="name" placeholder="Nome" type="text" value="{{ old('name') }}">
                            @error('name')
                                <p class="text-xs italic text-red-300">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="w-full px-3">
                            <label class="text-s mb-2 block tracking-wide text-white" for="grid_surname">
                                Cognome<span class="text-red-300">*</span>
                            </label>
                            <input class="@error('surname') border-red-500 @enderror block w-full appearance-none rounded-3xl border bg-white px-4 py-3 leading-tight text-gray-700" id="grid_surname" name="surname" placeholder="Cognome" type="text" value="{{ old('surname') }}">
                            @error('surname')
                                <p class="text-xs italic text-red-300">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="-mx-3 mb-6 flex flex-wrap">
                        <div class="mb-6 w-full px-3">
                            <label class="text-s mb-2 block tracking-wide text-white" for="grid_email">
                                Email
                            </label>
                            <input class="@error('email') border-red-500 @enderror block w-full appearance-none rounded-3xl border bg-white px-4 py-3 leading-tight text-gray-700" id="grid_email" name="email" placeholder="Email" type="text" value="{{ old('email') }}">
                            @error('email')
                                <p class="text-xs italic text-red-300">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-6 w-full px-3">
                            <label class="text-s mb-2 block tracking-wide text-white" for="phone">
                                Telefono<span class="text-red-300">*</span>
                            </label>
                            <input class="block w-full appearance-none rounded-3xl border bg-white px-4 py-3 leading-tight text-gray-700" id="phone" name="phone" type="phone" value="{{ old('phone') }}">

                            @error('phone')
                                <p class="text-xs italic text-red-300">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-6 w-full px-3 relative" id="city_wrapper">
                            <label class="text-s mb-2 block tracking-wide text-white" for="city">
                                Città<span class="text-red-300">*</span>
                            </label>
                            <input type="hidden" name="city_id" id="city_id" value="{{ old('city_id') }}">
                            <input class="block w-full appearance-none rounded-3xl border bg-white px-4 py-3 leading-tight text-gray-700" id="city" name="city" type="text">
                            @error('city_id')
                                <p class="text-xs italic text-red-300">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="-mx-3 mb-6 flex flex-wrap justify-center">
                        <div class="-mx-3 mb-6 flex w-full justify-center px-3">
                            <div class="mt-6 flex w-full justify-center px-3">
                                <button class="bg-secondary block w-4/5 appearance-none rounded-3xl px-4 py-2 leading-tight text-white" type="submit">
                                    INVIA
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @vite(['resources/js/citySearch.js'])
</x-layout>
