<?php
 //print the variables if needed to allow for individual field theming or breaking them up.
//print '<pre>';
//print_r($variables);
//print '</pre>';

?>

<div class="cgf_bootstrap-user-login-form-wrapper">

<div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">Sign In</div>
                        <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">Forgot password?</a></div>
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
                        <form id="loginform" class="form-horizontal" role="form">
                                    
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input id="<?php echo $form['name']['#id']?>" type="text" class="form-control form-text" name="<?php echo $form['name']['#name']?>" value="<?php echo $form['name']['#value']?>" placeholder="<?php echo $form['name']['#title']; ?>" required="<?php echo $form['name']['#required']?>">                                        
                                    </div>
                                
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input id="<?php echo $form['pass']['#name']?>" type="password" class="form-control form-text" name="<?php echo $form['pass']['#name']?>" placeholder="<?php echo $form['pass']['#title']?>">
                                    </div>
                                    

                                
                            <div class="input-group">
                                      <div class="checkbox">
                                        <label>
                                          <input id="login-remember" type="checkbox" name="remember" value="1"> Remember me
                                        </label>
                                      </div>
                                    </div>


                                <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->

                                    <div class="col-sm-12 controls">
                                      <a id="btn-login" href="#" class="btn btn-success">Login  </a>
                                      <a id="btn-fblogin" href="#" class="btn btn-primary">Login with Facebook</a>

                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="col-md-12 control">
                                        <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                            Don't have an account! 
                                        <a href="#" onClick="$('#loginbox').hide(); $('#signupbox').show()">
                                            Sign Up Here
                                        </a>
                                        </div>
                                    </div>
                                </div>    
                            </form>     



                        </div>                     
                    </div>  
        </div>


</div>
    



<div class="login-wrapper">

    <h2>Connexion Administration</h2>


	



    <?php
    // split the username and password from the submit button so we can put in links above
    print drupal_render($form['name']);
    print drupal_render($form['pass']);

    ?>

    <div class="user-links">
        <span class="passlink"><a href="/user/password">Mot de passe oublié</a></span> | <span class="reglink"><a href="/user/register">Créer un nouveau compte</a></span>
    </div>

    <?php
    print drupal_render($form['form_build_id']);
    print drupal_render($form['form_id']);
    print drupal_render($form['actions']);
    ?>

</div><!--//login-wrapper<!---->




</div><!--//your-themename-user-login-form-wrapper -->

