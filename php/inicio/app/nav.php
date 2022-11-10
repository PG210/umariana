<nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item nav-profile li_logout" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Salir">
                        <a href="logout.php" class="nav-link a_logout">
                            <div class="nav-profile-image">
                                <img src="../../assets/images/faces/face1.jpg" alt="profile">
                                <span class="login-status online"></span>
                                <!--change to offline or busy as needed-->
                            </div>
                            <div class="nav-profile-text d-flex flex-column">
                                <span class="mb-2"><b><?php echo $datos->nombres ?></b></span>
                                <span class="text-secondary text-small"><?php echo $datos->cargo ?></span>
                            </div>
                            <i class="fa-solid fa-person-walking-arrow-right menu-icon i_logout"></i>
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="director.php">
                            <span class="menu-title text-primary" style="font-size: 16px;"><b>Solicitudes</b></span>
                            <i class="mdi mdi-email menu-icon text-primary"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="vistagraficos.php">
                            <span class="menu-title" style="font-size: 14px;"><b>Estadisticas</b></span>
                            <i class="mdi mdi-chart-bar menu-icon"></i>
                        </a>
                    </li>
                </ul>
            </nav>