@extends('layouts.master')
@section('title')
    Admin
@endsection
@section('css')
    <!-- gridjs css -->
    <link rel="stylesheet" href="{{ URL::asset('build/libs/gridjs/theme/mermaid.min.css') }}">
    <!-- Font Awesome css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
@endsection
@section('page-title')
    Daftar Pengguna
@endsection
@section('body')
    <body>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Daftar Pengguna</h4>
                </div>
                <!-- end card header -->
                <div class="card-body">
                    <!-- iterasi di sini -->
                    <div id="table-gridjs"></div>
                    <!-- end iterasi -->
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form id="deleteForm" method="POST" action="">
                @csrf
                @method('DELETE')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this user?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('scripts')
    <!-- gridjs js -->
    <script src="{{ URL::asset('build/libs/gridjs/gridjs.umd.js') }}"></script>
    <!-- App js -->
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
    <!-- Bootstrap js -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>
        const users = @json($users);

        const gridData = users.map(user => [
            user.name,
            user.email,
            user.role,
            user.jk,
            user.tgl_lahir,
            user.alamat,
            gridjs.html(`
                <div class="btn-group gap-2" role="group">
                    <a href="admin/${user.id}/edit"><button type="button" class="btn btn-primary btn-sm edit-button">
                        <i class="fas fa-edit"></i>
                    </button></a>
                    <button type="button" class="btn btn-danger btn-sm delete-button" data-id="${user.id}" data-toggle="modal" data-target="#deleteModal">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </div>
            `)
        ]);

        new gridjs.Grid({
            columns: ["Name", "Email", "Role", "Gender", "Birth Date", "Address", {
                name: 'Actions',
                sort: false,
                width: '100px'
            }],
            pagination: {
                limit: 5
            },
            sort: true,
            search: true,
            data: gridData
        }).render(document.getElementById("table-gridjs"));

        // Handle delete button click
        $(document).on('click', '.delete-button', function() {
            const userId = $(this).data('id');
            const actionUrl = `admin/${userId}`;
            $('#deleteForm').attr('action', actionUrl);
        });
    </script>
@endsection
