<x-layouts.auth title="Login">
    <!-- Login Card -->
    <div
        class="bg-white dark:bg-gray-800 rounded-lg shadow-md border border-gray-200 dark:border-gray-700 overflow-hidden">
        <div class="p-6">
            <div class="text-center mb-6">
                <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">Login</h1>
                <p class="text-gray-600 dark:text-gray-400 mt-1">Entre na sua conta</p>
            </div>

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <!-- Email Input -->
                <div class="mb-4">
                    <x-forms.input label="E-mail" name="email" type="email" placeholder="seu@email.com" />
                </div>

                <!-- Password Input -->
                <div class="mb-4">
                    <x-forms.input label="Senha" name="password" type="password" placeholder="••••••••" />
                    @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}"
                        class="text-xs text-blue-600 dark:text-blue-400 hover:underline">Esqueceu a senha?</a>
                    @endif
                </div>

                <!-- Remember Me -->
                <div class="mb-6">
                    <x-forms.checkbox label="Lembrar de mim" name="remember" />
                </div>

                <!-- Login Button -->
                <x-button type="primary" class="w-full">Entrar</x-button>
            </form>

            @if (Route::has('register'))
            <!-- Register Link -->
            <div class="text-center mt-6">
                <p class="text-sm text-gray-600 dark:text-gray-400">
                    Não tem uma conta?
                    <a href="{{ route('register') }}"
                        class="text-blue-600 dark:text-blue-400 hover:underline font-medium">Cadastre-se</a>
                </p>
            </div>
            @endif
        </div>
    </div>
</x-layouts.auth>