<?php include('public_header.php'); ?>

<div class="container">
<?= form_open('login/admin_login',['class'=>'form-horizontal']) ?>

  <fieldset>
    
    <legend>Admin Login</legend>
    <?php if($error=$this->session->flashdata('login_failed')): ?>
    <div class="alert alert-dismissible alert-danger">
      <strong><?= $error ?></strong>
    </div>
  <?php endif;?>

    <div class="row">
      <div class="col-lg-6">
        <div class="form-group">
          <label for="inputEmail" class="col-lg-2 control-label">Username</label>
          <div class="col-lg-10">
            <?= form_input(['type'=>'text', 'name'=>'username','class'=>'form-control', 'id'=>'username', 'placeholder'=>'Username', 
            'value'=>set_value('username')])?>
          </div>
        </div>
      </div>
      
      <div class="col-lg-6">
        <?= form_error('username');?>
      </div>

    </div>


    <div class="row">
      <div class="col-lg-6">
        <div class="form-group">
          <label for="inputPassword" class="col-lg-2 control-label">Password</label>
          <div class="col-lg-10">
            <?= form_password(['type'=>'password', 'name'=>'password', 'class'=>'form-control', 'id'=>'inputEmail', 'placeholder'=>'Password'])?>
          </div>
        </div>
      </div>

      <div class="col-lg-6">
        <?= form_error('password');?>
      </div>
    </div>
    
   
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <?= form_reset(['name'=>'reset', 'value'=>'Reset', 'class'=>'btn btn-default']),
        form_submit(['name'=>'submit', 'value'=>'Login', 'class'=>'btn btn-primary']); ?>
      </div>
    </div>
  </fieldset>
<?= form_close();?>

</div>



<?php include('public_footer.php'); ?>





