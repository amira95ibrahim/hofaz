function tweetshare(url,imgsrc,title){
    var myWindow = window.open("https://twitter.com/intent/tweet?url="+url, "", "top=250,left=450,width=460,height=300");
   }  
   
   window.fbAsyncInit = function(){
   FB.init({
       appId: '2337409839892836', status: true, cookie: true, xfbml: true }); 
   };
   (function(d, debug){var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
       if(d.getElementById(id)) {return;}
       js = d.createElement('script'); js.id = id; 
       js.async = true;js.src = "//connect.facebook.net/en_US/all" + (debug ? "/debug" : "") + ".js";
       ref.parentNode.insertBefore(js, ref);}(document, /*debug*/ false));
       
   function postToFeed(title, desc, url, image){
   var obj = {method: 'feed',link: url, picture: image ,name: title,description: desc};
   function callback(response){}
   FB.ui(obj, callback);
   }
     
   function facebookshare(){
        FB.ui({
        appId:'<?php echo appId?>',
       method: 'share',
       display: 'popup',
        href : '<?php echo base_url()?>',
       xfbml  : true, // parse XFBML
      version    : 'v2.8'
     }, function(response){});
   }
   
   
   