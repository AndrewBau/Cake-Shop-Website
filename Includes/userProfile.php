<!--Start User Profile-->
<div class="container user-profile-container">
    <div class="row">
        <div id="screenRes" class="col-md-15">
            <form class="form-horizontal" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <fieldset>
                    <!-- Név Form -->
                    <div class="form-spacer">
                        <br>
                    </div>

                    <!-- Bevitel-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="Username ">Felhasználónév </label>  
                        <div class="col-md-1">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fas fa-check"></i>
                                </div> 
                                <label class="col-md-4 control-label" for="Username "><?php echo $uname;?></label>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <span class="input-error"><?php echo $lnameCriteria;?></span>
                        <label class="col-md-4 control-label" for="Last Name ">Vezetéknév </label>  
                        <div class="col-md-4">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </div>
                                <input value = "<?php echo $lname;?>" id="Last Name " name="lname" type="text" placeholder="Vezetéknév " class="form-control input-md">
                            </div>
                        </div>
                    </div>
                    

                    <div class="form-group">
                        <span class="input-error"><?php echo $fnameCriteria;?></span>
                        <label class="col-md-4 control-label" for="First Name">Keresztnév</label>  
                        <div class="col-md-4">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </div>
                                <input value = "<?php echo $fname;?>" id="First Name" name="fname" type="text" placeholder="Keresztnév" class="form-control input-md">
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <span class="input-error"><?php echo $addressCriteria;?></span>
                        <label class="col-md-4 control-label" for="Address ">Cím </label>  
                        <div class="col-md-4">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fas fa-map-marked-alt"></i>
                                </div>
                                <input value = "<?php echo $address;?>" id="Address " name="address" type="text" placeholder="Cím " class="form-control input-md">
                            </div>
                        </div>
                    </div>
                    

                    <div class="form-group">
                        <span class="input-error"><?php echo $phoneCriteria;?></span>
                        <label class="col-md-4 control-label" for="Phone Number ">Telefonszám </label>  
                        <div class="col-md-4">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-phone"></i> 
                                </div>
                                <input value = "<?php echo $phone;?>" id="Phone Number " name="phone" type="text" placeholder="Telefonszám " class="form-control input-md">
                            </div>
                        </div>
                    </div>


                    <!-- Bevitel-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="Email Address">Email cím</label>  
                        <div class="col-md-1">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <label class="col-md-4 control-label" for="Email Address "><?php echo $email;?></label>
                            </div>
                        </div>
                    </div>


                    <!-- Szövegmező -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="Overview (max 200 words)">Pár szó rólam</label>
                        <div class="col-md-4">                     
                            <textarea class="form-control" rows="10"  id="Overview (max 200 words)" name="description" placeholder="(max 200 szó)"><?php echo $description;?></textarea>
                        </div>
                    </div>

                        
                    <div class="form-group">
                        <label class="col-md-4 control-label" ></label>  
                        <div class="col-md-4">
                            <button name="updateProfile" class="btn btn-success"><span class="glyphicon glyphicon-thumbs-up"></span> Frissít</button>
                            <button name="revertProfile" class="btn btn-danger" value=""><span class="glyphicon glyphicon-repeat"></span> Visszaállít</button>
                            <span class="message"><?php echo "&nbsp&nbsp <b>$updateMessage</b>";?></span>
                        </div> 
                    </div>

                    <!-- Bevitel -->
                    <br>
                    <hr>
                    <div class="change-password-container">
                        <div class="change-password-subtitle">
                            <h3>Jelszó módosítás</h3>
                            <p><i class="fas fa-exclamation-triangle"></i>&nbsp&nbspA jelszó frissítése után újra be kell jelentkezned.</p>
                        </div>
                    </div>

                    <div class="form-group">
                        <span class="input-error"><?php echo $currentPasswordCriteria;?></span>
                        <label class="col-md-4 control-label" for="Current Password ">Jelenlegi jelszó </label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fas fa-unlock-alt"></i>
                                </div>
                                <input type="password" id="Current Password " name="currentPassword" type="text" placeholder="Jelenlegi jelszó " class="form-control input-md">
                            </div>
                        </div>
                    </div>

                
                    <!-- Bevitel-->
                    <div class="form-group">
                    <span class="input-error"><?php echo $newPasswordCriteria;?></span>
                        <label class="col-md-4 control-label" for="New Password ">Új jelszó </label>  
                        <div class="col-md-4">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fas fa-key"></i>
                                </div>
                                <input type="password" id="New Password " name="newPassword" type="text" placeholder="Új jelszó " class="form-control input-md">
                            </div>
                        </div>
                    </div>

                    <!-- Bevitel-->
                    <div class="form-group">
                    <span class="input-error"><?php echo $confirmPasswordCriteria;?></span>
                        <label class="col-md-4 control-label" for="Confirm Password ">Jelszó megerősítése </label>  
                        <div class="col-md-4">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fas fa-key"></i>
                                </div>
                                <input type="password" id="Confirm Password " name="confirmPassword" type="text" placeholder="Jelszó megerősítése " class="form-control input-md">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" ></label>  
                        <div class="col-md-4">
                            <button name="updatePassword" class="btn btn-success"><span class="glyphicon glyphicon-thumbs-up"></span> Frissít</button>
                            <button name="clearPassword" class="btn btn-danger"><span class="glyphicon glyphicon-remove-sign"></span> Töröl</button>
                            <span class=message"><?php echo "&nbsp&nbsp <b>$passwordMessage</b>";?></span>
                        </div>
                    </div>

                    <br>
                    <hr>
                    <div class="danger-zone">
                        <div class="danger-zone-inside">
                            <div class="change-password-container">
                                <div class="change-password-subtitle">
                                    <h3>Regisztráció törlése</h3>
                                    <p><i class="fas fa-exclamation-triangle"></i>&nbsp&nbspFigyelmeztetés: A fiókod <b>véglegesen törölve</b> lesz. Biztos vagy benne?</p>
                                </div>
                            </div>

                            <div class="form-group">
                                <span class="input-error"><?php echo $delPasswordCriteria;?></span>
                                <label class="col-md-4 control-label" for="Current Password ">Jelszó </label>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fas fa-unlock-alt"></i>
                                        </div>
                                        <input type="password" id="Current Password " name="delPassword" type="text" placeholder="Erősítsd meg a jelszavad" class="form-control input-md">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label" ></label>  
                                <div class="col-md-4">
                                    <button name="deleteAccount" class="btn btn-danger"><span class="glyphicon glyphicon-remove-sign"></span> Fiók törlése</button>
                                    <span class=message"><?php echo "&nbsp&nbsp <b>$passwordMessage</b>";?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div> 
    </div>
</div>

<div class="form-spacer">
    <br><br><br><br><br>
</div>
<!-- End User Profile -->