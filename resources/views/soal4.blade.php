@extends('app')

@push('content')
    <div class="home">
        <div class="card">
            <div class="card-header">
                Soal 4
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <form id="form_id" method="post" action="{{ route('soal4.post') }}">
                            @csrf
                            <div class="form-group d-none">
                                <input type="hidden" name="id" id="id">
                            </div>

                            
                            
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-3 col-form-label">Nama</label>
                                <div class="col-sm-9">
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Input Nama">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Input Email">
                                </div>
                            </div>

                            <button type="submit" id="btn-form" class="btn btn-primary mb-2">Save</button>
                        </form>
                    </div>
                    <div class="col-6">
                        <p class="font-weight-bold mb-0">Result :</p>
                        <div>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th class="text-center" width="20%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($customers as $customer)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $customer->name }}</td>
                                            <td>{{ $customer->email }}</td>
                                            <td class="d-flex text-center">
                                                <div class="mx-2">
                                                    <a href="#" onclick="return edit({{ $customer }});" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                                </div>
                                                <div class="mx-2">
                                                    <form method="post" action="{{route('soal4.destroy', $customer->id)}}">
                                                        @method('delete')
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <th colspan="4" class="text-center">No Data</th>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endpush

@push('scripts')
    <script type="text/javascript">
        function edit(data) {
            var url = '{{ route("soal4.update", ":id") }}';
            url = url.replace(':id', data.id);
            document.getElementById("id").value = data.id
            document.getElementById("name").value = data.name
            document.getElementById("email").value = data.email
            document.getElementById("form_id").action = url;
        }

        function destroy(data) {
            var url = '{{ route("soal4.destroy", ":id") }}';
            url = url.replace(':id', data.id);
            document.getElementById("id").value = data.id
            document.getElementById("form_id").action = url;
            document.getElementById("form_id").method = 'delete';
            
            var button = document.getElementById('btn-form');
        }
    </script>
@endpush