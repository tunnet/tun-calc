<?php  $my_options = get_option( 'true_options' );?>
<div class="row">
	<div class="col-12 col-lg-6">
		<div class="row">
			<h2>Посчитайте,  сколько вы можете  заработать с B2B Jewerly</h2>
		</div>
		<br>
		<div class="row">
			<div class="col-12">
				<p><b>Вы инвестируете в:</b></p>
			</div>	
		</div>
		<form id="percent">
			<div class="row">
					<div class="col-6"><input name="percent_status" type="radio" checked="checked" value="<?php echo $my_options['silver'];?>">Серебро</div>
					<div class="col-6"><input name="percent_status" type="radio" value="<?php echo $my_options['gold'];?>">Золото</div>
			</div>
		</form>
		

		<div class="row">
			<div class="col-12">
				<p>Какую суму Вы готовы инвестировать? (минимальная сумма - <?php echo $my_options['minvalue'];?> <?php  echo $my_options['my_select'];?>.)</p>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<input id="tuncalc" name="main" min="<?php echo $my_options['minvalue'];?>" type="number" value="25000">
			</div>
		</div>

	</div>
	<div class="col-12 col-lg-6">
		<h2>Вы получите:</h2>
		<br>
		<div class="row">
			<div class="col-12 col-lg-4"><h2 class="price" id="weekly"> 16625 </h2> <span class="currency"><?php  echo $my_options['my_select'];?>.</span></div>
			<div class="col-12 col-lg-8">
				<h3>Уженедельных выплат</h3>
				<p>которуые сможете  выводить на свою банковскую карту.</p>
				<p>Свои вложения вернете себе на протяжении 3,5 месяцев</p>
			</div>
		</div>

		<div class="row">
			<div class="col-12 col-lg-4"><h2 class="price" id="annual"> 84500 </h2> <span class="currency"><?php  echo $my_options['my_select'];?>.</span></div>
			<div class="col-12 col-lg-8">
				<h3>в год</h3>
			</div>
		</div>

		<div class="row">
			<div class="col-12 col-lg-4"><h2 class="price" id="profit"> 59500 </h2> <span class="currency"><?php  echo $my_options['my_select'];?>.</span></div>
			<div class="col-12 col-lg-8">
				<h3>ваша чистая прибыль в год</h3>
			</div>
		</div>

		<div class="row" id="gift_row">
			<div class="col-12 col-lg-4"><h2 class="price" id="giftprice"> 16625 </h2> <span class="currency"><?php  echo $my_options['my_select'];?>.</span></div>
			<div class="col-12 col-lg-8">
				<h3>получите подарочный сертификат, с расчета 1 сертификат на сумму <span id="gift"><?php  echo $my_options['gift'];?></span> <?php  echo $my_options['my_select'];?> на каждые <span id="purchase"><?php  echo $my_options['purchase'];?></span> <?php  echo $my_options['my_select'];?>.</h3>
				<p>которые сможете обменять на ювелирные изделия в любом магазине B2B Jewerly</p>
			</div>
		</div>

		<div class="row"  id="gift_addition">
			<div class="col-12">
				<div class="plus"></div>
			</div>
			<div class="col-12">
				<h4>В конце года получите возможность  выбрать золотых\серебряных изделий на вашу первоначальную сумму инвестиций в любом магазине B2B Jewerly</h4>
			</div>
		</div>
	</div>
</div>
