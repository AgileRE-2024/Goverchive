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
                <select id="divisionDropdown" onchange="filterByDivision()">
                    @foreach ($unitkerja as $index => $item)
                        <option value="{{$item->id}}" {{ $index === 0 ? 'selected' : '' }}>{{$item->nama_divisi}}</option>
                    @endforeach

                </select>
            </div>
            <button onclick="opentahunForm()">Tambah Tahun</button>
            <div class="divisi" style="margin-top: 20px">
                <select id="tahunDropdown" onchange="filterByYear()">
                    @foreach ($tahun_roadmap as $index => $item)
                    <option value="{{$item->id}}" {{ $index === 0 ? 'selected' : '' }}>{{$item->tahun}}</option>
                @endforeach

                </select>
            </div>

            <button onclick="deleteSelectedYear()">Delete Tahun</button>


            <!-- Roadmap Content -->
            <div id="roadmapContent">
                <div id="divisi1" class="roadmapSection">
                    <h3>Roadmap Divisi 1</h3>
                    <!-- Button to add new row -->
                    <div>
                        <label for="section-select">Tambahkan Program : </label>
                        <button onclick="openForm()">Add New</button>
                        <form action="{{ route('roadmap.export',  ['tahunRoadmap' => ':year']) }}" method="GET">
                            <button type="submit" class="btn btn-success">Export Roadmap <span class="selectedYear"></span></button>
                        </form>
                    </div>


                    <table class="roadmap-table" id="roadmapTable">
                        <thead>
                            <tr>
                                <th colspan="11 " class="header-title">INISIATIF STRATEGIS ARSITEKTUR SPBE IPPD</th>
                            </tr>
                        </thead>
                        <thead>
                            <tr>
                                <th>Referensi</th>
                                <th rowspan="2">Indikator</th>
                                <th colspan="2">Projek</th>
                                <th rowspan="2">UIC</th>
                                <th>Baseline</th>
                                <th>Target</th>
                                <th>Realisasi</th>
                                <th>Target</th>
                                <th>Realisasi</th>
                                <th rowspan="2">Aksi</th>

                                </tr>
                                <tr>
                                    <th>IT Goals</th>
                                    <th>Program</th>
                                    <th>Kegiatan</th>

                                    <th><span class="selectedYear"></span></th>
                                    <th><span class="nextYear"></th>
                                    <th><span class="nextYear"></th>
                                    <th><span class="nextNextYear"></th>
                                    <th><span class="nextNextYear"</th>

                                </tr>
                            </thead>
                            <thead>
                                <tr>
                                    <th colspan="11" id="tatakelola">Tata Kelola</th>
                                </tr>
                            </thead>
                            <tbody id="tatakelola-body">
                                @foreach ($roadmaps->where('kategori', 'tatakelola') as $roadmap)
                                <tr data-tahun-roadmap="{{ $roadmap->tahun_roadmap }}" data-uic="{{ $roadmap->uic }}" >
                                    <td>{{ $roadmap->tujuanIts->tujuanIt ?? '-' }}</td>
                                    <td>{{ $roadmap->indikator ?? '-' }}</td>
                                    <td>{{ $roadmap->program ?? '-' }}</td>
                                    <td>{{ $roadmap->kegiatan ?? '-' }}</td>
                                    <td>{{ $roadmap->unitKerja->nama_divisi ?? '-' }}</td>
                                    <td>{{ $roadmap->baseline ?? '-' }}</td>
                                    <td>{{ $roadmap->target ?? '-' }}</td>
                                    <td>{{ $roadmap->realisasi ?? '-' }}</td>
                                    <td>{{ $roadmap->target_2 ?? '-' }}</td>
                                    <td>{{ $roadmap->realisasi_2 ?? '-' }}</td>
                                    <td>
                                        <!-- Tombol Aksi -->
                                        <button  onclick="openEditModal(event, {{ $roadmap->id }})"
                                            data-id="{{ $roadmap->id }}"
                                            data-tujuanit="{{ $roadmap->tujuanIts }}"
                                            data-indikator="{{ $roadmap->indikator }}"
                                            data-program="{{ $roadmap->program }}"
                                            data-unitkerja="{{ $roadmap->unitKerja }}"
                                            data-baseline="{{ $roadmap->baseline }}"
                                            data-target="{{ $roadmap->target }}"
                                            data-realisasi="{{ $roadmap->realisasi }}"
                                            data-target-2="{{ $roadmap->target_2 }}"
                                            data-realisasi-2="{{ $roadmap->realisasi_2 }}"
                                            >
                                            Edit
                                        </button>
                                        <form action="{{route('roadmap.destroy', $roadmap->id)}}" method="POST" onsubmit="return confirm('Delete?')">
                                            @csrf
                                            @method('DELETE')
                                            <button  type="submit">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>

                            <!-- Additional category sections -->
                            <thead>
                                <tr>
                                    <th colspan="11" id="manajemen">Manajemen</th>
                                </tr>
                            </thead>
                            <tbody id="manajemen-body">
                                @foreach ($roadmaps->where('kategori', 'manajemen') as $roadmap)
                                <tr data-tahun-roadmap="{{ $roadmap->tahun_roadmap }}" data-uic="{{ $roadmap->uic }}" >
                                    <td>{{ $roadmap->tujuanIts->tujuanIt ?? '-' }}</td>
                                    <td>{{ $roadmap->indikator ?? '-' }}</td>
                                    <td>{{ $roadmap->program ?? '-' }}</td>
                                    <td>{{ $roadmap->kegiatan ?? '-' }}</td>
                                    <td>{{ $roadmap->unitKerja->nama_divisi ?? '-' }}</td>
                                    <td>{{ $roadmap->baseline ?? '-' }}</td>
                                    <td>{{ $roadmap->target ?? '-' }}</td>
                                    <td>{{ $roadmap->realisasi ?? '-' }}</td>
                                    <td>{{ $roadmap->target_2 ?? '-' }}</td>
                                    <td>{{ $roadmap->realisasi_2 ?? '-' }}</td>
                                    <td>
                                        <!-- Tombol Aksi -->
                                        <button  onclick="openEditModal(event, {{ $roadmap->id }})"
                                            data-id="{{ $roadmap->id }}"
                                            data-tujuanit="{{ $roadmap->tujuanIts }}"
                                            data-indikator="{{ $roadmap->indikator }}"
                                            data-program="{{ $roadmap->program }}"
                                            data-unitkerja="{{ $roadmap->unitKerja }}"
                                            data-baseline="{{ $roadmap->baseline }}"
                                            data-target="{{ $roadmap->target }}"
                                            data-realisasi="{{ $roadmap->realisasi }}"
                                            data-target-2="{{ $roadmap->target_2 }}"
                                            data-realisasi-2="{{ $roadmap->realisasi_2 }}"
                                            >
                                            Edit
                                        </button>
                                        <form action="{{route('roadmap.destroy', $roadmap->id)}}" method="POST" onsubmit="return confirm('Delete?')">
                                            @csrf
                                            @method('DELETE')
                                            <button  type="submit">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>

                            <thead>
                                <tr>
                                    <th colspan="11" id="layanan">Layanan</th>
                                </tr>
                            </thead>
                            <tbody id="layanan-body">
                                @foreach ($roadmaps->where('kategori', 'layanan') as $roadmap)
                                <tr data-tahun-roadmap="{{ $roadmap->tahun_roadmap }}" data-uic="{{ $roadmap->uic }}">
                                    <td>{{ $roadmap->tujuanIts->tujuanIt ?? '-' }}</td>
                                    <td>{{ $roadmap->indikator ?? '-' }}</td>
                                    <td>{{ $roadmap->program ?? '-' }}</td>
                                    <td>{{ $roadmap->kegiatan ?? '-' }}</td>
                                    <td>{{ $roadmap->unitKerja->nama_divisi ?? '-' }}</td>
                                    <td>{{ $roadmap->baseline ?? '-' }}</td>
                                    <td>{{ $roadmap->target ?? '-' }}</td>
                                    <td>{{ $roadmap->realisasi ?? '-' }}</td>
                                    <td>{{ $roadmap->target_2 ?? '-' }}</td>
                                    <td>{{ $roadmap->realisasi_2 ?? '-' }}</td>
                                    <td>
                                        <!-- Tombol Aksi -->
                                        <button  onclick="openEditModal(event, {{ $roadmap->id }})"
                                            data-id="{{ $roadmap->id }}"
                                            data-tujuanit="{{ $roadmap->tujuanIts }}"
                                            data-indikator="{{ $roadmap->indikator }}"
                                            data-program="{{ $roadmap->program }}"
                                            data-unitkerja="{{ $roadmap->unitKerja }}"
                                            data-baseline="{{ $roadmap->baseline }}"
                                            data-target="{{ $roadmap->target }}"
                                            data-realisasi="{{ $roadmap->realisasi }}"
                                            data-target-2="{{ $roadmap->target_2 }}"
                                            data-realisasi-2="{{ $roadmap->realisasi_2 }}"
                                            >
                                            Edit
                                        </button>
                                        <form action="{{route('roadmap.destroy', $roadmap->id)}}" method="POST" onsubmit="return confirm('Delete?')">
                                            @csrf
                                            @method('DELETE')
                                            <button  type="submit">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>

                            <thead>
                                <tr>
                                    <th colspan="11" id="aplikasi">Aplikasi</th>
                                </tr>
                            </thead>
                            <tbody id="aplikasi-body">
                                @foreach ($roadmaps->where('kategori', 'aplikasi') as $roadmap)
                                <tr data-tahun-roadmap="{{ $roadmap->tahun_roadmap }}" data-uic="{{ $roadmap->uic }}">
                                    <td>{{ $roadmap->tujuanIts->tujuanIt ?? '-' }}</td>
                                    <td>{{ $roadmap->indikator ?? '-' }}</td>
                                    <td>{{ $roadmap->program ?? '-' }}</td>
                                    <td>{{ $roadmap->kegiatan ?? '-' }}</td>
                                    <td>{{ $roadmap->unitKerja->nama_divisi ?? '-' }}</td>
                                    <td>{{ $roadmap->baseline ?? '-' }}</td>
                                    <td>{{ $roadmap->target ?? '-' }}</td>
                                    <td>{{ $roadmap->realisasi ?? '-' }}</td>
                                    <td>{{ $roadmap->target_2 ?? '-' }}</td>
                                    <td>{{ $roadmap->realisasi_2 ?? '-' }}</td>
                                    <td>
                                        <!-- Tombol Aksi -->
                                        <button  onclick="openEditModal(event, {{ $roadmap->id }})"
                                            data-id="{{ $roadmap->id }}"
                                            data-tujuanit="{{ $roadmap->tujuanIts }}"
                                            data-indikator="{{ $roadmap->indikator }}"
                                            data-program="{{ $roadmap->program }}"
                                            data-unitkerja="{{ $roadmap->unitKerja }}"
                                            data-baseline="{{ $roadmap->baseline }}"
                                            data-target="{{ $roadmap->target }}"
                                            data-realisasi="{{ $roadmap->realisasi }}"
                                            data-target-2="{{ $roadmap->target_2 }}"
                                            data-realisasi-2="{{ $roadmap->realisasi_2 }}"
                                            >
                                            Edit
                                        </button>
                                        <form action="{{route('roadmap.destroy', $roadmap->id)}}" method="POST" onsubmit="return confirm('Delete?')">
                                            @csrf
                                            @method('DELETE')
                                            <button  type="submit">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>

                            <thead>
                                <tr>
                                    <th colspan="11" id="infrastuktur">Infrastruktur</th>
                                </tr>
                            </thead>
                            <tbody id="infrastruktur-body">
                                @foreach ($roadmaps->where('kategori', 'infrastruktur') as $roadmap)
                                <tr data-tahun-roadmap="{{ $roadmap->tahun_roadmap }}" data-uic="{{ $roadmap->uic }}">
                                    <td>{{ $roadmap->tujuanIts->tujuanIt ?? '-' }}</td>
                                    <td>{{ $roadmap->indikator ?? '-' }}</td>
                                    <td>{{ $roadmap->program ?? '-' }}</td>
                                    <td>{{ $roadmap->kegiatan ?? '-' }}</td>
                                    <td>{{ $roadmap->unitKerja->nama_divisi ?? '-' }}</td>
                                    <td>{{ $roadmap->baseline ?? '-' }}</td>
                                    <td>{{ $roadmap->target ?? '-' }}</td>
                                    <td>{{ $roadmap->realisasi ?? '-' }}</td>
                                    <td>{{ $roadmap->target_2 ?? '-' }}</td>
                                    <td>{{ $roadmap->realisasi_2 ?? '-' }}</td>
                                    <td>
                                        <!-- Tombol Aksi -->
                                        <button  onclick="openEditModal(event, {{ $roadmap->id }})"
                                            data-id="{{ $roadmap->id }}"
                                            data-tujuanit="{{ $roadmap->tujuanIts }}"
                                            data-indikator="{{ $roadmap->indikator }}"
                                            data-program="{{ $roadmap->program }}"
                                            data-unitkerja="{{ $roadmap->unitKerja }}"
                                            data-baseline="{{ $roadmap->baseline }}"
                                            data-target="{{ $roadmap->target }}"
                                            data-realisasi="{{ $roadmap->realisasi }}"
                                            data-target-2="{{ $roadmap->target_2 }}"
                                            data-realisasi-2="{{ $roadmap->realisasi_2 }}"
                                            >
                                            Edit
                                        </button>
                                        <form action="{{route('roadmap.destroy', $roadmap->id)}}" method="POST" onsubmit="return confirm('Delete?')">
                                            @csrf
                                            @method('DELETE')
                                            <button  type="submit">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>

                            <thead>
                                <tr>
                                    <th colspan="11" id="keamanan">Keamanan</th>
                                </tr>
                            </thead>
                            <tbody id="keamanan-body">
                                @foreach ($roadmaps->where('kategori', 'keamanan') as $roadmap)
                                <tr data-tahun-roadmap="{{ $roadmap->tahun_roadmap }}" data-uic="{{ $roadmap->uic }}">
                                    <td>{{ $roadmap->tujuanIts->tujuanIt ?? '-' }}</td>
                                    <td>{{ $roadmap->indikator ?? '-' }}</td>
                                    <td>{{ $roadmap->program ?? '-' }}</td>
                                    <td>{{ $roadmap->kegiatan ?? '-' }}</td>
                                    <td>{{ $roadmap->unitKerja->nama_divisi ?? '-' }}</td>
                                    <td>{{ $roadmap->baseline ?? '-' }}</td>
                                    <td>{{ $roadmap->target ?? '-' }}</td>
                                    <td>{{ $roadmap->realisasi ?? '-' }}</td>
                                    <td>{{ $roadmap->target_2 ?? '-' }}</td>
                                    <td>{{ $roadmap->realisasi_2 ?? '-' }}</td>
                                    <td>
                                        <!-- Tombol Aksi -->
                                        <button  onclick="openEditModal(event, {{ $roadmap->id }})"
                                            data-id="{{ $roadmap->id }}"
                                            data-tujuanit="{{ $roadmap->tujuanIts }}"
                                            data-indikator="{{ $roadmap->indikator }}"
                                            data-program="{{ $roadmap->program }}"
                                            data-unitkerja="{{ $roadmap->unitKerja }}"
                                            data-baseline="{{ $roadmap->baseline }}"
                                            data-target="{{ $roadmap->target }}"
                                            data-realisasi="{{ $roadmap->realisasi }}"
                                            data-target-2="{{ $roadmap->target_2 }}"
                                            data-realisasi-2="{{ $roadmap->realisasi_2 }}"
                                            >
                                            Edit
                                        </button>
                                        <form action="{{route('roadmap.destroy', $roadmap->id)}}" method="POST" onsubmit="return confirm('Delete?')">
                                            @csrf
                                            @method('DELETE')
                                            <button  type="submit">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>

                            <thead>
                                <tr>
                                    <th colspan="11" id="audit">Audit TIK</th>
                                </tr>
                            </thead>
                            <tbody id="audit-body">
                                @foreach ($roadmaps->where('kategori', 'audit') as $roadmap)
                                <tr data-tahun-roadmap="{{ $roadmap->tahun_roadmap }}" data-uic="{{ $roadmap->uic }}">
                                    <td>{{ $roadmap->tujuanIts->tujuanIt ?? '-' }}</td>
                                    <td>{{ $roadmap->indikator ?? '-' }}</td>
                                    <td>{{ $roadmap->program ?? '-' }}</td>
                                    <td>{{ $roadmap->kegiatan ?? '-' }}</td>
                                    <td>{{ $roadmap->unitKerja->nama_divisi ?? '-' }}</td>
                                    <td>{{ $roadmap->baseline ?? '-' }}</td>
                                    <td>{{ $roadmap->target ?? '-' }}</td>
                                    <td>{{ $roadmap->realisasi ?? '-' }}</td>
                                    <td>{{ $roadmap->target_2 ?? '-' }}</td>
                                    <td>{{ $roadmap->realisasi_2 ?? '-' }}</td>
                                    <td>
                                        <!-- Tombol Aksi -->
                                        <button  onclick="openEditModal(event, {{ $roadmap->id }})"
                                            data-id="{{ $roadmap->id }}"
                                            data-tujuanit="{{ $roadmap->tujuanIts }}"
                                            data-indikator="{{ $roadmap->indikator }}"
                                            data-program="{{ $roadmap->program }}"
                                            data-unitkerja="{{ $roadmap->unitKerja }}"
                                            data-baseline="{{ $roadmap->baseline }}"
                                            data-target="{{ $roadmap->target }}"
                                            data-realisasi="{{ $roadmap->realisasi }}"
                                            data-target-2="{{ $roadmap->target_2 }}"
                                            data-realisasi-2="{{ $roadmap->realisasi_2 }}"
                                            >
                                            Edit
                                        </button>
                                        <form action="{{route('roadmap.destroy', $roadmap->id)}}" method="POST" onsubmit="return confirm('Delete?')">
                                            @csrf
                                            @method('DELETE')
                                            <button  type="submit">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <!-- Add more categories as needed -->
                        </table>

                    {{-- form create tahun --}}

                    <div id="tahunformPopup" class="modal">
                        <div class="modal-content">
                            <span class="close-btn" onclick="closetahunForm()">&times;</span>
                            <h3>Tambah Tahun</h3>

                            <div class="roadmapform-content">
                                <form id="createtahun" action="{{route('roadmap.storetahun')}}" method="POST">
                                    @csrf
                                    <div class="roadmapform-content">
                                        <label for="tahun">Tahun:</label>
                                        <input type="text" id="tahun" name="tahun">
                                    </div>
                                    <button type="submit">Add</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Form -->
                    <div id="formPopup" class="modal">
                        <div class="modal-content">
                            <span class="close-btn" onclick="closeForm()">&times;</span>
                            <h3>Add New Program</h3>


                            <div class="roadmapform-content">
                            <form id="roadmap-form" action="{{route('roadmap.store')}}" method="POST">
                                @csrf

                                <input type="hidden" id="tahun_roadmap" name="tahun_roadmap">
                                <input type="hidden" id="uic" name="uic">


                                <label for="kategori">Kategori:</label>
                                <select id="kategori" name="kategori">
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
                                    <label for="tujuanIt">Tujuan IT:</label>
                                    <select id="tujuanIt" name="tujuanIt">
                                        @foreach ( $tujuanit as $item)
                                        <option value="{{$item->id}}">{{$item->tujuanIt}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="roadmapform-content">
                                    <label for="indikator">Indikator:</label>
                                    <input type="text" id="indikator" name="indikator">
                                </div>

                                <div class="roadmapform-content">
                                    <label for="program">Program:</label>
                                    <input type="text" id="program" name="program">
                                </div>

                                <div class="roadmapform-content">
                                    <label for="kegiatan">Kegiatan:</label>
                                    <input type="text" id="kegiatan" name="kegiatan">
                                </div>


                                <div class="roadmapform-content">
                                    <label for="baseline{{ date('Y') }}">Baseline <span class="selectedYear"></span>:</label>
                                    <textarea id="baseline" name="baseline"></textarea>
                                </div>

                                <div class="roadmapform-content">
                                    <label for="target{{ date('Y') + 1 }}">Target <span class="nextYear">:</label>
                                    <input type="text" id="target" name="target">
                                </div>

                                <div class="roadmapform-content">
                                    <label for="realisasi{{ date('Y') + 1 }}">Realisasi <span class="nextYear">:</label>
                                    <input type="text" id="realisasi" name="realisasi">
                                </div>

                                <div class="roadmapform-content">
                                    <label for="target{{ date('Y') + 2 }}">Target <span class="nextNextYear"></span>:</label>
                                    <input type="text" id="target_2" name="target_2">
                                </div>

                                <div class="roadmapform-content">
                                    <label for="realisasi{{ date('Y') + 2 }}">Realisasi <span class="nextNextYear"></span>:</label>
                                    <input type="text" id="realisasi_2" name="realisasi_2">
                                </div>

                                <button type="submit" >Add</button>
                            </form>
                        </div>
                    </div>
                    {{-- edit form --}}
                    <div id="editModal" class="modal">
                        <div class="modal-content">
                            <span class="close-btn" onclick="closeForm()">&times;</span>
                            <h3>Edit Program</h3>


                            <div class="roadmapform-content">
                            <form id="editForm"  method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" id="roadmapId" name="roadmapId">

                                <label for="kategori">Kategori:</label>
                                <select id="kategori" name="kategori">
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

                                    <label for="tujuanIt">Tujuan IT:</label>
                                    <select id="tujuanIt" name="tujuanIt">
                                        @foreach ( $tujuanit as $item)
                                        <option value="{{$item->id}}">{{$item->tujuanIt}}</option>
                                        @endforeach

                                    </select>
                                </div>

                                <div class="roadmapform-content">
                                    <label for="indikator">Indikator:</label>
                                    <input type="text" id="indikator" name="indikator">
                                </div>

                                <div class="roadmapform-content">
                                    <label for="program">Program:</label>
                                    <input type="text" id="program" name="program">
                                </div>

                                <div class="roadmapform-content">
                                    <label for="kegiatan">Kegiatan:</label>
                                    <input type="text" id="kegiatan" name="kegiatan">
                                </div>

                                <div class="roadmapform-content">
                                    <label for="uic">UIC:</label> <!-- New UIC Field -->
                                    <select id="uic" name="uic">
                                        @foreach ( $unitkerja as $item)
                                        <option value="{{$item->id}}">{{$item->nama_divisi}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="roadmapform-content">
                                    <label for="baseline{{ date('Y') }}">Baseline <span class="selectedYear"></span>:</label>
                                    <textarea id="baseline" name="baseline"></textarea>
                                </div>

                                <div class="roadmapform-content">
                                    <label for="target{{ date('Y') + 1 }}">Target <span class="nextYear">:</label>
                                    <input type="text" id="target" name="target">
                                </div>

                                <div class="roadmapform-content">

                                    <label for="realisasi{{ date('Y') + 1 }}">Realisasi <span class="nextYear">:</label>
                                    <input type="text" id="realisasi" name="realisasi">
                                </div>

                                <div class="roadmapform-content">
                                    <label for="target{{ date('Y') + 2 }}">Target <span class="nextNextYear"></span>:</label>
                                    <input type="text" id="target_2" name="target_2">
                                </div>

                                <div class="roadmapform-content">
                                    <label for="realisasi{{ date('Y') + 2 }}">Realisasi <span class="nextNextYear"></span>:</label>
                                    <input type="text" id="realisasi_2" name="realisasi_2">
                                </div>

                                <button type="submit" >Edit</button>
                            </form>
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


        // Function to open the form modal
        function openForm() {
            document.getElementById("formPopup").style.display = "block";
        }

        function opentahunForm(){
            document.getElementById("tahunformPopup").style.display = "block";
        }

        function closetahunForm(){
            document.getElementById("tahunformPopup").style.display = "none";
        }



        // Function to close the form modal
        function closeForm() {
            document.getElementById("formPopup").style.display = "none";
            document.getElementById("editModal").style.display = "none";




        }

        document.getElementById("tahunDropdown").addEventListener("change", function() {
            var selectedYear = this.options[this.selectedIndex].value; // Mengambil ID tahun yang dipilih
            document.getElementById("tahun_roadmap").value = selectedYear; // Menyimpan ID tahun di input tersembunyi
        });

        document.getElementById("divisionDropdown").addEventListener("change", function () {
            var selectedDivision = this.options[this.selectedIndex].value; // Mengambil ID divisi yang dipilih
            document.getElementById("uic").value = selectedDivision; // Menyimpan ID divisi di input tersembunyi
        });



        document.addEventListener("DOMContentLoaded", function () {
    // Ambil elemen dropdown
    var divisionDropdown = document.getElementById("divisionDropdown");
    var yearDropdown = document.getElementById("tahunDropdown");

    // Fungsi untuk memperbarui tampilan berdasarkan tahun
    function updateYearDisplay() {
        var selectedYearText = yearDropdown.options[yearDropdown.selectedIndex].text;
        var selectedYearId = yearDropdown.value;

        // Update elemen-elemen dengan class "selectedYear", "nextYear", "nextNextYear"
        var yearElements = document.querySelectorAll(".selectedYear");
        yearElements.forEach(function (element) {
            element.innerText = selectedYearText;
        });

        var nextYearElements = document.querySelectorAll(".nextYear");
        nextYearElements.forEach(function (element) {
            element.innerText = parseInt(selectedYearText) + 1;
        });

        var nextNextYearElements = document.querySelectorAll(".nextNextYear");
        nextNextYearElements.forEach(function (element) {
            element.innerText = parseInt(selectedYearText) + 2;
        });
    }

    // Fungsi untuk menyaring data berdasarkan divisi dan tahun
    function filterTable() {
        var selectedDivision = divisionDropdown.value; // ID divisi yang dipilih
        var selectedYear = yearDropdown.value; // ID tahun yang dipilih

        // Ambil semua baris data di tabel
        var rows = document.querySelectorAll("#roadmapTable tbody tr");

        rows.forEach(function (row) {
            var uic = row.getAttribute("data-uic"); // ID divisi pada baris
            var tahunRoadmap = row.getAttribute("data-tahun-roadmap"); // Tahun pada baris

            // Logika penyaringan: tampilkan baris jika divisi dan tahun cocok
            if (
                (selectedDivision === "" || uic === selectedDivision) &&
                (selectedYear === "" || tahunRoadmap === selectedYear)
            ) {
                row.style.display = ""; // Tampilkan baris
            } else {
                row.style.display = "none"; // Sembunyikan baris
            }
        });
    }

    // Event listener saat dropdown divisi atau tahun berubah
    divisionDropdown.addEventListener("change", function () {
        filterTable(); // Filter data di tabel berdasarkan divisi dan tahun
    });

    yearDropdown.addEventListener("change", function () {
        updateYearDisplay(); // Update tampilan tahun
        filterTable(); // Filter data di tabel berdasarkan divisi dan tahun
    });

    // Inisialisasi filter saat halaman dimuat pertama kali
    updateYearDisplay(); // Update tampilan tahun pertama kali
    filterTable(); // Filter data pertama kali
});

function deleteSelectedYear() {
    var yearDropdown = document.getElementById("tahunDropdown");
    var selectedYearId = yearDropdown.value;
    var selectedYearText = yearDropdown.options[yearDropdown.selectedIndex].text;

    if (confirm("Apakah Anda yakin ingin menghapus tahun " + selectedYearText + "?")) {
        fetch('/roadmap/destroytahun', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ id: selectedYearId })
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('HTTP status ' + response.status); // Lempar error jika status HTTP bukan 200
            }
            return response.json(); // Parse JSON jika respons valid
        })
        .then(data => {
            if (data.success) {
                alert(data.message);
                // Hapus opsi dari dropdown
                yearDropdown.options[yearDropdown.selectedIndex].remove();
                filterTable(); // Perbarui tabel
            } else {
                alert(data.message || "Gagal menghapus tahun.");
            }
        })
        .catch(error => {
            console.error("Error:", error);
            alert("Terjadi kesalahan: " + error.message);
        });
    }
}

        function openEditModal(event, id) {
            const button = event.currentTarget;

            // Set data ke dalam modal form
            document.getElementById('roadmapId').value = id;
            document.getElementById('tujuanIt').value = button.getAttribute('data-tujuanit');
            document.getElementById('indikator').value = button.getAttribute('data-indikator');
            document.getElementById('program').value = button.getAttribute('data-program');
            document.getElementById('kegiatan').value = button.getAttribute('data-kegiatan');
            document.getElementById('uic').value = button.getAttribute('data-unitkerja');
            document.getElementById('baseline').value = button.getAttribute('data-baseline');
            document.getElementById('target').value = button.getAttribute('data-target');
            document.getElementById('realisasi').value = button.getAttribute('data-realisasi');
            document.getElementById('target_2').value = button.getAttribute('data-target-2');
            document.getElementById('realisasi_2').value = button.getAttribute('data-realisasi-2');

            // Set action form
            const form = document.getElementById('editForm');
            form.action = `/roadmap/${id}`;

            const modal = document.getElementById('editModal');
            modal.style.display = 'block';
        }


    </script>

</body>
</html>
