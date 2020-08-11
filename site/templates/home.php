<?php snippet('header') ?>
<?php snippet('head') ?>

<?php 

  // $csv = csv($page->root() . '/ccno.csv', '^');
  // $kirby->impersonate('kirby');
  // $i = 0; 
  // foreach ($csv as $book) {
  // 	$pageChild = $page->children()->findBy('uid', Str::slug($book['Titre']));
  // 	if(!$pageChild){
  //     $newPage = page('home')->createChild([
		// 		'slug'     => Str::slug($book['Titre']),
	 //      'template' => 'book',
	 //      'model'    => 'book',
	 //      'draft' => 0,
	 //      'num'      => 0,
	 //      'content'  => [
  //         'cover'      => $book['Image'],
  //         'author'     => $book['Auteur.trice'],
  //         'title'      => $book['Titre'],
  //         'collection' => $book['Collection / série'],
  //         'publisher'  => $book['Editeur/Structure'],
  //         'year'       => $book['Année'],
  //         'type'       => $book['Type de document'],
  //         'isbn'       => $book['ISBN'],
  //         'tags'       => $book['Mots clés'],
  //         'language'   => $book['Langues'],
  //         'summary'    => $book['Résumé'],
  //         'number'     => $book['Nombre d’exemplaire'],
  //     	]
  //     ])->changeStatus("listed", $i++);
  //   }
  // };

  // // déplacer les images dans le bon dossier
  // foreach($page->children() as $book){
  // 	$imageName = $book->cover();
  // 	if($image = $page->image($imageName)){
  // 		$image->copy($book);
  // 		$image->delete();
  // 	}	
  // };
	 
