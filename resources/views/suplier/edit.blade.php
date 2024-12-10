  @extends('layouts.app')


  @section('content')
  <!-- component -->


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
    
    <form action="{{ route('suplier.update', $supplier->id_supplier) }}" method="POST">
      @csrf
      @method('PUT')
      <!-- Form input fields dengan value yang sudah ada untuk ID, Name, Address, dan Phone Number -->
      <button type="submit" class="btn btn-primary">Update Supplier</button>

        <div class="mt-10 col-span-full gap-y-8">
          <label for="id_suplier" class="block text-sm/6 font-medium text-gray-900">ID Supplier</label>
          <div class="mt-2">
            <input id="id_suplier" name="id_suplier" type="text" value="{{ old('id_supplier', $supplier->id_supplier) }}" class="block w-full rounded-md border-0 py-1.5 pl-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6" readonly>
          </div>
        </div>


        <div class="mt-5 col-span-full gap-y-8">
          <label for="nama_supplier" class="block text-sm/6 font-medium text-gray-900">Name</label>
          <div class="mt-2">
            <input id="nama_supplier" name="nama_supplier" type="text" value="{{ old('nama_supplier', $supplier->nama_supplier) }}" class="block w-full rounded-md border-0 py-1.5 pl-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
          </div>
        </div>


        <div class="mt-5 col-span-full gap-y-8">
          <label for="alamat_supplier" class="block text-sm/6 font-medium text-gray-900">Address</label>
          <div class="mt-2">
            <textarea id="alamat_supplier" name="alamat_supplier" rows="3" class="block w-full rounded-md border-0 py-1.5 pl-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">{{ old('alamat_supplier', $supplier->alamat_supplier) }}</textarea>
          </div>
        </div>
        <div class="mt-5 col-span-full gap-y-8">
          <label for="telepon_supplier" class="block text-sm/6 font-medium text-gray-900">Phone Number</label>
          <div class="mt-2">
            <input id="telepon_suplier" name="telepon_supplier" type="text" value="{{ old('telepon_supplier', $supplier->telepon_supplier) }}" class="block w-full rounded-md border-0 py-1.5 pl-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
          </div>
        </div>
      </div>


      <div class="mt-6 flex items-center justify-end gap-x-6">
        <div class="mt-6 flex items-center justify-end gap-x-6">
          <a href="{{ route('suplier.index') }}" class="text-sm font-semibold text-gray-900">Cancel</a>
        <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update</button>
      </div>
    </form>
  </div>
  </div>
  @endsection