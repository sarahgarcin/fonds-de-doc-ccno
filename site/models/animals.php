<?php

class AnimalsPage extends Page
{

    public function children()
    {
        $csv      = csv($this->root() . '/animals.csv', ';');
        $children = array_map(function ($animal) {
            return [
                'slug'     => Str::slug($animal['Scientific Name']),
                'template' => 'animal',
                'model'    => 'animal',
                'num'      => 0,
                'content'  => [
                    'title'       => $animal['Scientific Name'],
                    'commonName'  => $animal['Common Name'],
                    'description' => $animal['Description'],
                ]
            ];
        }, $csv);

        return Pages::factory($children, $this);
    }

}