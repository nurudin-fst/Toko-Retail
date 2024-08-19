@extends('admin.layouts.template')
@section('content')
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <div class="m-5">
            <table class="w-full rounded-lg bg-[#bb1724] text-left text-sm text-white" id="table-datatables">
                <thead class="bg-[#bb1724] text-center text-xs uppercase text-white dark:bg-gray-700">
                    <tr>
                        <th scope="col" class="py-2 px-6">
                            #
                        </th>
                        <th scope="col" class="py-2 px-6">
                            Username
                        </th>
                        <th scope="col" class="py-2 px-6">
                            Email
                        </th>
                        <th scope="col" class="py-2 px-6">
                            Level
                        </th>
                        <th scope="col" class="py-2 px-6">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $key => $user)
                        <tr class="border-b bg-white text-center text-black hover:bg-gray-50">
                            <th class="m-auto w-auto border text-center">
                                {{ $key + 1 }}
                            </th>
                            <td>
                                {{ $user->namaUser }}
                            </td>
                            <td>
                                {{ $user->email }}
                            </td>
                            <td>
                                @if ($user->level == 'admin')
                                    <span class="rounded-lg bg-blue-600 p-1 text-white">{{ $user->level }}</span>
                                @elseif ($user->level == 'kasir')
                                    <span class="rounded-lg bg-yellow-400 p-1 text-black">{{ $user->level }}</span>
                                @else
                                    <span class="rounded-lg bg-green-500 p-1 text-white">{{ $user->level }}</span>
                                @endif
                            </td>
                            <td class="md:px-auto flex items-center py-2 px-1 text-center">
                                @if ($user->level == 'Customer')
                                    <form action="{{ route('user.destroy', [$user->kdUser]) }}" method="post"
                                        class="mx-auto text-right">
                                        @csrf
                                        @method('delete')
                                        <button onclick="return confirm('Yakin dihapus?')"
                                            class="rounded-lg bg-red-600 p-2 text-sm text-white hover:bg-red-700">
                                            Hapus</button>
                                    </form>
                                @else
                                    <button
                                        class="mx-auto rounded-lg bg-yellow-300 p-2 text-sm font-bold text-black hover:bg-yellow-400"
                                        type="button" data-modal-toggle="edit{{ $user->kdUser }}">
                                        Edit
                                    </button>
                                    <form action="{{ route('user.destroy', [$user->kdUser]) }}" method="post"
                                        class="mx-auto justify-center">
                                        @csrf
                                        @method('delete')
                                        <button onclick="return confirm('Yakin dihapus?')"
                                            class="rounded-lg bg-red-600 p-2 text-sm text-white hover:bg-red-700">
                                            Hapus</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- modal untuk tambah --}}
    <div id="tambah" tabindex="-1" aria-hidden="true"
        class="fixed top-0 right-0 left-0 z-50 hidden h-modal w-full items-center justify-center overflow-y-auto overflow-x-hidden md:inset-0 md:h-full">
        <div class="relative h-full w-full max-w-2xl p-4 md:h-auto">
            <!-- Modal content -->
            <div class="relative rounded-lg bg-white shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-start justify-between rounded-t border-b p-4 dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Tambah Akun
                    </h3>
                    <button type="button"
                        class="ml-auto inline-flex items-center rounded-lg bg-transparent p-1.5 text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="tambah">
                        <svg aria-hidden="true" class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="space-y-6 p-6">
                    <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                    <form action="{{ route('user.store') }}" method="post">
                        @csrf
                        <div>
                            <label for="name">Nama Akun</label>
                            <input type="text" name="namaUser" class="w-full rounded-lg border" id="namaUser"
                                placeholder="Nama Akun" required>
                        </div>
                        <div>
                            <label for="email">Email</label>
                            <input type="email" name="email" class="w-full rounded-lg border" id="email"
                                placeholder="smegamart@smega.sch.id" required>
                        </div>
                        <div>
                            <label for="password">Password</label>
                            <input type="password" name="password" class="w-full rounded-lg border" id="password"
                                placeholder="password" required>
                        </div>
                        <div>
                            <label for="level">Level</label>
                            <select name="level" id="level" class="w-full rounded-lg border">
                                <option value="">Pilih Level Akun</option>
                                <option value="Admin">Admin</option>
                                <option value="Kasir">Kasir</option>
                            </select>
                        </div>
                        </p>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center space-x-2 rounded-b border-t border-gray-200 p-6 dark:border-gray-600">
                    <button data-modal-toggle="tambah" type="submit"
                        class="rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
                    <button data-modal-toggle="tambah" type="button"
                        class="rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-sm font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-900 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:border-gray-500 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-600">Batal</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- modal untuk edit --}}
    @foreach ($users as $user)
        <div id="edit{{ $user->kdUser }}" tabindex="-1" aria-hidden="true"
            class="fixed top-0 right-0 left-0 z-50 hidden h-modal w-full items-center justify-center overflow-y-auto overflow-x-hidden md:inset-0 md:h-full">
            <div class="relative h-full w-full max-w-2xl p-4 md:h-auto">
                <!-- Modal content -->
                <div class="relative rounded-lg bg-white shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-start justify-between rounded-t border-b p-4 dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Edit Suplier
                        </h3>
                        <button type="button"
                            class="ml-auto inline-flex items-center rounded-lg bg-transparent p-1.5 text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-toggle="edit{{ $user->kdUser }}">
                            <svg aria-hidden="true" class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="space-y-6 p-6">
                        <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                        <form action="{{ route('user.update', [$user->kdUser]) }}" method="post">
                            @csrf
                            @method('put')
                            <div>
                                <label for="name">Nama Akun</label>
                                <input type="text" name="namaUser" class="w-full rounded-lg border" id="namaUser"
                                    placeholder="Nama Akun" value="{{ $user->namaUser }}" required>
                            </div>
                            <div>
                                <label for="email">Email</label>
                                <input type="email" name="email" class="w-full rounded-lg border" id="email"
                                    placeholder="smegamart@smega.sch.id" value="{{ $user->email }}" required>
                            </div>
                            <div>
                                <label for="password">Password baru</label>
                                <input type="password" name="password" class="w-full rounded-lg border" id="password"
                                    placeholder="password" required>
                            </div>
                            <div>
                                <label for="level">Level</label>
                                <select name="level" id="level" class="w-full rounded-lg border">
                                    <option value="">Pilih Level Akun</option>
                                    <option value="Admin" @if ($user->level == 'Admin') {{ 'selected' }} @endif>
                                        Admin</option>
                                    <option value="Kasir" @if ($user->level == 'Kasir') {{ 'selected' }} @endif>
                                        Kasir</option>
                                </select>
                            </div>
                            </p>
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center space-x-2 rounded-b border-t border-gray-200 p-6 dark:border-gray-600">
                        <button type="submit"
                            class="rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
                        <button data-modal-toggle="edit{{ $user->kdUser }}" type="button"
                            class="rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-sm font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-900 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:border-gray-500 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-600">Batal</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
