<table>
<tr>
<td class="movie-cover" rowspan="4"><img src="<?php echo($movie->poster_url); ?>" alt="<?php echo($movie->name); ?>"/></td>
<td class="movie-title">
<?php echo($movie->name . ' (' . $movie->category . ')'); ?>
</td>
</tr>
<tr>
<td class="padded-column"><?php echo($movie->summary); ?></td>
</tr>
<tr>
<td class="padded-column"><?php echo($screening->niceDate() . ' - ' . $screening->time); ?></td>
</tr>
<tr>
<td class="padded-column"><a id="reset" href="javascript:void(0);">Change Movie or Session Time</a></td>
</tr>
</table>
<script>
$("#reset").click(function() {
  $("#seating").hide();
  $("#movie-selection").show();
});
</script>
<?php

$map = <<<EOF
<div>
<table class="map" width="579" height="447" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td colspan="91">
			<img src="public/images/map/Seats_01.gif" width="578" height="15" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="1" height="15" alt=""></td>
	</tr>
	<tr>
		<td colspan="34" rowspan="2">
			<img src="public/images/map/Seats_02.gif" width="204" height="10" alt=""></td>
		<td colspan="2" rowspan="7">
			<img src="public/images/map/Seats_03.gif" width="30" height="30" alt=""></td>
		<td colspan="4" rowspan="29">
			<img src="public/images/map/Seats_04.gif" width="11" height="92" alt=""></td>
		<td colspan="2" rowspan="7">
			<img src="public/images/map/Seats_05.gif" width="28" height="30" alt=""></td>
		<td colspan="4" rowspan="29">
			<img src="public/images/map/Seats_06.gif" width="38" height="92" alt=""></td>
		<td colspan="2" rowspan="7">
			<img src="public/images/map/Seats_07.gif" width="28" height="30" alt=""></td>
		<td colspan="5" rowspan="29">
			<img src="public/images/map/Seats_08.gif" width="12" height="92" alt=""></td>
		<td colspan="2" rowspan="7">
			<img src="public/images/map/Seats_09.gif" width="28" height="30" alt=""></td>
		<td colspan="36">
			<img src="public/images/map/Seats_10.gif" width="199" height="8" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="1" height="8" alt=""></td>
	</tr>
	<tr>
		<td colspan="10" rowspan="9">
			<img src="public/images/map/Seats_11.gif" width="60" height="32" alt=""></td>
		<td colspan="6" rowspan="7">
			<img src="public/images/map/Seats_12.gif" width="21" height="24" alt=""></td>
		<td colspan="20" rowspan="2">
			<img src="public/images/map/Seats_13.gif" width="118" height="7" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="1" height="2" alt=""></td>
	</tr>
	<tr>
		<td colspan="19">
			<img src="public/images/map/Seats_14.gif" width="123" height="5" alt=""></td>
		<td colspan="4" rowspan="6">
			<img src="public/images/map/Seats_15.gif" width="22" height="22" alt=""></td>
		<td colspan="11" rowspan="9">
			<img src="public/images/map/Seats_16.gif" width="59" height="32" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="1" height="5" alt=""></td>
	</tr>
	<tr>
		<td colspan="15">
			<img src="public/images/map/Seats_17.gif" width="102" height="6" alt=""></td>
		<td colspan="4" rowspan="6">
			<img src="public/images/map/Seats_18.gif" width="21" height="23" alt=""></td>
		<td rowspan="10">
			<img src="public/images/map/Seats_19.gif" width="2" height="32" alt=""></td>
		<td colspan="5" rowspan="6">
			<img src="public/images/map/Seats_20.gif" width="19" height="23" alt=""></td>
		<td colspan="14">
			<img src="public/images/map/Seats_21.gif" width="97" height="6" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="1" height="6" alt=""></td>
	</tr>
	<tr>
		<td colspan="10" rowspan="2">
			<img src="public/images/map/Seats_22.gif" width="81" height="7" alt=""></td>
		<td colspan="5" rowspan="8">
			<img src="public/images/map/Seats_23.gif" width="21" height="23" alt=""></td>
		<td colspan="5" rowspan="8">
			<img src="public/images/map/Seats_24.gif" width="24" height="23" alt=""></td>
		<td colspan="9">
			<img src="public/images/map/Seats_25.gif" width="73" height="5" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="1" height="5" alt=""></td>
	</tr>
	<tr>
		<td colspan="5" rowspan="10">
			<img src="public/images/map/Seats_26.gif" width="21" height="25" alt=""></td>
		<td colspan="4" rowspan="2">
			<img src="public/images/map/Seats_27.gif" width="52" height="4" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="1" height="2" alt=""></td>
	</tr>
	<tr>
		<td colspan="4" rowspan="2">
			<img src="public/images/map/Seats_28.gif" width="57" height="4" alt=""></td>
		<td colspan="5" rowspan="8">
			<img src="public/images/map/Seats_29.gif" width="21" height="21" alt=""></td>
		<td rowspan="13">
			<img src="public/images/map/Seats_30.gif" width="3" height="31" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="1" height="2" alt=""></td>
	</tr>
	<tr>
		<td colspan="2" rowspan="6">
			<img src="public/images/map/Seats_31.gif" width="30" height="17" alt=""></td>
		<td colspan="2" rowspan="6">
			<img src="public/images/map/Seats_32.gif" width="28" height="17" alt=""></td>
		<td colspan="2" rowspan="6">
			<img src="public/images/map/Seats_33.gif" width="28" height="17" alt=""></td>
		<td colspan="2" rowspan="6">
			<img src="public/images/map/Seats_34.gif" width="28" height="17" alt=""></td>
		<td colspan="3" rowspan="10">
			<img src="public/images/map/Seats_35.gif" width="23" height="25" alt=""></td>
		<td rowspan="59">
			<img src="public/images/map/Seats_36.gif" width="29" height="401" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="1" height="2" alt=""></td>
	</tr>
	<tr>
		<td rowspan="58">
			<img src="public/images/map/Seats_37.gif" width="36" height="399" alt=""></td>
		<td colspan="3" rowspan="9">
			<img src="public/images/map/Seats_38.gif" width="21" height="23" alt=""></td>
		<td colspan="4" rowspan="3">
			<img src="public/images/map/Seats_39.gif" width="22" height="10" alt=""></td>
		<td colspan="6" rowspan="2">
			<img src="public/images/map/Seats_40.gif" width="21" height="8" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="1" height="6" alt=""></td>
	</tr>
	<tr>
		<td colspan="4" rowspan="4">
			<img src="public/images/map/Seats_41.gif" width="21" height="9" alt=""></td>
		<td colspan="5" rowspan="4">
			<img src="public/images/map/Seats_42.gif" width="19" height="9" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="1" height="2" alt=""></td>
	</tr>
	<tr>
		<td colspan="7" rowspan="12">
			<img src="public/images/map/Seats_43.gif" width="51" height="31" alt=""></td>
		<td colspan="6" rowspan="10">
			<img src="public/images/map/Seats_44.gif" width="23" height="23" alt=""></td>
		<td colspan="3" rowspan="3">
			<img src="public/images/map/Seats_45.gif" width="7" height="7" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="1" height="2" alt=""></td>
	</tr>
	<tr>
		<td colspan="2" rowspan="2">
			<img src="public/images/map/Seats_46.gif" width="10" height="5" alt=""></td>
		<td colspan="6" rowspan="9">
			<img src="public/images/map/Seats_47.gif" width="21" height="21" alt=""></td>
		<td colspan="7" rowspan="10">
			<img src="public/images/map/Seats_48.gif" width="50" height="27" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="1" height="2" alt=""></td>
	</tr>
	<tr>
		<td colspan="5" rowspan="3">
			<img src="public/images/map/Seats_49.gif" width="21" height="7" alt=""></td>
		<td colspan="5" rowspan="4">
			<img src="public/images/map/Seats_50.gif" width="24" height="9" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="1" height="3" alt=""></td>
	</tr>
	<tr>
		<td colspan="2" rowspan="2">
			<img src="public/images/map/Seats_51.gif" width="7" height="4" alt=""></td>
		<td colspan="4" rowspan="8">
			<img src="public/images/map/Seats_52.gif" width="24" height="22" alt=""></td>
		<td colspan="2" rowspan="10">
			<img src="public/images/map/Seats_53.gif" width="30" height="27" alt=""></td>
		<td colspan="2" rowspan="10">
			<img src="public/images/map/Seats_54.gif" width="28" height="27" alt=""></td>
		<td colspan="2" rowspan="10">
			<img src="public/images/map/Seats_55.gif" width="28" height="27" alt=""></td>
		<td colspan="2" rowspan="10">
			<img src="public/images/map/Seats_56.gif" width="28" height="27" alt=""></td>
		<td colspan="7" rowspan="9">
			<img src="public/images/map/Seats_57.gif" width="23" height="24" alt=""></td>
		<td colspan="2" rowspan="3">
			<img src="public/images/map/Seats_58.gif" width="5" height="6" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="1" height="2" alt=""></td>
	</tr>
	<tr>
		<td colspan="5" rowspan="5">
			<img src="public/images/map/Seats_59.gif" width="21" height="10" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="1" height="2" alt=""></td>
	</tr>
	<tr>
		<td colspan="2" rowspan="4">
			<img src="public/images/map/Seats_60.gif" width="7" height="8" alt=""></td>
		<td colspan="5" rowspan="8">
			<img src="public/images/map/Seats_61.gif" width="21" height="23" alt=""></td>
		<td colspan="5" rowspan="3">
			<img src="public/images/map/Seats_62.gif" width="21" height="6" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="1" height="2" alt=""></td>
	</tr>
	<tr>
		<td colspan="5" rowspan="7">
			<img src="public/images/map/Seats_63.gif" width="20" height="21" alt=""></td>
		<td colspan="2" rowspan="2">
			<img src="public/images/map/Seats_64.gif" width="9" height="4" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="1" height="2" alt=""></td>
	</tr>
	<tr>
		<td colspan="3" rowspan="3">
			<img src="public/images/map/Seats_65.gif" width="21" height="8" alt=""></td>
		<td colspan="3" rowspan="3">
			<img src="public/images/map/Seats_66.gif" width="23" height="8" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="1" height="2" alt=""></td>
	</tr>
	<tr>
		<td colspan="5" rowspan="7">
			<img src="public/images/map/Seats_67.gif" width="24" height="23" alt=""></td>
		<td colspan="2" rowspan="2">
			<img src="public/images/map/Seats_68.gif" width="6" height="6" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="1" height="2" alt=""></td>
	</tr>
	<tr>
		<td colspan="3">
			<img src="public/images/map/Seats_69.gif" width="10" height="4" alt=""></td>
		<td colspan="5" rowspan="6">
			<img src="public/images/map/Seats_70.gif" width="21" height="21" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="1" height="4" alt=""></td>
	</tr>
	<tr>
		<td rowspan="46">
			<img src="public/images/map/Seats_71.gif" width="8" height="368" alt=""></td>
		<td colspan="4" rowspan="7">
			<img src="public/images/map/Seats_72.gif" width="21" height="22" alt=""></td>
		<td rowspan="10">
			<img src="public/images/map/Seats_73.gif" width="2" height="32" alt=""></td>
		<td colspan="6">
			<img src="public/images/map/Seats_74.gif" width="21" height="6" alt=""></td>
		<td colspan="5" rowspan="2">
			<img src="public/images/map/Seats_75.gif" width="21" height="8" alt=""></td>
		<td rowspan="2">
			<img src="public/images/map/Seats_76.gif" width="2" height="8" alt=""></td>
		<td colspan="4" rowspan="7">
			<img src="public/images/map/Seats_77.gif" width="19" height="22" alt=""></td>
		<td rowspan="46">
			<img src="public/images/map/Seats_78.gif" width="10" height="368" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="1" height="6" alt=""></td>
	</tr>
	<tr>
		<td colspan="5" rowspan="3">
			<img src="public/images/map/Seats_79.gif" width="31" height="8" alt=""></td>
		<td colspan="7" rowspan="9">
			<img src="public/images/map/Seats_80.gif" width="23" height="26" alt=""></td>
		<td colspan="5" rowspan="11">
			<img src="public/images/map/Seats_81.gif" width="41" height="33" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="1" height="2" alt=""></td>
	</tr>
	<tr>
		<td colspan="6" rowspan="7">
			<img src="public/images/map/Seats_82.gif" width="43" height="21" alt=""></td>
		<td colspan="5" rowspan="8">
			<img src="public/images/map/Seats_83.gif" width="22" height="24" alt=""></td>
		<td colspan="8" rowspan="2">
			<img src="public/images/map/Seats_84.gif" width="30" height="6" alt=""></td>
		<td>
			<img src="public/images/map/Seats_85.gif" width="2" height="3" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="1" height="3" alt=""></td>
	</tr>
	<tr>
		<td colspan="5" rowspan="3">
			<img src="public/images/map/Seats_86.gif" width="21" height="9" alt=""></td>
		<td colspan="2" rowspan="6">
			<img src="public/images/map/Seats_87.gif" width="30" height="18" alt=""></td>
		<td colspan="2" rowspan="6">
			<img src="public/images/map/Seats_88.gif" width="28" height="18" alt=""></td>
		<td colspan="2" rowspan="6">
			<img src="public/images/map/Seats_89.gif" width="28" height="18" alt=""></td>
		<td colspan="2" rowspan="6">
			<img src="public/images/map/Seats_90.gif" width="28" height="18" alt=""></td>
		<td colspan="6" rowspan="3">
			<img src="public/images/map/Seats_91.gif" width="22" height="9" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="1" height="3" alt=""></td>
	</tr>
	<tr>
		<td rowspan="2">
			<img src="public/images/map/Seats_92.gif" width="9" height="6" alt=""></td>
		<td colspan="4" rowspan="7">
			<img src="public/images/map/Seats_93.gif" width="22" height="23" alt=""></td>
		<td colspan="7" rowspan="7">
			<img src="public/images/map/Seats_94.gif" width="21" height="23" alt=""></td>
		<td rowspan="2">
			<img src="public/images/map/Seats_95.gif" width="9" height="6" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="1" height="3" alt=""></td>
	</tr>
	<tr>
		<td colspan="5" rowspan="3">
			<img src="public/images/map/Seats_96.gif" width="21" height="7" alt=""></td>
		<td colspan="4" rowspan="2">
			<img src="public/images/map/Seats_97.gif" width="21" height="5" alt=""></td>
		<td rowspan="2">
			<img src="public/images/map/Seats_98.gif" width="3" height="5" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="1" height="3" alt=""></td>
	</tr>
	<tr>
		<td rowspan="2">
			<img src="public/images/map/Seats_99.gif" width="7" height="4" alt=""></td>
		<td colspan="5" rowspan="7">
			<img src="public/images/map/Seats_100.gif" width="23" height="22" alt=""></td>
		<td colspan="5" rowspan="7">
			<img src="public/images/map/Seats_101.gif" width="22" height="22" alt=""></td>
		<td colspan="2">
			<img src="public/images/map/Seats_102.gif" width="9" height="2" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="1" height="2" alt=""></td>
	</tr>
	<tr>
		<td colspan="4" rowspan="3">
			<img src="public/images/map/Seats_103.gif" width="21" height="10" alt=""></td>
		<td rowspan="11">
			<img src="public/images/map/Seats_104.gif" width="2" height="34" alt=""></td>
		<td colspan="4" rowspan="8">
			<img src="public/images/map/Seats_105.gif" width="21" height="25" alt=""></td>
		<td colspan="6" rowspan="2">
			<img src="public/images/map/Seats_106.gif" width="29" height="7" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="1" height="2" alt=""></td>
	</tr>
	<tr>
		<td rowspan="2">
			<img src="public/images/map/Seats_107.gif" width="7" height="8" alt=""></td>
		<td colspan="5" rowspan="7">
			<img src="public/images/map/Seats_108.gif" width="21" height="23" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="1" height="5" alt=""></td>
	</tr>
	<tr>
		<td colspan="2" rowspan="9">
			<img src="public/images/map/Seats_109.gif" width="30" height="27" alt=""></td>
		<td colspan="3" rowspan="15">
			<img src="public/images/map/Seats_110.gif" width="9" height="72" alt=""></td>
		<td colspan="3" rowspan="9">
			<img src="public/images/map/Seats_111.gif" width="30" height="27" alt=""></td>
		<td colspan="3" rowspan="15">
			<img src="public/images/map/Seats_112.gif" width="35" height="72" alt=""></td>
		<td colspan="4" rowspan="9">
			<img src="public/images/map/Seats_113.gif" width="33" height="27" alt=""></td>
		<td colspan="3" rowspan="16">
			<img src="public/images/map/Seats_114.gif" width="7" height="75" alt=""></td>
		<td colspan="4" rowspan="9">
			<img src="public/images/map/Seats_115.gif" width="33" height="27" alt=""></td>
		<td colspan="5" rowspan="3">
			<img src="public/images/map/Seats_116.gif" width="41" height="10" alt=""></td>
		<td colspan="5" rowspan="8">
			<img src="public/images/map/Seats_117.gif" width="22" height="25" alt=""></td>
		<td rowspan="37">
			<img src="public/images/map/Seats_118.gif" width="7" height="339" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="1" height="3" alt=""></td>
	</tr>
	<tr>
		<td rowspan="36">
			<img src="public/images/map/Seats_119.gif" width="8" height="336" alt=""></td>
		<td colspan="5" rowspan="6">
			<img src="public/images/map/Seats_120.gif" width="22" height="19" alt=""></td>
		<td colspan="7" rowspan="2">
			<img src="public/images/map/Seats_121.gif" width="23" height="7" alt=""></td>
		<td colspan="5" rowspan="2">
			<img src="public/images/map/Seats_122.gif" width="22" height="7" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="1" height="5" alt=""></td>
	</tr>
	<tr>
		<td colspan="4" rowspan="3">
			<img src="public/images/map/Seats_123.gif" width="22" height="8" alt=""></td>
		<td colspan="7" rowspan="3">
			<img src="public/images/map/Seats_124.gif" width="21" height="8" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="1" height="2" alt=""></td>
	</tr>
	<tr>
		<td colspan="3" rowspan="2">
			<img src="public/images/map/Seats_125.gif" width="9" height="6" alt=""></td>
		<td colspan="5" rowspan="7">
			<img src="public/images/map/Seats_126.gif" width="22" height="23" alt=""></td>
		<td colspan="4" rowspan="14">
			<img src="public/images/map/Seats_127.gif" width="33" height="91" alt=""></td>
		<td colspan="4" rowspan="15">
			<img src="public/images/map/Seats_128.gif" width="33" height="94" alt=""></td>
		<td colspan="3" rowspan="7">
			<img src="public/images/map/Seats_129.gif" width="20" height="23" alt=""></td>
		<td colspan="3" rowspan="2">
			<img src="public/images/map/Seats_130.gif" width="10" height="6" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="1" height="3" alt=""></td>
	</tr>
	<tr>
		<td rowspan="2">
			<img src="public/images/map/Seats_131.gif" width="2" height="5" alt=""></td>
		<td colspan="4" rowspan="3">
			<img src="public/images/map/Seats_132.gif" width="21" height="9" alt=""></td>
		<td colspan="5" rowspan="3">
			<img src="public/images/map/Seats_133.gif" width="22" height="9" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="1" height="3" alt=""></td>
	</tr>
	<tr>
		<td colspan="2" rowspan="2">
			<img src="public/images/map/Seats_134.gif" width="8" height="6" alt=""></td>
		<td colspan="4" rowspan="6">
			<img src="public/images/map/Seats_135.gif" width="21" height="23" alt=""></td>
		<td rowspan="19">
			<img src="public/images/map/Seats_136.gif" width="2" height="126" alt=""></td>
		<td rowspan="13">
			<img src="public/images/map/Seats_137.gif" width="3" height="88" alt=""></td>
		<td colspan="5" rowspan="6">
			<img src="public/images/map/Seats_138.gif" width="19" height="23" alt=""></td>
		<td colspan="4" rowspan="2">
			<img src="public/images/map/Seats_139.gif" width="9" height="6" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="1" height="2" alt=""></td>
	</tr>
	<tr>
		<td colspan="6" rowspan="3">
			<img src="public/images/map/Seats_140.gif" width="23" height="9" alt=""></td>
		<td colspan="4" rowspan="3">
			<img src="public/images/map/Seats_141.gif" width="21" height="9" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="1" height="4" alt=""></td>
	</tr>
	<tr>
		<td colspan="5" rowspan="3">
			<img src="public/images/map/Seats_142.gif" width="22" height="11" alt=""></td>
		<td colspan="2" rowspan="2">
			<img src="public/images/map/Seats_143.gif" width="8" height="5" alt=""></td>
		<td colspan="4" rowspan="5">
			<img src="public/images/map/Seats_144.gif" width="21" height="21" alt=""></td>
		<td rowspan="30">
			<img src="public/images/map/Seats_145.gif" width="2" height="317" alt=""></td>
		<td colspan="6" rowspan="5">
			<img src="public/images/map/Seats_146.gif" width="21" height="21" alt=""></td>
		<td colspan="2" rowspan="2">
			<img src="public/images/map/Seats_147.gif" width="8" height="5" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="1" height="3" alt=""></td>
	</tr>
	<tr>
		<td colspan="5" rowspan="2">
			<img src="public/images/map/Seats_148.gif" width="22" height="8" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="1" height="2" alt=""></td>
	</tr>
	<tr>
		<td colspan="3">
			<img src="public/images/map/Seats_149.gif" width="9" height="6" alt=""></td>
		<td colspan="5" rowspan="4">
			<img src="public/images/map/Seats_150.gif" width="22" height="24" alt=""></td>
		<td colspan="2" rowspan="13">
			<img src="public/images/map/Seats_151.gif" width="30" height="110" alt=""></td>
		<td colspan="3" rowspan="6">
			<img src="public/images/map/Seats_152.gif" width="30" height="45" alt=""></td>
		<td colspan="4" rowspan="7">
			<img src="public/images/map/Seats_153.gif" width="33" height="48" alt=""></td>
		<td colspan="4" rowspan="12">
			<img src="public/images/map/Seats_154.gif" width="33" height="107" alt=""></td>
		<td colspan="5" rowspan="4">
			<img src="public/images/map/Seats_155.gif" width="22" height="24" alt=""></td>
		<td colspan="2">
			<img src="public/images/map/Seats_156.gif" width="9" height="6" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="1" height="6" alt=""></td>
	</tr>
	<tr>
		<td colspan="2" rowspan="27">
			<img src="public/images/map/Seats_157.gif" width="9" height="306" alt=""></td>
		<td colspan="5" rowspan="4">
			<img src="public/images/map/Seats_158.gif" width="20" height="22" alt=""></td>
		<td rowspan="27">
			<img src="public/images/map/Seats_159.gif" width="2" height="306" alt=""></td>
		<td colspan="5" rowspan="7">
			<img src="public/images/map/Seats_160.gif" width="22" height="68" alt=""></td>
		<td colspan="3" rowspan="8">
			<img src="public/images/map/Seats_161.gif" width="20" height="71" alt=""></td>
		<td colspan="5" rowspan="4">
			<img src="public/images/map/Seats_162.gif" width="22" height="22" alt=""></td>
		<td colspan="2" rowspan="27">
			<img src="public/images/map/Seats_163.gif" width="9" height="306" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="1" height="6" alt=""></td>
	</tr>
	<tr>
		<td colspan="4" rowspan="13">
			<img src="public/images/map/Seats_164.gif" width="21" height="103" alt=""></td>
		<td colspan="5" rowspan="15">
			<img src="public/images/map/Seats_165.gif" width="19" height="107" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="1" height="4" alt=""></td>
	</tr>
	<tr>
		<td colspan="4" rowspan="25">
			<img src="public/images/map/Seats_166.gif" width="21" height="296" alt=""></td>
		<td colspan="6" rowspan="25">
			<img src="public/images/map/Seats_167.gif" width="21" height="296" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="1" height="8" alt=""></td>
	</tr>
	<tr>
		<td colspan="5" rowspan="24">
			<img src="public/images/map/Seats_168.gif" width="22" height="288" alt=""></td>
		<td colspan="5" rowspan="24">
			<img src="public/images/map/Seats_169.gif" width="22" height="288" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="1" height="4" alt=""></td>
	</tr>
	<tr>
		<td colspan="5" rowspan="23">
			<img src="public/images/map/Seats_170.gif" width="20" height="284" alt=""></td>
		<td colspan="5" rowspan="23">
			<img src="public/images/map/Seats_171.gif" width="22" height="284" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="1" height="17" alt=""></td>
	</tr>
	<tr>
		<td colspan="2" rowspan="18">
			<img src="public/images/map/Seats_172.gif" width="5" height="137" alt=""></td>
		<td colspan="5" rowspan="4">
			<img src="public/images/map/Seats_173.gif" width="50" height="38" alt=""></td>
		<td colspan="2">
			<img src="public/images/map/Seats_174.gif" width="19" height="3" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="1" height="3" alt=""></td>
	</tr>
	<tr>
		<td rowspan="11">
			<img src="public/images/map/Seats_175.gif" width="5" height="97" alt=""></td>
		<td colspan="6" rowspan="4">
			<img src="public/images/map/Seats_176.gif" width="50" height="38" alt=""></td>
		<td colspan="2" rowspan="16">
			<img src="public/images/map/Seats_177.gif" width="4" height="132" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="1" height="26" alt=""></td>
	</tr>
	<tr>
		<td rowspan="7">
			<img src="public/images/map/Seats_178.gif" width="3" height="41" alt=""></td>
		<td colspan="7" rowspan="5">
			<img src="public/images/map/Seats_179.gif" width="48" height="36" alt=""></td>
		<td rowspan="5">
			<img src="public/images/map/Seats_180.gif" width="4" height="36" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="1" height="3" alt=""></td>
	</tr>
	<tr>
		<td rowspan="3">
			<img src="public/images/map/Seats_181.gif" width="5" height="30" alt=""></td>
		<td colspan="7" rowspan="3">
			<img src="public/images/map/Seats_182.gif" width="51" height="30" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="1" height="6" alt=""></td>
	</tr>
	<tr>
		<td colspan="5" rowspan="8">
			<img src="public/images/map/Seats_183.gif" width="50" height="62" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="1" height="3" alt=""></td>
	</tr>
	<tr>
		<td colspan="6" rowspan="7">
			<img src="public/images/map/Seats_184.gif" width="50" height="59" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="1" height="21" alt=""></td>
	</tr>
	<tr>
		<td rowspan="16">
			<img src="public/images/map/Seats_185.gif" width="3" height="205" alt=""></td>
		<td colspan="5" rowspan="6">
			<img src="public/images/map/Seats_186.gif" width="50" height="38" alt=""></td>
		<td colspan="6" rowspan="4">
			<img src="public/images/map/Seats_187.gif" width="36" height="10" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="1" height="3" alt=""></td>
	</tr>
	<tr>
		<td colspan="6">
			<img src="public/images/map/Seats_188.gif" width="34" height="2" alt=""></td>
		<td colspan="4" rowspan="6">
			<img src="public/images/map/Seats_189.gif" width="48" height="37" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="1" height="2" alt=""></td>
	</tr>
	<tr>
		<td colspan="6">
			<img src="public/images/map/Seats_190.gif" width="34" height="3" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="1" height="3" alt=""></td>
	</tr>
	<tr>
		<td colspan="11" rowspan="6">
			<img src="public/images/map/Seats_191.gif" width="49" height="38" alt=""></td>
		<td rowspan="6">
			<img src="public/images/map/Seats_192.gif" width="11" height="38" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="1" height="2" alt=""></td>
	</tr>
	<tr>
		<td colspan="6">
			<img src="public/images/map/Seats_193.gif" width="36" height="2" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="1" height="2" alt=""></td>
	</tr>
	<tr>
		<td rowspan="3">
			<img src="public/images/map/Seats_194.gif" width="3" height="30" alt=""></td>
		<td colspan="10" rowspan="3">
			<img src="public/images/map/Seats_195.gif" width="52" height="30" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="1" height="26" alt=""></td>
	</tr>
	<tr>
		<td colspan="3" rowspan="6">
			<img src="public/images/map/Seats_196.gif" width="27" height="37" alt=""></td>
		<td colspan="6" rowspan="5">
			<img src="public/images/map/Seats_197.gif" width="52" height="35" alt=""></td>
		<td colspan="3" rowspan="5">
			<img src="public/images/map/Seats_198.gif" width="26" height="35" alt=""></td>
		<td colspan="5" rowspan="2">
			<img src="public/images/map/Seats_199.gif" width="50" height="4" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="1" height="2" alt=""></td>
	</tr>
	<tr>
		<td colspan="4" rowspan="2">
			<img src="public/images/map/Seats_200.gif" width="48" height="6" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="1" height="2" alt=""></td>
	</tr>
	<tr>
		<td rowspan="8">
			<img src="public/images/map/Seats_201.gif" width="20" height="163" alt=""></td>
		<td colspan="7" rowspan="5">
			<img src="public/images/map/Seats_202.gif" width="51" height="37" alt=""></td>
		<td colspan="8" rowspan="2">
			<img src="public/images/map/Seats_203.gif" width="34" height="8" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="1" height="4" alt=""></td>
	</tr>
	<tr>
		<td colspan="8" rowspan="7">
			<img src="public/images/map/Seats_204.gif" width="35" height="159" alt=""></td>
		<td colspan="7" rowspan="5">
			<img src="public/images/map/Seats_205.gif" width="45" height="36" alt=""></td>
		<td rowspan="7">
			<img src="public/images/map/Seats_206.gif" width="28" height="159" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="1" height="4" alt=""></td>
	</tr>
	<tr>
		<td colspan="8" rowspan="6">
			<img src="public/images/map/Seats_207.gif" width="34" height="155" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="1" height="23" alt=""></td>
	</tr>
	<tr>
		<td colspan="3">
			<img src="public/images/map/Seats_208.gif" width="28" height="2" alt=""></td>
		<td colspan="7" rowspan="4">
			<img src="public/images/map/Seats_209.gif" width="52" height="39" alt=""></td>
		<td rowspan="5">
			<img src="public/images/map/Seats_210.gif" width="2" height="132" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="1" height="2" alt=""></td>
	</tr>
	<tr>
		<td rowspan="4">
			<img src="public/images/map/Seats_211.gif" width="2" height="130" alt=""></td>
		<td colspan="6" rowspan="3">
			<img src="public/images/map/Seats_212.gif" width="53" height="37" alt=""></td>
		<td rowspan="4">
			<img src="public/images/map/Seats_213.gif" width="5" height="130" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="1" height="4" alt=""></td>
	</tr>
	<tr>
		<td colspan="7" rowspan="3">
			<img src="public/images/map/Seats_214.gif" width="51" height="126" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="1" height="3" alt=""></td>
	</tr>
	<tr>
		<td colspan="7" rowspan="2">
			<img src="public/images/map/Seats_215.gif" width="45" height="123" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="1" height="30" alt=""></td>
	</tr>
	<tr>
		<td colspan="6">
			<img src="public/images/map/Seats_216.gif" width="53" height="93" alt=""></td>
		<td colspan="7">
			<img src="public/images/map/Seats_217.gif" width="52" height="93" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="1" height="93" alt=""></td>
	</tr>
	<tr>
		<td>
			<img src="public/images/map/spacer.gif" width="36" height="1" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="8" height="1" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="8" height="1" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="5" height="1" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="4" height="1" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="4" height="1" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="2" height="1" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="7" height="1" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="4" height="1" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="3" height="1" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="2" height="1" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="5" height="1" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="7" height="1" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="2" height="1" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="5" height="1" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="3" height="1" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="4" height="1" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="9" height="1" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="5" height="1" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="3" height="1" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="7" height="1" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="7" height="1" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="5" height="1" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="2" height="1" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="2" height="1" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="3" height="1" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="2" height="1" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="7" height="1" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="2" height="1" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="8" height="1" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="4" height="1" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="11" height="1" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="14" height="1" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="4" height="1" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="2" height="1" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="28" height="1" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="2" height="1" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="3" height="1" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="4" height="1" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="2" height="1" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="21" height="1" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="7" height="1" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="16" height="1" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="5" height="1" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="14" height="1" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="3" height="1" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="7" height="1" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="21" height="1" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="2" height="1" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="3" height="1" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="2" height="1" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="2" height="1" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="3" height="1" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="20" height="1" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="8" height="1" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="2" height="1" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="5" height="1" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="15" height="1" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="3" height="1" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="10" height="1" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="8" height="1" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="8" height="1" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="4" height="1" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="3" height="1" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="2" height="1" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="5" height="1" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="7" height="1" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="2" height="1" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="3" height="1" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="2" height="1" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="2" height="1" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="2" height="1" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="3" height="1" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="9" height="1" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="2" height="1" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="3" height="1" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="2" height="1" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="6" height="1" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="2" height="1" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="7" height="1" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="5" height="1" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="4" height="1" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="5" height="1" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="7" height="1" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="3" height="1" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="3" height="1" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="3" height="1" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="6" height="1" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="7" height="1" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="10" height="1" alt=""></td>
		<td>
			<img src="public/images/map/spacer.gif" width="29" height="1" alt=""></td>
		<td></td>
	</tr>
