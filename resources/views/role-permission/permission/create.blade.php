<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
@include('role-permission.nav-links')
<div class="container">
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Create Permission
                            <a href="{{url('permission')}}" class="btn btn-primary float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-boady">
                        <form action="{{url('permission/store')}}" method="POSt">
                            @csrf
                            <div class="mb-3">
                            <label for="">Permission Name</label>
                            <input type="text" name="name" class="form-control">
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>