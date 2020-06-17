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
				<p class="book__collection"><?= $page->collection() ?></p>
				<p class="book__publisher"><?= $page->publisher() ?></p>
				<p class="book__year"><?= $page->year() ?></p>
				<p class="book__type"><?= $page->type() ?></p>
				<p class="book__isbn"><?= $page->isbn() ?></p>
				<p class="book__language"><?= $page->language() ?></p>
				<p class="book__summary"><?= $page->summary() ?></p>
				<ul class="book__tags">
					<?php foreach($page->tags() as $tag):?>
						<li class="tag" data-tag="<?= urlencode($tag)?>">
							<a href="/tag:<?= urlencode($tag)?>" class="tag" title="<?= $tag?>">
								<?= $tag?>
							</a>
						</li>
					<?php endforeach;?>
				</ul>
				<p class="book__number">Nombre d'exemplaire: <?= $page->number() ?></p>
			</div>
    </article>
		
	</main>
<?php snippet('footer') ?>
