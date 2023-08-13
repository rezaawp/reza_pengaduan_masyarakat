<x-guest-layout>

    <x-navbar />

    <div class="container pt-4">

        <div class="d-flex justify-content-center">
            <h2>{{ __('LAPORAN SAYA') }}</h2>
        </div>

        <div class="table-responsive">
            <table class="table table-vcenter">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Title</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th class="w-1"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Paweł Kuna</td>
                        <td>
                            UI Designer, Training
                        </td>
                        <td><a href="#" class="text-reset">paweluna@howstuffworks.com</a>
                        </td>
                        <td>
                            User
                        </td>
                        <td>
                            <a href="#">Edit</a>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>

</x-guest-layout>
