<?php
return array(
    // set your paypal credential
    //credenciales
    'client_id' => 'ARKvs4XKXGThnMsj8PZyXmMifE_hjPPQfQfhPA3OJWjHREL5O2sfs_yH2pHU1sqWzB9M9IOFri8a49BT',
    'secret' => 'EKFqYgo5HeZstq6arvibGtzqrma23xgeeMmkLuzC_UEII8OwvzSy9hLDHvjcGlodpfB-biRDTdDFOWRI',

    /**
     * SDK configuration 
     */
    'settings' => array(
        /**
         * Available option 'sandbox' or 'live'
         * Sandbox = Modo de Pruebas
         */
        'mode' => 'sandbox',

        /**
         * Specify the max request time in seconds
         */
        'http.ConnectionTimeOut' => 30,

        /**
         * Whether want to log to a file
         */
        'log.LogEnabled' => true,

        /**
         * Specify the file that want to write on
         */
        'log.FileName' => storage_path() . '/logs/paypal.log',

        /**
         * Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
         *
         * Logging is most verbose in the 'FINE' level and decreases as you
         * proceed towards ERROR
         */
        'log.LogLevel' => 'FINE'
    ),
);