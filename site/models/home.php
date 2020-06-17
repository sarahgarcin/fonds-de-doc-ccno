<?php

// class HomePage extends Page
// {

//     public function children()
//     {
//         $csv      = csv($this->root() . '/ccno.csv', '^');
//         $children = array_map(function ($book) {
//             return [
//                 'slug'     => Str::slug($book['Titre']),
//                 'template' => 'home',
//                 'model'    => 'home',
//                 'num'      => 0,
//                 'content'  => [
//                     'image'      => $book['Image'],
//                     'author'     => $book['Auteur.trice'],
//                     'title'      => $book['Titre'],
//                     'collection' => $book['Collection / série'],
//                     'publisher'  => $book['Editeur/Structure'],
//                     'year'       => $book['Année'],
//                     'type'       => $book['Type de document'],
//                     'isbn'       => $book['ISBN'],
//                     'tags'       => $book['Mots clés'],
//                     'language'   => $book['Langues'],
//                     // 'summary'    => $book['Résumé'],
//                     'number'     => $book['Nombre d’exemplaire'],
//                 ]
//             ];
//         }, $csv);

//         return Pages::factory($children, $this);
//     }

// }