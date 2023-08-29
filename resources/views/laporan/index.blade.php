@php
    use Illuminate\Support\Carbon;
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
                                <div class="d-flex justify-content-between">
                                    <div id="subject-col-1">
                                        <p class="strong mb-1">{{ $item['subject'] }}<span
                                                id="badge-status-{{ $i }}"
                                                class="badge {{ $item['status'] === '0' ? 'bg-red' : ($item['status'] === 'proses' ? 'bg-yellow' : 'bg-green') }} ms-2">{{ $item['status'] === '0' ? 'Ditolak' : Str::title($item['status']) }}</span>
                                        </p>

                                        {{-- Preview isi laporan --}}
                                        <div class="text-socondary">
                                            {{ Str::limit($item['isi_laporan'], 50, '...') }}

                                            <span class="switch-icon" data-bs-toggle="switch-icon">
                                                <span class="switch-icon-a">
                                                    {{-- Icon buka ke bawah --}}
                                                    <span data-bs-toggle="collapse"
                                                        data-bs-target="#{{ 'col-' . $i }}">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="icon icon-tabler icon-tabler-arrow-bar-down"
                                                            width="25" height="25" viewBox="0 0 25 25"
                                                            stroke-width="2" stroke="currentColor" fill="none"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none">
                                                            </path>
                                                            <path d="M12 20l0 -10"></path>
                                                            <path d="M12 20l4 -4"></path>
                                                            <path d="M12 20l-4 -4"></path>
                                                            <path d="M4 4l16 0"></path>
                                                        </svg></span>
                                                    {{-- End icon buka ke bawah --}}
                                                </span>
                                                <span class="switch-icon-b">
                                                    {{-- Icon buka ke atas --}}
                                                    <span data-bs-toggle="collapse"
                                                        data-bs-target="#{{ 'col-' . $i }}">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="icon icon-tabler icon-tabler-arrow-bar-to-up"
                                                            width="24" height="24" viewBox="0 0 24 24"
                                                            stroke-width="2" stroke="currentColor" fill="none"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none">
                                                            </path>
                                                            <path d="M12 10l0 10"></path>
                                                            <path d="M12 10l4 4"></path>
                                                            <path d="M12 10l-4 4"></path>
                                                            <path d="M4 4l16 0"></path>
                                                        </svg></span>
                                                    {{-- End icon buka ke atas --}}

                                                </span>
                                            </span>

                                        </div>

                                        {{-- From --}}
                                        @role(['admin', 'petugas'])
                                            <div>
                                                <span>{{ __('Dari') }} : {{ $item['masyarakat']['user']['name'] }}
                                                </span>
                                            </div>
                                        @endrole
                                        <div class="collapse navbar-collapse pt-2" id="{{ 'col-' . $i }}">
                                            @role(['admin', 'petugas'])
                                                <span class="text-red d-none" id="error_cetak-{{ $i }}">
                                                    {{ __('Anda harus menanggapi laporan terlebih dahulu !') }}</span>
                                                <div class="d-flex justify-content-between">
                                                    <span class="switch-icon" data-bs-toggle="switch-icon">
                                                        <span class="switch-icon-a">
                                                            <button class="btn btn-sm btn-primary" data-bs-toggle="collapse"
                                                                data-bs-target="#{{ 'tanggapan-' . $i }}">{{ __('Beri Tanggapan') }}</button>
                                                            {{-- Icon A --}}
                                                        </span>
                                                        <span class="switch-icon-b">
                                                            <button class="btn btn-sm btn-primary" data-bs-toggle="collapse"
                                                                data-bs-target="#{{ 'tanggapan-' . $i }}">{{ __('Tutup Tanggapan') }}</button>
                                                        </span>

                                                    </span>

                                                    @can('generate laporan')
                                                        <div id="cetak-laporan">
                                                            <form>
                                                                @csrf
                                                                <input type="text" name="id_pengaduan" class="d-none"
                                                                    value="{{ $item['id_pengaduan'] }}">
                                                                <button class="btn btn-sm btn-success"><svg
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        class="icon icon-tabler icon-tabler-printer"
                                                                        width="24" height="24" viewBox="0 0 24 24"
                                                                        stroke-width="2" stroke="currentColor" fill="none"
                                                                        stroke-linecap="round" stroke-linejoin="round">
                                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none">
                                                                        </path>
                                                                        <path
                                                                            d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2">
                                                                        </path>
                                                                        <path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4">
                                                                        </path>
                                                                        <path
                                                                            d="M7 13m0 2a2 2 0 0 1 2 -2h6a2 2 0 0 1 2 2v4a2 2 0 0 1 -2 2h-6a2 2 0 0 1 -2 -2z">
                                                                        </path>
                                                                    </svg>{{ __('Cetak Laporan') }}</button>
                                                            </form>
                                                        </div>
                                                    @endcan

                                                </div>
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
                                                            <small class="text-secondary">Input diatas bisa
                                                                diperbesar</small>
                                                            <div class="spinner-border text-blue d-none"
                                                                id="loading-tanggapan" role="status"></div>
                                                            <button class="btn btn-sm btn-success" id="terima"
                                                                name="terima"
                                                                value="{{ $item['tgl_pengaduan'] }}">Terima &
                                                                Kirim</button>
                                                            <button class="btn btn-sm btn-danger" id="tolak"
                                                                name="tolak" value="{{ $item['tgl_pengaduan'] }}">Tolak
                                                                &
                                                                Kirim</button>
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
                                                                            <img width="200"
                                                                                src="{{ $image }}"
                                                                                alt="">
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    @if ($item['status'] === 'proses' || $item['status'] === 'selesai')
                                                        <tr>
                                                            <td style="width: 100px !important" class="align-top">
                                                                <span>{{ __('Ditanggapi oleh') }}</span>
                                                            </td>
                                                            <td class="align-top">: </td>
                                                            <td>
                                                                <p align="justify">
                                                                    {{ $item['tanggapan']['petugas']['user']['name'] }}
                                                                </p>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td style="width: 100px !important" class="align-top">
                                                                <span>{{ __('Tanggapan') }}</span>
                                                            </td>
                                                            <td class="align-top">: </td>
                                                            <td>
                                                                <p align="justify">
                                                                    {{ $item['tanggapan']['tanggapan'] }}</p>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                </table>

                                            </div>
                                        </div>
                                    </div>
                                    <div id="subject-col-2"
                                        class="ps-3 d-flex gap-2 justify-content-center flex-column">
                                        @role('masyarakat')
                                            @if ($item['status'] == '0')
                                                <form class="form-delete"
                                                    action="{{ route('proses.pengaduan.delete', ['id' => $item['id_pengaduan']]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                            @endif
                                        @endrole

                                        @role(['admin', 'petugas'])
                                            <form class="form-delete"
                                                action="{{ route('proses.pengaduan.delete', ['id' => $item['id_pengaduan']]) }}"
                                                method="POST">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        @endrole

                                        @role(['admin', 'petugas'])
                                            @if ($item['status'] === 'proses')
                                                <form
                                                    action="{{ route('proses.pengaduan.selesai', ['id' => $item['id_pengaduan']]) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('put')
                                                    <button class="btn btn-success btn-sm">Selesai</button>
                                                </form>
                                            @elseif ($item['status'] === 'selesai')
                                                <form
                                                    action="{{ route('proses.pengaduan.proses', ['id' => $item['id_pengaduan']]) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('put')
                                                    <button class="btn btn-warning btn-sm">Proses</button>
                                                </form>
                                            @endif
                                        @endrole
                                        {{-- @role(['admin', 'petugas'])
                                            @if ($item['status'] !== 'proses')
                                                <a class="btn btn-warning btn-sm"
                                                    href="{{ route('admin.laporan.edit', ['id' => $item['id_pengaduan']]) }}">Edit</a>
                                            @endif
                                        @endrole --}}

                                        @role('masyarakat')
                                            @if ($item['status'] == '0')
                                                <a class="btn btn-warning btn-sm"
                                                    href="{{ route('laporan.edit', ['id' => $item['id_pengaduan']]) }}">Edit</a>
                                            @endif
                                        @endrole
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
            const formDelete = document.querySelectorAll(".form-delete")
            // console.log(formDelete)
            formDelete.forEach(element => {
                element.addEventListener("submit", function(event) {
                    var confirmation = confirm("Apakah anda yakin ingin menghapus data?");
                    if (!confirmation) {
                        event.preventDefault(); // Mencegah form untuk submit jika tidak ada konfirmasi
                    }
                })
            });
            const containerTanggapan = document.querySelectorAll('.container-tanggapan');

            const containerFormCetakLaporan = document.querySelectorAll('#cetak-laporan');

            function showAlertError(element, msg) {
                const alert = element
                alert.textContent = msg;
                alert.classList.remove('d-none')
            }

            containerFormCetakLaporan.forEach((container, index) => {
                const form = container.querySelector('form')

                form.addEventListener('submit', function(e) {
                    e.preventDefault()
                    const formData = new FormData(form)
                    const xhr = new XMLHttpRequest();
                    xhr.open('POST', "{{ route('proses.laporan.validasicetak') }}", true);
                    xhr.onreadystatechange = function() {
                        if (xhr.readyState === 4 && xhr.status === 200) {
                            const result = JSON.parse(xhr.responseText)
                            const tagA = document.createElement('a')
                            tagA.href = "{{ route('proses.laporan.cetak') }}" + '/?id_pengaduan=' + result
                                .data.id_pengaduan
                            tagA.target = "_blank"
                            document.body.appendChild(tagA)
                            tagA.click()
                            document.body.removeChild(tagA)
                        } else {
                            if (xhr.status === 400) {
                                const result = JSON.parse(xhr.responseText);
                                showAlertError(document.querySelector('#error_cetak-' + index), result
                                    .error);
                            }
                        }
                    };

                    xhr.send(formData);
                })
            })

            containerTanggapan.forEach((container, index) => {
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
                    const errorCetak = document.querySelector('#error_cetak-' + index)
                    spinnerLoading.classList.remove('d-none');
                    e.preventDefault();

                    const formData = new FormData(form)

                    if (terima) {
                        formData.append('terima', terima);
                        formData.delete('tolak')
                        terima = null
                    }

                    if (tolak) {
                        formData.append('tolak', tolak);
                        formData.delete('terima')
                        tolak = null
                    }

                    const xhr = new XMLHttpRequest();
                    xhr.open('POST', "{{ route('prsoes.tanggapan.store') }}", true);
                    xhr.onreadystatechange = function() {
                        if (xhr.readyState === 4 && xhr.status === 200) {
                            spinnerLoading.classList.add('d-none');

                            errorCetak.classList.add('d-none')
                            alertDanger.classList.remove('d-none');
                            alertDanger.classList.remove('alert-danger')
                            alertDanger.classList.add('alert-success');
                            alertDanger.textContent = "Sudah Berhasil Menanggapi :D"
                            const badge = document.querySelector('#badge-status-' + index)
                            badge.classList.remove('bg-red')
                            badge.classList.remove('bg-green')
                            badge.classList.add('bg-yellow')
                            badge.textContent = "Proses"

                        } else {
                            if (xhr.status === 422) {
                                errorCetak.classList.add('d-none')
                                alertDanger.classList.remove('d-none');
                                alertDanger.classList.remove('alet-success');
                                alertDanger.classList.add('alert-danger');
                                alertDanger.textContent = "Sudah pernah ditanggapi"
                            }
                            spinnerLoading.classList.add('d-none');
                        }
                        formData.delete('terima')
                        formData.delete('tolak')
                    };
                    xhr.send(formData);
                });
            })
        </script>

    </div>

</x-guest-layout>
