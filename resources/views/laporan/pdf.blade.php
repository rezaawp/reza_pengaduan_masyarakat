@php
    use Illuminate\Support\Carbon;
    // https://livewire.laravel.com/docs/volt
@endphp

<!DOCTYPE html>
<html>

<head>
    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }

        .align-top {
            vertical-align: top !important;
        }

        .mt-2 {
            margin-top: 20px !important;
        }

        .mb-2 {
            margin-bottom: 20px !important;
        }
    </style>
</head>

<body>

    <center>
        <h1>Laporan Masyarakat</h1>
    </center>

    <table>
        <tr>
            <td style="width: 100px !important" class="align-top">
                {{ __('Dibuat') }}</td>
            <td class="align-top">: </td>
            <td>{{ Carbon::parse($item['tgl_pengaduan'])->translatedFormat('l, j F Y') }}
            </td>
        </tr>
        <tr>
            <td style="width: 100px !important" class="align-top">
                {{ __('Lokasi') }}</td>
            <td class="align-top">: </td>
            <td>{{ $item['lokasi_pengaduan'] }}
            </td>
        </tr>
        <tr>
            <td style="width: 100px !important" class="align-top">
                <span>{{ __('Isi laporan') }}</span>
            </td>
            <td class="align-top">: </td>
            <td>
                <span align="justify">{{ $item['isi_laporan'] }}</span>
            </td>
        </tr>
    </table>

    <table id="customers" class="mt-2">
        <tr>
            <th>Company</th>
            <th>Contact</th>
        </tr>

        @foreach ($data as $item)
            <tr>
                <td>
                    {{ $item['tes'] }}
                </td>
                <td>
                    {{ $item['testing'] }}
                </td>
            </tr>
        @endforeach
    </table>

</body>

</html>