?>

	<main>

		<div class="list-books">
			<div class="list-books__th list-books__th--desktop hide-for-small-only">
				<div class="list-books__details">
					<div class="list-books__details__inner row">
						<div class="list-books__td list-books__td--title <?php e(param('order') == 'desc' && param('sort') == "title", "desc", "asc")?> col-sm-3 col-md-4">
							<?php if(param('order') == 'asc' && param('sort') == "title"):?>
								<a href="<?=$site->url()?>/sort:title/order:desc" title="Titre">Titre</a>
							<?php elseif(param('sort') == null):?>
								<a href="<?=$site->url()?>/sort:title/order:desc" title="Titre">Titre</a>
							<?php else:?>
								<a href="<?=$site->url()?>/sort:title/order:asc" title="Titre">Titre</a>
							<?php endif; ?>
						</div>
						<div class="list-books__td list-books__td--author <?php e(param('order') == 'desc' && param('sort') == "author", "desc", "asc")?> col-sm-3">
							<?php if(param('order') == 'asc' && param('sort') == "author"):?>
								<a href="<?=$site->url()?>/sort:author/order:desc" title="Auteur">Auteur.trice.s</a>
							<?php else:?>
								<a href="<?=$site->url()?>/sort:author/order:asc" title="Auteur">Auteur.trice.s</a>
							<?php endif; ?>
						</div>
						<div class="list-books__td list-books__td--year <?php e(param('order') == 'desc' && param('sort') == "year", "desc", "asc")?> col-sm-1">
							<?php if(param('order') == 'asc' && param('sort') == "year"):?>
								<a href="<?=$site->url()?>/sort:year/order:desc" title="Année">Année</a>
								<?php else:?>
									<a href="<?=$site->url()?>/sort:year/order:asc" title="Année">Année</a>
								<?php endif; ?>
						</div>
						<div class="list-books__td list-books__td--tags">Mots-clés</div>
						<div class="list-books__td list-books__td--type <?php e(param('order') == 'desc' && param('sort') == "type", "desc", "asc")?> col-sm-1">
							<?php if(param('order') == 'asc' && param('sort') == "type"):?>
								<a href="<?=$site->url()?>/sort:type/order:desc" title="Genre">Genre</a>
							<?php else:?>
								<a href="<?=$site->url()?>/sort:type/order:asc" title="Genre">Genre</a>
							<?php endif; ?>
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
						if(param('order') == 'asc'){
  						$books = $books->sortBy($sort, 'asc');
  					}
  					else{
							$books = $books->sortBy($sort, 'desc');
						}	
					}
					

					// filtrer par tag
					if($filter = param('tag')) {
  					$books = $books->filterBy('tags', urldecode($filter), ',');
					}

					// filtrer par auteurs
					if($filter = param('author')) {
  					$books = $books->filterBy('author', urldecode($filter), ',');
					}
				?>
		    <?php foreach ($books as $book): ?>

			    <article>
			    	<div class="list-books__details__inner row">
							<div class="list-books__td list-books__td--title col-xs-12 col-sm-3 col-md-4">
								<h3>
									<?= $book->title() ?>
								</h3>
							</div>
							<?php $authors = Str::split($book->author(), ',');?>
							<ul class="list-books__td col-sm-3 col-xs-12 authors">
								<?php foreach($authors as $author):?>
									<li class="author" data-tag="<?= urlencode($author)?>">
										<a href="<?=$site->url()?>/author:<?= urlencode($author)?>" class="author" title="<?= $author?>">
											<?= $author?><?php if(count($authors) > 1): echo ','; endif;?>
										</a>
									</li>
								<?php endforeach;?>
							</ul>
							<p class="list-books__td col-sm-1 col-xs-12">
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
											<?= $tag?><?php if(count($tags) > 1): echo ','; endif;?>
										</a>
									</li>
								<?php endforeach;?>
							</ul>
							
							<p class="list-books__td col-sm-1 col-xs-12">
								<?= $book->type() ?>
							</p>
							<p class="list-books__td see-more">
								<span class="plus">+</span>
							</p>
						</div>
						<div class="list-books__content fold">
							<div class="book row">
								<div class="book__image col-sm-4 col-xs-6">
									<?php if($book->hasImages()):?>
										<div class="book__image__inner">
											<figure>
												<img src="<?= $book->images()->first()->url()?>" alt="<?= $book->images()->filename()?>">
											</figure>
										</div>
									<?php endif;?>
								</div>
								<div class="book__text col-sm-8 col-xs-12">
									<?php if($book->collection()->isNotEmpty()):?>
										<p class="book__collection">Collection&thinsp;: <?= $book->collection() ?></p>
									<?php endif; ?>
									<?php if($book->publisher()->isNotEmpty()):?>
										<p class="book__publisher">Éditeur&thinsp;: <?= $book->publisher() ?></p>
									<?php endif; ?>
									<?php if($book->isbn()->isNotEmpty()):?>
										<p class="book__isbn">ISBN&thinsp;: <?= $book->isbn() ?></p>
									<?php endif; ?>
									<?php if($book->language()->isNotEmpty()):?>
										<p class="book__language">Langue&thinsp;: <?= $book->language() ?></p>
									<?php endif; ?>
									<?php if($book->summary()->isNotEmpty()):?>
										<div class="book__summary"><span style="font-size: 21px;">Résumé&thinsp;:</span> <br><?= $book->summary()->kt() ?></div>
									<?php endif; ?>
									<?php if($book->tags()->isNotEmpty()):?>
										<ul class="book__tags">
											Mots-clés&thinsp;: <br>
											<?php foreach($tags as $tag):?>
												<li class="tag" data-tag="<?= urlencode($tag)?>">
													<a href="<?=$site->url()?>/tag:<?= urlencode($tag)?>" class="tag" title="<?= $tag?>">
														<?= $tag?><?php if(count($tags) > 1): echo ','; endif;?>
													</a>
												</li>
											<?php endforeach;?>
										</ul>
									<?php endif; ?>
									<?php if($book->number()->isNotEmpty()):?>
										<p class="book__number">Nombre d'exemplaire: <?= $book->number() ?></p>
									<?php endif; ?>
								</div>
							</div>
						</div>
			    </article>
		    <?php endforeach ?>
	    </div>
	  </div>
	</main>
	
<?php snippet('footer') ?>
