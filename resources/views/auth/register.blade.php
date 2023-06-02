<x-authentication-layout>
    <h1 class="text-3xl text-slate-800 font-bold mt-20 mb-6">{{ __('Buat Akun Kamu!') }}</h1>
    <!-- Form -->
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="space-y-4">
            <div>
                <x-jet-label for="email">{{ __('Email') }} </x-jet-label>
                <x-jet-input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="email" />
            </div>

            <div>
                <x-jet-label for="name">{{ __('Nama') }} </x-jet-label>
                <x-jet-input id="name" type="text" name="name" :value="old('name')" required />
            </div>

            <div class=' mb-4 flex flex-col'>
                <x-jet-label htmlFor='role' class='ml-1'>Sebagai</x-jet-label>
                <select name="role" id="role">
                    <option value="mitra">Mitra</option>
                    <option value="customer">Customer</option>
                </select>
            </div>

            <div>
                <x-jet-label for="alamat">{{ __('Alamat') }} </x-jet-label>
                <x-jet-input id="alamat" type="text" name="alamat" :value="old('alamat')" required />
            </div>

            <div>
                <x-jet-label for="password" value="{{ __('Kata Sandi') }}" />
                <x-jet-input id="password" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div>
                <x-jet-label for="password_confirmation" value="{{ __('Konfirmasi Kata Sandi') }}" />
                <x-jet-input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>
        </div>
        <div class="flex items-center justify-end mt-6">
            <x-jet-button>
                {{ __('Daftar') }}
            </x-jet-button>                
        </div>
            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-6">
                    <label class="flex items-start">
                        <input type="checkbox" class="form-checkbox mt-1" name="terms" id="terms" />
                        <span class="text-sm ml-2">
                            {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="text-sm underline hover:no-underline">'.__('Terms of Service').'</a>',
                                'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="text-sm underline hover:no-underline">'.__('Privacy Policy').'</a>',
                            ]) !!}                        
                        </span>
                    </label>
                </div>
            @endif        
    </form>
    <x-jet-validation-errors class="mt-4" />  
    <!-- Footer -->
    <div class="pt-5 mt-6 border-t border-slate-200">
        <div class="text-sm">
            {{ __('Sudah Punya Akun?') }} <a class="font-medium text-indigo-500 hover:text-indigo-600" href="{{ route('login') }}">{{ __('Masuk') }}</a>
        </div>
    </div>
</x-authentication-layout>
