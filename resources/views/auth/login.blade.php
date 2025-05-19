<x-guest-layout>
    <!-- Session Status -->
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <x-auth-session-status class="mb-4" :status="session('status')" />
{{-- 
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form> --}}
    <form method="POST" action="{{ route('login') }}">
        @csrf
       
        <div class="mb-3">
          <label for="email" :value="__('Email')"  class="form-label">Email address</label>
          <input  class="form-control" id="email"  type="email" name="email" :value="old('email')" required autofocus autocomplete="username" aria-describedby="emailHelp">
          <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>

        <div class="mb-3">
          <label for="password" :value="__('Password')" class="form-label">Password</label>
          <input class="form-control" id="password" 
          type="password"
          name="password"
          required autocomplete="current-password">
        </div>
        
        <div class="mb-3 form-check">
          <input id="remember_me" type="checkbox" name="remember"class="form-check-input" id="exampleCheck1">
          <label class="form-check-label" for="remember_me">Ingat saya</label>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
      </form>
    </div>
</x-guest-layout>
