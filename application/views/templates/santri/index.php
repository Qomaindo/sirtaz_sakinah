<?php

$this->load->view('templates/santri/header');

$this->load->view('templates/santri/topbar');

$this->load->view('templates/santri/sidebar', $nav_menu);

?>

<?php

if (isset($content)) echo $content;

?>

<?php

$this->load->view('templates/santri/footer');

$this->load->view('templates/santri/js');

?>
