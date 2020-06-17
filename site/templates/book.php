<?php snippet('header') ?>
<?php snippet('head') ?>

	<main>
		<article>
    	<div class="list-books__details__inner row">
				<div class="list-books__td list-books__td--title col-md-4">
					<h3><?= $page->title() ?></h3>
				</div>
				<p class="list-books__td col-md-3">
						<?= $page->author() ?>	
				</p>
				<p class="list-books__td col-md-1">
						<?= $page->year() ?>
					</p>
				<?php 
					$tags = Str::split($page->tags(), ',');
					$fiveTags = array_slice($tags, 0, 5)
				?>
				<ul class="list-books__td tags">
					<?php foreach($fiveTags as $tag):?>
						<li>
							<a href="/tag:<?= urlencode($tag)?>" title="<?= $tag?>">
								<?= $tag?>
							</a>
						</li>
					<?php endforeach;?>
				</ul>
				
				<p class="list-books__td col-md-1">
					<?= $page->type() ?>
				</p>
				<p class="list-books__td see-more">
					+
				</p>
				
				<div class="list-books__icon"></div>
			</div>
			<div class="list-books__content fold">
				<div class="book row">
					<div class="book__image col-md-4">
						<?php if($book->hasImages()):?>
							<div class="book__image__inner">
								<figure>
									<img src="<?= $book->images()->first()->url()?>" alt="<?= $book->images()->filename()?>">
								</figure>
							</div>
						<?php endif;?>
					</div>
					<div class="book__text col-md-8">
						<p class="book__collection"><?= $page->collection() ?></p>
						<p class="book__publisher"><?= $page->publisher() ?></p>
						<p class="book__isbn"><?= $page->isbn() ?></p>
						<p class="book__language"><?= $page->language() ?></p>
						<p class="book__summary">en attente</p>
						<p class="book__number">Nombre d'exemplaire: <?= $page->number() ?></p>
					</div>
				</div>
			</div>
    </article>
		
	</main>
<?php snippet('footer') ?>
