@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card overflow-auto">
                    <div class="card-header">{{ __('Usuarios registrados') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table id="example" class="table display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Correo-e</th>
                                    <th>Tel&eacute;fono</th>
                                    <th>RFC</th>
                                    <th>Notas</th>
                                    <th>Ip de registro</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr data-id="{{$user->id}}">
                                        <td id="row-name-{{$user->id}}">{{ $user->name }}</td>
                                        <td id="row-email-{{$user->id}}">{{ $user->email }}</td>
                                        <td id="row-phone-{{$user->id}}">{{ $user->phone }}</td>
                                        <td id="row-rfc-{{$user->id}}">{{ $user->rfc }}</td>
                                        <td id="row-notes-{{$user->id}}">{{ $user->notes }}</td>
                                        <td id="row-ip-{{$user->id}}">{{ $user->registration_ip }}</td>
                                        <td><button class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#modalUser" data-id="{{ $user->id }}"> Editar </button>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalUser" tabindex="-1" aria-labelledby="modalUser" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar Usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('register') }}" name="editUser" id="editUser"
                        enctype="multipart/form-data" novalidate>
                        @csrf
                        <input type="hidden" name="userId" id="userId">
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name') }}" required autocomplete="name" autofocus minlength="3">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email"
                                class="col-md-4 col-form-label text-md-end">{{ __('Correo electrónico') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="phone" class="col-md-4 col-form-label text-md-end">{{ __('Teléfono') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="phone"
                                    class="form-control @error('phone') is-invalid @enderror" name="phone" required
                                    autocomplete="new-phone">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="rfc" class="col-md-4 col-form-label text-md-end">{{ __('RFC') }}</label>

                            <div class="col-md-6">
                                <input id="rfc" type="rfc" class="form-control @error('rfc') is-invalid @enderror"
                                    name="rfc" required autocomplete="new-rfc">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="notes" class="col-md-4 col-form-label text-md-end">{{ __('Notas') }}</label>

                            <div class="col-md-6">
                                <textarea id="notes" class="form-control @error('notes') is-invalid @enderror" name="notes"
                                    value="{{ old('notes') }}" required autocomplete="notes" autofocus>
                                </textarea>
                            </div>

                            <div class="controls-actions"></div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary" id="submit">Guardar Cambios</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              ...
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>
@endsection
@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
    {{-- <script src="{{asset('js/validator.js')}}"></script> --}}
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                responsive: true,
                dom: 'Blfrtip',
                buttons: [
                    'pdf',
                    'csv'
                ]
            });

            document.getElementById('modalUser').addEventListener('show.bs.modal', event => {
                const id = (event.relatedTarget).getAttribute('data-id');
                $.ajax({
                    url: "/api/user/" + id,
                    type: 'GET',
                    dataType: "json",
                    success: function(result) {
                        user = result.user;
                        document.getElementById('userId').value = user.id;
                        document.getElementById('name').value = user.name;
                        document.getElementById('email').value = user.email;
                        document.getElementById('phone').value = user.phone;
                        document.getElementById('rfc').value = user.rfc;
                        document.getElementById('notes').value = user.notes;
                    },
                    error: function(xhr) {
                        alert('Error al consultar la información del usuario.');
                    }
                })

            });

            document.getElementById('submit').addEventListener('click', event => {
                const id = document.getElementById('userId').value;
                let name = document.getElementById('name').value;
                let email = document.getElementById('email').value;
                let phone = document.getElementById('phone').value;
                let rfc = document.getElementById('rfc').value;
                let notes = document.getElementById('notes').value;

                $.ajax({
                    url: "/api/user/" + id,
                    type: 'POST',
                    data: {
                        _token: "{{ csrf_token() }}",
                        name: name,
                        email: email,
                        phone: phone,
                        rfc: rfc,
                        notes: notes,
                    },
                    success: function(result) {
                        $('#modalUser').modal('hide');
                        inputs = document.querySelector('tr[data-id="'+id+'"]');
                        inputs.querySelector('#row-name-'+id).innerText = name;
                        inputs.querySelector('#row-email-'+id).innerText = email;
                        inputs.querySelector('#row-phone-'+id).innerText = phone;
                        inputs.querySelector('#row-rfc-'+id).innerText = rfc;
                        inputs.querySelector('#row-notes-'+id).innerText =notes;
                        alert('Usuario actualizado con éxito.');
                    },
                    error: function(xhr) {
                        alert('Error al guardar la iformación del usuario.');
                    }
                });
            });
        });
    </script>
@endsection
