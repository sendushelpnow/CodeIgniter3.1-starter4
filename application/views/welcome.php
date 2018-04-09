<div id="body">
    <h2>Change Gear:</h2>
    <div id="theform">
        <select id="sets" name="sets">
            {equipment_sets}
            <option value="{Set Name}">{Set Name}</option>
            {/equipment_sets}
        </select>
        <input type="submit" onclick="equip_set()"/>
    </div>

    <h2>Gear View</h2>
    <div id="man">
        <div class="row" id="headwear">
            <img class="item"  src="/assets/img/{id_headwear}.png" />
        </div>    
        <div class="row" id="armor">
            <img class="item"  src="/assets/img/{id_armor}.png" />
        </div>
        <div class="row" id="weapon">
            <img class="item"  src="/assets/img/{id_weapon}.png" />
        </div>
        <div class="row" id="footwear">
            <img class="item"  src="/assets/img/{id_footwear}.png" />
        </div>
    </div>

    <h2>Stats View</h2>
    <table class="table">
        <tr>
            <td>Mobility</td>            
            <td>Range</td>
            <td>Power</td>
            <td>Protection</td>
        </tr>
        <tr>
            <td>{Mobility}</td>            
            <td>{Range}</td>
            <td>{Power}</td>
            <td>{Protection}</td>
        </tr>
    </table>
</div>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/welcome.css">
<script src="/assets/js/welcome.js"></script>