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
        <form action="{{ route('pinjam_barang.store') }}" method="POST">
            @csrf
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base font-semibold text-gray-900">Add Pinjam Barang</h2>
                <p class="mt-1 text-sm text-gray-600">Please fill out the information below.</p>

                <!-- Form Input Fields -->

                <div class="mt-5">
                    <label for="id_pinjam" class="block text-sm font-medium text-gray-900">Id Pinjam</label>
                    <input id="id_pinjam" name="id_pinjam" type="number" value="{{ old('peminjam') }}" required
                        class="block w-full rounded-md border-gray-300 py-1.5 px-3 text-gray-900 shadow-sm focus:ring-indigo-600 focus:border-indigo-600 sm:text-sm">
                </div>
                
                <div class="mt-5">
                    <label for="peminjam" class="block text-sm font-medium text-gray-900">Peminjam</label>
                    <input id="peminjam" name="peminjam" type="text" value="{{ old('peminjam') }}" required
                        class="block w-full rounded-md border-gray-300 py-1.5 px-3 text-gray-900 shadow-sm focus:ring-indigo-600 focus:border-indigo-600 sm:text-sm">
                </div>

                <div class="mt-5">
                    <label for="tgl_pinjam" class="block text-sm font-medium text-gray-900">Tanggal Pinjam</label>
                    <input id="tgl_pinjam" name="tgl_pinjam" type="date" value="{{ old('tgl_pinjam') }}" required
                        class="block w-full rounded-md border-gray-300 py-1.5 px-3 text-gray-900 shadow-sm focus:ring-indigo-600 focus:border-indigo-600 sm:text-sm">
                </div>

                <div class="mt-5">
                    <label for="id_barang" class="block text-sm font-medium text-gray-900">ID Barang</label>
                    <input id="id_barang" name="id_barang" type="text" value="{{ old('id_barang') }}" required
                        class="block w-full rounded-md border-gray-300 py-1.5 px-3 text-gray-900 shadow-sm focus:ring-indigo-600 focus:border-indigo-600 sm:text-sm">
                </div>

                <div class="mt-5">
                    <label for="nama_barang" class="block text-sm font-medium text-gray-900">Nama Barang</label>
                    <input id="nama_barang" name="nama_barang" type="text" value="{{ old('nama_barang') }}" required
                        class="block w-full rounded-md border-gray-300 py-1.5 px-3 text-gray-900 shadow-sm focus:ring-indigo-600 focus:border-indigo-600 sm:text-sm">
                </div>

                <div class="mt-5">
                    <label for="jml_barang" class="block text-sm font-medium text-gray-900">Jumlah Barang</label>
                    <input id="jml_barang" name="jml_barang" type="number" value="{{ old('jml_barang') }}" required
                        class="block w-full rounded-md border-gray-300 py-1.5 px-3 text-gray-900 shadow-sm focus:ring-indigo-600 focus:border-indigo-600 sm:text-sm">
                </div>

                <div class="mt-5">
                    <label for="tgl_kembali" class="block text-sm font-medium text-gray-900">Tanggal Kembali</label>
                    <input id="tgl_kembali" name="tgl_kembali" type="date" value="{{ old('tgl_kembali') }}" required
                        class="block w-full rounded-md border-gray-300 py-1.5 px-3 text-gray-900 shadow-sm focus:ring-indigo-600 focus:border-indigo-600 sm:text-sm">
                </div>

                <div class="mt-5">
                    <label for="kondisi" class="block text-sm font-medium text-gray-900">Kondisi</label>
                    <textarea id="kondisi" name="kondisi" rows="3" required
                        class="block w-full rounded-md border-gray-300 py-1.5 px-3 text-gray-900 shadow-sm focus:ring-indigo-600 focus:border-indigo-600 sm:text-sm">{{ old('kondisi') }}</textarea>
                </div>
            </div>

            <div class="mt-6 flex items-center justify-end gap-x-6">
                <a href="{{ route('pinjam_barang.index') }}" class="text-sm font-semibold text-gray-900">Cancel</a>
                <button type="submit"
                    class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Save
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
