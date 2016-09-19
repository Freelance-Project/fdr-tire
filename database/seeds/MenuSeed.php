<?php

use Illuminate\Database\Seeder;


class MenuSeed extends Seeder
{        
    public function run()
    {
        \helper::addMenu([ 
                'parent_id'     => null,
                'title'         => 'Page',
                'controller'    => '#',
                'slug'          => 'news',
                'order'         => 1,
            ],[]);

        \helper::addMenu([ 
                    'parent_id'     => 'news',
                    'title'         => 'News Update',
                    'controller'    => 'Page\NewsController',
                    'slug'          => 'news-update',
                    'order'         => '1'
                ],['index','create','update','delete']
        ); 
        
        // news event
        \helper::updateMenu([
                    'parent_id'     => null,
                    'title'         => 'News Event',
                    'controller'    => '#',
                    'slug'          => 'news',
                    'order'         => 1,
        ],[]);

        \helper::updateMenu([ 
                    'parent_id'     => 'news',
                    'title'         => 'News',
                    'controller'    => 'News\NewsController',
                    'slug'          => 'news-update',
                    'order'         => '1'
                ],['index','create','update','delete']
        ); 

        \helper::addMenu([ 
                    'parent_id'     => 'news',
                    'title'         => 'Event',
                    'controller'    => 'News\EventController',
                    'slug'          => 'news-event',
                    'order'         => '2'
                ],['index','create','update','delete']
        ); 
		
		\helper::addMenu([ 
                    'parent_id'     => 'news',
                    'title'         => 'Tips',
                    'controller'    => 'News\TipsController',
                    'slug'          => 'news-tips',
                    'order'         => '3'
                ],['index','create','update','delete']
        ); 
		
		\helper::addMenu([ 
                    'parent_id'     => 'news',
                    'title'         => 'FDR News',
                    'controller'    => 'News\FDRNewsController',
                    'slug'          => 'news-fdrnews',
                    'order'         => '4'
                ],['index','create','update','delete']
        ); 
		
		\helper::addMenu([ 
                    'parent_id'     => 'news',
                    'title'         => 'Media Highlights',
                    'controller'    => 'News\MediaHighlightsController',
                    'slug'          => 'news-highlights',
                    'order'         => '5'
                ],['index','create','update','delete']
        ); 

        // About us
        \helper::addMenu([
                    'parent_id'     => null,
                    'title'         => 'About Us',
                    'controller'    => '#',
                    'slug'          => 'about',
                    'order'         => 1,
        ],[]);

        \helper::addMenu([ 
                    'parent_id'     => 'about',
                    'title'         => 'Company Profile',
                    'controller'    => 'AboutUs\CompanyController',
                    'slug'          => 'company-profile',
                    'order'         => '1'
                ],['index','create','update','delete']
        ); 

        \helper::addMenu([ 
                    'parent_id'     => 'about',
                    'title'         => 'Vision',
                    'controller'    => 'AboutUs\VisionController',
                    'slug'          => 'about-vision',
                    'order'         => '2'
                ],['index','create','update','delete']
        ); 

        \helper::addMenu([ 
                    'parent_id'     => 'about',
                    'title'         => 'CSR Activity',
                    'controller'    => 'AboutUs\CsrController',
                    'slug'          => 'about-csr',
                    'order'         => '3'
                ],['index','create','update','delete']
        ); 

        \helper::addMenu([ 
                    'parent_id'     => 'about',
                    'title'         => 'Racing Experience',
                    'controller'    => 'AboutUs\RacingController',
                    'slug'          => 'about-racing',
                    'order'         => '4'
                ],['index','create','update','delete']
        ); 

        \helper::addMenu([ 
                    'parent_id'     => 'about',
                    'title'         => 'Awards',
                    'controller'    => 'AboutUs\AwardsController',
                    'slug'          => 'about-award',
                    'order'         => '5'
                ],['index','create','update','delete']
        ); 

        
    }
}
