<x-layout>
    <style>
        .lines {
            content: '';
            width: 100%;
            height: 1px;
            background: white
        }
    </style>
    <div class="mx-6 mt-6 grid grid-rows-1 place-items-center">
        <h1 class="my-6 text-center text-5xl font-semibold tracking-wider text-white">Più amici inviti,<br>più guadagni!</h1>
    </div>
    <div class="grid w-full place-items-center px-6 py-6 sm:px-0">
        <div class="grid w-full rounded-2xl ring ring-white ring-offset-1 sm:w-1/3">
            <form action="{{ route('login') }}" class="m-1 grid place-items-center rounded-2xl bg-primary p-2 sm:p-5" method="POST">
                @if (session('status'))
                    <div class="mb-4 text-sm font-medium text-green-600">
                        {{ session('status') }}
                    </div>
                @endif
                @csrf
                <h1 class="mx-auto mb-2 text-3xl font-semibold tracking-wider text-white">Accedi</h1>
                <div class="-mx-3 mb-6 flex w-full justify-center px-3">
                    <div class="w-full px-3 sm:w-4/5">
                        <label class="text-s mb-2 block tracking-wide text-white" for="phone">
                            Telefono
                        </label>
                        <input type="phone" class="block w-full appearance-none rounded-3xl border bg-white px-4 py-3 leading-tight text-gray-700" id="phone" name="phone" value="{{ old('phone') }}">

                        @error('phone')
                            <p class="text-xs italic text-red-300">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="-mx-3 mb-6 flex w-full justify-center px-3">
                    <div class="w-full px-3 sm:w-4/5">
                        <label class="text-s mb-2 block tracking-wide text-white" for="grid-password">
                            Password
                        </label>
                        <input class="@error('password') border-red-500 @enderror block w-full appearance-none rounded-3xl border bg-white px-4 py-3 leading-tight text-gray-700" id="grid-password" name="password" placeholder="******************" type="password">
                        @error('password')
                            <p class="text-xs italic text-red-300">Password errata</p>
                        @enderror
                    </div>
                </div>
                <div class="-mx-3 mb-6 flex w-full justify-center px-3">
                    <div class="flex w-full justify-center px-3">
                        <button class="mt-5 block w-4/5 appearance-none rounded-3xl bg-secondary px-4 py-2 leading-tight text-white" type="submit">
                            INVIA
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="flex flex-col">
            <div class="mt-4 mb-2 flex items-center text-white justify-center">
                <div class="flex items-center justify-center rounded-full border-2 border-white">
                    <input class="m-1 h-4 w-4" name="remember" style="clip-path: circle(40%);" type="checkbox">
                </div>
                <span class="ms-2 text-2xl">Ricordami</span>
            </div>
            <div class="-mx-10 flex items-center justify-center text-white">
                <div class="lines"></div>
                <div class="mx-2"> o </div>
                <div class="lines"></div>
            </div>
            <p class="ms-2 text-center text-lg text-white" for="grid-password">
                <a class="text-yellow-300 underline" href="{{ route('password.request') }}">Password dimenticata?</a>
            </p>
        </div>
    </div>
    {{-- <x-footer /> --}}
</x-layout>
