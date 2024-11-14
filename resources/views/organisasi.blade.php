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
    <link rel="stylesheet" href="css/organisasi.css" />
    <style>
        /* Modal container (hidden by default) */
        .modal {
            display: none; /* Hidden by default */
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.4); /* Black background with opacity */
        }

        /* Modal content */
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 50%; /* Set a specific width */
        }

        /* Close button */
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover, .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        textarea {
            width: 100%;
            height: 100px;
            margin-bottom: 10px;
        }
    </style>
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
                            <div class="tab2box1">
                                <i class='bx bx-home-alt' ></i>
                                <p>Organisasi</p>
                            </div>
                        </a>
                        <a href="/unit">
                            <div class="tab2box">
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
                    <form action="/logout" method="POST">
                        @csrf
                        <div class="tab2box">
                            <i class='bx bx-log-out-circle' ></i>
                            <button>logout</button>
                        </div>
                    </form>
                </div>
            </div>
        </aside>
        <div class="main">
            <div class="judul">
                <div class="nama">
                    <h1>Organisasi</h1>
                </div>
                <div class="profile">
                    <i class='bx bx-user-circle' ></i>
                </div>
            </div>
            <div class="visiorganisasi">
                <div class="visi">
                    <h2>Visi dan Misi Organisasi</h2>
                    @if(Auth::user()->posisi == 'manajer')
                        <i class='bx bx-edit' onclick="openModal('visiModal')"></i>
                    @endif

                </div>
                <div class="visivisi">
                    <h3>Visi</h3>
                    <p id="visiContent">{{ $unitUtama->visi ?? 'Visi belum diatur.' }}</p>
                    <h3>Misi</h3>
                    <p id="misiContent">{{ $unitUtama->misi ?? 'Misi belum diatur.' }}</p>
                </div>

            </div>
            <div class="tujuanIT">
                <div class="headertujuan">
                    <h2>Tujuan Organisasi</h2>
                    @if(Auth::user()->posisi == 'manajer')
                    <i class='bx bx-edit' onclick="openModal('createTujuanOrganisasiModals')"></i>
                    @endif
                </div>
                <div class="tujuanIT2">
                    <table id="tujuanITTable" class="custom-table">
                        <thead>
                            <tr>
                                <th>Dimensi</th>
                                <th>Enterprise Goal</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($allTujuanOrganisasi->isNotEmpty())
                                @foreach ($allTujuanOrganisasi as $item)
                                    <tr>
                                        <td> <i class='bx bx-edit' onclick="openModal('tujuanOrganisasiModals')"></i> {{ $item->dimensi }}</td>
                                        <td>{{ $item->egoal }}</td>
                                        <td>{{ $item->{'tujuan-organisasi'} }} </td>

                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="3">No records found.</td>
                                </tr>
                            @endif

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="tujuanIT">
                <div class="headertujuan">
                    <h2>Tujuan IT</h2>
                    @if(Auth::user()->posisi == 'manajer')
                    <i class='bx bx-edit' onclick="openModal('createTujuanItModals')"></i>
                    @endif
                </div>

                <div class="tujuanIT2">
                    <table id="tujuanITTable" class="custom-table">
                        <thead>
                            <tr>
                                <th>Category</th>
                                <th>No</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($allTujuanOrganisasi->isNotEmpty())
                                @foreach ($allTujuanIt as $item)
                                    <tr>
                                        <td> <i class='bx bx-edit' onclick="openModal('tujuanOrganisasiModals')"></i> {{ $item->dimensi }}</td>
                                        <td>{{ $item->tujuanOrganisasi->{'tujuan-organisasi'} }}</td>
                                        <td>{{ $item->tujuanIt }} </td>

                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="3">No records found.</td>
                                </tr>
                            @endif

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for editing Visi dan Misi -->
    <div id="visiModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('visiModal')">&times;</span>
            <h3>Edit Visi dan Misi</h3>
            <form action="{{ $unitUtama ? route('organisasi.updateVisiMisi', $unitUtama->id) : route('organisasi.storeVisiMisi') }}" method="POST">
                @csrf
                @if($unitUtama)
                    @method('PUT')
                @endif
                <div>
                    <label for="visiTextarea">Visi:</label>
                    <textarea name="visi" id="visiTextarea">{{ $unitUtama->visi ?? '' }}</textarea>
                </div>
                <div>
                    <label for="misiTextarea">Misi:</label>
                    <textarea name="misi" id="misiTextarea">{{ $unitUtama->misi ?? '' }}</textarea>
                </div>
                <button type="submit">Save</button>
            </form>
            @if ($unitUtama)
            <form action="{{ route('organisasi.destroyVisiMisi', $unitUtama->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                @csrf
                @method('DELETE')
                <button type="submit"
                onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Delete</button>
            </form>
        @endif

        </div>
    </div>

    <!-- Modal for editing Tujuan Organisasi -->


    <div id="createTujuanOrganisasiModals" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('createTujuanOrganisasiModals')">&times;</span>
            <h3>Create Tujuan Organisasi</h3>
            <form action="{{ route('organisasi.storeTujuan') }}" method="POST">
                @csrf

                <label for="dimensi">Dimensi:</label>

                <select id="dimensi" name="dimensi" required>
                    <option value="Financial">Financial</option>
                    <option value="Customer">Customer</option>
                    <option value="Internal Process">Internal Process</option>
                    <option value="Learning">Learning</option>
                </select>
                <br>

                <label for="egoal">Enterprise Goal:</label>
                <input type="text" id="egoal" name="egoal" required>
                <br>

                <label for="tujuan-organisasi">Tujuan Organisasi:</label>
                <textarea id="tujuan-organisasi" name="tujuan-organisasi" required></textarea>
                <br>

                <button type="submit">Save</button>
            </form>
        </div>
    </div>

    <div id="createTujuanItModals" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('createTujuanItModals')">&times;</span>
            <h3>Create Tujuan It</h3>
            <form action="{{ route('organisasi.storeTujuanIt') }}" method="POST">
                @csrf

                <label for="dimensi">Dimensi:</label>

                <select id="dimensi" name="dimensi" required>
                    <option value="Financial">Financial</option>
                    <option value="Customer">Customer</option>
                    <option value="Internal Process">Internal Process</option>
                    <option value="Learning">Learning</option>
                </select>
                <br>

                <label for="tujuanorganisasi_id">Tujuan Organisasi</label>

                <select name="tujuanorganisasi_id" id="tujuanorganisasi_id">
                    @foreach ($allTujuanOrganisasi as $item)
                        <option value="{{ $item->id }}">{{ $item->{'tujuan-organisasi'} }}</option>
                    @endforeach
                </select>
                <br>

                <label for="tujuanIt">Tujuan It:</label>
                <textarea id="tujuanIt" name="tujuanIt" required></textarea>
                <br>

                <button type="submit">Save</button>
            </form>
        </div>
    </div>


    <!-- Modal for editing Tujuan IT -->
    <div id="tujuanITModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('tujuanITModal')">&times;</span>
            <h3>Edit Tujuan IT</h3>
            <form action="#" method="POST">
                <!-- Form belum tersambung, hanya placeholder -->
                <label for="category">Category:</label>
                <select id="category" name="category" required>
                    <option value="Financial">Financial</option>
                    <option value="Customer">Customer</option>
                    <option value="Internal Process">Internal Process</option>
                    <option value="Learning">Learning</option>
                </select>
                <br>
                <label for="number">Number:</label>
                <input type="number" id="number" name="number" required>
                <br>
                <label for="description">Tujuan IT:</label>
                <textarea id="description" name="description" required></textarea>
                <br>
                <button type="submit">Save</button>
            </form>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        // Function to open the modal
        function openModal(modalId) {
            document.getElementById(modalId).style.display = "block";
        }

        // Function to close the modal
        function closeModal(modalId) {
            document.getElementById(modalId).style.display = "none";
        }

        // Function to save the changes
        function saveChanges(contentId, textareaId) {
            var content = document.getElementById(textareaId).value;
            document.getElementById(contentId).innerText = content;
            closeModal(textareaId.replace("Textarea", "Modal"));
        }
    </script>
</body>
</html>
