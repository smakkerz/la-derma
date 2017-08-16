<?php
error_reporting(0);
require_once 'core/harviacode.php';
require_once 'core/helper.php';
require_once 'core/process.php';
?>
<!DOCTYPE HTML>
<html>
<head>
<title>CI_G | CRUD</title>
<link href="../assets/bootstrap/css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary JavaScript plugins) -->
<script src="../assets/bootstrap/js/jquery.min.js"></script>
<!-- Custom Theme files -->
 <link href="../assets/bootstrap/css/dashboard.css" rel="stylesheet">
<link href="../assets/bootstrap/css/style.css" rel='stylesheet' type='text/css' />

<!-- Custom Theme files -->
<!--//theme-style-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Curriculum Vitae Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
<!-- start menu -->
  
</head>
<body>
    <!-- header -->
<div class="col-sm-3 col-offset-md-2 sidebar" style="background-color: #201; color: #eff;">
         <div class="sidebar_top1" >
             <h1>CI_G-CRUD</h1> 
             <br>
              <h3>The result is generated : </h3>
         </div>
        <div class="details">
              <script type="text/javascript">
            function capitalize(s) {
                return s && s[0].toUpperCase() + s.slice(1);
            }

            function setname() {
                var table_name = document.getElementById('table_name').value.toLowerCase();
                if (table_name != '') {
                    document.getElementById('controller').value = capitalize(table_name);
                    document.getElementById('model').value = capitalize(table_name) + '_model';
                } else {
                    document.getElementById('controller').value = '';
                    document.getElementById('model').value = '';
                }
            }
        </script>
                       <?php
                foreach ($hasil as $h) {
                    echo '<p>' . $h . '</p>';
                }
                ?>

        </div>
</div>
<!---->
<link href="lib/css/popuo-box.css" rel="stylesheet" type="text/css" media="all"/>
<script src="lib/js/jquery.magnific-popup.js" type="text/javascript"></script>
    <!---//pop-up-box---->          
