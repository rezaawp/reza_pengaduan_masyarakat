<x-guest-layout>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js">
        < script defer src = "https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" >
    </script>

    <div class="container pt-4">
        <div class="d-flex justify-content-center">
            <h2>{{ __('LAPOR SEBAGAI MASYARAKAT') }}</h2>
        </div>
        <form class="card" method="POST" action="{{ route('proses.laporan.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="card-header">
                <h3 class="card-title">{{ __('Isi Formulir Pengaduan') }}</h3>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label required">{{ __('Isi Laporan') }}</label>
                    <div>
                        <textarea type="text" name="isi_laporan" class="form-control js-auto-size" aria-describedby="emailHelp"
                            placeholder="{{ __('Isi Laporan') }}"> </textarea>
                        <x-input-error :messages="$errors->get('isi_laporan')" class="mt-2" />
                        <small class="form-hint">{{ __('Laporan akan diterima oleh petugas') }}</small>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label required">{{ __('Detail Alamat') }}</label>
                    <div>
                        <textarea type="text" name="isi_laporan" class="form-control js-auto-size2" aria-describedby="emailHelp"
                            placeholder="{{ __('Detail Alamat') }}"> </textarea>
                        <x-input-error :messages="$errors->get('isi_laporan')" class="mt-2" />
                        <small
                            class="form-hint">{{ __('Kami membutuhkan alamat untuk memperbaiki layanan kami') }}</small>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label required">{{ __('Foto Bukti') }}</label>
                    <div>
                        <input type="file" class="form-control" name="foto_bukti[]" multiple
                            placeholder="{{ __('Foto Bukti') }}" id="gallery-photo-add">
                        <x-input-error :messages="$errors->get('foto_bukti')" class="mt-2" />

                        <small class="form-hint">
                            {{ __('Untuk memperkuat laporan anda, kami membutuhkan bukti berupada foto') }}
                        </small>

                        <div class="gallery"></div>
                        {{-- <img src="https://png.pngtree.com/png-clipart/20210309/original/pngtree-a-british-short-blue-and-white-cat-png-image_5803762.jpg"
                            alt="Group of people brainstorming and taking notes" width="250"> --}}
                    </div>
                </div>

            </div>
            <div class="card-footer text-end">
                <button type="submit" class="btn btn-primary">{{ __('Kirim') }}</button>
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

    <script type="module">
        import {
            TextareaAutoSize
        } from 'https://cdnjs.cloudflare.com/ajax/libs/textarea-autosize/1.0.0/textarea-autosize.min.js'
        const wrapper = new TextareaAutoSize(
            document.querySelector('textarea.js-auto-size')
        )
    </script>

</x-guest-layout>
