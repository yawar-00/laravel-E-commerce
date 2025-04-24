<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<!-- Latest compiled and minified CSS -->
   <!-- Bootstrap 5 CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap 5 JS -->
<!-- Optional theme -->

</head>
<body>
    @include('role-permission.nav-links')
    <div class="container mt-5">
        <div class="row ">
            <div class="col-md-12">
                @if(session('status'))
                <div class="alert alert-success">{{session('status')}}</div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h4>Roles
                            <a href="{{url('role/create')}}" class="btn btn-primary float-end">Add Role</a>
                        </h4>
                    </div>
                    <div class="card-boady">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Name</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($roles  as $role)
                                <tr >
                                    <td>{{ $role->id }}</td>
                                    <td>{{ $role->name }}</td>
                    <td>
                    <a href="{{url('role/'.$role->id.'/give-permissions')}}" class="btn btn-warning" >
                            Add/Edit Role Permission
                        </a>
                        <a href="{{url('role/'.$role->id.'/edit')}}" class="btn btn-warning" >
                            Edit
                        </a>

                        <a href="{{url('role/'.$role->id.'/destroy')}}" class="btn btn-danger " >
                            <i class="fas fa-trash-alt"></i> Delete
                        </a>
                        
                    </td>
                </tr>
                
                @endforeach
            </table>
        </div>    
    </div>
</div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>