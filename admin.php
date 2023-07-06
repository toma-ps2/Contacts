<?php
$time = [
    'name'=> 'server',
    'cookie_lifetime' => 3600,
    'gc_maxlifetime' => 3600
];
// session_start($time);

// $contact = new stdClass();
// foreach($_POST as $key=>$val) $contact->$key = $val;
// echo $contact->name; 
// echo $contact->phone;

if($_POST) {    
    if(isset($_POST['name'])) {
        $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
      }
      $error = '';
    if(strlen($name) < 3)
        $error = 'Имя должно быть не менее 3 символов';
    if($error != ''){
        echo $error;
        exit;
    }
    if(isset($_POST['phone'])) {
        $phone = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
      }
	$num = '+74950000000';
	if (preg_match("/\\+?[7][0-9]{10}/",$num)) {
	echo '';
	} else {
	echo 'формат телефона должен быть +7xxxxxxxxxx';
	}
	
}
$_SESSION['contact'] = [
  'name'=> $name,
  'phone' => $phone
];


$allSessions = [];
$active_session = scandir(session_save_path());

foreach($active_session as $sessionName) {
    $sessionName = str_replace("sess_","",$sessionName);
    if(strpos($sessionName,".") === false) { 
        session_id($sessionName);
        session_start($time);
        $allSessions[$sessionName] = $_SESSION;
        session_abort();
    }
    
}
// echo '<pre>';
// print_r($allSessions);

?>

<html>
<head>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
<link href="https://unpkg.com/bootstrap-table@1.22.0/dist/bootstrap-table.min.css" rel="stylesheet">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

    
<h1 class="title">Список контактов</h1>
</head>
<body>

  <table id="table" class="table table-hover">
      <?php foreach($allSessions as $value):?> 
        <thead>
          <tr>
            <th scope="col">Имя <i class="fa fa-fw fa-sort"></i></th>
            <th scope="col">Телефон</th>
            <th scope="col">Удалить контакт</th>
          </tr>
          <tbody>
          <tr>
            <?php foreach($value as $name):?>
              <td><?= $name?></td>
              <?php endforeach;?>
              <?php foreach($value as $phone):?>
              <td><?= $phone?></td>
              <?php endforeach;?>
            <td><button id="btn_d" class="btn btn-danger" >Удалить <?= session_unset(); ?>  </button></td>
              <!-- <td><?= $name?></td>
              <td><?= $phone?></td>
            <td><button id="btn_d" class="btn btn-danger" >Удалить <?= session_unset(); ?> </button></td> -->
          </tr>
        </tbody>
        </thead>
      <?php endforeach;?>
  </table>
</body>
</html>

