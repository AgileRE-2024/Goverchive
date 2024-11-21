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
    <link rel="stylesheet" href="css/roadmap.css" />
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
                            <div class="tab2box">
                                <i class='bx bxs-group'></i>
                                <p>Unit Kerja</p>
                            </div>
                        </a>
                        <a href="/roadmap">
                            <div class="tab2box1">
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
                    <h1>Roadmap</h1>
                </div>
                <div class="profile">
                    <i class='bx bx-user-circle' ></i>
                </div>
            </div>
            <div class="divisi">
                <select id="divisionDropdown" onchange="showRoadmap()">
                    <option value="divisi1">DIVISI 1</option>
                    <option value="divisi2">DIVISI 2</option>
                    <option value="divisi3">DIVISI 3</option>
                </select>
            </div>
            <!-- Roadmap Content -->
            <div id="roadmapContent">
                <div id="divisi1" class="roadmapSection">
                    <h3>Roadmap Divisi 1</h3>
                    <!-- Button to add new row -->
                    <div>
                        <label for="section-select">Select Section to Add Program: </label>
                        <button onclick="openForm()">Add New</button>
                    </div>
                    
                    <form id="roadmap-form">
                        <table class="roadmap-table">
                            <thead>
                                <tr>
                                    <th colspan="10 " class="header-title">INISIATIF STRATEGIS ARSITEKTUR SPBE IPPD</th>
                                </tr>
                            </thead>
                            <thead>
                                <tr>
                                    <th>Referensi</th>
                                    <th rowspan="2">Indikator</th>
                                    <th colspan="2">Projek</th>
                                    <th rowspan="2">UIC</th>
                                    <th>Baseline</th>
                                    <th colspan="4">Target</th>
                                </tr>
                                <tr>
                                    <th>BSC*</th>
                                    <th>Program</th>
                                    <th>Kegiatan</th>
                                    <th>2022</th>
                                    <th>2023</th>
                                    <th>2023</th>
                                    <th>2024</th>
                                    <th>2024</th>
                                </tr>
                            </thead>
                            <thead>
                                <tr>
                                    <th colspan="11" id="tatakelola">Tata Kelola</th>
                                </tr>
                            </thead>
                            <tbody id="tatakelola-body"></tbody>
                            
                            <!-- Additional category sections -->
                            <thead>
                                <tr>
                                    <th colspan="11" id="manajemen">Manajemen</th>
                                </tr>
                            </thead>
                            <tbody id="manajemen-body"></tbody>
                            
                            <thead>
                                <tr>
                                    <th colspan="11" id="layanan">Layanan</th>
                                </tr>
                            </thead>
                            <tbody id="layanan-body">
                            </tbody>
                            
                            <thead>
                                <tr>
                                    <th colspan="11" id="aplikasi">Aplikasi</th>
                                </tr>
                            </thead>
                            <tbody id="aplikasi-body">
                            </tbody>

                            <thead>
                                <tr>
                                    <th colspan="11" id="infrastuktur">Infrastruktur</th>
                                </tr>
                            </thead>
                            <tbody id="infrastruktur-body">
                            </tbody>

                            <thead>
                                <tr>
                                    <th colspan="11" id="keamanan">Keamanan</th>
                                </tr>
                            </thead>
                            <tbody id="keamanan-body">
                            </tbody>

                            <thead>
                                <tr>
                                    <th colspan="11" id="audit">Audit TIK</th>
                                </tr>
                            </thead>
                            <tbody id="audit-body">
                            </tbody>
                            <!-- Add more categories as needed -->
                        </table>
                    <!-- Modal Form -->
                    <div id="formPopup" class="modal">
                        <div class="modal-content">
                            <span class="close-btn" onclick="closeForm()">&times;</span>
                            <h3>Add New Program</h3>
                            
                            <form id="roadmap-form" class="form-container">
                                <div class="roadmapform-content">
                                    <label for="kategori">Kategori:</label>
                                    <select id="kategori">
                                        <option value="tatakelola">Tata Kelola</option>
                                        <option value="manajemen">Manajemen</option>
                                        <option value="layanan">Layanan</option>
                                        <option value="aplikasi">Aplikasi</option>
                                        <option value="infrastruktur">Infrastruktur</option>
                                        <option value="keamanan">Keamanan</option>
                                        <option value="audit">Audit TIK</option>
                                    </select>
                                </div>

                                <div class="roadmapform-content">
                                    <label for="bsc">BSC:</label>
                                    <select id="bsc" 
                                    >
                                        <option value="F01">F01</option>
                                        <option value="C01">C01</option>
                                        <option value="I01">I01</option>
                                        <option value="G01">G01</option>
                                    </select>
                                </div>

                                <div class="roadmapform-content">
                                    <label for="indikator">Indikator:</label>
                                    <input type="text" id="indikator">
                                </div>

                                <div class="roadmapform-content">
                                    <label for="program">Program:</label>
                                    <input type="text" id="program">
                                </div>

                                <div class="roadmapform-content">
                                    <label for="kegiatan">Kegiatan:</label>
                                    <input type="text" id="kegiatan">
                                </div>
                                
                                <div class="roadmapform-content">
                                    <label for="uic">UIC:</label> <!-- New UIC Field -->
                                    <input type="text" id="uic">
                                </div>

                                <div class="roadmapform-content">
                                    <label for="baseline2022">Baseline 2022:</label>
                                    <input type="text" id="baseline2022">
                                </div>

                                <div class="roadmapform-content">
                                    <label for="target2023">Target 2023:</label>
                                    <input type="text" id="target2023">
                                </div>

                                <div class="roadmapform-content">
                                    <label for="target2024">Target 2024:</label>
                                    <input type="text" id="target2024">
                                </div>

                                <div class="roadmapform-content">
                                    <label for="target2025">Target 2025:</label>
                                    <input type="text" id="target2025">
                                </div>

                                <div class="roadmapform-content">
                                    <label for="target2026">Target 2026:</label>
                                    <input type="text" id="target2026">
                                </div>

                                <button type="button" onclick="addRow()">Add</button>
                            </form>
                        </div>
                    </div>

                    </form>
                        
                        <!-- Tombol submit -->
                        <button type="button" id="submit-table" onclick="submitTable()">Submit</button>
                    </form>
                    
                </div>
                <div id="divisi2" class="roadmapSection" style="display:none;">
                    <h3>Roadmap Divisi 2</h3>
                    <p>Coming Soon.</p>
                </div>
                <div id="divisi3" class="roadmapSection" style="display:none;">
                    <h3>Roadmap Divisi 3</h3>
                    <p>Coming Soon.</p>
                </div>
            </div>
        </div>
    </div>
                </div>
                <div id="divisi2" class="roadmapSection" style="display:none;">
                    <h3>Roadmap Divisi 2</h3>
                    <p>Coming Soon.</p>
                </div>
                <div id="divisi3" class="roadmapSection" style="display:none;">
                    <h3>Roadmap Divisi 3</h3>
                    <p>Coming Soon.</p>
                </div>
            </div>
        </div>
    </div>


    <!-- JavaScript -->
    <script>
        function showRoadmap() {
            // Hide all roadmap sections
            var roadmapSections = document.getElementsByClassName("roadmapSection");
            for (var i = 0; i < roadmapSections.length; i++) {
                roadmapSections[i].style.display = "none";
            }

            // Get the selected value from the dropdown
            var selectedDivision = document.getElementById("divisionDropdown").value;

            // Show the selected roadmap section
            document.getElementById(selectedDivision).style.display = "block";
        }

        // Function to open the form modal
        function openForm() {
            document.getElementById("formPopup").style.display = "block";
        }

        // Function to close the form modal
        function closeForm() {
            document.getElementById("formPopup").style.display = "none";
        }

        // Function to add a new row to the table
        function addRow() {
            const kategori = document.getElementById("kategori").value;
            const bsc = document.getElementById("bsc").value;
            const indikator = document.getElementById("indikator").value;
            const program = document.getElementById("program").value;
            const kegiatan = document.getElementById("kegiatan").value;
            const uic = document.getElementById("uic").value;
            const baseline2022 = document.getElementById("baseline2022").value;
            const target2023 = document.getElementById("target2023").value;
            const realisasi2023 = document.getElementById("target2024").value;
            const target2024 = document.getElementById("target2025").value;
            const realisasi2024 = document.getElementById("target2026").value;

            // Select the body element based on the chosen category
            const tableBody = document.getElementById(`${kategori}-body`);

            // Create a new row and cells with the data
            const newRow = document.createElement("tr");
            newRow.innerHTML = `
                <td>${bsc}</td>
                <td>${indikator}</td> <!-- Placeholder for Indikator -->
                <td>${program}</td>
                <td>${kegiatan}</td>
                <td>${uic}</td> <!-- Placeholder for UIC -->
                <td>${baseline2022}</td>
                <td>${target2023}</td>
                <td>${realisasi2023}</td>
                <td>${target2024}</td>
                <td>${realisasi2024}</td>
            `;

            // Append the row to the selected category's body
            tableBody.appendChild(newRow);

            // Close the form modal
            closeForm();
        }

        document.querySelectorAll('.placeholder').forEach(cell => {
            cell.addEventListener('focus', function() {
                if (this.innerText === this.getAttribute('data-placeholder')) {
                    this.innerText = '';
                    this.style.color = 'black';
                    this.style.fontStyle = 'normal';
                }
            });

            cell.addEventListener('blur', function() {
                if (this.innerText.trim() === '') {
                    this.innerText = this.getAttribute('data-placeholder');
                    this.style.color = 'rgba(0, 0, 0, 0.3)';
                    this.style.fontStyle = 'italic';
                } else {
                    this.style.color = 'black'; // Ensures user-added content appears in default color
                }
            });
        });

    </script>

</body>
</html>