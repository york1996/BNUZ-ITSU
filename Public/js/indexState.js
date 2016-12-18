/**
 * Created by YxMadOC on 16/5/10.
 */
$(document).ready(function () {
    //普通按钮jQuery路由(主页.投票.报名)
    /**
     * 包括页面的加载(load)与active样式的改变(attr)以及页面位置定位(window.location)
     */
    $("#mainFrame").load("templates/index.html");

    $("#index").click(function () {
       $("nav ul li.active").attr("class","");
       $("#index").attr("class","active")
       $("#mainFrame").load("templates/index.html");
       window.location.hash = "#index";
   });
    $("#vote").click(function () {
        $("nav ul li.active").attr("class","");
        $("#vote").attr("class","active");
        $("#mainFrame").load();
        window.location.hash = "#vote";
    });
    $("#apply").click(function () {
        $("nav ul li.active").attr("class","");
        $("#apply").attr("class","active");
        $("#mainFrame").load("templates/apply.html");
        window.location.hash = "#apply";
    });

    //下拉菜单jQuery路由(栏目)
    $("#news").click(function(){
        $("nav ul li.active").attr("class","");
        $("#section").attr("class","active");
        $("#mainFrame").load("templates/news.html");
        window.location.hash = "#news";
    });
    $("#activity").click(function () {
        $("nav ul li.active").attr("class","");
        $("#section").attr("class","active");
        $("#mainFrame").load("templates/activity.html");
        window.location.hash = "#activity";
    });
  

    var hash = window.location.hash;
    $(hash).click();
});