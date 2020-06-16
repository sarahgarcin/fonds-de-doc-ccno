<?php snippet('header') ?>
<?php snippet('head') ?>

	<main>
		<div class="list-books">
			<div class="list-books__th list-books__th--desktop">
				<div class="list-books__details">
					<div class="list-books__details__inner row">
						<div class="list-books__td list-books__td--title js-swap-order state-active-asc col-md-4" data-order="title">Titre</div>
						<div class="list-books__td list-books__td--author js-swap-order col-md-3" data-order="year">Auteur.trice.s</div>
						<div class="list-books__td list-books__td--year js-swap-order col-md-1" data-order="director">Année</div>
						<div class="list-books__td list-books__td--tags js-swap-order col-md-3" data-order="country">Mots-clés</div>
						<div class="list-books__td c-films__td--genre js-swap-order col-md-1" data-order="genre">Genre</div>
					</div>
				</div>
			</div>
			<div class="list-books-content">
		    <?php foreach ($page->children() as $book): ?>
		    <article>
		    	<div class="list-books__details__inner row">
						<div class="list-books__td list-books__td--title col-md-4">
							<h3><?= $book->title() ?></h3>
						</div>
						<p class="list-books__td col-md-3"><?= $book->author() ?></p>
						<p class="list-books__td col-md-1"><?= $book->year() ?></p>
						<?php 
							$tags = Str::split($book->tags(), ',');
							$fiveTags = array_slice($tags, 0, 5)
						?>
						<ul class="list-books__td col-md-3 tags">
							<?php foreach($fiveTags as $tag):?>
								<li><?= $tag?></li>
							<?php endforeach;?>
						</ul>
						
						<p class="list-books__td col-md-1"><?= $book->type() ?></p>
						<div class="list-books__icon"></div>
					</div>
					<div class="list-books__content fold">
						<div class="book row">
							<div class="book__image col-md-4">
								<div class="book__image__inner">
									<figure>
										<!-- à changer, temporaire pour test -->
										<img src="<?= $page->images()->first()->url()?>" alt="">
									</figure>
								</div>
							</div>
							<div class="book__text col-md-8">
								<p class="book__collection"><?= $book->collection() ?></p>
								<p class="book__publisher"><?= $book->publisher() ?></p>
								<p class="book__isbn"><?= $book->isbn() ?></p>
								<p class="book__language"><?= $book->language() ?></p>
								<p class="book__summary">en attente</p>
								<p class="book__number">Nombre d'exemplaire: <?= $book->number() ?></p>
							</div>
						</div>
					</div>
		    </article>
		    <?php endforeach ?>
	    </div>
	  </div>
	</main>
	
<?php snippet('footer') ?>
