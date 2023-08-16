@php
    use Illuminate\Support\Carbon;
    // https://livewire.laravel.com/docs/volt
@endphp

@php
    $role = auth()
        ->user()
        ->getRoleNames()
        ->toArray();
    // dd($role);
    $isAdmin = false;
    $isMasyarkat = false;
    $isPetugas = false;

    if (in_array('admin', $role)) {
        $isAdmin = true;
    } elseif (in_array('petugas', $role)) {
        $isPetugas = true;
    } elseif (in_array('masyarakat', $role)) {
        $isMasyarkat = true;
    }
@endphp

<x-guest-layout>
    <x-navbar />

    <div class="container pt-4">
        <div class="d-flex justify-content-center">
            @role('masyarakat')
                <h2 class="text-center">{{ __('LAPORAN SAYA') }}</h2>
            @endrole

            @role(['admin', 'petugas'])
                <h2 class="text-center">{{ __('LAPORAN MASYARAKAT') }}</h2>
            @endrole
        </div>

        <div class="table-responsive">
            <table class="table table-transparent table-responsive">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 1%"></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>

                    @for ($i = 0; $i < count($pengaduan); $i++)
                        @php
                            $item = $pengaduan[$i];
                        @endphp
                        <tr>
                            <td class="text-center">{{ $i + 1 }}</td>
                            <td>
                                {{-- Subject --}}
                                <p class="strong mb-1">{{ $item['subject'] }}<span
                                        class="badge {{ $item['status'] === '0' ? 'bg-red' : ($item['status'] === 'proses' ? 'bg-yellow' : 'bg-green') }} ms-2">{{ $item['status'] === '0' ? 'Ditolak' : Str::title($item['status']) }}</span>
                                </p>

                                {{-- Preview isi laporan --}}
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

                                {{-- From --}}

                                @role(['admin', 'petugas'])
                                    <div>
                                        <span>{{ __('Dari') }} : {{ $item['masyarakat']['user']['name'] }} </span>
                                    </div>
                                @endrole
                                <div class="collapse navbar-collapse" id="{{ 'col-' . $i }}">
                                    @role(['admin', 'petugas'])
                                        <button class="mt-2 btn btn-sm btn-primary"data-bs-toggle="collapse"
                                            data-bs-target="#{{ 'tanggapan-' . $i }}">{{ __('Beri Tanggapan') }}</button>
                                        <div class="collapse navbar-collapse container-tanggapan"
                                            id="{{ 'tanggapan-' . $i }}">
                                            <form method="POST">
                                                @csrf
                                                <div class="alert alert-danger mt-2 d-none" id="alert-tanggapan"
                                                    role="alert">
                                                    tanggapan ini sudah di inputkan sebelumnya
                                                </div>

                                                <textarea class="mt-2 form-control" name="{{ 'tanggapan-' . $item['id_pengaduan'] }}" id=""></textarea>
                                                <div class="d-flex justify-content-end gap-2 pt-2">
                                                    <small class="text-secondary">Input diatas bisa diperbesar</small>
                                                    <div class="spinner-border text-blue d-none" id="loading-tanggapan"
                                                        role="status"></div>
                                                    <button class="btn btn-sm btn-success" id="terima" name="terima"
                                                        value="{{ $item['tgl_pengaduan'] }}">Terima & Kirim</button>
                                                    <button class="btn btn-sm btn-danger" id="tolak" name="tolak"
                                                        value="{{ $item['tgl_pengaduan'] }}">Tolak & Kirim</button>
                                                </div>
                                            </form>
                                        </div>
                                    @endrole
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
                                                <td style="width: 100px !important" class="align-top">
                                                    <span>{{ __('Isi laporan') }}</span>
                                                </td>
                                                <td class="align-top">: </td>
                                                <td>
                                                    <p align="justify">{{ $item['isi_laporan'] }}</p>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td style="width: 100px !important" class="align-top">
                                                    <span>{{ __('Images') }}</span>
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
                        </tr>
                    @endfor
                    <div class="d-flex justify-content-end">
                        {{ $pengaduan->links() }}
                    </div>

                </tbody>
            </table>
        </div>

        <script>
            const containerTanggapan = document.querySelectorAll('.container-tanggapan');

            containerTanggapan.forEach((container) => {
                const form = container.querySelector('form')
                const buttonTerima = form.querySelector('#terima');
                const buttonTolak = form.querySelector('#tolak');

                let terima;
                let tolak;

                buttonTerima.addEventListener('click', function(e) {
                    terima = e.target.value;
                })

                buttonTolak.addEventListener('click', function(e) {
                    tolak = e.target.value;
                })

                form.addEventListener('submit', function(e) {
                    const spinnerLoading = form.querySelector('#loading-tanggapan')
                    const alertDanger = form.querySelector('#alert-tanggapan');
                    spinnerLoading.classList.remove('d-none');
                    e.preventDefault();

                    const formData = new FormData(form)

                    formData.append('terima', terima);
                    formData.append('tolak', tolak);

                    const xhr = new XMLHttpRequest();
                    xhr.open('POST', "{{ route('prsoes.tanggapan.store') }}", true);
                    xhr.onreadystatechange = function() {
                        if (xhr.readyState === 4 && xhr.status === 200) {
                            console.log(JSON.parse(xhr.responseText))
                            spinnerLoading.classList.add('d-none');
                            // }
                        } else {
                            console.log('error status = ', xhr.status)
                            spinnerLoading.classList.add('d-none');
                            alertDanger.classList.remove('d-none');
                        }

                    };
                    xhr.send(formData);
                });
            })
        </script>

    </div>

</x-guest-layout>
