<main class="wp-content">
   <div class="breadcrumb_content">
      <div class="container">
         <div class="row">
            <div class="col-12">
               <nav>
                  <ol class="breadcrumb-list breadcrumb">
                     <li class="breadcrumb-item"><a href="<?= _WEB_ROOT_PATH  . '/' ?>">Home</a></li>
                     <li class="breadcrumb-item active" aria-current="page">Login</li>
                  </ol>
               </nav>
            </div>
         </div>
      </div>
   </div>

   <div class="login_wrapper">
      <div class="container">
         <div class="row">
            <div class="col-lg-12">
               <div class="login_form_container" data-aos="flip-right">
                  <form id="form" action="<?php echo _WEB_ROOT_PATH.'/auth/handleLogin' ?>" method="post">
                     <div class="login_text">
                        <h2>Login</h2>
                        <p>Please login using account detail bellow.</p>
                     </div>
                     <?php
                     if (isset($_SESSION['msg']) && $_SESSION['msg'] != "") {
                     ?>
                        <div id="message" class="alert alert-success"><?php echo $_SESSION['msg'] ?></div>
                     <?php
                        $_SESSION['msg'] = '';
                     }
                     ?>

                     <?php
                     if (isset($_SESSION['msglg']) && $_SESSION['msglg'] != "") {
                     ?>
                        <div id="message" class="alert alert-danger"><?php echo $_SESSION['msglg'] ?></div>
                     <?php
                        $_SESSION['msglg'] = '';
                     }
                     ?>
                     <div class="login_form">
                        <div class="form-group mb-5">
                           <input id="email" class="form-control" placeholder="Email" type="email" name="email">
                        </div>
                        <div class="form-group mb-5">
                           <input id="password" class="form-control" placeholder="Password" type="password" name="password">
                        </div>
                        <input type="hidden" name="login" value="login">
                        <div class="toggle-btn">
                           <div class="form-action-button">
                              <button class="btn btn_login" type="submit">Sign In</button>
                              <a href="#" class="forget_pass">Forgot your password</a>
                           </div>
                           <div class="account-option">
                              <a href="<?= _WEB_ROOT_PATH . '/Auth/register' ?>" class="create_acc">Create account</a>
                           </div>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</main>