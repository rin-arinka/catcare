            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <?php if (session('level')!="reguler") { ?>
                            <h1 class="mt-4">Dashboard</h1>
                            <ol class="breadcrumb mb-4">
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        <?php } else { ?>
                            <h1 class="mt-4">Upgrade Member Kamu</h1>
                            <ol class="breadcrumb mb-4">
                                <li class="breadcrumb-item active">Hanya untuk member reguler dan platinum</li>
                            </ol>
                        <?php } ?>
                    </div>
                        
                    </div>
                </main>