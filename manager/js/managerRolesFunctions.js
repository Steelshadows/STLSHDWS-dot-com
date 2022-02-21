function submitUserRoles(){
    console.log('edits');  
    edits = {
        'uid': $("#view_uid").html(),
        'role_ids': $("#edit_role_ids").html(),
    }
    console.log(edits);
    doRequest("../.php/action.php?action=submitUserRoles",edits,(res)=>{
        $data = JSON.parse(res);
        console.log($data)
        $(".all_urls").html($(".all_urls").html()+$data["html"])

        $("#url-"+edits["id"]).html(edits["url"]);
        $("#duration-"+edits["id"]).html(edits["duration"]);
        $("#pageInfo-"+edits["id"]).html(edits["pageInfo"]);
        $("#status-"+edits["id"]).html(edits["status"]);

        // $("#edit_id").html($data["id"]);
        // $("#edit_url").val($data["url"]);
        // $("#edit_duration").val($data["duration"]);
        // $("#edit_pageInfo").val($data["pageInfo"]);
    }) 
}
function searchUsers(){
    console.log('search');
}
function addRole(args){
    select_str = "0";
    $('*[data-roleid]:checked').each((key,item)=>{
        console.log(item);
        select_str += "," + $(item).data()['roleid']
        
    });
    $("#edit_role_ids").html(select_str);
}
function select_edit_user(args){
    args = JSON.parse(args);
    id = args['id'];

    console.log('select',args);
    $(".role_editor").removeClass("d-none");
    $(".role_list").removeClass("d-none");



    $uid = $("#uid-"+id).html();
    $username = $("#username-"+id).html();
    $email = $("#email-"+id).html();
    $alias = $("#alias-"+id).html();
    $role_ids = $("#role_ids-"+id).html();


    $("#view_uid").html($uid);
    $("#view_username").html($username);
    $("#view_email").html($email);
    $("#view_alias").html($alias);
    $("#edit_role_ids").html($role_ids);

    $('*[data-roleid]').prop('checked',false);
    $role_ids.split(",").forEach((item)=>{
        console.log(item);
        $('*[data-roleid="'+item+'"]').prop('checked',true);        
    });

}