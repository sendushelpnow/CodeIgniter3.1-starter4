<div id="body">
    <!--<img id="manimg" src="/assets/img/man_mage.png" alt="image of bathroom warrior" />-->
    <h2>Change Gear:</h2>
    <div id="theform">
        <select id="sets" name="sets">
            <!--Populates dropdown menu by data in Equipment_Sets.csv-->
            {equipment_sets}
            <option value="{Set Name}">{Set Name}</option>
            {/equipment_sets}
        </select>
        <input type="submit" onclick="equip_set()"/>
    </div>

    <h2>Inventory</h2>
    <table class="table">
        <tr>
            <td></td>
            <td><img src="/assets/img/{id_headwear}.png" /></td>
        </tr>
        <tr>
            <td></td>
            <td><img src="/assets/img/{id_armor}.png" /></td>
        </tr>
        <tr>
            <td></td>
            <td><img src="/assets/img/{id_weapon}.png" /></td>
        </tr>
        <tr>
            <td></td>
            <td><img src="/assets/img/{id_footwear}.png" /></td>
        </tr>
    </table>
</div>
<script  src="/assets/js/welcome.js" />