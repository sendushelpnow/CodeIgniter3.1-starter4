<div id="body">
    <img id="manimg" src="/assets/img/man_mage.svg" alt="image of bathroom warrior" />
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
</div>
