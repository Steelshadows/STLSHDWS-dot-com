<?php

    require_once('../../../.php/class/DB_class.php');
    $db_connection = new db_connection();

    $urls_db = $db_connection->fetchAllQuery("SELECT `uid`,`username`,`email`,`alias`,`role_ids` FROM `users` ORDER BY `uid`");
?>

    <script type="temp">    
    document.title = "Roles Manager";
    function searchUsers(){
        console.log(hoi);
    }
    </script>

    <div class="container bg-white">
        <div class="row">
            <div class="row col-12 action_buttons">
                <input class="col-5 m-2" type="text">
                <button class="col-2 m-2" onclick="searchUsers()">search</button>
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
                                            <label class="col-3"><?=$key?>:</label>
                                            <label id="<?=$key?>-<?=$item["uid"]?>"class="col-9"><?=$value?></label>
                                        </div>
                                    <?php
                                }
                            ?>
                        </div>
                    <?php
                        }
                    ?>

</div>
            </div>
            <div class="col-6">
                <div class="url_editor p-3 d-none">
                    <div class="row p-1">
                        <label class="col-3">id:</label>
                        <label id="edit_id"class="col-9"></label>
                    </div>
                    
                    <div class="row p-1">
                        <label class="col-3">url:</label>
                        <input type="text" id="edit_url"class="col-9"></input>
                    </div>
                        
                    <div class="row p-1">
                        <label class="col-3">duration:</label>
                        <input type="number" id="edit_duration"class="col-9"></input>
                    </div>
                    
                    <div class="row p-1">
                        <label class="col-3">pageInfo:</label>
                        <textarea id="edit_pageInfo"class="col-9"></textarea>
                    </div>
                        
                    <div class="row p-1">
                        <label class="col-3">date:</label>
                        <label id="edit_date" class="col-9"></label>
                    </div>
                    <div class="row p-1">
                        <label class="col-3">status:</label>
                        <div id="edit_status" class="row col-9">
                            <div class="row align-items-center">
                                <input id="status_radio_active" type="radio" class="col-1" name="status" value="active">
                                <label class="col-11">active</label>
                            </div>
                            <div class="row align-items-center">
                                <input id="status_radio_hidden" type="radio" class="col-1" name="status" value="hidden">
                                <label class="col-11">hidden</label>
                            </div>
                        </div>
                        
                    </div>
                    <div class="row p-1">
                        <button class="col-3 m-2" onclick="submitEditFramePage()">submit</button>
                        
                    </div>
                </div>
                <div class="preview_box p-3 d-none">
                    <iframe scrolling="no" id="preview_frame" class="preview_frame" frameborder="0">
                </div>
            </div>
        </div>
    </div>