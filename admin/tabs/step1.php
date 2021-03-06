<?
IncludeModuleLangFile( __FILE__ );

$CODING = array(
    "cp1251" => "cp1251",
    "utf8" => "utf8"
);
                  
$activeChecekd = ( $arProfile["ACTIVE"] == "Y" ) ? 'checked="checked"' : "";

$profileDefaults = $profileUtils->GetDefaults( $arProfile["IBLOCK_ID"], true );

$obProfile = new CExportproProfileDB();
$dbProcessProfiles = $obProfile->GetProcessList(
    array(
        $by => $order
    ),
    array()
);

$arActualProfileNames = array();
while( $arProcessProfile = $dbProcessProfiles->Fetch() ){
    $arActualProfileNames[] = $arProcessProfile["NAME"];
}

if( !in_array( $arProfile["TYPE"], $arActualProfileNames ) ){
    $profileDefaults["PROFILE_CODE"] = $arProfile["TYPE"];
}
else{
    $bCorrentProfileName = false;
    $iProfileNameIndex = 1;
    while( !$bCorrentProfileName ){
        if( !in_array( $arProfile["TYPE"].$iProfileNameIndex, $arActualProfileNames ) ){
            $profileDefaults["PROFILE_CODE"] = $arProfile["TYPE"].$iProfileNameIndex;
            $bCorrentProfileName = true;
        }
        $iProfileNameIndex++;
    }
}    
?>
<tr class="heading" align="center">
    <td colspan="2"><b><?=GetMessage( "DATA_EXPORTPRO_STEP1_GENERAL" )?></b></td>
</tr>
<tr>
    <tr>
        <td width="40%" class="adm-detail-content-cell-l">
            <span id="hint_PROFILE[ACTIVE]"></span><script type="text/javascript">BX.hint_replace( BX( 'hint_PROFILE[ACTIVE]' ), '<?=GetMessage( "DATA_EXPORTPRO_STEP1_ACTIVE_HELP" )?>' );</script>
            <label for="PROFILE[ACTIVE]"><?=GetMessage( "DATA_EXPORTPRO_STEP1_ACTIVE" )?></label>
        </td>
        <td width="60%" class="adm-detail-content-cell-r">
            <input type="checkbox" name="PROFILE[ACTIVE]" <?=$activeChecekd?> value="Y" />
            <i><?=GetMessage( "DATA_EXPORTPRO_STEP1_ACTIVE_DESC" )?></i>
        </td>
    </tr>
    <td width="40%" class="adm-detail-content-cell-l">
        <span id="hint_PROFILE[NAME]"></span><script type="text/javascript">BX.hint_replace( BX( 'hint_PROFILE[NAME]' ), '<?=GetMessage( "DATA_EXPORTPRO_STEP1_NAME_HELP" )?>' );</script>
        <label for="PROFILE[NAME]"><b><?=GetMessage( "DATA_EXPORTPRO_STEP1_NAME" )?></b></label>
    </td>
    <td width="60%" class="adm-detail-content-cell-r" id="profile_name">
        <input type="text" size="30" name="PROFILE[NAME]" value="<?=( ( strlen( trim( htmlspecialcharsbx( $arProfile["NAME"] ) ) ) > 0 ) ? htmlspecialcharsbx( $arProfile["NAME"] ) : $profileDefaults["PROFILE_CODE"] );?>"/>
    </td>
</tr>
<tr>
    <td width="40%" class="adm-detail-content-cell-l">
        <span id="hint_PROFILE[CODE]"></span><script type="text/javascript">BX.hint_replace( BX( 'hint_PROFILE[CODE]' ), '<?=GetMessage( "DATA_EXPORTPRO_STEP1_CODE_HELP" )?>' );</script>
        <label for="PROFILE[CODE]"><b><?=GetMessage( "DATA_EXPORTPRO_STEP1_CODE" )?></b> </label>
    </td>
    <td width="60%" class="adm-detail-content-cell-r" id="profile_code">
        <input type="text" size="30" name="PROFILE[CODE]" value="<?=( ( strlen( trim( htmlspecialcharsbx( $arProfile["CODE"] ) ) ) > 0 ) ? htmlspecialcharsbx( $arProfile["CODE"] ) : $profileDefaults["PROFILE_CODE"] );?>"/>
    </td>
</tr>
<tr>
    <td width="40%" class="adm-detail-content-cell-l">
        <span id="hint_PROFILE[DESCRIPTION]"></span><script type="text/javascript">BX.hint_replace( BX( 'hint_PROFILE[DESCRIPTION]' ), '<?=GetMessage( "DATA_EXPORTPRO_STEP1_DESCRIPTION_HELP" )?>' );</script>
        <label for="PROFILE[DESCRIPTION]"><?=GetMessage( "DATA_EXPORTPRO_STEP1_DESCRIPTION" )?></label>
    </td>
    <td width="60%" class="adm-detail-content-cell-r">
        <textarea id="PROFILE[DESCRIPTION]" rows="5" cols="23" name="PROFILE[DESCRIPTION]"><?=( ( strlen( trim( $arProfile["DESCRIPTION"] ) ) > 0 ) ? htmlspecialcharsbx( $arProfile["DESCRIPTION"] ) : $profileDefaults["SITE_NAME"] );?></textarea>
    </td>
