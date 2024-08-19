@extends('layouts.layout-main')
@section('content')
    <div class="container max-w-screen-xs">
        <div class="w-full rounded-lg border border-gray-200 bg-white p-4 shadow-md sm:p-6 md:p-8">
            <form action="/registration" method="post" class="space-y-6">
                <h5 class="text-center text-2xl font-medium text-gray-900">Registrasi</h5>
                @csrf
                <div>
                    <label for="namaUser" class="ml-2 mb-2 block text-sm font-medium text-gray-900">Nama</label>
                    <input type="text" name="namaUser" id="namaUser"
                        class="form-input @error('namaUser') form-input-invalid @enderror" value="{{ old('namaUser') }}"
                        placeholder="Nama Lengkap" autofocus autocomplete="off" required>
                    @error('namaUser')
                        <p class="mt-2 text-sm text-red-600"><span class="font-medium">{{ $message }}</span></p>
                    @enderror
                </div>
                <div>
                    <label for="email" class="ml-2 mb-2 block text-sm font-medium text-gray-900">Email</label>
                    <input type="text" name="email" id="email"
                        class="form-input @error('email') form-input-invalid @enderror" value="{{ old('email') }}"
                        placeholder="Nama Lengkap" autocomplete="off" required>
                    @error('email')
                        <p class="mt-2 text-sm text-red-600"><span class="font-medium">{{ $message }}</span></p>
                    @enderror
                </div>
                <div>
                    <label for="password" class="ml-2 mb-2 block text-sm font-medium text-gray-900">Password</label>
                    <input type="password" name="password" id="password" class="form-input" value="{{ old('password') }}"
                        placeholder="Password" autocomplete="off" required>
                    @error('password')
                        <p class="mt-2 text-sm text-red-600"><span class="font-medium">{{ $message }}</span></p>
                    @enderror
                </div>
                <div>
                    <label for="noHp" class="ml-2 mb-2 block text-sm font-medium text-gray-900">Nomor HP</label>
                    <input type="tel" name="noHp" id="noHp"
                        class="form-input @error('noHp') form-input-invalid @enderror" value="{{ old('noHp') }}"
                        placeholder="Nomor HP" autocomplete="off" required>
                    @error('noHp')
                        <p class="mt-2 text-sm text-red-600"><span class="font-medium">{{ $message }}</span></p>
                    @enderror
                </div>
                <div>
                    <label for="kabupaten" class="ml-2 mb-2 block text-sm font-medium text-gray-900">Kabupaten</label>
                    <input type="text" name="kabupaten" id="kabupaten"
                        class="form-input @error('kabupaten') form-input-invalid @enderror" value="{{ old('kabupaten') }}"
                        placeholder="Kabupaten" autocomplete="off" required>
                    @error('kabupaten')
                        <p class="mt-2 text-sm text-red-600"><span class="font-medium">{{ $message }}</span></p>
                    @enderror
                </div>
                <div>
                    <label for="kecamatan" class="ml-2 mb-2 block text-sm font-medium text-gray-900">Kecamatan</label>
                    <input type="text" name="kecamatan" id="kecamatan"
                        class="form-input @error('kecamatan') form-input-invalid @enderror" value="{{ old('kecamatan') }}"
                        placeholder="Kecamatan" autocomplete="off" required>
                    @error('kecamatan')
                        <p class="mt-2 text-sm text-red-600"><span class="font-medium">{{ $message }}</span></p>
                    @enderror
                </div>
                <div>
                    <label for="desa" class="ml-2 mb-2 block text-sm font-medium text-gray-900">Desa</label>
                    <input type="text" name="desa" id="desa"
                        class="form-input @error('desa') form-input-invalid @enderror" value="{{ old('desa') }}"
                        placeholder="Desa" autocomplete="off" required>
                    @error('desa')
                        <p class="mt-2 text-sm text-red-600"><span class="font-medium">{{ $message }}</span></p>
                    @enderror
                </div>
                <div>
                    <label for="alamatLengkap"
                        class="ml-2 mb-2 block text-sm font-medium text-gray-900 dark:text-gray-400">Alamat Lengkap</label>
                    <textarea id="alamatLengkap" name="alamatLengkap" rows="4"
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                        placeholder="Alamat Lengkap" required>{{ old('alamatLengkap') }}</textarea>
                </div>
                <button type="submit"
                    class="w-full rounded-lg bg-red-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300">
                    Registrasi
                </button>
                <div class="flex justify-center">
                    <div class="m-3">Sudah punya akun?
                        <a href="/login" class="text-blue-600 hover:text-blue-700">Login</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
