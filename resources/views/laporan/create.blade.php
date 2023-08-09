<x-guest-layout>
    <div class="container pt-4">
        <div class="d-flex justify-content-center">
            <h2>{{ __('LAPOR SEBAGAI MASYARAKAT') }}</h2>
        </div>
        <form class="card">
            <div class="card-header">
                <h3 class="card-title">{{ __('Isi Formulir Pengaduan') }}</h3>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label required">{{ __('Isi Laporan') }}</label>
                    <div>
                        <textarea type="text" class="form-control js-auto-size" aria-describedby="emailHelp" placeholder="{{ __('Isi Laporan') }}"> </textarea>
                        <small class="form-hint">{{ __('Laporan akan diterima oleh petugas') }}</small>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label required">{{ __('Foto Bukti') }}</label>
                    <div>
                        <input type="file" class="form-control" name="foto_bukti[]" multiple
                            placeholder="{{ __('Foto Bukti') }}">
                        <small class="form-hint">
                            {{ __('Untuk memperkuat laporan anda, kami membutuhkan bukti berupada foto atau video') }}
                        </small>
                    </div>
                </div>

            </div>
            <div class="card-footer text-end">
                <button type="submit" class="btn btn-primary">{{ __('Kirim') }}</button>
            </div>
        </form>
    </div>
    <script type="module">
        import {
            TextareaAutoSize
        } from 'https://cdnjs.cloudflare.com/ajax/libs/textarea-autosize/1.0.0/textarea-autosize.min.js'
        const wrapper = new TextareaAutoSize(
            document.querySelector('textarea.js-auto-size')
        )
    </script>
</x-guest-layout>
