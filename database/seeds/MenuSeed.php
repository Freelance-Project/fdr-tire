<?php

use Illuminate\Database\Seeder;


class MenuSeed extends Seeder
{
    /* example add menu
        \webarq::addMenu([ 
                'parent_id'     => null,
                'title'         => 'Management product',
                'controller'    => '#',
                'slug'          => 'product',
                'order'         => 1,
            ],[]);

                \webarq::addMenu([ 
                    'parent_id'     => 'product',
                    'title'         => 'Category',
                    'controller'    => 'CategoryController',
                    'slug'          => 'category',
                    'order'         => '1'
                ],['index','create','update','delete']
            ); 

    */
   

         
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
        
        // master menu
        \helper::addMenu([ 
                'parent_id'     => null,
                'title'         => 'Master',
                'controller'    => '#',
                'slug'          => 'master',
                'order'         => 1,
            ],[]);

        \helper::addMenu([ 
                    'parent_id'     => 'master',
                    'title'         => 'Data Penelitian',
                    'controller'    => 'Master\PenelitianController',
                    'slug'          => 'data-penelitian',
                    'order'         => '1'
                ],['index','create','update','delete']
        ); 
		
		 \helper::addMenu([ 
                    'parent_id'     => 'master',
                    'title'         => 'Data Pendukung',
                    'controller'    => 'Master\DataPendukungController',
                    'slug'          => 'data-pendukung',
                    'order'         => '1'
                ],['index','create','update','delete']
        );
		
		\helper::addMenu([ 
                    'parent_id'     => 'master',
                    'title'         => 'Data Publikasi',
                    'controller'    => 'Master\PublikasiController',
                    'slug'          => 'data-publikasi',
                    'order'         => '1'
                ],['index','create','update','delete']
        );
		
		\helper::addMenu([ 
                    'parent_id'     => 'master',
                    'title'         => 'Data Personel',
                    'controller'    => 'Master\PersonelController',
                    'slug'          => 'data-personel',
                    'order'         => '1'
                ],['index','create','update','delete']
        );
		
		\helper::addMenu([ 
                    'parent_id'     => 'master',
                    'title'         => 'Program Pendukung',
                    'controller'    => 'Master\ProgramController',
                    'slug'          => 'data-program',
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
                    'slug'          => 'event',
                    'order'         => '2'
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

        
    }
}
