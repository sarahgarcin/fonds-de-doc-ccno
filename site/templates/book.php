<?php snippet('header') ?>
<?php snippet('head') ?>

	<main>
		<article class="book book-page row">
			<div class="book__image col-md-4">
				<?php if($page->hasImages()):?>
					<div class="book__image__inner">
						<figure>
							<img src="<?= $page->images()->first()->url()?>" alt="<?= $page->images()->filename()?>">
						</figure>
					</div>
				<?php endif;?>
			</div>
			<div class="book__text col-md-8">
				<h3 class="book__title"><?= $page->title() ?></h3>
				<p class="book__author"><?= $page->author() ?></p>
				<p class="book__collection">Collection&thinsp;: <?= $page->collection() ?></p>
				<p class="book__publisher">Éditeur&thinsp;: <?= $page->publisher() ?></p>
				<p class="book__year">Année&thinsp;: <?= $page->year() ?></p>
				<p class="book__type">Genre&thinsp;: <?= $page->type() ?></p>
				<p class="book__isbn">ISBN&thinsp;: <?= $page->isbn() ?></p>
				<p class="book__language">Langue&thinsp;: <?= $page->language() ?></p>
				<div class="book__summary">Résumé&thinsp;:<?= $page->summary()->kt() ?></div>
				<ul class="book__tags">
					Mots-clés&thinsp;:<br> 
					<?php $tags = Str::split($page->tags(), ',');?>
					<?php foreach($tags as $tag):?>
						<li class="tag" data-tag="<?= urlencode($tag)?>">
							<a href="<?=$site->url()?>/tag:<?= urlencode($tag)?>" class="tag" title="<?= $tag?>">
								<?= $tag?><?php if(count($tags) > 1): echo ','; endif;?>
							</a>
						</li>
					<?php endforeach;?>
				</ul>
				<p class="book__number">Nombre d'exemplaire: <?= $page->number() ?></p>
			</div>
    </article>
		
	</main>
<?php snippet('footer') ?>
