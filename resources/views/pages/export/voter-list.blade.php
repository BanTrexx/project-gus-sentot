<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Export Daftar Pemilih</title>
</head>
<body>

<h2 class="text-center text-lg font-bold"> DAFTAR PEMILIH </h2>
<h2 class="text-center text-lg font-bold"> H.M SYARIF HIDAYATULLOH, ST, MMT (Gus Sentot) </h2>
<h2 class="text-center text-lg font-bold"> DESA/KECAMATAN : {{ $village }}/{{ $district }} </h2>

<div class="mt-3 flex items-center justify-between">
    <table>
        <tr>
            <td class="px-1 font-semibold">KOORDES/KOORDUS</td>
            <td class="px-1 font-semibold">:</td>
            <td class="px-1 font-semibold">{{ $coordinator->name }}</td>
        </tr>
        <tr>
            <td class="px-1 font-semibold">DUSUN, RT/RW</td>
            <td class="px-1 font-semibold">:</td>
            <td class="px-1 font-semibold">…………………………-……/……</td>
        </tr>
    </table>
    <table>
        <tr>
            <td class="px-1 font-semibold">NO. HP</td>
            <td class="px-1 font-semibold">:</td>
            <td class="px-1 font-semibold">{{ $coordinator->phone_number ?? '' }}</td>
        </tr>
        <tr>
            <td class="px-1 font-semibold">TPS / KTP</td>
            <td class="px-1 font-semibold">:</td>
            <td class="px-1 font-semibold">………/{{ $coordinator->nik }}</td>
        </tr>
    </table>
</div>

<table class="mt-6 mb-2 min-w-full text-center">
    <thead>
    <tr>
        <th class="py-1 bg-gray-100 text-sm text-center border">NO</th>
        <th class="px-6 py-1 bg-gray-100 text-sm text-center border">NAMA</th>
        <th class="px-6 py-1 bg-gray-100 text-sm text-center border">NO KTP</th>
        <th class="py-1 bg-gray-100 text-sm text-center border">RT/RW</th>
        <th class="py-1 bg-gray-100 text-sm text-center border">TPS</th>
        <th class="px-6 py-1 bg-gray-100 text-s2 text-center border">NO HP</th>
    </tr>
    </thead>

    <tbody>
    @foreach($supporters as $item)
        <tr>
            <td class="py-1 border">{{ $loop->iteration }}</td>
            <td class="px-6 py-1 border">{{ $item->name }}</td>
            <td class="px-6 py-1 border">{{ $item->nik }}</td>
            <td class="py-1 border">{{ $item->rt . "/" . $item->rw }}</td>
            <td class="py-1 border">{{ $item->dpt_tps }}</td>
            <td class="px-6 py-1 border">{{ $item->phone_number ?? '' }}</td>
        </tr>
    @endforeach
    </tbody>
</table>

<div class="px-4 flex items-center justify-between">
    <div>
        <p class="font-semibold">Bila ada kesulitan bisa hubungi :</p>
        <p class="font-semibold">1. Elisa : 083 146 184 905</p>
        <p class="font-semibold">2. Mia   : 081 252 449 074</p>
    </div>

    <div>
        <p class="font-semibold">PENANGGUNG JAWAB</p>
        <p class="font-semibold"></p>
        <p class="font-semibold">(1) {{ $responsible->name }}</p>
    </div>
</div>

<script>
    window.print()
</script>

</body>
</html>
