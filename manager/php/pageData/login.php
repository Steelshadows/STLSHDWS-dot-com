<?php
  $data = json_decode(stripslashes(file_get_contents("php://input")),true);
?>
  <script type="temp">    
    
    document.title = "Manager login";
    
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
        if(results.success)goToPage('myBioPage');
      });
    });
  </script>
  <div class="row justify-content-center">
    <div class="col log_in">
      <h1>log in</h1>
      <form id="loginForm">
        <div class="row m-2"><label class="col-3">Username:</label><input name="username" class="col-6" type="text" placeholder="Username"></div>
        <div class="row m-2"><label class="col-3">Password:</label><input name="pass" class="col-6" type="password" placeholder="Password"></div>
        <div class="row m-2"><input class="col-9" name="l-submit" type="submit" value="Log in!"></div>
        <div class="row m-2"><a id="show_pass_reset" class="col-12 text-justify show_pass_reset" name="forgotPassword">?forgot your password?</a></div>
      </form>
    </div>
  </div>
