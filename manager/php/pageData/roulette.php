<?php
    require_once('../../../.php/class/DB_class.php');
    $db_connection = new db_connection();

    $urls_db = $db_connection->fetchAllQuery("SELECT * FROM `pages` WHERE 1");
?>

    <div id="pageTitle" data-pagetitle="Roulette Manager"></div>
    <script type="temp">
    </script>

    <div class="container bg-white">
        <div class="row">
            <div class="row col-12 action_buttons">
                <button class="col-2 m-2" onclick="newFramePage()">new frame</button>
            </div>
            <div class="col-6">
                <div class="all_urls">
                    <?php
                        foreach($urls_db as $item){
                    ?>
                        <div class="row p-3">
                            <?php
                                foreach($item as $key => $value){
                                    ?>
                                        <div class="row">
                                            <label class="col-3"><?php echo $key;?>:</label>
                                            <label id="<?php echo $key;?>-<?php echo $item["id"];?>"class="col-9"><?php echo $value;?></label>
                                        </div>
                                    <?php
                                }
                            ?>
                            <div class="row">
                                <button class="col-3 m-2" onclick="editFramePage(<?php echo $item['id'];?>)">edit</button>
                                <button class="col-3 m-2" onclick="previewFramePage(<?php echo $item['id'];?>)">preview</button>
                            </div>
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