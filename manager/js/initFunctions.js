function initDefault(){
    document.title = $("#pageTitle").data()["pagetitle"];    
    loadClickEvents();
}
function initLoginManager(){    
    initDefault(); 
    document.getElementById("loginForm").addEventListener("submit",(e)=>{
        e.preventDefault();
        
        formDataJson = [];
        document.forms['loginForm'].querySelectorAll("input").forEach((item,key)=>{
            itemObj = {};
            itemObj.name = item.name;
            itemObj.value = item.value;
            formDataJson.push(itemObj)
        })
        console.log(formDataJson);
  
        doRequest('../.php/action.php?action=userLoginCheck',formDataJson,(res)=>{
            console.log(res);
            results = JSON.parse(res);
            refreshLoggedinUserData();
            if(results.success)goToPage('home');
        });
    });
}
