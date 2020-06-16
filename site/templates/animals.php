<?php snippet('header') ?>
<?php snippet('head') ?>

	<main>
	  <h1><?= $page->title() ?></h1>

	  <ul class="animals">
	    <?php foreach ($page->children() as $animal): ?>
	    <li>
	      <a href="<?= $animal->url() ?>">
	        <?= $animal->title() ?>
	      </a>
	    </li>
	    <?php endforeach ?>
	  </ul>

	</main>
	
<?php snippet('footer') ?>
