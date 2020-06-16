<?php snippet('header') ?>
<?php snippet('head') ?>

	<main>
		<div class="list-books">
			<div class="list-books__th list-books__th--desktop">
				<div class="list-books__details">
					<div class="list-books__details__inner row">
						<div class="list-books__td list-books__td--title col-md-4">
							<a href="/sort:title" title="Titre">Titre</a>
						</div>
						<div class="list-books__td list-books__td--author col-md-3">
							<a href="/sort:author" title="Auteur">Auteur.trice.s</a>
						</div>
						<div class="list-books__td list-books__td--year col-md-1">
							<a href="/sort:year" title="Année">Année</a>
						</div>
						<div class="list-books__td list-books__td--tags col-md-3">Mots-clés</div>
						<div class="list-books__td c-films__td--genre col-md-1">
							<a href="/sort:type" title="Genre">Genre</a>
						</div>
					</div>
				</div>
			</div>
			<div class="list-books-content">
				<?php 
					$books = $page->children();
					// sort by category
					$books = $books->sortBy('title');
					if($sort = param('sort')) {
  					$books = $books->sortBy($sort);
					}

					// filtrer par tag
					if($filter = param('tag')) {
  					$books = $books->filterBy('tags', urldecode($filter), ',');
					}
				?>
		    <?php foreach ($books as $book): ?>

			    <article>
			    	<div class="list-books__details__inner row">
							<div class="list-books__td list-books__td--title col-md-4">
								<h3><?= $book->title() ?></h3>
							</div>
							<p class="list-books__td col-md-3">
									<?= $book->author() ?>	
							</p>
							<p class="list-books__td col-md-1">
									<?= $book->year() ?>
								</p>
							<?php 
								$tags = Str::split($book->tags(), ',');
								$fiveTags = array_slice($tags, 0, 5)
							?>
							<ul class="list-books__td col-md-3 tags">
								<?php foreach($fiveTags as $tag):?>
									<li>
										<a href="/tag:<?= urlencode($tag)?>" title="<?= $tag?>">
											<?= $tag?>
										</a>
									</li>
								<?php endforeach;?>
							</ul>
							
							<p class="list-books__td col-md-1">
								<?= $book->type() ?>
							</p>
							
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