</tr>
<tr>
    <td width="40%" class="adm-detail-content-cell-l">
        <span id="hint_PROFILE[SHOPNAME]"></span><script type="text/javascript">BX.hint_replace( BX( 'hint_PROFILE[SHOPNAME]' ), '<?=GetMessage( "DATA_EXPORTPRO_STEP1_SHOPNAME_HELP" )?>' );</script>
        <label for="PROFILE[SHOPNAME]"><b><?=GetMessage( "DATA_EXPORTPRO_STEP1_SHOPNAME" )?></b></label>
    </td>
    <td width="60%" class="adm-detail-content-cell-r">
        <input id="PROFILE[SHOPNAME]" type="text" size="30" name="PROFILE[SHOPNAME]" value="<?=( ( strlen( trim( $arProfile["SHOPNAME"] ) ) > 0 ) ? htmlspecialcharsbx( $arProfile["SHOPNAME"] ) : $profileDefaults["SITE_NAME"] );?>"/>
    </td>
</tr>
<tr>
    <td width="40%" class="adm-detail-content-cell-l">
        <span id="hint_PROFILE[COMPANY]"></span><script type="text/javascript">BX.hint_replace( BX( 'hint_PROFILE[COMPANY]' ), '<?=GetMessage( "DATA_EXPORTPRO_STEP1_COMPANY_HELP" )?>' );</script>
        <label for="PROFILE[COMPANY]"><b><?=GetMessage( "DATA_EXPORTPRO_STEP1_COMPANY" )?></b></label>
    </td>
    <td width="60%" class="adm-detail-content-cell-r">
        <input id="PROFILE[COMPANY]" type="text" size="30" name="PROFILE[COMPANY]" value="<?=( ( strlen( trim( $arProfile["COMPANY"] ) ) > 0 ) ? htmlspecialcharsbx( $arProfile["COMPANY"] ) : $profileDefaults["SITE_NAME"] );?>"/>
    </td>
</tr>
<tr>
    <td width="40%" class="adm-detail-content-cell-l">
        <span id="hint_PROFILE[DOMAIN_NAME]"></span><script type="text/javascript">BX.hint_replace( BX( 'hint_PROFILE[DOMAIN_NAME]' ), '<?=GetMessage( "DATA_EXPORTPRO_STEP1_DOMAIN_NAME_HELP" )?>' );</script>
        <label for="PROFILE[DOMAIN_NAME]"><b><?=GetMessage( "DATA_EXPORTPRO_STEP1_DOMAIN_NAME" )?></b></label>
    </td>
    <td width="60%" class="adm-detail-content-cell-r">
        <input id="PROFILE[DOMAIN_NAME]" type="text" size="30" name="PROFILE[DOMAIN_NAME]" value="<?=( ( strlen( trim( $arProfile["DOMAIN_NAME"] ) ) > 0 ) ? $arProfile["DOMAIN_NAME"] : $profileDefaults["DOMAIN_NAME"] );?>"/>
    </td>
</tr>
<tr>
    <td width="40%" class="adm-detail-content-cell-l">
        <span id="hint_PROFILE[LID]"></span><script type="text/javascript">BX.hint_replace( BX( 'hint_PROFILE[LID]' ), '<?=GetMessage( "DATA_EXPORTPRO_STEP1_SITE_HELP" )?>' );</script>
        <label for="PROFILE[LID]"><b><?=GetMessage( "DATA_EXPORTPRO_STEP1_SITE" )?></b></label>
    </td>
    <td width="60%" class="adm-detail-content-cell-r"><?=CLang::SelectBox( "PROFILE[LID]", $arProfile["LID"], "", "" )?></td>
</tr>
<tr>
    <td width="40%" class="adm-detail-content-cell-l">
        <span id="hint_PROFILE[ENCODING]"></span><script type="text/javascript">BX.hint_replace( BX( 'hint_PROFILE[ENCODING]' ), '<?=GetMessage( "DATA_EXPORTPRO_STEP1_ENCODING_HELP" )?>' );</script>
        <label for="PROFILE[ENCODING]"><b><?=GetMessage( "DATA_EXPORTPRO_STEP1_ENCODING" )?></b></label>
    </td>
    <td width="60%" class="adm-detail-content-cell-r">
        <select name="PROFILE[ENCODING]">
            <?foreach( $CODING as $cod => $elem ){?>
                <?$sel = ( $arProfile["ENCODING"] == $cod ) ? "selected" : "";?>
                <option value="<?=$cod?>" <?=$sel?>><?=$elem?></option>
            <?}?>
        </select>
    </td>
</tr>