</table>
EOF;

$map .= "\n" . '<input type="hidden" id="screening_id" value="' . $screening->id . '"></div>' . "\n";

foreach($seats as $seat)
{
  if(!empty($seat->seat()->map_index))
  {
    if($seat->booked)
    {
      $map = str_replace('Seats_' . $seat->seat()->map_index, 'Seats_Red_' . $seat->seat()->map_index, $map);
      $pattern = '/<img src="public\/images\/map\/Seats_Red_' . $seat->seat()->map_index . '.gif" width="[0-9]{0,3}" height="[0-9]{0,3}" alt=""><\/td>/';
      preg_match($pattern, $map, $matches);

    }else{
      $map = str_replace('Seats_' . $seat->seat()->map_index, 'Seats_Green_' . $seat->seat()->map_index, $map);
      $pattern = '/<img src="public\/images\/map\/Seats_Green_' . $seat->seat()->map_index . '.gif" width="[0-9]{0,3}" height="[0-9]{0,3}" alt=""><\/td>/';
      preg_match($pattern, $map, $matches);
      if(!empty($matches))
      {
        $link = '<a onclick="showTickets(' . $seat->id . ');" href="#ticket_type">' . $matches[0] . '</a>';
        $map = preg_replace($pattern, $link, $map);
      }
    }
  }
}
?>
<br/>
<?php
echo($map);
?>
<script>
  getCart();
</script>
