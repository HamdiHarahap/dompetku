<x-layout>
    <section class="bg-indigo-500 p-5">
        <h1 class="text-lg font-semibold text-center mb-5 text-white">Tambah Transaksi</h1>
        <form action="{{ route('tambah-transaksi')}}" method="POST">
            @csrf
            <div class="flex flex-col space-y-2 mb-3">
                <div class="flex space-x-2 justify-center">
                    <input type="radio" id="pengeluaran" name="tipe_transaksi" value="pengeluaran" class="hidden peer/pengeluaran" checked>
                    <label for="pengeluaran" class="px-10 py-2 border-2 border-gray-300 rounded-md cursor-pointer text-white font-semibold peer-checked/pengeluaran:bg-gray-200 peer-checked/pengeluaran:text-black peer-checked/pengeluaran:border-gray-200">
                        Pengeluaran
                    </label>

                    <input type="radio" id="pemasukan" name="tipe_transaksi" value="pemasukan" class="hidden peer/pemasukan">
                    <label for="pemasukan" class="px-10 py-2 border-2 border-gray-300 rounded-md cursor-pointer text-white font-semibold peer-checked/pemasukan:bg-gray-200 peer-checked/pemasukan:text-black peer-checked/pemasukan:border-gray-200">
                        Pemasukan
                    </label>
                </div>
            </div>
            <select name="card_id" id="" class="px-3 py-2 rounded-md w-full bg-gray-200 outline-none font-semibold">
                <option value="" class="text-sm font-semibold">Pilih Kartu</option>
                @foreach ($cards as $item)
                    <option value="{{$item->id}}" class="text-sm font-semibold">{{$item->nama}}</option>
                @endforeach
            </select>
    </section>
        <section class="p-5">
            <div class="bg-white p-3 rounded-md flex flex-col gap-2">
                <div class="flex flex-col gap-1">
                    <label for="keperluan" class="font-semibold">Keperluan</label>
                    <input id="keperluan" name="keperluan" type="text" class="w-full border border-black rounded-md px-3 py-2">
                </div>
                <div class="flex flex-col gap-1">
                    <label for="nominal" class="font-semibold">Nominal</label>
                    <input id="nominal" name="nominal" type="number" class="w-full border border-black rounded-md px-3 py-2">
                </div>
            </div>
            <button type="submit" class="bg-indigo-500 text-white w-full py-3 rounded-md font-semibold mt-5">SUBMIT</button>
        </section>
        </form>
</x-layout>