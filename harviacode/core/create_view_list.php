<?php 

$string = "<div class=\"content-wrapper\">

    <section class=\"content-header\">
       <h1 class=\"tx-judul\">
        Kelola Data ".  strtoupper($table_name)."
      </h1>
      <ol class=\"breadcrumb\">
        <li><a href=\"#\"> Menu</a></li>
        <li><a href=\"#\"> Kelola data menu</a></li>
      </ol>
    </section>

    <section class=\"content\">
        <small><?php echo \$this->session->userdata('message') <> '' ? \$this->session->userdata('message') : ''; ?></small>
            <div class=\"row\">
            <div class=\"col-xs-12\">
                <div class=\"box box-info\">
                   <div class=\"box-header with-border\">
                      <div>
                        <a href=\"<?= site_url('".$c_url."/create'); ?>\" class=\"btn btn-social btn-flat bg-purple btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block\"><i class=\"fa fa-plus\"></i> Tambah Data</a>
                      </div>
                    </div>


        <div class=\"box-body\">
            <div class=\"row\" style=\"margin-bottom: 10px\">
            <div class=\"col-md-9\">
            <div style=\"padding-bottom: 10px;\">";

if ($export_excel == '1') {
    $string .= "\n\t\t<?php echo anchor(site_url('".$c_url."/excel'), '<i class=\"fa fa-file-excel-o\" aria-hidden=\"true\"></i> Export Ms Excel', 'class=\"btn btn-social btn-flat btn-success btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block\"'); ?>";
}
if ($export_word == '1') {
    $string .= "\n\t\t<?php echo anchor(site_url('".$c_url."/word'), '<i class=\"fa fa-file-word-o\" aria-hidden=\"true\"></i> Export Ms Word', 'class=\"btn btn-social btn-flat btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block\"'); ?>";
}
if ($export_pdf == '1') {
    $string .= "\n\t\t<?php echo anchor(site_url('".$c_url."/pdf'), 'PDF', 'class=\"btn btn-primary\"'); ?>";
}
$string.="</div>
            </div>
            <div class=\"col-md-3\">
            <form action=\"<?php echo site_url('$c_url/index'); ?>\" class=\"form-inline\" method=\"get\">
                    <div class=\"input-group pull-right\">
                        <input type=\"text\" class=\"input-cari form-control\" name=\"q\" value=\"<?php echo \$q; ?>\" placeholder=\"Cari...\" autocomplete=\"off\">
                        <span class=\"input-group-btn\">
                            <?php 
                                if (\$q <> '')
                                {
                                    ?>
                                    <a href=\"<?php echo site_url('$c_url'); ?>\" class=\"btn btn-sm btn-default\"><i class=\"fa fa-repeat\"></i></a>
                                    <?php
                                }
                            ?>
                            <button type=\"submit\" class=\"btn btn-sm btn-default\"><i class=\"fa fa-search\"></i></button>
                        </span>
                    </div>
                </form>
            </div>
            </div>
        
        <table class=\"table table-hover table-bordered tabel-daftar\" style=\"margin-bottom: 15px\">
            <thead class=\"bg-gray disabled color-palette\">
            <tr>
                <th>No</th>";
foreach ($non_pk as $row) {
    $string .= "\n\t\t<th>" . label($row['column_name']) . "</th>";
}
$string .= "\n\t\t<th>Action</th>
            </tr>
            </thead>";
$string .= "<?php
            foreach ($" . $c_url . "_data as \$$c_url)
            {
            ?>
            <tbody>
            <tr>";

$string .= "\n\t\t\t<td width=\"10px\"><?php echo ++\$start ?></td>";
foreach ($non_pk as $row) {
    $string .= "\n\t\t\t<td><?php echo $" . $c_url ."->". $row['column_name'] . " ?></td>";
}


$string .= "\n\t\t\t<td style=\"text-align:center\" width=\"200px\">"
        . "\n\t\t\t\t<?php "
        . "\n\t\t\t\techo anchor(site_url('".$c_url."/read/'.$".$c_url."->".$pk."),'<i class=\"fa fa-eye fa-sm\" aria-hidden=\"true\"></i>','class=\"btn btn-info btn-flat btn-sm\"'); "
        . "\n\t\t\t\techo '  ';"
        . "\n\t\t\t\techo anchor(site_url('".$c_url."/update/'.$".$c_url."->".$pk."),'<i class=\"fa fa-pencil-square-o\" aria-hidden=\"true\"></i>','class=\"btn bg-orange btn-flat btn-sm\"'); "
        . "\n\t\t\t\techo '  ';"
        . "\n\t\t\t\techo anchor(site_url('".$c_url."/delete/'.$".$c_url."->".$pk."),'<i class=\"fa fa-trash\" aria-hidden=\"true\"></i>','class=\"btn bg-maroon btn-flat btn-sm\" Delete','onclick=\"javasciprt: return confirm(\\'Are You Sure ?\\')\"');"
        . "\n\t\t\t\t?>"
        . "\n\t\t\t</td>";

$string .=  "\n\t\t</tr>
                <?php
            }
            ?>
        </tbody>
        </table>
        <div class=\"row\">
            <div class=\"col-md-6\">
                ";
/*
if ($export_excel == '1') {
    $string .= "\n\t\t<?php echo anchor(site_url('".$c_url."/excel'), 'Excel', 'class=\"btn btn-primary\"'); ?>";
}
if ($export_word == '1') {
    $string .= "\n\t\t<?php echo anchor(site_url('".$c_url."/word'), 'Word', 'class=\"btn btn-primary\"'); ?>";
}
if ($export_pdf == '1') {
    $string .= "\n\t\t<?php echo anchor(site_url('".$c_url."/pdf'), 'PDF', 'class=\"btn btn-primary\"'); ?>";
}
 * 
 */
$string .= "\n\t    </div>
            <div class=\"col-md-6 text-right\">
                <?php echo \$pagination ?>
            </div>
        </div>
        </div>
                    </div>
            </div>
            </div>
    </section>
</div>";


$hasil_view_list = createFile($string, $target."views/" . $c_url . "/" . $v_list_file);

?>