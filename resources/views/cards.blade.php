<x-layout>
    <section class="p-5 bg-indigo-500">
        <h1 class="text-lg font-semibold text-center mb-5 text-white">Kartu Saya</h1>
        <hr class="mb-5 text-white">
        <a href="/tambah-kartu" class="mt-5 text-blue-50 font-semibold">Tambah Kartu</a>
    </section>
    <section class="p-5 flex flex-col gap-4">
        @foreach ($cards as $item)     
            <div class="bg-white flex items-center gap-4 text-black border-t-2 border-gray-200 rounded-md p-2">
                <img src="{{ asset('/assets/icons/wallet-dark.svg') }}" alt="" class="w-6">
                <div class="flex flex-col">
                    <h1 class="text-lg font-semibold">{{$item->nama}}</h1>
                    <span class="text-gray-400 text-sm">
                        {{ str_repeat('*', strlen($item->nomor) - 5) . substr($item->nomor, -5) }}
                    </span>
                    
                    <p class="font-semibold">IDR {{ number_format($item->saldo, 0, ',', '.') }}</p>
                </div>
                <a href="/kartu/{{ strtolower($item->nama) }}" class="ml-auto">
                    <img src="{{ asset('assets/icons/rarrow.svg') }}" alt="" class="w-6">
                </a>
            </div>
            @endforeach
    </section>
</x-layout>