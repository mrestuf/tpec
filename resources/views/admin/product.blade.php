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
                        <h4 class="card-title">ADD PRODUCT</h4>
                        <form class="forms-sample" action="{{ url('/add_product') }}" method="post" enctype="multipart/form-data">
                          @csrf
                          <div class="form-group">
                            <label for="nama_product">Product Name</label>
                            <input style="color:black" type="text" class="form-control" id="nama_product" name="nama_product" placeholder="Masukkan Nama Produk">
                            <label for="deskripsi">Product Description</label>
                            <input style="color:black" type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Masukkan Deskripsi Produk">
                            <label for="harga">Product Price</label>
                            <input style="color:black" type="number" class="form-control" id="harga" name="harga" placeholder="Masukkan Harga Produk">
                            <label for="qty">Product Quantity</label>
                            <input style="color:black" type="number" class="form-control" id="qty" name="qty" min="0" placeholder="Masukkan Kuantitas Produk">
                        </br>
                            <label for="kategori">Product Category</label>
                            <select style="color:black" name="kategori" id="kategori">

                                @foreach($kategori as $kategori)
                                <option style="color:black" value="{{ $kategori->nama_kategori }}">{{ $kategori->nama_kategori }}</option>
                                @endforeach
                            </select>
                        </br></br></br>
                            <label for="image">Product Image</label>
                            <input type="file" class="form-control" id="image" name="image">
                          </div>
                          <button type="submit" class="btn btn-primary mr-2">Submit</button>
                          <button class="btn btn-dark">Cancel</button>
                        </form>
                      </div>
                    </div>
                  </div>

            </div>
        </div>
    <!-- container-scroller -->
        @include('admin.script')
  </body>
</html>