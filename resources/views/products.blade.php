<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
@extends('layouts.master')
@section('content')
<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#addProductModal">
                 Add Product
                </button>

        <div id="message"></div>

        <table class="table table-dark table-bordered">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="productTable">
                @forelse($products as $index => $product)
                <tr id="product_{{ $product->id }}">
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>
                        @if($product->image)
                        <img src="{{ asset($product->image) }}" style="width: 120px; height: 60px; cursor:pointer;"
                            class="product-img" alt="Image">
                        @else
                        No Image
                        @endif
                    </td>
                    <td>
                        <button class="btn btn-warning btn-sm editProductBtn" data-id="{{ $product->id }}"
                            data-bs-toggle="modal" data-bs-target="#editProductModal">
                            Edit
                        </button>

                        <button class="btn btn-danger btn-sm deleteProductBtn" data-id="{{ $product->id }}">
                            <i class="fas fa-trash-alt"></i> Delete
                        </button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">No products found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
                </div>
            </div>
        </div>
        <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <form id="productForm" enctype="multipart/form-data" class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addProductModalLabel">Add New Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label>Name:</label>
                        <input type="text" name="name" class="form-control" required />
                        <span class="text-danger error-text name_error"></span>
                    </div>
                    <div class="form-group mb-3">
                        <label>Description:</label>
                        <textarea name="description" class="form-control" required></textarea>
                        <span class="text-danger error-text description_error"></span>
                    </div>
                    <div class="form-group mb-3">
                        <label>Image:</label>
                        <input type="file" name="image" class="form-control" accept="image/*" required />
                        <span class="text-danger error-text image_error"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Save Product</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit Product Modal -->
    <div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="editProductModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <form id="editProductForm" enctype="multipart/form-data" class="modal-content">
                <input type="hidden" name="product_id" id="editProductId">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProductModalLabel">Edit Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label>Name:</label>
                        <input type="text" name="name" id="editProductName" class="form-control" required />
                        <span class="text-danger error-text name_error"></span>
                    </div>
                    <div class="form-group mb-3">
                        <label>Description:</label>
                        <textarea name="description" id="editProductDescription" class="form-control"
                            required></textarea>
                        <span class="text-danger error-text description_error"></span>
                    </div>
                    <div class="form-group mb-3">
                        <label>Image:</label>

                        <!-- Image preview -->
                        <div id="image-preview" class="mb-2">
                            <img id="edit-preview-image" src="" alt="Current Image"
                                style="max-width: 200px; height: auto; display: none;" />
                        </div>

                        <!-- File input -->
                        <input type="file" name="image" class="form-control" accept="image/*" />
                        <span class="text-danger error-text image_error"></span>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Update Product</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Bootstrap Image Preview Modal -->
    <div class="modal fade" id="imagePreviewModal" tabindex="-1" aria-labelledby="imagePreviewLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-dark">
                <div class="modal-header border-0">
                    <h5 class="modal-title text-white" id="imagePreviewLabel">Image Preview</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <img id="previewImage" src="" alt="Preview" class="img-fluid rounded">
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Show image in modal
        $(document).on('click', '.product-img', function() {
             const imageUrl = $(this).attr('src');
             $('#previewImage').attr('src', imageUrl);
             $('#imagePreviewModal').modal('show');
        });
        
        // Add Product AJAX
        $('#productForm').submit(function(e) {
            e.preventDefault();
            let formData = new FormData(this);
            // Clear old errors
            $('.error-text').text('');
    
            $.ajax({
                url: "{{ route('product.store') }}",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                success: function(response) {
                    $('#message').html(`<div class="alert alert-success">${response.success}</div>`);
                    $('#productForm')[0].reset();
                    $('#addProductModal').modal('hide');
                    let newRow = `<tr id="product_${response.product.id}">
                        <td>${response.product.index}</td>
                        <td>${response.product.name}</td>
                        <td>${response.product.description}</td>
                        <td><img heigh=60px width=120px src="${response.product.image}" class="product-img" alt="Image"></td>
                        <td><button class="btn btn-warning btn-sm editProductBtn" data-id="${response.product.id}">Edit</button>
                        <button class="btn btn-danger btn-sm deleteProductBtn" data-id="${response.product.id}">Delete</button></td>
                    </tr>`;
                    // $('#productTable').append(newRow);
                    $('#productTable').prepend(newRow);
                },
                error: function(xhr) {
                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors;
                        $.each(errors, function(field, messages) {
                            $(`.error-text.${field}_error`).text(messages[0]);
                        });
                    } else {
                        $('#message').html(`<div class="alert alert-danger">Something went wrong.</div>`);
                    }
                }
            });
        });
    
        // Edit Product AJAX - Load Product Data into Modal
        $(document).on('click', '.editProductBtn', function() {
            let productId = $(this).data('id');
            
            $.ajax({
                url: `/products/${productId}/edit`,
                type: 'GET',
                success: function(response) {
                    $('#editProductId').val(response.product.id);
                    $('#editProductName').val(response.product.name);
                    $('#editProductDescription').val(response.product.description);
                    // Set the image preview
                    if (response.product.image) {
                        $('#edit-preview-image').attr('src', response.product.image).show();
                    } else {
                        $('#edit-preview-image').hide();
                    }
            
                    $('#editProductModal').modal('show');
                }
            });
        });
    
        // Update Product AJAX
        $('#editProductForm').submit(function(e) {
            e.preventDefault();
            let productId = $('#editProductId').val();
            let formData = new FormData(this);
    
            $.ajax({
                url: `/products/${productId}/update`,
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                success: function(response) {
                    $('#message').html(`<div class="alert alert-success">${response.success}</div>`);
                    $('#editProductForm')[0].reset();
                    $('#editProductModal').modal('hide');
                    $(`#product_${response.product.id} td:nth-child(2)`).text(response.product.name);
                    $(`#product_${response.product.id} td:nth-child(3)`).text(response.product.description);
                    $(`#product_${response.product.id} td:nth-child(4) img`).attr('src', response.product.image);
                },
                error: function(xhr) {
                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors;
                        $.each(errors, function(field, messages) {
                            $(`.error-text.${field}_error`).text(messages[0]);
                        });
                    } else {
                        $('#message').html(`<div class="alert alert-danger">Something went wrong.</div>`);
                    }
                }
            });
        });
    
        // Delete Product AJAX with Event Delegation
        $(document).on('click', '.deleteProductBtn', function(e) {
            e.preventDefault();
            const productId = $(this).data('id');
            
            Swal.fire({
                title: 'Are you sure?',
                text: 'This will delete the product permanently!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
            }).then(result => {
                if (result.isConfirmed) {
                    axios.delete(`/products/delete/${productId}`, {
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        }
                    })
                    .then(response => {
                        Swal.fire('Deleted!', response.data.success, 'success');
                        $(`#product_${productId}`).remove();
                    })
                    .catch(error => {
                        console.error(error);
                        Swal.fire('Error!', 'There was a problem deleting the product.', 'error');
                    });
                }
            });
        });
    </script>

@endsection
