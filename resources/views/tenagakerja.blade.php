    <!-- resources/views/tenagakerja.blade.php -->
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tenaga Kerja</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="overflow-hidden">
        <div class="navbar-layout bg-orange-400 h-16 px-6 flex items-center justify-between">
            <p>SJM Konveksi</p>
            <img src="/assets/sidebar-burger.png" class="h-10 cursor-pointer" id="toggle-sidebar">
        </div>

        <div class="flex">
            <div class="sidebar-layout bg-white px-6 transition-all duration-300 w-fit h-screen overflow-y-auto" id="sidebar">
                <div>
                    <div class="flex gap-3 py-6 items-center">
                        <img src="/assets/profile.png" class="h-12">
                        <div class="text-content">
                            <p>{{ Auth::user()->name }}</p>
                            <p>Administrator</p>
                        </div>
                    </div>
                    <div class="mb-4">
                        <p class="text-content">Menu Utama</p>
                        <div class="flex items-center gap-3">
                            <img src="/assets/bahan-baku.png" class="h-8 my-1 img-icon">
                            <a href="{{ route('bahan-baku.index') }}"><p class="text-content">Bahan Baku</p></a>
                        </div>
                        <div class="flex items-center gap-3">
                            <img src="/assets/pabrik.png" class="h-8 my-1 img-icon">
                            <a href="{{ route('overhead-pabrik.index') }}"><p class="text-content">Overhead Pabrik</p></a>
                        </div>
                        <div class="flex items-center gap-3">
                            <img src="/assets/person.png" class="h-8 my-1 img-icon">
                            <a href="{{ route('tenaga-kerja.index') }}"><p class="text-content">Tenaga Kerja</p></a>
                        </div>
                        <div class="flex items-center gap-3">
                            <img src="/assets/product.png" class="h-8 my-1 img-icon">
                            <p class="text-content">Produk</p>
                        </div>
                        <div class="flex items-center gap-3">
                            <img src="/assets/profile.png" class="h-8 my-1 img-icon">
                            <p class="text-content">HPP</p>
                        </div>
                    </div>
                    <div>
                        <p class="text-content">Laporan</p>
                        <div class="flex items-center gap-3">
                            <img src="/assets/laporan-bb.png" class="h-8 my-1 img-icon">
                            <p class="text-content">Laporan Bahan Baku</p>
                        </div>
                        <div class="flex items-center gap-3">
                            <img src="/assets/laporan-pabrik.png" class="h-8 my-1 img-icon">
                            <p class="text-content">Laporan Overhead Pabrik</p>
                        </div>
                        <div class="flex items-center gap-3">
                            <img src="/assets/laporan-person.png" class="h-8 my-1 img-icon">
                            <p class="text-content">Laporan Tenaga Kerja</p>
                        </div>
                        <div class="flex items-center gap-3">
                            <img src="/assets/laporan-produk.png" class="h-8 my-1 img-icon">
                            <p class="text-content">Laporan Produk</p>
                        </div>
                        <div class="flex items-center gap-3">
                            <img src="/assets/laporan-hpp.png" class="h-8 my-1 img-icon">
                            <p class="text-content">Laporan HPP</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-full p-6 bg-gray-200">
                <div class="flex items-center mb-6 bg-yellow-500 rounded-lg">
                    <div class="m-4">
                    <img src="/assets/person.png" alt="Icon" class="w-12 h-12">
                    </div>
                    <h1 class="text-2xl font-bold uppercase">Data Tenaga Kerja</h1>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-white shadow rounded-lg p-6 md:col-span-1">
                        <h2 class="text-lg font-semibold mb-4">Form Tenaga Kerja</h2>
                        <hr class="mb-4">
                        <form id="form-tenaga-kerja" method="POST">
                            @csrf
                            <input type="hidden" id="method" name="_method" value="POST">
                            <input type="hidden" id="bahan-baku-id" name="id" value="">
                            <div class="mb-4">
                                <label for="nama_tenaga_kerja" class="block text-sm font-medium mb-1">Nama Tenaga Kerja</label>
                                <input type="text" name="nama_tenaga_kerja" id="nama_tenaga_kerja" class="w-full border rounded px-3 py-2 text-sm">
                            </div>
                            <div class="mb-4">
                                <label for="upah" class="block text-sm font-medium mb-1">Upah / Bulan</label>
                                <input type="number" name="upah" id="upah" class="w-full border rounded px-3 py-2 text-sm">
                            </div>
                            <div class="mb-4">
                                <label for="bagian" class="block text-sm font-medium mb-1">Bagian</label>
                                <input type="text" name="bagian" id="bagian" class="w-full border rounded px-3 py-2 text-sm">
                            </div>
                            <div>
                                <button type="submit" class="bg-yellow-500 w-full text-black rounded px-4 py-2 text-sm hover:bg-yellow-600">Simpan</button>
                            </div>
                        </form>
                    </div>
                    <div class="bg-white shadow rounded-lg p-6 md:col-span-2">
                        <div class="flex justify-between items-center mb-4">
                            <h2 class="text-lg font-semibold">Tabel Daftar Tenaga Kerja</h2>
                            <input type="text" id="search" placeholder="Cari..." class="border rounded px-3 py-2 text-sm w-1/2">
                        </div>
                        <table class="w-full border-collapse border border-gray-300">
                            <thead class="bg-yellow-500 text-white text-center">
                                <tr>
                                    <th class="border border-gray-300 px-4 py-2 text-sm">KODE TENAGA KERJA</th>
                                    <th class="border border-gray-300 px-4 py-2 text-sm">NAMA TENAGA KERJA</th>
                                    <th class="border border-gray-300 px-4 py-2 text-sm">UPAH / BULAN</th>
                                    <th class="border border-gray-300 px-4 py-2 text-sm">BAGIAN</th>
                                    <th class="border border-gray-300 px-4 py-2 text-sm">AKSI</th>
                                </tr>
                            </thead>
                            <tbody id="tenaga-kerja-table-body">
                                @foreach($tenagaKerjas as $tenagaKerja)
                                <tr class="text-center">
                                    <td class="border border-gray-300 px-4 py-2 text-sm">{{ $tenagaKerja->kode_tenaga_kerja }}</td>
                                    <td class="border border-gray-300 px-4 py-2 text-sm">{{ $tenagaKerja->nama_tenaga_kerja }}</td>
                                    <td class="border border-gray-300 px-4 py-2 text-sm">Rp. {{ number_format($tenagaKerja->upah, 2) }}</td>
                                    <td class="border border-gray-300 px-4 py-2 text-sm">{{ $tenagaKerja->bagian }}</td>
                                    <td class="border border-gray-300 py-2 text-sm">
                                        <button onclick="editTenagaKerja({{ $tenagaKerja->id }})" class="text-blue-600 bg-blue-500 rounded-lg mx-1 p-1"><img src="/assets/pencil.png" class="w-3/4 mx-auto" alt=""></button>
                                        <form action="{{ route('tenaga-kerja.destroy', $tenagaKerja->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 bg-red-500 rounded-lg p-1 mx-1"><img src="/assets/trash.png" class="w-3/4 mx-auto" alt=""></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <script>
            document.getElementById('search').addEventListener('input', function () {
                const query = this.value;
                fetch(`/search-tenaga-kerja?query=${query}`)
                    .then(response => response.json())
                    .then(data => {
                        const tableBody = document.getElementById('tenaga-kerja-table-body');
                        tableBody.innerHTML = ''; // Clear existing rows
                        data.forEach(tenagaKerja => {
                            const row = `
                                <tr class="text-center">
                                    <td class="border border-gray-300 px-4 py-2 text-sm">${tenagaKerja.kode_tenaga_kerja}</td>
                                    <td class="border border-gray-300 px-4 py-2 text-sm">${tenagaKerja.nama_tenaga_kerja}</td>
                                    <td class="border border-gray-300 px-4 py-2 text-sm">Rp. ${parseFloat(tenagaKerja.upah).toLocaleString()}</td>
                                    <td class="border border-gray-300 px-4 py-2 text-sm">${tenagaKerja.bagian}</td>
                                    <td class="border border-gray-300 px-4 py-2 text-sm">
                                        <button onclick="editTenagaKerja(${tenagaKerja.id})" class="text-blue-600">Edit</button>
                                        <form action="/tenaga-kerja/${tenagaKerja.id}" method="POST" style="display: inline;">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <button type="submit" class="text-red-600">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            `;
                            tableBody.innerHTML += row;
                        });
                    })
                    .catch(error => console.error('Error:', error));
            });

            function editTenagaKerja(id) {
                fetch(`/tenaga-kerja/${id}`)
                    .then(response => response.json())
                    .then(data => {
                        document.getElementById('nama_tenaga_kerja').value = data.nama_tenaga_kerja;
                        document.getElementById('upah').value = data.upah;
                        document.getElementById('bagian').value = data.bagian;
                        document.getElementById('method').value = 'PUT';
                        document.getElementById('form-tenaga-kerja').action = `/tenaga-kerja/${id}`;
                    })
                    .catch(error => console.error('Error:', error));
            }

            const toggleSidebar = document.getElementById('toggle-sidebar');
            const sidebar = document.getElementById('sidebar');
            const textContents = sidebar.querySelectorAll('.text-content');
            const profileSidebar = document.getElementById('profile-sidebar');

            toggleSidebar.addEventListener('click', () => {
                textContents.forEach(text => {
                    text.classList.toggle('hidden');
                });
            });
        </script>
    </body>
    </html>