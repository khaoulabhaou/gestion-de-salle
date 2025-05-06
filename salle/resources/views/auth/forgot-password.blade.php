<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Votre mot de passe oublié? Aucun problème. Faites-nous savoir votre adresse e-mail et nous vous enverrons un lien de réinitialisation de mot de passe qui vous permettra d\'en choisir un nouveau.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <button style="background-color: #ed563b; color: white; margin-left: 1rem; padding: 0.5rem 1rem; font-size: 0.875rem; font-weight: 600; text-transform: uppercase; border-radius: 0.375rem; letter-spacing: 0.05em; border: none; transition: background-color 0.15s ease-in-out, transform 0.15s ease-in-out;" onmouseover="this.style.backgroundColor='#d04a2a'" onmouseout="this.style.backgroundColor='#ed563b'" onclick="this.style.transform='scale(0.98)'" onmouseup="this.style.transform='scale(1)'" onmousedown="this.style.transform='scale(0.98)'">
                {{ __('Lien de réinitialisation') }}
            </button>
        </div>
    </form>
</x-guest-layout>
