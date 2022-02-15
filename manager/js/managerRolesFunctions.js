function submitUserRoles(){
    console.log('edits');   
}
function searchUsers(){
    console.log('search');
}
function addRole(args){
    args = JSON.parse(args);
    console.log('addRole',args);
    console.log($('*[data-roleid="'+args["role_id"]+'"]').prop('checked'));
    
    $checked = $('*[data-roleid="'+args["role_id"]+'"]').prop('checked');
    $role_ids = $("#edit_role_ids").html().split(",");
    $index = $role_ids.indexOf(args["role_id"]);
    if($index != -1){
        console.log('found role',$index);
        if($checked == false){
            $("#edit_role_ids").html($("#edit_role_ids").html() + ","+args["role_id"]);
        } 
    }else{
        console.log('no role');
        if($checked){
            $("#edit_role_ids").html($("#edit_role_ids").html() + ","+args["role_id"]);
        }        
    }

    //select checked and create string
    /*
    select_str = "0";
    $('*[data-roleid]:checked').each((item)=>{
        select_str += "," + item.attr('data-roleid')
        
    })
    select_str
    */
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