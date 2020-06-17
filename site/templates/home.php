<?php snippet('header') ?>
<?php snippet('head') ?>

<?php 

  $csv = csv($page->root() . '/ccno.csv', '^');
  $kirby->impersonate('kirby');
  $i = 0; 
  foreach ($csv as $book) {
  	$pageChild = $page->children()->findBy('uid', Str::slug($book['Titre']));
  	if(!$pageChild){
      $newPage = page('home')->createChild([
				'slug'     => Str::slug($book['Titre']),
	      'template' => 'book',
	      'model'    => 'book',
	      'draft' => 0,
	      'num'      => 0,
	      'content'  => [
          'cover'      => $book['Image'],
          'author'     => $book['Auteur.trice'],
          'title'      => $book['Titre'],
          'collection' => $book['Collection / série'],
          'publisher'  => $book['Editeur/Structure'],
          'year'       => $book['Année'],
          'type'       => $book['Type de document'],
          'isbn'       => $book['ISBN'],
          'tags'       => $book['Mots clés'],
          'language'   => $book['Langues'],
          'summary'    => $book['Résumé'],
          'number'     => $book['Nombre d’exemplaire'],
      	]
      ])->changeStatus("listed", $i++);
    }
  };

  // déplacer les images dans le bon dossier
  foreach($page->children() as $book){
  	$imageName = $book->cover();
  	if($image = $page->image($imageName)){
  		$image->copy($book);
  		$image->delete();
  	}	
  };
	 
?>

	<main>
		<div class="list-books">
			<div class="list-books__th list-books__th--desktop">
				<div class="list-books__details">
					<div class="list-books__details__inner row">
						<div class="list-books__td list-books__td--title col-md-4">
							<a href="<?=$site->url()?>/sort:title" title="Titre">Titre</a>
						</div>
						<div class="list-books__td list-books__td--author col-md-3">
							<a href="<?=$site->url()?>/sort:author" title="Auteur">Auteur.trice.s</a>
						</div>
						<div class="list-books__td list-books__td--year col-md-1">
							<a href="<?=$site->url()?>/sort:year" title="Année">Année</a>
						</div>
						<div class="list-books__td list-books__td--tags">Mots-clés</div>
						<div class="list-books__td list-books__td--type col-md-1">
							<a href="<?=$site->url()?>/sort:type" title="Genre">Genre</a>
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
								<h3>
									<?= $book->title() ?>
								</h3>
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
							<ul class="list-books__td tags">
								<?php foreach($fiveTags as $tag):?>
									<li class="tag" data-tag="<?= urlencode($tag)?>">
										<a href="<?=$site->url()?>/tag:<?= urlencode($tag)?>" class="tag" title="<?= $tag?>">
											<?= $tag?>
										</a>
									</li>
								<?php endforeach;?>
							</ul>
							
							<p class="list-books__td col-md-1">
								<?= $book->type() ?>
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
									<p class="book__collection"><?= $book->collection() ?></p>
									<p class="book__publisher"><?= $book->publisher() ?></p>
									<p class="book__isbn"><?= $book->isbn() ?></p>
									<p class="book__language"><?= $book->language() ?></p>
									<p class="book__summary"><?= $book->summary() ?></p>
									<ul class="book__tags">
										<?php foreach($tags as $tag):?>
											<li class="tag" data-tag="<?= urlencode($tag)?>">
												<a href="<?=$site->url()?>/tag:<?= urlencode($tag)?>" class="tag" title="<?= $tag?>">
													<?= $tag?>
												</a>
											</li>
										<?php endforeach;?>
									</ul>
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
