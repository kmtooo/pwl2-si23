<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Transaction</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: lightgray">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">Data Transaction</h3>
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <a href="{{ route('transaction.create') }}" class="btn btn-md btn-success mb-3">ADD TRANSACTION</a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Date</th>
                                    <th scope="col">Cashier Name</th>
                                    <th scope="col">Product Title</th>
                                    <th scope="col">Product Category</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Total</th>
                                    <th scope="col" style="width: 20%">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data as $transaction)
                                    <tr>
                                        <td>{{ $transaction->tanggal_transaksi }}</td>
                                        <td>{{ $transaction->nama_kasir }}</td>

                                        <td>{{ $transaction->title ? $transaction->title : 'Produk tidak ditemukan' }}</td>
                                        <td>{{ $transaction->product_category_name ? $transaction->product_category_name : 'Kategori Produk tidak ditemukan' }}</td>

                                        {{-- Cek apakah harga produk ada --}}
                                        <td>{{ "Rp " . number_format($transaction->price, 2, ',', '.')}}</td>
                                        <td>{{ $transaction->jumlah_pembelian }}</td>
                                        
                                        {{-- Cek total harga --}}
                                        <td>{{"Rp " . number_format($transaction->price * $transaction->jumlah_pembelian, 2, ',', '.')}}</td>
                                        
                                        <td class="text-center">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('transaction.destroy', $transaction->id) }}" method="POST">
                                                <a href="{{ route('transaction.show', $transaction->id) }}" class="btn btn-sm btn-dark">SHOW</a>
                                                <a href="{{ route('transaction.edit', $transaction->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">DELETE</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center">Data transaction belum tersedia.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $data->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // Message with SweetAlert
        @if(session('success'))
            Swal.fire({
                icon: "success",
                title: "BERHASIL",
                text: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @elseif(session('error'))
            Swal.fire({
                icon: "error",
                title: "GAGAL",
                text: "{{ session('error') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @endif
    </script>

</body>
</html>
