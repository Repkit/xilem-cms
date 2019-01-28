# micro-ice-cms 
the most expressive psr-15 https://www.php-fig.org/psr/psr-15/ cms yet

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
            DbAdapter.php
            DbAdapterFactory.php
        ConfigProvider.php
        RestDispatchTrait.php
        
    [+]templates
    
Database connection
---
- all database connection settings are under micro-ice-db key in config file
- db connection can be configured by version under version key (ex: v1)
- db connection can be set also general using _default key
- first adapter check for version specified config and if fails goes to _default
Db connection params
---
https://zendframework.github.io/zend-db/adapter/#creating-an-adapter-using-dependency-injection
- driver	required	Mysqli, Sqlsrv, Pdo_Sqlite, Pdo_Mysql, Pdo(= Other PDO Driver)
- database	generally required	the name of the database (schema)
- username	generally required	the connection username
- password	generally required	the connection password
- hostname	not generally required	the IP address or hostname to connect to
- port	not generally required	the port to connect to (if applicable)
- charset	not generally required	the character set to use

Options are adapter-dependent
----
Other names will work as well. Effectively, if the PHP manual uses 
a particular naming, this naming will be supported by the associated driver. 
For example, dbname in most cases will also work for 'database'. 
Another example is that in the case of Sqlsrv, UID will work in place of username.