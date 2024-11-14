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
                    <p>Coming Soon.</p>
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
    </script>

</body>
</html>
