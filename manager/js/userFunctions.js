function userLogout(){
    doRequest('../.php/action.php?action=userLogout',(res)=>{
        sessionStorage.removeItem("uid")
        sessionStorage.removeItem("username")
        sessionStorage.removeItem("alias")
        sessionStorage.removeItem("image")
        sessionStorage.removeItem("bio")
        refreshLoggedinUserData();
        goToPage("login");
    }); 
}
function refreshLoggedinUserData(callback){
    sessionStorage.removeItem("alias");
    sessionStorage.removeItem("bio");
    sessionStorage.removeItem("email");
    sessionStorage.removeItem("image");
    sessionStorage.removeItem("uid");
    sessionStorage.removeItem("username");
    sessionStorage.removeItem("role_ids");
    doRequest('../.php/action.php?action=getUserFromSession',(res)=>{
        res = JSON.parse(res);
        if(res.success){
            sessionStorage.setItem("alias",res.data.alias);
            sessionStorage.setItem("bio",res.data.bio);
            sessionStorage.setItem("email",res.data.email);
            sessionStorage.setItem("image",res.data.image);
            sessionStorage.setItem("uid",res.data.uid);
            sessionStorage.setItem("username",res.data.username);
            sessionStorage.setItem("role_ids",res.data.role_ids);
            
        }  
        updateUserGUI(); 
        if(typeof callback == "function")callback();
    });
}
function updateUserGUI(){
    // START: show/hide elements based on login status
    if(sessionStorage.getItem("uid") != null){
        document.querySelectorAll(".user_logged_out").forEach((item,key)=>{
            item.classList.add("d-none")    
        })
        document.querySelectorAll(".user_logged_in").forEach((item,key)=>{
            item.classList.remove("d-none")    
        })
        document.querySelectorAll(".user-"+sessionStorage.getItem("uid")).forEach((item)=>{item.classList.remove("d-none")});
    }else{
        document.querySelectorAll(".user_logged_out").forEach((item,key)=>{
            item.classList.remove("d-none")    
        })
        document.querySelectorAll(".user_logged_in").forEach((item,key)=>{
            item.classList.add("d-none")    
        })
    }
    // END: show/hide elements based on login status
    // START: fill data tags based on the logged in user
    if(sessionStorage.getItem("uid") != null){ // login session check
        document.querySelectorAll(".display_alias").forEach((item,key)=>{
            item.innerText =  sessionStorage.getItem("alias");  
        })
        document.querySelectorAll(".display_username").forEach((item,key)=>{
            item.innerText =  sessionStorage.getItem("username");  
        })
        document.querySelectorAll(".display_uid").forEach((item,key)=>{
            item.innerText =  sessionStorage.getItem("uid");  
        })
        document.querySelectorAll(".display_image").forEach((item,key)=>{
            item.src =  sessionStorage.getItem("image");  
        })
        document.querySelectorAll(".display_bio").forEach((item,key)=>{
            item.innerHTML =  sessionStorage.getItem("bio");  
        })
    }
    // END: fill data tags based on the logged in user
}