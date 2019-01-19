# xilem-cms

Module strucutre
---
[-]Cms
    [-]config
        routes.php
        config.php
    [-]src
        [-]V1
            [-]Rest
                [-]Pages
                    [-]Listener
                        Pages.php
                        PagesFactory.php
                    [-]Middleware
                        Pages.php
                        PagesFactory.php
                    [-]Repository
                        PagesEntity.php
                        PagesCollection.php
                        PagesModel.php
                        PagesModelFactory.php
                    [-]RequestHandler
                        Pages.php
                        PagesFactory.php
            [+]RPC
            [+]gRPC
        ConfigProvider.php
        
    [+]templates