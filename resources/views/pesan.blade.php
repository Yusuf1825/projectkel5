<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pesan Tiket | Antarkota</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gradient-to-br from-blue-50 to-white min-h-screen font-sans">

    <div class="max-w-3xl mx-auto py-12 px-6">
        <h1 class="text-4xl font-bold text-blue-700 text-center mb-10">Form Pemesanan Tiket</h1>

        <form action="{{ route('pesan.store') }}" method="POST" class="bg-white p-8 rounded-2xl shadow-xl space-y-6">
            @csrf

            {{-- Hidden jadwal_id --}}
            <input type="hidden" name="jadwal_id" value="{{ $jadwal->id ?? '' }}">

            {{-- Nama Penumpang --}}
            <div>
                <label for="nama" class="block text-sm font-semibold text-gray-700 mb-2">Nama Pemesan</label>
                <input type="text" name="nama" id="nama" required
                    value="{{ old('nama') ?? (auth()->user()->name ?? '') }}"
                    class="w-full rounded-xl border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                {{-- Kota Asal --}}
                <div>
                    <label for="asal" class="block text-sm font-semibold text-gray-700 mb-2">Kota Asal</label>
                    <select id="asal" name="asal" required
                        class="w-full rounded-xl border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        <option value="">Pilih Kota Asal</option>
                        <option value="Bandung" {{ (old('asal') ?? $jadwal?->asal) === 'Bandung' ? 'selected' : '' }}>
                            Bandung</option>
                        <option value="Purwakarta"
                            {{ (old('asal') ?? $jadwal?->asal) === 'Purwakarta' ? 'selected' : '' }}>
                            Purwakarta</option>
                        <option value="Jakarta" {{ (old('asal') ?? $jadwal?->asal) === 'Jakarta' ? 'selected' : '' }}>
                            Jakarta</option>
                    </select>
                </div>

                {{-- Kota Tujuan --}}
                <div>
                    <label for="rute" class="block text-sm font-semibold text-gray-700 mb-2">Rute</label>

                    @if ($jadwal)
                        {{-- Jika datang dari halaman detail --}}
                        <input type="text" class="w-full rounded-xl border-gray-300 shadow-sm bg-gray-100"
                            value="{{ $jadwal->rute }}" disabled>
                    @else
                        {{-- Jika tidak dari detail, pilih dari list --}}
                        <select name="tujuan" id="rute" required onchange="setJadwalId(this)"
                            class="w-full rounded-xl border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                            <option value="">Pilih Rute</option>
                            @foreach ($jadwals as $j)
                                <option value="{{ $j->rute }}" data-id="{{ $j->id }}">{{ $j->rute }}
                                </option>
                            @endforeach
                        </select>
                    @endif
                </div>

                @if ($jadwal)
                    {{-- Jika datang dari halaman detail --}}
                    <input type="hidden" name="jadwal_id" id="jadwal_id" value="{{ $jadwal->id }}">
                @else
                    {{-- Jika datang dari form biasa --}}
                    <input type="hidden" name="jadwal_id" id="jadwal_id">
                @endif


                {{-- Tanggal Keberangkatan --}}
                <div>
                    <label for="tanggal" class="block text-sm font-semibold text-gray-700 mb-2">Tanggal
                        Keberangkatan</label>
                    <input type="date" name="tanggal" id="tanggal" required
                        value="{{ old('tanggal') ?? ($jadwal ? \Carbon\Carbon::parse($jadwal->tanggal)->format('Y-m-d') : '') }}"
                        class="w-full rounded-xl border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                {{-- Jumlah Penumpang --}}
                <div>
                    <label for="penumpang" class="block text-sm font-semibold text-gray-700 mb-2">Jumlah
                        Penumpang</label>
                    <input type="number" name="penumpang" id="penumpang" min="1" max="10" value="1"
                        required
                        class="w-full rounded-xl border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>
            </div>

            {{-- Catatan --}}
            <div>
                <label for="catatan" class="block text-sm font-semibold text-gray-700 mb-2">Catatan Tambahan
                    (Opsional)</label>
                <textarea name="catatan" id="catatan" rows="3"
                    class="w-full rounded-xl border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"></textarea>
            </div>

            {{-- Tombol Submit --}}
            <div class="text-center">
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-bold px-6 py-3 rounded-xl shadow-md transition duration-200">
                    🚐 Pesan Sekarang
                </button>
            </div>
        </form>

        <p class="text-sm text-center text-gray-500 mt-6">Anda akan menerima e-ticket setelah konfirmasi pembayaran.</p>
    </div>

    <script>
        function setJadwalId(select) {
            const selectedOption = select.options[select.selectedIndex];
            const jadwalId = selectedOption.getAttribute('data-id');
            document.getElementById('jadwal_id').value = jadwalId;
        }
    </script>

</body>

</html>
