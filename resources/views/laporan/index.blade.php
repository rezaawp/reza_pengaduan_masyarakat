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
                    <tr>
                        <td class="text-center">1</td>
                        <td>
                            <p class="strong mb-1">Logo Creation <span class="badge bg-yellow">Yellow</span></p>
                            <div class="text-socondary">{{Str::limit('Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam, est odio exercitationem quidem quae rerum tenetur non fuga, qui earum deleniti velit eaque dicta at veniam impedit quia tempora dolore.', 50, '...')}}<span data-bs-toggle="collapse"
                                    data-bs-target="#cobaaa">
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

                            <div class="collapse navbar-collapse" id="cobaaa">
                                <div class="mt-3">
                                    <table>
                                        <tr>
                                            <td style="width: 100px !important" class="align-top">Dibuat</td>
                                            <td class="align-top">: </td>
                                            <td>Kamis, 9 Agustus 2023</td>
                                        </tr>
                                        <tr>
                                            <td style="width: 100px !important" class="align-top"><span>Isi
                                                    Laporan</span></td>
                                            <td class="align-top">: </td>
                                            <td>
                                                <p align="justify">Lorem ipsum dolor sit, amet consectetur adipisicing
                                                    elit. Omnis
                                                    architecto, quasi fuga vitae reiciendis, est et eveniet praesentium
                                                    delectus sequi vel! Molestiae adipisci ipsa facere cumque mollitia
                                                    inventore. Dolorem, repudiandae!</p>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td style="width: 100px !important" class="align-top"><span>Images</span>
                                            </td>
                                            <td class="align-top">: </td>
                                            <td>
                                                <div>
                                                    <div class="row">
                                                        <div class="col-6 col-md-3 col-sm-6">
                                                            <img width="200"
                                                                src="https://w7.pngwing.com/pngs/151/483/png-transparent-brown-tabby-cat-cat-dog-kitten-pet-sitting-the-waving-cat-animals-cat-like-mammal-pet-thumbnail.png"
                                                                alt="">
                                                        </div>
                                                        <div class="col-6 col-md-3 col-sm-6">
                                                            <img width="200"
                                                                src="https://w7.pngwing.com/pngs/151/483/png-transparent-brown-tabby-cat-cat-dog-kitten-pet-sitting-the-waving-cat-animals-cat-like-mammal-pet-thumbnail.png"
                                                                alt="">
                                                        </div>
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

                </tbody>
            </table>
        </div>
    </div>

</x-guest-layout>
