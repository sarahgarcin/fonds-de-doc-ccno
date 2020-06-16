<header role="banner" class="row">
	<div class="site-ccno col-xs-4">
		<a href="https://ccn-orleans.com/" title="Centre Chorégraphique National d'Orléans">
			<h1>CCN¹</h1>
		</a>
	</div>
	<div class="logo col-xs-4">
		<a href="<?= $site->url()?>" title="<?= $site->title()?>">
			<h1><?= $site->title()?></h1>
		</a>
	</div>

	<div class="searchbar col-xs-4">
		<?php 
		$query   = get('q');
		?>
		<form action= <?= ($p = page('search')) ? $p->url() : '' ?>>
		  <input type="search" name="q" value="<?= html($query) ?>" placeholder="Titre, auteur, mots clés…">
		  <input type="submit" value="Rechercher">
		</form>
			</div>
</header>

