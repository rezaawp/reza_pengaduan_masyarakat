@php
    use Illuminate\Support\Carbon;
@endphp

<x-guest-layout>

    <x-navbar />

    <div class="container pt-4">
        <div class="d-flex justify-content-center">
            <h2 class="text-center">{{ __('LAPORAN SAYA') }}</h2>
        </div>

        <div class="table-responsive">
            <table class="table table-transparent table-responsive">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 1%"></th>
                        <th></th>
                        {{-- <th>Detail</th> --}}
                    </tr>
                </thead>
                <tbody>

                    @for ($i = 0; $i < count($pengaduan); $i++)
                        @php
                            $item = $pengaduan[$i];
                        @endphp
                        <tr>
                            <td class="text-center">1</td>
                            <td>
                                <p class="strong mb-1">{{ $item['subject'] }}<span
                                        class="badge {{ $item['status'] === '0' ? 'bg-red' : ($item['status'] === 'proses' ? 'bg-yellow' : 'bg-green') }} ms-2">{{ $item['status'] === '0' ? 'Ditolak' : Str::title($item['status']) }}</span>
                                </p>
                                <div class="text-socondary">
                                    {{ Str::limit($item['isi_laporan'], 50, '...') }}<span data-bs-toggle="collapse"
                                        data-bs-target="#{{ 'col-' . $i }}">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-arrow-bar-down" width="25"
                                            height="25" viewBox="0 0 25 25" stroke-width="2" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M12 20l0 -10"></path>
                                            <path d="M12 20l4 -4"></path>
                                            <path d="M12 20l-4 -4"></path>
                                            <path d="M4 4l16 0"></path>
                                        </svg></span></div>

                                <div class="collapse navbar-collapse" id="{{ 'col-' . $i }}">
                                    <div class="mt-3">
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
                                                <td style="width: 100px !important" class="align-top"><span>{{__('Isi laporan')}}</span></td>
                                                <td class="align-top">: </td>
                                                <td>
                                                    <p align="justify">{{ $item['isi_laporan'] }}</p>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td style="width: 100px !important" class="align-top">
                                                    <span>{{__('Images')}}</span>
                                                </td>
                                                <td class="align-top">: </td>
                                                <td>
                                                    <div>
                                                        <div class="row">
                                                            @foreach (json_decode($item['images']['images']) as $image)
                                                                <div class="col-6 col-md-3 col-sm-6">
                                                                    <img width="200" src="{{ $image }}"
                                                                        alt="">
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </td>
                            {{-- <td></td> --}}
                        </tr>
                    @endfor

                </tbody>
            </table>
        </div>
    </div>

</x-guest-layout>
