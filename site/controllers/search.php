<?php

return function ($site) {

  $query   = get('q');
  $results = $site->search($query, 'title|author|tags|year|type|collection|publisher|isbn|language');

  return [
    'query'   => $query,
    'results' => $results,
  ];

};