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

        .mt-1 {
            margin-top: 10px !important;
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
                {{ __('Dari') }}</td>
            <td class="align-top">: </td>
            <td>{{ $item['dari'] }}
            </td>
        </tr>
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
        <tr>
            <td style="width: 100px !important" class="align-top">
                <span>{{ __('Bukti Foto') }}</span>
            </td>
            <td class="align-top">: </td>
            <td>
                <div class="mt-1">
                    @foreach ($item['images'] as $image)
                        <img src="{{$image}}" alt="" width="200">
                    @endforeach
                </div>
            </td>
        </tr>
    </table>

    <p>Dengan mengakhiri laporan ini, kami ingin mengungkapkan apresiasi yang mendalam atas keberanian dan ketekunan masyarakat dalam mengajukan pengaduan yang relevan dan penting bagi peningkatan lingkungan kami. Laporan-laporan ini tidak hanya mencerminkan partisipasi aktif dalam pembangunan komunitas, tetapi juga mendorong kami untuk terus berkomitmen dalam menjaga transparansi, akuntabilitas, dan peningkatan berkelanjutan. Kami akan melakukan evaluasi menyeluruh terhadap setiap pengaduan yang diajukan, serta mengambil tindakan yang sesuai untuk mengatasi isu-isu yang diungkapkan. Semua kontribusi berharga ini adalah langkah menuju lingkungan yang lebih baik dan lebih adil bagi semua warga. Terima kasih atas dukungan dan kepercayaan Anda dalam upaya ini.</p>
    {{-- <table id="customers" class="mt-2">
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
    </table> --}}



</body>

</html>
