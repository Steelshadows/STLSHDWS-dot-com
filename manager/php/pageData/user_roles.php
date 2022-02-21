<?php

    require_once('../../../.php/class/DB_class.php');
    $db_connection = new db_connection();

    $users = $db_connection->fetchAllQuery("SELECT `uid`,`username`,`email`,`alias`,`role_ids` FROM `users` ORDER BY `uid`");
    $roles = $db_connection->fetchAllQuery("SELECT * FROM `roles`");
?>
    <div id="pageTitle" data-pagetitle="Roles Manager"></div>
    <script type="temp">    
    </script>

    <div class="container bg-white">
        <div class="row">
            <div class="row col-12 action_buttons d-none"> <!--potential searchbar, if there is enough time-->
                <input class="col-5 m-2" type="text">
                <button class="col-2 m-2 clickEvent noArg" data-function="searchUsers">search</button>
            </div>
            <div class="col-4">
                <div class="all_urls">
                    <?php
                        foreach($users as $item){//creates html for each selected database record
                    ?>
                        <div class="row p-3">    
                            <?php
                                foreach($item as $key => $value){//creates html for each selected database collumn
                                    ?>
                                        <div class="row">
                                            <label class="col-3"><?php echo $key;?>:</label>
                                            <label id="<?php echo $key;?>-<?php echo $item["uid"];?>"class="col-9"><?php echo $value;?></label>
                                        </div>
                                    <?php
                                }
                            ?>
                            <div class="row">
                                <button class="submitEdits clickEvent arg" class="col-3 m-2" data-function="select_edit_user" data-args='{"id":"<?php echo $item["uid"];?>"}'>edit this user</button>
                            </div>
                        </div>
                    <?php
                        }
                    ?>

</div>
            </div>
            <div class="col-5">
                <div class="role_editor p-3 d-none">
                    <div class="row p-3">    
                        <div class="row">
                            <label class="col-3">uid:</label>
                            <label id="view_uid" class="col-9"></label>
                        </div>
                        <div class="row">
                            <label class="col-3">username:</label>
                            <label id="view_username" class="col-9"></label>
                        </div>
                        <div class="row">
                            <label class="col-3">email:</label>
                            <label id="view_email" class="col-9"></label>
                        </div>
                        <div class="row">
                            <label class="col-3">alias:</label>
                            <label id="view_alias" class="col-9"></label>
                        </div>
                        <div class="row">
                            <label class="col-3">role ids:</label>
                            <label id="edit_role_ids" class="col-9"></label>
                        </div>
                    </div>
                    <div class="row p-1">
                        <button class="submitEdits clickEvent noArg" class="col-3 m-2" data-function="submitUserRoles">submit</button>
                        
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="role_list d-none">
                    <?php
                        foreach($roles as $item){//creates html for each selected database record
                    ?>
                        <div class="row">
                            <div class="col-1 p-1">
                                <input type="checkbox" class="clickEvent arg" <?php echo ($item["role_id"] == 1)?"disabled":"";?> data-function="addRole" data-roleid="<?php echo $item["role_id"];?>" data-args='{"role_id":"<?php echo $item["role_id"];?>"}'>
                            </div>
                            <div class="col">
                                <label><?php echo $item["role_name"];?></label>
                            </div>                    
                        </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>