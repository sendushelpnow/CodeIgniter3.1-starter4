/**
 * 
 * @author Calvin Lai
 */
function modify_item()
{
    var id = document.getElementById("id").value;
    var category = document.getElementById("category").value;
    var name = document.getElementById("name").value;
    var mobility = document.getElementById("mobility").value;
    var range = document.getElementById("range").value;
    var power = document.getElementById("power").value;
    var protection = document.getElementById("protection").value;

    // window.location = "/maintenance/submit/" + id + "/" + category + "/" + name + "/" + mobility + "/" + range + "/" + power + "/" + protection ;
    window.location = "/maintenance/submit/5/Weapon/Sword/10/10/10/10";
}