<div class="col-sm-9 col-sm-offset-3 col-md-9 main">
     <div class="content">
         <div class="details_header">
            <div class="navbar-fixed-top" align="right">
             <ul>
                 <li><a href="index.php"><span class="glyphicon glyphicon-flag" aria-hidden="true"></span>Dashboard 1</a></li>
                 <li><a href="#"><span class="glyphicon glyphicon-flag" aria-hidden="true"></span>Dashboard 2</a></li>
                 <li><a class="play-icon popup-with-zoom-anim" href="#small-dialog"><span class="glyphicon glyphicon-picture" aria-hidden="true"></span>View photo</a></li>
                 <div id="small-dialog" class="mfp-hide">
                     <img src="lib/images/g4.jpg" alt=""/>
                 </div>
                 <script>
                        $(document).ready(function() {
                        $('.popup-with-zoom-anim').magnificPopup({
                            type: 'inline',
                            fixedContentPos: false,
                            fixedBgPos: true,
                            overflowY: 'auto',
                            closeBtnInside: true,
                            preloader: false,
                            midClick: true,
                            removalDelay: 300,
                            mainClass: 'my-mfp-zoom-in'
                        });
                                                                                        
                        });
                </script>
             </ul>
             </div>
         </div>
         <div class="company contact-grid" >
            <div class="row">
                <form action="index.php" method="POST">
                    <div class="form-group">
                        <h3 class="clr1"  style="background-color: #200">Generator CRUD</h3>
                        <div class="company_details">
                            <h4><label>Select Table - <a href="<?php echo $_SERVER['PHP_SELF'] ?>" class="text-danger">Refresh</a></label></h4>
                            <div class="col-md-3">
                    <select id="table_name" name="table_name" class="form-control" onchange="setname()">
                                <option value="">Please Select</option>
                                <?php
                                $table_list = $hc->table_list();
                                $table_list_selected = isset($_POST['table_name']) ? $_POST['table_name'] : '';
                                foreach ($table_list as $table) {
                                    ?>
                                    <option value="<?php echo $table['table_name'] ?>" <?php echo $table_list_selected == $table['table_name'] ? 'selected="selected"' : ''; ?>><?php echo $table['table_name'] ?></option>
                                    <?php
                                }
                                ?>
                    </select>
                            </div>
                        </div>
                    </div>
             </div>
                    <div class="skill_list">
                        <div class="skill1">
                        <ul>
                            <div class="form-group">
                            <?php $jenis_tabel = isset($_POST['jenis_tabel']) ? $_POST['jenis_tabel'] : 'reguler_table'; ?>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="jenis_tabel" value="reguler_table" <?php echo $jenis_tabel == 'reguler_table' ? 'checked' : ''; ?>>
                                        Tabel Umum
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="jenis_tabel" value="datatables" <?php echo $jenis_tabel == 'datatables' ? 'checked' : ''; ?>>
                                        Datatables
                                    </label>
                                </div>
                            </div>
                        </ul>
                        </div>
                        <div class="skill2">
                        <ul>
                            <div class="form-group">
                                <div class="checkbox">
                                    <?php $export_excel = isset($_POST['export_excel']) ? $_POST['export_excel'] : ''; ?>
                                    <label>
                                        <input type="checkbox" name="export_excel" value="1" <?php echo $export_excel == '1' ? 'checked' : '' ?>>
                                        Export Excel
                                    </label>
                                </div>

                                <div class="checkbox">
                                    <?php $export_word = isset($_POST['export_word']) ? $_POST['export_word'] : ''; ?>
                                    <label>
                                        <input type="checkbox" name="export_word" value="1" <?php echo $export_word == '1' ? 'checked' : '' ?>>
                                        Export Word
                                    </label>
                                </div>
                                <div class="checkbox">
                                <?php $export_pdf = isset($_POST['export_pdf']) ? $_POST['export_pdf'] : ''; ?>
                                                <label><input type="checkbox" name="export_pdf" value="1" <?php echo $export_pdf == '1' ? 'checked' : ''   ?>
                                <?php  echo file_exists('../application/third_party/mpdf/mpdf.php') ? '' : ''; ?>>
                                                    Export PDF</label>
                                <?php  echo file_exists('../application/third_party/mpdf/mpdf.php') ? '' : '<small class="text-danger">mpdf required, download <a href="http://harviacode.com">here</a></small>'; ?>
                                </div>
                            </div>
                        </ul>
                        </div>
                     <div class="clearfix"> </div>
                     <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                        <label>Custom Controller Name</label>
                                <input type="text" id="controller" name="controller" value="<?php echo isset($_POST['controller']) ? $_POST['controller'] : '' ?>" class="form-control" placeholder="Controller Name" />
                            </div>

                            <div class="form-group">
                        <label>Custom Model Name</label>
                                <input type="text" id="model" name="model" value="<?php echo isset($_POST['model']) ? $_POST['model'] : '' ?>" class="form-control" placeholder="Controller Name" />
                            </div>
                                <input type="submit" value="Generate" name="generate"  style="background-color: #4bc" class="btn btn-primary" onclick="javascript: return confirm('This will overwrite the existing files. Continue ?')" />
                                <!-- <input type="submit" value="Generate All" name="generateall" class="btn btn-success" onclick="javascript: return confirm('WARNING !! This will generate code for ALL TABLE and overwrite the existing files\
                    \nPlease double check before continue. Continue ?')" />
                                <!--- <a href="core/setting.php" class="btn btn-default">Setting</a>  -->
                        </div>
                    </div>
                    </div>
                </form>
             </div>
         </div>
         <div class="company">
             <h3 class="clr3"  style="background-color: #301">Generator CRUD with CodeIgniter 3 & MariaDB</h3>
             <div class="company_details">
                 <h4>About : </h4>
                 <p class="cmpny1">Codeigniter CRUD Generator is a simple tool to auto generate model, controller and view from your table. This tool will boost your writing code. This CRUD generator will make a complete CRUD operation, pagination, search, form*, form validation, export to excel, and export to word. This CRUD Generator using bootstrap 3 style. You still need to modify the result code for more customization.</p>
             </div>
             <div class="company_details">
                 <h4>How to use this Generator CRUD :</h4>
                    <div class="skill_info">
                        <div class="skill3">                
                            <ul>
                            <li>Simply put 'harviacode' folder, 'asset' folder and .htaccess file into your project root folder.</li>
                            <li>Open http://localhost/yourprojectname/harviacode.</li>
                            <li>Select table and push generate button.</li>
                            </ul>
                        </div>
                            <div class="skill4">
                            <h4>Important : </h4>
                                <ul>
                                <li>On application/config/autoload.php, load database library, session library and url helper</li>
                                <li>On application/config/config.php, set :</b>.
                                    <ul>
                                    <li>$config['base_url'] = 'http://localhost/yourprojectname'</li>
                                    <li>$config['index_page'] = ''</li>
                                    <li>$config['url_suffix'] = '.html'</li>
                                    <li>$config['encryption_key'] = 'randomstring'</li>
                                    </ul>
                                </li>
                                <li>On application/config/database.php, set hostname, username, password and database.</li>
                                </ul>
                        </div>
                      <div class="clearfix"></div>
                </div>
            </div>
		 <div class="copywrite">
			 <p>© 2017 WebOn All Rights Reseverd | Design by <a href="http://github.com/smakkerz"> Smakkerz007</a> HarviaCode // BelajarPHP.NET</p>
		 </div>
	 </div>
</div>
<!---->
</body>
</html>