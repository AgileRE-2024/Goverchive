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
        .edit-delete-tujuanit {
            display: flex;
            gap: 6px;
            align-items: center;
        }
        .edit-delete-tujuanit i{
            font-size: 12px;
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
            <div class="tujuanorganisasi">
                <div class="headertujuan">
                    <h2>Tujuan Organisasi</h2>
                    @if(Auth::user()->posisi == 'manajer')
                    <i class='bx bx-edit '  onclick="openModal('createTujuanOrganisasiModals')"></i>
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
                                        <td> <i class='bx bx-edit' data-id="{{ $item->id }}" onclick="openModal('edittujuanOrganisasiModals', {{ $item->id }})"></i> {{ $item->dimensi }}</td>
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
                                <th>Dimesi IT BSC</th>
                                <th>Tujuan Organisasi</th>
                                <th>Tujuan IT</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($allTujuanOrganisasi->isNotEmpty())
                                @foreach ($allTujuanIt as $item)
                                    <tr>
                                        <td>
                                            <div class="edit-delete-tujuanit">
                                                <i class='bx bx-edit' data-id="{{ $item->id }}" onclick="openModal('editTujuanIt', {{ $item->id }})"></i>
                                                <form action="{{route('organisasi.destroytujuanit', $item->id) }}" method="POST" onsubmit="return confirm('Delete?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit">
                                                        <i class='bx bx-trash'></i>
                                                    </button>
                                                </form>
                                                {{ $item->dimensi }}
                                            </div>
                                        </td>
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

    <!-- Modal for create Tujuan Organisasi -->


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
                <select id="egoal" name="egoal" required>
                    <!-- Financial -->
                    <option value="F1 : Stakeholder value of business investments">F1 : Stakeholder value of business investments</option>
                    <option value="F2 : Portfolio of competitive products and services">F2 : Portfolio of competitive products and services</option>
                    <option value="F3 : Managed business risk (safeguarding of assets)">F3 : Managed business risk (safeguarding of assets)</option>
                    <option value="F4 : Compliance with external laws and regulations">F4 : Compliance with external laws and regulations</option>
                    <option value="F5 : Financial transparency">F5 : Financial transparency</option>

                    <!-- Customer -->
                    <option value="C6 : Customer-oriented service culture">C6 : Customer-oriented service culture</option>
                    <option value="C7 : Business service continuity and availability">C7 : Business service continuity and availability</option>
                    <option value="C8 : Agile responses to a changing business environment">C8 : Agile responses to a changing business environment</option>
                    <option value="C9 : Information-based strategic decision making">C9 : Information-based strategic decision making</option>
                    <option value="C10 : Optimisation of service delivery costs">C10 : Optimisation of service delivery costs</option>

                    <!-- Internal -->
                    <option value="I11 : Optimisation of business process functionality">I11 : Optimisation of business process functionality</option>
                    <option value="I12 : Optimisation of business process costs">I12 : Optimisation of business process costs</option>
                    <option value="I13 : Managed business change programmes">I13 : Managed business change programmes</option>
                    <option value="I14 : Operational and staff productivity">I14 : Operational and staff productivity</option>
                    <option value="I15 : Compliance with internal policies">I15 : Compliance with internal policies</option>

                    <!-- Learning and Growth -->
                    <option value="L16 : Skilled and motivated people">L16 : Skilled and motivated people</option>
                    <option value="L17 : Product and business innovation culture">L17 : Product and business innovation culture</option>

                </select>
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

                <label for="dimensi">Dimensi BSC:</label>

                <select id="dimensi" name="dimensi" required>
                    <option value="F01">F01 : Alignment of IT and business strategy</option>
                    <option value="F02">F02 : IT Compliance and support for business compliance with external laws and regulations</option>
                    <option value="F03">F03 : Commitment of executive management for making IT-related decisions</option>
                    <option value="F04">F04 : Managed IT-related business risk</option>
                    <option value="F05">F05 : Realised benefits from IT-enabled investments and services portfolio</option>
                    <option value="F06">F06 : Transparency of IT costs, benefits and risk</option>
                    <option value="C01">C01 : Delivery of IT services in line with business requirements</option>
                    <option value="C02">C02 : Adequate use of applications, information and technology solutions</option>
                    <option value="I01">I01 : IT agility</option>
                    <option value="I02">I02 : Security of information, processing infrastructure and applications</option>
                    <option value="I03">I03 : Optimisation of IT assets, resources and capabilities</option>
                    <option value="I04">I04 : Enablement and support of business processes by integrating applications and technology into business processes</option>
                    <option value="I05">I05 : Delivery of programmes delivering benefits, on time, on budget, and meeting requirements and quality standards</option>
                    <option value="I06">I06 : Availability of reliable and useful information for decision making</option>
                    <option value="I07">I07 : IT compliance with internal policies</option>
                    <option value="G01">G01 : Competent and motivated business and IT personnel</option>
                    <option value="G02">G02 : Knowledge, expertise and initiatives for business innovation</option>
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

    <!-- Modal for editing Tujuan Organisasi -->
    <div id="edittujuanOrganisasiModals" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('edittujuanOrganisasiModals')">&times;</span>
            <h3>Edit Tujuan Organisasi</h3>

            <!-- Add id="editTujuanItForm" to the form so we can update its action dynamically -->
            <form id="editTujuanOrganisasiForm" action="{{ route('organisasi.updateTujuan', ':id') }}" method="POST">
                @method('PUT')
                @csrf
                <label for="dimensi">Dimensi:</label>
                <select id="dimensi" name="dimensi" required>
                    <option value="Financial" >Financial</option>
                    <option value="Customer" >Customer</option>
                    <option value="Internal Process" >Internal Process</option>
                    <option value="Learning">Learning</option>
                </select>
                <br>
                <label for="egoal">Enterprise Goal:</label>
                <select id="egoal" name="egoal" required>
                    <!-- Financial -->
                    <option value="F1 : Stakeholder value of business investments">F1 : Stakeholder value of business investments</option>
                    <option value="F2 : Portfolio of competitive products and services">F2 : Portfolio of competitive products and services</option>
                    <option value="F3 : Managed business risk (safeguarding of assets)">F3 : Managed business risk (safeguarding of assets)</option>
                    <option value="F4 : Compliance with external laws and regulations">F4 : Compliance with external laws and regulations</option>
                    <option value="F5 : Financial transparency">F5 : Financial transparency</option>

                    <!-- Customer -->
                    <option value="C6 : Customer-oriented service culture">C6 : Customer-oriented service culture</option>
                    <option value="C7 : Business service continuity and availability">C7 : Business service continuity and availability</option>
                    <option value="C8 : Agile responses to a changing business environment">C8 : Agile responses to a changing business environment</option>
                    <option value="C9 : Information-based strategic decision making">C9 : Information-based strategic decision making</option>
                    <option value="C10 : Optimisation of service delivery costs">C10 : Optimisation of service delivery costs</option>

                    <!-- Internal -->
                    <option value="I11 : Optimisation of business process functionality">I11 : Optimisation of business process functionality</option>
                    <option value="I12 : Optimisation of business process costs">I12 : Optimisation of business process costs</option>
                    <option value="I13 : Managed business change programmes">I13 : Managed business change programmes</option>
                    <option value="I14 : Operational and staff productivity">I14 : Operational and staff productivity</option>
                    <option value="I15 : Compliance with internal policies">I15 : Compliance with internal policies</option>

                    <!-- Learning and Growth -->
                    <option value="L16 : Skilled and motivated people">L16 : Skilled and motivated people</option>
                    <option value="L17 : Product and business innovation culture">L17 : Product and business innovation culture</option>

                </select>
                <br>
                <label for="tujuan-organisasi">Tujuan Organisasi:</label>
                <textarea id="tujuan-organisasi" name="tujuan-organisasi" required></textarea>
                <br>
                <button type="submit">Save</button>
            </form>
        </div>
    </div>


    <!-- Modal for editing Tujuan IT -->
    <div id="editTujuanIt" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('editTujuanIt')">&times;</span>
            <h3>Edit Tujuan IT</h3>

            <!-- Add id="editTujuanItForm" to the form so we can update its action dynamically -->
            <form id="editTujuanItForm" action="{{ route('organisasi.editTujuanIt', ':id') }}" method="POST">
                @method('PUT')
                @csrf
                <label for="dimensi">Dimensi BSC:</label>
                <select id="dimensi" name="dimensi" required>
                    <option value="F01">F01 : Alignment of IT and business strategy</option>
                    <option value="F02">F02 : IT Compliance and support for business compliance with external laws and regulations</option>
                    <option value="F03">F03 : Commitment of executive management for making IT-related decisions</option>
                    <option value="F04">F04 : Managed IT-related business risk</option>
                    <option value="F05">F05 : Realised benefits from IT-enabled investments and services portfolio</option>
                    <option value="F06">F06 : Transparency of IT costs, benefits and risk</option>
                    <option value="C01">C01 : Delivery of IT services in line with business requirements</option>
                    <option value="C02">C02 : Adequate use of applications, information and technology solutions</option>
                    <option value="I01">I01 : IT agility</option>
                    <option value="I02">I02 : Security of information, processing infrastructure and applications</option>
                    <option value="I03">I03 : Optimisation of IT assets, resources and capabilities</option>
                    <option value="I04">I04 : Enablement and support of business processes by integrating applications and technology into business processes</option>
                    <option value="I05">I05 : Delivery of programmes delivering benefits, on time, on budget, and meeting requirements and quality standards</option>
                    <option value="I06">I06 : Availability of reliable and useful information for decision making</option>
                    <option value="I07">I07 : IT compliance with internal policies</option>
                    <option value="G01">G01 : Competent and motivated business and IT personnel</option>
                    <option value="G02">G02 : Knowledge, expertise and initiatives for business innovation</option>
                </select>
                <br>
                <label for="tujuanorganisasi_id">Tujuan Organisasi</label>
                <select name="tujuanorganisasi_id" id="tujuanorganisasi_id">
                    @foreach ($allTujuanOrganisasi as $item)
                    <option value="{{ $item->id }}" {{ $tujuanit->tujuanorganisasi_id == $item->id ? 'selected' : '' }}>
                        {{ $item->{'tujuan-organisasi'} }}
                    </option>
                    @endforeach
                </select>
                <br>
                <label for="tujuanIt">Tujuan IT:</label>
                <textarea id="tujuanIt" name="tujuanIt" required></textarea>
                <br>
                <button type="submit">Save</button>
            </form>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        // Function to open the modal
        function openModal(modalId, itemId) {
            document.getElementById(modalId).style.display = "block";
            console.log("Opening modal for itemId:", itemId);


            // Update the form action dynamically based on modalId
            let formId, routeTemplate;
            if (modalId === "editTujuanIt") {
                formId = "editTujuanItForm";
                routeTemplate = "{{ route('organisasi.editTujuanIt', ':id') }}";
            } else if (modalId === "edittujuanOrganisasiModals") {
                formId = "editTujuanOrganisasiForm";
                routeTemplate = "{{ route('organisasi.updateTujuan', ':id') }}";
            }

            // Replace ':id' in the route template and update the form action
            if (formId) {
                let formAction = routeTemplate.replace(':id', itemId); // Replace ':id' with actual itemId
                document.getElementById(formId).action = formAction;
                console.log("Form action for modal:", formAction);
                 // Use formAction here
            }
        }
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
