<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Girişi — Astem Otomasyon</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-gray-100 flex items-center justify-center">

    <div class="w-full max-w-sm">

        <div class="text-center mb-6">
            <p class="mt-2 text-sm font-semibold text-gray-700 uppercase tracking-widest">Yönetim Paneli</p>
        </div>

        <div class="bg-white rounded-xl shadow-md p-8">

            @if($errors->has('credentials'))
                <div class="flex items-center gap-2 bg-red-50 border border-red-300 text-red-700 text-sm px-4 py-3 rounded-lg mb-5">
                    <svg class="h-4 w-4 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                    </svg>
                    {{ $errors->first('credentials') }}
                </div>
            @endif

            <form method="POST" action="{{ route('admin.login.post') }}" autocomplete="off">
                @csrf

                <div class="mb-4">
                    <label for="username" class="block text-sm font-medium text-gray-700 mb-1">
                        Kullanıcı Adı
                    </label>
                    <input
                        id="username"
                        type="text"
                        name="username"
                        value="{{ old('username') }}"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('username') border-red-400 @enderror"
                        required
                        autofocus
                        autocomplete="username"
                    >
                </div>

                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">
                        Şifre
                    </label>
                    <input
                        id="password"
                        type="password"
                        name="password"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        required
                        autocomplete="current-password"
                    >
                </div>

                <button
                    type="submit"
                    class="w-full bg-[#1e3a5f] hover:bg-[#162d4a] text-white font-semibold py-2.5 rounded-lg transition-colors text-sm"
                >
                    Giriş Yap
                </button>
            </form>
        </div>

        <p class="text-center text-xs text-gray-400 mt-6">
            © {{ date('Y') }} Astem Otomasyon
        </p>
    </div>

</body>
</html>
