<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>MENU UTAMA</h3>
                <ul class="nav side-menu">
                    <li><a href="<?= base_url('C_dokter') ?>"><i class="fa fa-home"></i> BERANDA </a></li>
                    <li><a><i class="fa fa-bar-mail-o"></i></i> Pesan <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?= base_url('C_dokter/pesan_baru') ?>">Buat Pesan</a></li>
                      <li><a href="<?= base_url('C_dokter/inbox') ?>">Kotak Masuk</a></li>
                      <li><a href="<?= base_url('C_dokter/outbox') ?>">Kotak Keluar</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>