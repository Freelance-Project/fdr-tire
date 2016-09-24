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
        
        \helper::updateMenu([ 
                    'parent_id'     => 'news',
                    'title'         => 'News Update',
                    'controller'    => 'Page\NewsController',
                    'slug'          => 'news-update',
                    'order'         => '1'
                ],['index','create','update','delete','view']
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
                    'controller'    => 'About\ProfileController',
                    'slug'          => 'company-profile',
                    'order'         => '1'
                ],['index','create','update','delete']
        ); 

        \helper::addMenu([ 
                    'parent_id'     => 'about',
                    'title'         => 'Vision',
                    'controller'    => 'About\VisionController',
                    'slug'          => 'about-vision',
                    'order'         => '2'
                ],['index','create','update','delete']
        ); 

        \helper::addMenu([ 
                    'parent_id'     => 'about',
                    'title'         => 'CSR Activity',
                    'controller'    => 'About\CsrController',
                    'slug'          => 'about-csr',
                    'order'         => '3'
                ],['index','create','update','delete']
        ); 

        \helper::addMenu([ 
                    'parent_id'     => 'about',
                    'title'         => 'Racing Experience',
                    'controller'    => 'About\RacingController',
                    'slug'          => 'about-racing',
                    'order'         => '4'
                ],['index','create','update','delete']
        ); 

        \helper::addMenu([ 
                    'parent_id'     => 'about',
                    'title'         => 'Awards',
                    'controller'    => 'About\AwardController',
                    'slug'          => 'about-award',
                    'order'         => '5'
                ],['index','create','update','delete']
        ); 

        // product
        \helper::addMenu([ 
                'parent_id'     => null,
                'title'         => 'Product',
                'controller'    => '#',
                'slug'          => 'product',
                'order'         => 1,
            ],[]);

        \helper::addMenu([ 
                    'parent_id'     => 'product',
                    'title'         => 'Tire',
                    'controller'    => 'Product\TireController',
                    'slug'          => 'tire',
                    'order'         => '1'
                ],['index','create','update','delete']
        ); 
        \helper::addMenu([ 
                    'parent_id'     => 'product',
                    'title'         => 'Tire Category',
                    'controller'    => 'Product\TireCategoryController',
                    'slug'          => 'tire-category',
                    'order'         => '2'
                ],['index','create','update','delete']
        );
        \helper::addMenu([ 
                    'parent_id'     => 'product',
                    'title'         => 'Tire Type',
                    'controller'    => 'Product\TireTypeController',
                    'slug'          => 'tire-type',
                    'order'         => '3'
                ],['index','create','update','delete']
        );
        \helper::addMenu([ 
                    'parent_id'     => 'product',
                    'title'         => 'Tire Size',
                    'controller'    => 'Product\TireSizeController',
                    'slug'          => 'tire-size',
                    'order'         => '4'
                ],['index','create','update','delete']
        );
        \helper::addMenu([ 
                    'parent_id'     => 'product',
                    'title'         => 'Motor Brand',
                    'controller'    => 'Product\MotorBrandController',
                    'slug'          => 'motor-brand',
                    'order'         => '5'
                ],['index','create','update','delete']
        );
        \helper::addMenu([ 
                    'parent_id'     => 'product',
                    'title'         => 'Motor Model',
                    'controller'    => 'Product\MotorModelController',
                    'slug'          => 'motor-model',
                    'order'         => '6'
                ],['index','create','update','delete']
        );
        \helper::addMenu([ 
                    'parent_id'     => 'product',
                    'title'         => 'Motor Type',
                    'controller'    => 'Product\MotorTypeController',
                    'slug'          => 'motor-type',
                    'order'         => '7'
                ],['index','create','update','delete']
        ); 
        \helper::addMenu([ 
                    'parent_id'     => 'product',
                    'title'         => 'Motor Category',
                    'controller'    => 'Product\MotorCategoryController',
                    'slug'          => 'motor-type',
                    'order'         => '8'
                ],['index','create','update','delete']
        ); 

    }
}
