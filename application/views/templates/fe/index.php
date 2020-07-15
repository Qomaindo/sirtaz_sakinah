<?php

$this->load->view('templates/fe/header');

// $this->load->view('tmp/backend_topbar');

$this->load->view('templates/fe/menubar');

?>

<div class="content-wrapper">

<?php

if (isset($content)) echo $content;

?>

</div>

<?php

$this->load->view('templates/fe/footer');

?>
