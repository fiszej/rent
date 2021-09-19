<?php

if (file_exists('module/../newsletter/newsletter.json')) {
    $json = file_get_contents('module/../newsletter/newsletter.json');
    $lists = json_decode($json, true);
}



?>


<h5>Newsletter list</h5>
<table style="width: 300px" class="table table-striped table-hover">
  <thead>
    <tr>
      <th scope="col">Email adress</th>
    </tr>
  </thead>
  <tbody>
      <?php foreach ($lists as $list) : ?>
    <tr>
        <th scope="row"><?= $list[0] ?></th>
    </tr>
    <?php endforeach ;?>
  </tbody>
</table>