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

         \helper::addMenu([
                    'parent_id'     => null,
                    'title'         => 'Tirelogy',
                    'controller'    => '#',
                    'slug'          => 'tirelogy',
                    'order'         => 1,
        ],[]);

                \helper::addMenu([ 
                            'parent_id'     => 'tirelogy',
                            'title'         => 'Tire Technology',
                            'controller'    => 'Tirelogy\TechnologyController',
                            'slug'          => 'tire-technology',
                            'order'         => '1'
                        ],['index','create','update','delete']
                ); 

                \helper::addMenu([ 
                            'parent_id'     => 'tirelogy',
                            'title'         => 'Tire Knowledge',
                            'controller'    => 'Tirelogy\KnowledgeController',
                            'slug'          => 'tire-knowledge',
                            'order'         => '1'
                        ],['index','create','update','delete']
                );                 

                \helper::addMenu([ 
                            'parent_id'     => 'tirelogy',
                            'title'         => 'Tire Safety',
                            'controller'    => 'Tirelogy\SafetyController',
                            'slug'          => 'tire-safety',
                            'order'         => '1'
                        ],['index','create','update','delete']
                );           

                \helper::addMenu([ 
                            'parent_id'     => 'tirelogy',
                            'title'         => 'Tire Maintenance',
                            'controller'    => 'Tirelogy\MaintenanceController',
                            'slug'          => 'tire-maintenance',
                            'order'         => '1'
                        ],['index','create','update','delete']
                ); 

        \helper::addMenu([
                    'parent_id'     => null,
                    'title'         => 'Community',
                    'controller'    => '#',
                    'slug'          => 'community',
                    'order'         => 1,
        ],[]);

                \helper::addMenu([ 
                            'parent_id'     => 'community',
                            'title'         => 'Register',
                            'controller'    => 'Community\RegisterController',
                            'slug'          => 'community-register',
                            'order'         => '1'
                        ],['index','create','update','delete']
                ); 

                \helper::addMenu([ 
                            'parent_id'     => 'community',
                            'title'         => 'Club Event',
                            'controller'    => 'Community\ClubController',
                            'slug'          => 'community-club',
                            'order'         => '1'
                        ],['index','create','update','delete']
                ); 

                \helper::addMenu([ 
                            'parent_id'     => 'community',
                            'title'         => 'Instagram Feed',
                            'controller'    => 'Community\InstagramController',
                            'slug'          => 'community-instagram',
                            'order'         => '1'
                        ],['index','create','update','delete']
                ); 

        \helper::addMenu([
                    'parent_id'     => null,
                    'title'         => 'Gallery',
                    'controller'    => '#',
                    'slug'          => 'gallery',
                    'order'         => 1,
        ],[]);

                \helper::addMenu([ 
                            'parent_id'     => 'gallery',
                            'title'         => 'Video',
                            'controller'    => 'Gallery\VideoController',
                            'slug'          => 'gallery-video',
                            'order'         => '1'
                        ],['index','create','update','delete']
                ); 

                \helper::addMenu([ 
                            'parent_id'     => 'gallery',
                            'title'         => 'Foto',
                            'controller'    => 'Gallery\FotoController',
                            'slug'          => 'gallery-foto',
                            'order'         => '1'
                        ],['index','create','update','delete']
                ); 

                \helper::addMenu([ 
                            'parent_id'     => 'gallery',
                            'title'         => 'E-Card',
                            'controller'    => 'Gallery\EcardController',
                            'slug'          => 'gallery-ecard',
                            'order'         => '1'
                        ],['index','create','update','delete']
                ); 

                \helper::addMenu([ 
                            'parent_id'     => 'gallery',
                            'title'         => 'Download',
                            'controller'    => 'Gallery\DownloadController',
                            'slug'          => 'gallery-download',
                            'order'         => '1'
                        ],['index','create','update','delete']
                ); 

        \helper::addMenu([
                    'parent_id'     => null,
                    'title'         => 'Career',
                    'controller'    => '#',
                    'slug'          => 'career',
                    'order'         => 1,
        ],[]);

                \helper::addMenu([ 
                            'parent_id'     => 'career',
                            'title'         => 'Application Form',
                            'controller'    => 'Career\ApplicationController',
                            'slug'          => 'career-application',
                            'order'         => '1'
                        ],['index','create','update','delete']
                ); 

                \helper::addMenu([ 
                            'parent_id'     => 'career',
                            'title'         => 'Job Fair Event',
                            'controller'    => 'Career\JobfairController',
                            'slug'          => 'career-jobfair',
                            'order'         => '1'
                        ],['index','create','update','delete']
                ); 

                \helper::addMenu([ 
                            'parent_id'     => 'career',
                            'title'         => 'FAQ',
                            'controller'    => 'Career\FaqController',
                            'slug'          => 'career-faq',
                            'order'         => '1'
                        ],['index','create','update','delete']
                ); 

        
    }
}
