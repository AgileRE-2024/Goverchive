<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="css/unit.css" />
    <title>Goverchive</title>
</head>
<body>
    <div class="container">
        <aside>
            <div class="sidebar">
                <div class="uptab">
                    <div class="tab1">
                        <h1>Goverchive</h1>
                    </div>
                    <div class="tab2">
                        <a href="/organisasi">
                            <div class="tab2box">
                                <i class='bx bx-home-alt' ></i>
                                <p>Organisasi</p>
                            </div>
                        </a>
                        <a href="/unit">
                            <div class="tab2box1">
                                <i class='bx bxs-group'></i>
                                <p>Unit Kerja</p>
                            </div>
                        </a>
                        <a href="/roadmap">
                            <div class="tab2box">
                                <i class='bx bx-map-alt'></i>
                                <p>Roadmap</p>
                            </div>
                        </a>
                        <a href="/histori">
                            <div class="tab2box">
                                <i class='bx bx-history'></i>
                                <p>History</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="tab3">
                    <a href="#">
                        <div class="tab2box">
                            <i class='bx bx-log-out-circle' ></i>
                            <p>Logout</p>
                        </div>
                    </a>
                </div>
            </div>
        </aside>
        <div class="main">
            <div class="judul">
                <div class="nama">
                    <h1>Unit Kerja</h1>
                </div>
                <div class="profile">
                    <i class='bx bx-user-circle' ></i>
                </div>
            </div>
            @if(Auth::user()->posisi == 'manajer')
            <div class="editbtn" onclick="openModal('newUnitModal')">
                <p>New Unit</p>
                <i class='bx bx-add-to-queue'></i>
            </div>
            @endif

            <!-- Unit Kerja -->
            <div class="unitkerja">
            @if($unit->isEmpty())
                <p>Tidak ada data unit kerja yang tersedia.</p>
            @else
                @foreach ($unit as $item)
                <div class="unitKerjaBox">
                    <div class="unitHeader">
                        <h2>{{$item->nama_divisi}}</h2>
                        @if(Auth::user()->posisi == 'manajer')
                        <div class="headericons">
                            <i class='bx bx-edit' onclick="openEditModal(event, {{ $item->id }})"
                                data-id="{{ $item->id }}"
                                data-nama-divisi="{{ $item->nama_divisi }}"
                                data-deskripsi-unit="{{ $item->deskripsi_unit }}"
                                data-tugas-pokok="{{ $item->tugas_pokok }}"
                                data-uic="{{ $item->uic }}"
                                data-alamat="{{ $item->alamat }}"></i>
                            <form action="{{route('unit.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Delete?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" data-id="{{ $item->id }}">
                                    <i class='bx bx-trash'></i>
                                </button>
                            </form>
                        </div>
                        @endif
                    </div>

                    <div class="unitContent">
                        <div class="deskripsi">
                            <h3>Deskripsi Unit</h3>
                            <p>{{$item->deskripsi_unit}}</p>
                        </div>
                        <div class="tugasPokok">
                            <h3>Tugas Pokok</h3>
                            <p>{{$item->tugas_pokok}}</p>
                        </div>
                        <div class="UIC">
                            <h3>Unit In Charge</h3>
                            <p>{{$item->uic}}</p>
                        </div>
                        <div class="alamat">
                            <h3>Alamat</h3>
                            <p>{{$item->alamat}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            @endif
            </div>
        </div>
    </div>
    <!-- Modal for editing Unit Kerja -->
    <div id="unitKerjaModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('unitKerjaModal')">&times;</span>
            <h3>Edit Unit Kerja</h3>
            <form action="{{ route('unit.update', ':id') }}" method="POST" id="editForm">
                @csrf
                @method('PUT')
                <label for="unitDeskripsi">Deskripsi Unit:</label>
                <textarea id="editDeskripsiUnits" name="deskripsi_unit" required></textarea>
                <br>
                <label for="unitTugasPokok">Tugas Pokok:</label>
                <textarea id="editTugasPokoks" name="tugas_pokok" required></textarea>
                <br>
                <label for="unitUIC">Unit In Charge:</label>
                <input type="text" id="editUICs" name="uic" required>
                <br>
                <label for="unitAlamat">Alamat:</label>
                <textarea id="editAlamats" name="alamat" required></textarea>
                <br>
                <button type="submit">Save</button>
            </form>
        </div>
    </div>

    <!-- Modal for adding a new Unit Kerja -->
    <div id="newUnitModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('newUnitModal')">&times;</span>
            <h3>Add New Unit Kerja</h3>
            <form action="{{route('unit.store')}}" method="POST">
                @csrf
                <!-- Placeholder Form -->
                <label for="unitName">Unit Name:</label>
                <input type="text" id="nama_divisi" name="nama_divisi" required>
                <br>
                <label for="deskripsiUnit">Deskripsi Unit:</label>
                <textarea id="deskripsi_units" name="deskripsi_unit" required></textarea>
                <br>
                <label for="tugasPokok">Tugas Pokok:</label>
                <textarea id="tugas_pokoks" name="tugas_pokok" required></textarea>
                <br>
                <label for="unitInCharge">Unit In Charge:</label>
                <input type="text" id="uics" name="uic" required>
                <br>
                <label for="alamat">Alamat:</label>
                <textarea id="alamats" name="alamat" required></textarea>
                <br>
                <button type="submit">Save</button>
            </form>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        function openModal(modalId) {
        document.getElementById(modalId).style.display = 'block';
    }
    // Close modal
    function closeModal(modalId) {
        document.getElementById(modalId).style.display = 'none';
    }

    function openEditModal(event, id) {
    const editButton = event.currentTarget;
    const namaDivisi = editButton.dataset.namaDivisi;
    const deskripsiUnit = editButton.dataset.deskripsiUnit;
    const tugasPokok = editButton.dataset.tugasPokok;
    const uic = editButton.dataset.uic;
    const alamat = editButton.dataset.alamat;

    document.getElementById('editDeskripsiUnit').value = deskripsiUnit;
    document.getElementById('editTugasPokok').value = tugasPokok;
    document.getElementById('editUIC').value = uic;
    document.getElementById('editAlamat').value = alamat;

    const form = document.getElementById('editForm');
    form.action = form.action.replace(':id', id);  // Replace the placeholder with the actual ID

    // Debugging: Log values to ensure they're correct
    console.log('Form Action:', form.action);
    console.log('Nama Divisi:', namaDivisi);
    console.log('Deskripsi Unit:', deskripsiUnit);
    console.log('Tugas Pokok:', tugasPokok);

    openModal('unitKerjaModal');
}



    </script>

</body>
</html>
