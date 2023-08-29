<x-guest-layout>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script type="module">
        import {
            TextareaAutoSize
        } from 'https://cdnjs.cloudflare.com/ajax/libs/textarea-autosize/1.0.0/textarea-autosize.min.js'
        const input1 = 'textarea.js-auto-size'
        const input2 = 'textarea.js-auto-size2'
        const satu = new TextareaAutoSize(
            document.querySelector(input1)
        )

        // satu.update()
        const dua = new TextareaAutoSize(
            document.querySelector(input2)
        )
    </script>

    <x-navbar />

    <div class="container pt-4">

        <div class="d-flex justify-content-center">
            <h2>{{ __('EDIT LAPORAN') }}</h2>
        </div>

        <x-session-layout key='message'>
            <div class="alert alert-success" role="alert">
                <h4 class="alert-title">Success</h4>
                <div class="text-secondary"><x-get-session key='message' /></div>
            </div>
        </x-session-layout>

        <x-session-layout key='error'>
            <div class="alert alert-danger" role="alert">
                <h4 class="alert-title">Error</h4>
                <div class="text-secondary"><x-get-session key='error' /></div>
            </div>
        </x-session-layout>

        <form class="card" method="POST" action="{{ route('proses.pengaduan.update', ['id' => $idPengaduan]) }}"
            enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="card-header">
                <h3 class="card-title">{{ __('Isi Formulir Pengaduan') }}</h3>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label required">{{ __('Subject') }}</label>
                    <div>
                        <input type="text" name="subject" value="{{ $pengaduan->subject }}" class="form-control"
                            aria-describedby="emailHelp" placeholder="{{ __('Subject') }}" />
                        <x-input-error :messages="$errors->get('subject')" class="mt-2" />
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label required">{{ __('Isi Laporan') }}</label>
                    <div>
                        <textarea @role(['admin', 'petugas']) disabled @endrole type="text" name="isi_laporan" class="form-control js-auto-size"
                            aria-describedby="emailHelp" placeholder="{{ __('Isi Laporan') }}">{{ $pengaduan->isi_laporan }}</textarea>
                        <x-input-error :messages="$errors->get('isi_laporan')" class="mt-2" />
                        <small class="form-hint">{{ __('Laporan akan diterima oleh petugas') }}</small>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label required">{{ __('Detail Alamat') }}</label>
                    <div>
                        <textarea type="text" value="{{ old('detail_alamat') }}" name="detail_alamat" class="form-control js-auto-size2"
                            aria-describedby="emailHelp" placeholder="{{ __('Detail Alamat') }}">{{ $pengaduan->lokasi_pengaduan }}</textarea>
                        <x-input-error :messages="$errors->get('detail_alamat')" class="mt-2" />
                        <small
                            class="form-hint">{{ __('Kami membutuhkan alamat untuk memperbaiki layanan kami') }}</small>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label required">{{ __('Foto Bukti') }}</label>
                    <div>
                        <input type="file" class="form-control" value="{{ old('foto_bukti') }}" name="foto_bukti[]"
                            multiple placeholder="{{ __('Foto Bukti') }}" id="gallery-photo-add">
                        <x-input-error :messages="$errors->get('foto_bukti')" class="mt-2" />

                        <small class="form-hint">
                            {{ __('Untuk memperkuat laporan anda, kami membutuhkan bukti berupada foto') }}
                        </small>

                        <div class="gallery">
                            @foreach (json_decode($pengaduan->images->images) as $item)
                                <img src="{{ $item }}" width="100" alt="">
                            @endforeach
                        </div>

                    </div>
                </div>

            </div>
            <div class="card-footer text-end">
                <a href="{{ route('admin.laporan.index') }}" class="btn btn-danger">Cancel</a>
                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
            </div>
        </form>
    </div>

    <script>
        $(function() {
            // Multiple images preview in browser
            var imagesPreview = function(input, placeToInsertImagePreview) {

                if (input.files) {
                    var filesAmount = input.files.length;

                    $(placeToInsertImagePreview).empty()
                    for (i = 0; i < filesAmount; i++) {
                        var reader = new FileReader();

                        // console.log(input.files[i].type)
                        if (!input.files[i].type.includes('image')) {
                            alert('harus image')
                        }

                        const typeFile = input.files[i].type
                        const fileI = input.files[i]
                        reader.onload = (event) => {


                            if (typeFile.includes('image')) {
                                $($.parseHTML('<img>')).attr('src', event.target.result)
                                    .attr('width', '100')
                                    .attr('class', 'ms-2 mt-2')
                                    .appendTo(
                                        placeToInsertImagePreview);

                                console.log(event.target.result)
                            }

                            if (typeFile.includes('video')) {
                                console.log('file berbentuk video')
                                const id = `video${i}`
                                $($.parseHTML('<video>')).attr('width', 100).attr('height', 100).attr('id',
                                        id).attr('controls', true)
                                    .appendTo(
                                        placeToInsertImagePreview);

                                const videoTag = $(`#${id}`)

                                videoTag.controls = true
                                console.log(typeFile);
                                console.log(placeToInsertImagePreview)
                                $($.parseHTML('<source>')).attr('src', event.target.result).attr('type',
                                        typeFile)
                                    .appendTo(
                                        `video#${id}`);

                            }
                        }

                        reader.readAsDataURL(fileI);

                        // console.log(reader.readAsDataURL(input.files[i]))
                    }
                }

            };

            $('#gallery-photo-add').on('change', function() {
                console.log('berubah')
                imagesPreview(this, 'div.gallery');
            });
        });
    </script>
</x-guest-layout>
