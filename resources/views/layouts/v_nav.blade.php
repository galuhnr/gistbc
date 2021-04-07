<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
            <li class="nav-item has-treeview mt-2">
                <a href="#" class="nav-link active">
                    <i class="nav-icon fas fa-home"></i>
                    <p>
                        Dashboard
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="./index.html" class="nav-link active">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Peta TBC</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="./index2.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Grafik Kasus</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="./index3.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Grafik Tingkat Kerawanan</p>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- form -->
            <li class="nav-header">DATA MASTER</li>
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-folder-open"></i>
                    <p>
                        Data Inputan
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('tahuns.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Data Tahun</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('datakecamatan') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Data Kecamatan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('datakriterias.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Data Kriteria</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="pages/forms/editors.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Rumah Sakit</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-table"></i>
                    <p>
                        Hasil Clustering
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="pages/tables/simple.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>2016</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="pages/tables/data.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>2017</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="pages/tables/jsgrid.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>2018</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="pages/tables/jsgrid.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>2019</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="pages/gallery.html" class="nav-link">
                    <i class="nav-icon fas fa-info-circle"></i>
                    <p>Informasi TBC</p>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->