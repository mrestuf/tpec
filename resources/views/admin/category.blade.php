<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
      <!-- partial -->
        @include('admin.navbar')
        <!-- partial -->

        <div class="main-panel">
            <div class="content-wrapper">
              @if(session()->has('success'))
              <div class="alert alert-success">
                <button class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{ session()->get('success') }}
              </div>
              @endif

                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <h4 class="card-title">ADD CATEGORY</h4>
                        <form class="forms-sample" action="{{ url('/add_category') }}" method="post">
                          @csrf
                          <div class="form-group">
                            <label for="nama_kategori">Category Name</label>
                            <input style="color:black" type="text" class="form-control" id="nama_kategori" name="nama_kategori" placeholder="Masukkan Kategori">
                          </div>
                          <button type="submit" class="btn btn-primary mr-2">Submit</button>
                          <button class="btn btn-dark">Cancel</button>
                        </form>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <h4 class="card-title">LIST CATEGORY</h4>
                        <div class="table-responsive">
                          <table class="table">
                            <thead>
                              <tr>
                                <th>Nama Kategori</th>
                                <th>Aksi</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($data as $kategori)
                              <tr>
                                <td>{{ $kategori->nama_kategori }}</td>
                                <td><a onclick ="return confirm('Are you sure?')" class="btn btn-danger"href="{{ url('delete_category',$kategori->id) }}">Delete</a></td>
                              </tr>
                              @endforeach
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>

            </div>
        </div>

    <!-- container-scroller -->
        @include('admin.script')
  </body>
</html>