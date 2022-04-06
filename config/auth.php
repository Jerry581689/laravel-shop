<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Defaults
    |--------------------------------------------------------------------------
    |
    | This option controls the default authentication "guard" and password
    | reset options for your application. You may change these defaults
    | as required, but they're a perfect start for most applications.
    |
    */

    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users',
    ],

    /*
    |--------------------------------------------------------------------------
    | Authentication Guards
    |--------------------------------------------------------------------------
    |
    | Next, you may define every authentication guard for your application.| 接下來，您可以為應用程序定義每個身份驗證保護
    | Of course, a great default configuration has been defined for you | 當然，已經為您定義了一個很好的默認配置
    | here which uses session storage and the Eloquent user provider. | 這裡使用session存儲和Eloquent用戶提供程序。
    |
    | All authentication drivers have a user provider. This defines how the| 所有身份驗證驅動程序都有一個用戶提供程序。 這定義了
    | users are actually retrieved out of your database or other storage | 實際上是從數據庫或其他存儲中檢索用戶
    | mechanisms used by this application to persist your user's data. | 該應用程序用來保留用戶數據的機制。
    |
    | Supported: "session", "token"
    |
    */

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

        'api' => [
            'driver' => 'token',
            'provider' => 'users',
            'hash' => false,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | User Providers
    |--------------------------------------------------------------------------
    |                                                                       所有身份驗證驅動程序都有一個用戶提供程序。 這定義了
    | All authentication drivers have a user provider. This defines how the | 實際上是從數據庫或其他存儲中檢索用戶
    | users are actually retrieved out of your database or other storage | 該應用程序用來保留用戶數據的機制。
    | mechanisms used by this application to persist your user's data. | 如果您有多個用戶表或模型，則可以配置多個
    |
    | If you have multiple user tables or models you may configure multiple| 代表每個模型/表格的資源。 這些來源可能會
    | sources which represent each model / table. These sources may then | 被分配給您定義的任何其他身份驗證保護。
    | be assigned to any extra authentication guards you have defined.
    |
    | Supported: "database", "eloquent"
    |
    */

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\User::class,
        ],

        // 'users' => [
        //     'driver' => 'database',
        //     'table' => 'users',
        // ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Resetting Passwords
    |--------------------------------------------------------------------------
    |
    | You may specify multiple password reset configurations if you have more
    | than one user table or model in the application and you want to have
    | separate password reset settings based on the specific user types.
    |
    | The expire time is the number of minutes that the reset token should be
    | considered valid. This security feature keeps tokens short-lived so
    | they have less time to be guessed. You may change this as needed.
    |
    | 如果您有更多密碼重置配置，則可以指定多個
    | 而不是應用程序中的一個用戶表或模型
    | 根據特定的用戶類型分別設置密碼重置設置。
    |
    | 到期時間是重置令牌應為的分鐘數
    | 被認為是有效的。 此安全功能使令牌的壽命很短，因此
    | 他們有更少的時間可以猜測。 您可以根據需要更改此設置。
    */

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_resets',
            'expire' => 60,
        ],
    ],

];
