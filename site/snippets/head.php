<header role="banner" class="row">
<!-- 	<div class="site-ccno col-xs-6 col-sm-4">
		<a href="https://ccn-orleans.com/" title="Centre Chorégraphique National d'Orléans">
			<h1>CCN¹</h1>
		</a>
	</div> -->
	<div class="logo col-xs-6 col-sm-4">
		<a href="<?= $site->url()?>" title="<?= $site->title()?>">
			<h1><?= $site->title()?></h1>
		</a>
	</div>

	<div class="infos-menu col-xs-6 col-sm-4">

		<ul>
			<li class="infos"><span>?</span></li>
			<li class="emprunter"><span>Consulter / Emprunter</span></li>
		</ul>
	</div>

	<div class="searchbar col-xs-12 col-sm-4">
		<?php 
		$query   = get('q');
		?>
		<form action= <?= ($p = page('search')) ? $p->url() : '' ?>>
		  <input type="search" name="q" value="<?= html($query) ?>" placeholder="titre, auteur, mots-clés…">
		  <input type="submit" value="rechercher">
		</form>
			</div>
</header>

