@extends('layouts.app')

@section('content')
@if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="max-w-[720px] mx-auto py-32 sm:py-8 lg:py-16">
    <div class="relative flex flex-col w-full h-full overflow-scroll text-gray-700 bg-white shadow-md rounded-lg bg-clip-border px-6 py-6">
        {{-- Form --}}
        <form action="{{ route('barang_masuk.update', $barangMasuk->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- Gunakan metode PUT untuk update -->

            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base font-semibold text-gray-900">Edit Barang</h2>
                <p class="mt-1 text-sm text-gray-600">Silakan ubah informasi barang di bawah ini.</p>

                <div class="mt-10">
                    <label for="id_barang" class="block text-sm font-medium text-gray-900">ID Barang</label>
                    <div class="mt-2">
                        <input id="id_barang" name="id_barang" type="number" value="{{ old('id_barang', $barangMasuk->id_barang) }}" required class="block w-full rounded-md border-0 py-1.5 pl-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-indigo-600 sm:text-sm" readonly>
                    </div>
                </div>

                <div class="mt-10">
                    <label for="nama_barang" class="block text-sm font-medium text-gray-900">Nama Barang</label>
                    <div class="mt-2">
                        <input id="nama_barang" name="nama_barang" type="text" value="{{ old('nama_barang', $barangMasuk->nama_barang) }}" required class="block w-full rounded-md border-0 py-1.5 pl-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-indigo-600 sm:text-sm">
                    </div>
                </div>

                <div class="mt-5">
                    <label for="tgl_masuk" class="block text-sm font-medium text-gray-900">Tanggal Masuk</label>
                    <div class="mt-2">
                        <input id="tgl_masuk" name="tgl_masuk" type="date" value="{{ old('tgl_masuk', $barangMasuk->tgl_masuk) }}" required class="block w-full rounded-md border-0 py-1.5 pl-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-indigo-600 sm:text-sm">
                    </div>
                </div>

                <div class="mt-5">
                    <label for="jml_masuk" class="block text-sm font-medium text-gray-900">Jumlah</label>
                    <div class="mt-2">
                        <input id="jml_masuk" name="jml_masuk" type="number" value="{{ old('jml_masuk', $barangMasuk->jml_masuk) }}" required class="block w-full rounded-md border-0 py-1.5 pl-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-indigo-600 sm:text-sm">
                    </div>
                </div>

                <div class="mt-10">
                    <label for="id_supplier" class="block text-sm font-medium text-gray-900">ID Supplier</label>
                    <div class="mt-2">
                        <input id="id_supplier" name="id_supplier" type="number" value="{{ old('id_supplier', $barangMasuk->id_supplier) }}" required class="block w-full rounded-md border-0 py-1.5 pl-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-indigo-600 sm:text-sm">
                    </div>
                </div>
            </div>

            <div class="mt-6 flex items-center justify-end gap-x-6">
                <a href="{{ route('barang_masuk.index') }}" class="text-sm font-semibold text-gray-900">Cancel</a>
                <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus:ring-2 focus:ring-indigo-600">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection
