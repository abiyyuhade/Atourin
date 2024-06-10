<section>
    <header>
        <h4 class="card-title mb-3 text-lg font-medium text-gray-900">
            {{ __('Perbarui Kata Sandi') }}
        </h4>
        <p class="mt-1 text-sm text-gray-600">
            {{ __('Pastikan akun Anda menggunakan kata sandi yang panjang dan acak agar tetap aman.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div class="mb-3">
            <label for="update_password_current_password" class="form-label">{{ __('Kata sandi saat ini') }}</label>
            <input id="update_password_current_password" name="current_password" type="password" class="form-control mt-1 block w-full" autocomplete="current-password">
            @error('current_password')
                <span class="text-danger mt-2">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="update_password_password" class="form-label">{{ __('Kata sandi baru') }}</label>
            <input id="update_password_password" name="password" type="password" class="form-control mt-1 block w-full" autocomplete="new-password">
            @error('password')
                <span class="text-danger mt-2">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="update_password_password_confirmation" class="form-label">{{ __('Konfirmasi kata sandi') }}</label>
            <input id="update_password_password_confirmation" name="password_confirmation" type="password" class="form-control mt-1 block w-full" autocomplete="new-password">
            @error('password_confirmation')
                <span class="text-danger mt-2">{{ $message }}</span>
            @enderror
        </div>

        <div class="d-flex justify-content-end gap-4">
            <button type="submit" class="btn btn-primary">{{ __('Simpan') }}</button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
