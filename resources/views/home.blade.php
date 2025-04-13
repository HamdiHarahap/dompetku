<x-layout>
    <section class="bg-indigo-500 text-white pt-16 pb-20 px-5 relative">
        <div class="flex justify-between">
            <div>
                <h1 class="text-lg font-semibold">Hamdi Harahap</h1>
                <h1 class="text-2xl font-semibold">IDR {{ number_format($saldo, 0, ',', '.') }}</h1>
            </div>
            <div class="relative">
                <img src="{{ asset('/assets/icons/bell.svg') }}" alt="" class="w-6">
                <div class="w-2 h-2 bg-red-500 rounded-full absolute top-0 right-0"></div>
            </div>
        </div>
        <div class="bg-white text-black px-5 rounded-md py-2 absolute left-5 right-5 -bottom-7">
            <h1 class="text-lg font-semibold">Tabunganku</h1>
            <div class="flex justify-between">
                <span class="font-medium">IDR {{ number_format($tabungan, 0, ',', '.')}}</span>
                <a href="">
                    <button class="bg-green-400 rounded-md text-white p-1">Tambah</button>
                </a>
            </div>
        </div>
    </section>
    <section class="px-5 py-5 mt-7">
        <div class="bg-white rounded-md py-5 px-4 shadow-md">
            <h1 class="text-black font-semibold mb-2 text-lg">Kartu Sering Digunakan</h1>

            @foreach ($cards as $item)     
            <div class="flex items-center gap-4 text-black border-t-2 border-gray-200 rounded-md p-2">
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
        </div>
    </section>
    <section class="bg-white min-h-52 px-5 py-2 pb-20">
        <h1 class="text-lg font-semibold my-3">Transaksi Terbaru</h1>
        <div class="flex flex-col gap-4">
            @foreach ($transaksi as $item)
            <div class="bg-gray-200 p-2 rounded-md flex justify-between items-center shadow-lg">
                <div>
                    <h1 class="font-semibold">{{$item->keperluan}}</h1>
                    <p class="text-sm font-bold">{{$item->card->nama}}</p>
                </div>
                <div class="text-right">
                    @php
                        $jumlah = $item->kategori == 'pengeluaran'
                            ? '- IDR ' . number_format($item->jumlah, 0, ',', '.')
                            : '+ IDR ' . number_format($item->jumlah, 0, ',', '.');
                    @endphp
                
                    <span class="text-sm text-blue-500">
                        {{ $jumlah }}
                    </span>
                    <p class="font-semibold">{{ $item->created_at->format('j M H:i') }}</p>
                </div>                
            </div>
            @endforeach
        </div>
    </section>
</x-layout>
