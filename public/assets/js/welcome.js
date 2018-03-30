/**
 * 
 * @author Jeremy Lee
 */
function equip_set()
{
    var imgPath = "/assets/img/man_";
    imgPath = imgPath.concat(document.getElementById("sets").value);
    imgPath = imgPath.concat(".png");
    document.getElementById("manimg").src = imgPath;
}