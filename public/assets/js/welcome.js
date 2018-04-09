/**
 * 
 * @author Jeremy Lee
 */
function equip_set()
{
//    var imgPath = "/assets/img/man_";
//    imgPath = imgPath.concat(document.getElementById("sets").value);
//    imgPath = imgPath.concat(".png");
//    document.getElementById("manimg").src = imgPath;

    var name = document.getElementById("sets").value;
    window.alert(name);
    window.location.href = "/Welcome/show_page/" + name;
//  window.location.href = "<?php echo site_url('/Welcome/select_set');?>?name=" + name;
}