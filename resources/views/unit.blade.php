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
                <div class="unitKerjaBox">
                    <div class="unitHeader">
                        <h2>Divisi 1</h2>
                        @if(Auth::user()->posisi == 'manajer')
                        <div class="headericons">
                            <i class='bx bx-edit' onclick="openModal('unitKerjaModal')"></i>
                            <i class='bx bx-trash'></i>
                        </div>
                        @endif
                    </div>
                    <div class="unitContent">
                        <div class="deskripsi">
                            <h3>Deskripsi Unit</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                        <div class="tugasPokok">
                            <h3>Tugas Pokok</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                        <div class="UIC">
                            <h3>Unit In Charge</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                        <div class="alamat">
                            <h3>Alamat</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal for editing Unit Kerja -->
    <div id="unitKerjaModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('unitKerjaModal')">&times;</span>
            <h3>Edit Unit Kerja</h3>
            <form action="#" method="POST">
                <label for="unitDeskripsi">Deskripsi Unit:</label>
                <textarea id="unitDeskripsi" name="unitDeskripsi" required>Lorem ipsum</textarea>
                <br>
                <label for="unitTugasPokok">Tugas Pokok:</label>
                <textarea id="unitTugasPokok" name="unitTugasPokok" required>Lorem ipsum</textarea>
                <br>
                <label for="unitUIC">Unit In Charge:</label>
                <input type="text" id="unitUIC" name="unitUIC" value="Lorem ipsum" required>
                <br>
                <label for="unitAlamat">Alamat:</label>
                <textarea id="unitAlamat" name="unitAlamat" required>Lorem ipsum</textarea>
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
            <form action="#" method="POST">
                <!-- Placeholder Form -->
                <label for="unitName">Unit Name:</label>
                <input type="text" id="unitName" name="unitName" required>
                <br>
                <label for="deskripsiUnit">Deskripsi Unit:</label>
                <textarea id="deskripsiUnit" name="deskripsiUnit" required></textarea>
                <br>
                <label for="tugasPokok">Tugas Pokok:</label>
                <textarea id="tugasPokok" name="tugasPokok" required></textarea>
                <br>
                <label for="unitInCharge">Unit In Charge:</label>
                <input type="text" id="unitInCharge" name="unitInCharge" required>
                <br>
                <label for="alamat">Alamat:</label>
                <textarea id="alamat" name="alamat" required></textarea>
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
    </script>

</body>
</html>
