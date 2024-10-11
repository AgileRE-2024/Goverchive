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
                    <h1>Organisasi</h1>
                </div>
                <div class="profile">
                    <i class='bx bx-user-circle' ></i>
                </div>
            </div>
            <div class="visiorganisasi">
                <div class="visi">
                    <h2>Visi dan Misi Organisasi</h2>
                        <i class='bx bx-edit' onclick="openModal('visiModal')"></i>
                </div>
                <div class="visivisi">
                    <p id="visiContent">Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
                </div>
            </div>
            <div class="tujuanorganisasi">
                <div class="tujuan">
                    <h2>Tujuan Organisasi</h2>
                    <i class='bx bx-edit' onclick="openModal('tujuanOrganisasiModal')"></i>
                </div>
                <div class="tujuantujuan">
                    <p id="tujuanContent">Lorem ipsum dolor sit amet...</p>
                </div>
            </div>
            <div class="tujuanIT">
                <div class="headertujuan">
                    <h2>Tujuan IT</h2>
                    <i class='bx bx-edit' onclick="openModal('tujuanITModal')"></i>
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
                            <!-- Placeholder untuk data Tujuan IT -->
                            <tr>
                                <td>Financial</td>
                                <td>1</td>
                                <td>Provide a good return on investment of IT-enabled business investments.</td>
                            </tr>
                            <tr>
                                <td>Customer</td>
                                <td>4</td>
                                <td>Improve customer orientation and service.</td>
                            </tr>
                            <tr>
                                <td>Internal Process</td>
                                <td>12</td>
                                <td>Provide compliance with external laws, regulations, and contracts.</td>
                            </tr>
                            <tr>
                                <td>Learning</td>
                                <td>17</td>
                                <td>Acquire and maintain skilled and motivated people.</td>
                            </tr>
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
            <textarea id="visiTextarea">Lorem ipsum dolor sit amet, consectetur adipiscing elit...</textarea>
            <button onclick="saveChanges('visiContent', 'visiTextarea')">Save</button>
        </div>
    </div>

    <!-- Modal for editing Tujuan Organisasi -->
    <div id="tujuanOrganisasiModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('tujuanOrganisasiModal')">&times;</span>
            <h3>Edit Visi dan Misi</h3>
            <textarea id="tujuanOrganisasTextarea">Lorem ipsum dolor sit amet, consectetur adipiscing elit...</textarea>
            <button onclick="saveChanges('tujuanContent', 'tujuanOrganisasTextarea')">Save</button>
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
