<x-layout>
    <section class="p-5 bg-indigo-500">
        <h1 class="text-xl font-semibold text-center mb-5 text-white">{{$card->nama}}</h1>
        <hr class="text-white mb-5">
        <span class="text-white text-lg">{{$card->nomor}}</span>
        <p class="font-semibold text-white text-lg">IDR {{ number_format($card->saldo, 0, ',', '.') }}</p>
    </section>

    <section class="px-5 py-2 pb-20">
        <h1 class="text-lg font-semibold my-3">Transaksi </h1>
        <div class="flex flex-col gap-4">
            @foreach ($transaksi as $item)
            <div class="bg-white p-2 rounded-md flex justify-between items-center shadow-lg">
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