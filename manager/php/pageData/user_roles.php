<?php

    require_once('../../../.php/class/DB_class.php');
    $db_connection = new db_connection();

    $urls_db = $db_connection->fetchAllQuery("SELECT `uid`,`username`,`email`,`alias`,`role_ids` FROM `users` ORDER BY `uid`");
?>

    <script type="temp">    
    document.title = "Roles Manager";    
    loadClickEvents();
    </script>

    <div class="container bg-white">
        <div class="row">
            <div class="row col-12 action_buttons d-none"> <!--potential searchbar, if there is enough time-->
                <input class="col-5 m-2" type="text">
                <button class="col-2 m-2 clickEvent noArg" data-function="searchUsers">search</button>
            </div>
            <div class="col-6">
                <div class="all_urls">
                    <?php
                        foreach($urls_db as $item){//creates html for each selected database record
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
                                <button class="submitEdits clickEvent arg" class="col-3 m-2" data-function="select_edit_user" data-args="{'id':'<?php echo $item["uid"];?>'}">edit this user</button>
                            </div>
                        </div>
                    <?php
                        }
                    ?>

</div>
            </div>
            <div class="col-6">
                <div class="url_editor p-3">
                    <div class="row p-3">    
                        <div class="row">
                            <label class="col-3">uid:</label>
                            <label id="uid" class="col-9">28</label>
                        </div>
                        <div class="row">
                            <label class="col-3">username:</label>
                            <label id="username" class="col-9">STLSHDWS</label>
                        </div>
                        <div class="row">
                            <label class="col-3">email:</label>
                            <label id="email" class="col-9"></label>
                        </div>
                        <div class="row">
                            <label class="col-3">alias:</label>
                            <label id="alias" class="col-9">steel</label>
                        </div>
                        <div class="row">
                            <label class="col-3">role_ids:</label>
                            <label id="role_ids" class="col-9">1,2</label>
                        </div>
                    </div>
                    <div class="row p-1">
                        <button class="submitEdits clickEvent noArg" class="col-3 m-2" data-function="submitUserRoles">submit</button>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>