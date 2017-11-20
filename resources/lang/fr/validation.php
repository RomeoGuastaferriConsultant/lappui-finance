<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => ':attribute doit être accepté.',
    'active_url'           => ':attribute ne semble pas être un URL valide.',
    'after'                => ':attribute doit être après :date.',
    'after_or_equal'       => ':attribute ne peut pas être avant :date.',
    'alpha'                => ':attribute doit contenir des lettres uniquement.',
    'alpha_dash'           => ':attribute doit être composé uniquement de lettres, de nombres, et/ou de tirets.',
    'alpha_num'            => ':attribute doit être composé uniquement de lettres et de nombres.',
    'array'                => ':attribute doit être un tableau.',
    'before'               => ':attribute doit être avant :date.',
    'before_or_equal'      => ':attribute ne peut pas être après :date.',
    'between'              => [
        'numeric' => ':attribute doit être compris entre :min et :max.',
        'file'    => ':attribute doit contenir entre :min et :max kilo-octets.',
        'string'  => ':attribute doit contenir entre :min et :max caractères.',
        'array'   => ':attribute doit contenir entre :min et :max items.',
    ],
    'boolean'              => ':attribute doit être vrai ou faux.',
    'confirmed'            => 'La confirmation :attribute ne correspond pas.',
    'date'                 => ':attribute n\'est pas une date valide.',
    'date_format'          => ':attribute ne correspond pas au format :format.',
    'different'            => ':attribute et :other doivent être différents.',
    'digits'               => ':attribute doit être un nombre de :digits chiffres.',
    'digits_between'       => ':attribute doit contenir entre :min et :max chiffres.',
    'dimensions'           => ':attribute a une dimension invalide.',
    'distinct'             => 'Le champ :attribute doit être distinct.',
    'email'                => ':attribute doit être une adresse courriel valide.',
    'exists'               => ':attribute sélectionné est invalide.',
    'file'                 => ':attribute doit être un fichier.',
    'filled'               => ':attribute doit être renseigné.',
    'image'                => ':attribute doit être une image.',
    'in'                   => ':attribute sélectionné est invalide.',
    'in_array'             => 'Le champ :attribute n\'existe pas dans :other.',
    'integer'              => ':attribute doit être un nombre entier.',
    'ip'                   => ':attribute doit être une adresse IP valide.',
    'ipv4'                 => ':attribute doit être une adresse IPv4 valide.',
    'ipv6'                 => ':attribute doit être une adresse IPv6 valide.',
    'json'                 => ':attribute doit contenir du JSON valide.',
    'max'                  => [
        'numeric' => ':attribute ne peut pas dépasser :max.',
        'file'    => ':attribute ne peut pas dépasser :max kilo-octets.',
        'string'  => ':attribute ne peut pas dépasser :max caractères.',
        'array'   => ':attribute ne peut pas contenir plus de :max items.',
    ],
    'mimes'                => ':attribute doit être un fichier de type: :values.',
    'mimetypes'            => ':attribute doit être un fichier de type: :values.',
    'min'                  => [
        'numeric' => ':attribute doit être au moins :min.',
        'file'    => ':attribute doit avoir au moins :min kilo-octets.',
        'string'  => ':attribute doit contenir au minimum :min caractères.',
        'array'   => ':attribute doit contenir au minimum :min items.',
    ],
    'not_in'               => ':attribute sélectionné(e) est invalide.',
    'numeric'              => ':attribute doit être numérique.',
    'present'              => ':attribute doit être present.',
    'regex'                => 'format invalide pour :attribute.',
    'required'             => ':attribute est requis.',
    'required_if'          => ':attribute est requi lorsque :other est :value.',
    'required_unless'      => ':attribute est requis à moins que :other soit dans :values.',
    'required_with'        => ':attribute est requis lorsque :values est present.',
    'required_with_all'    => ':attribute est requis lorsque :values sont presents.',
    'required_without'     => ':attribute est requis lorsque :values est absent.',
    'required_without_all' => ':attribute est requis lorsqu\'aucun(e) :values n\'est présent(e).',
    'same'                 => ':attribute et :other doivent correspondre.',
    'size'                 => [
        'numeric' => ':attribute devrait être :size.',
        'file'    => ':attribute devrait être :size kilo-octets.',
        'string'  => ':attribute devrait contenir :size caractères.',
        'array'   => ':attribute devrait contenir :size items.',
    ],
    'string'               => ':attribute doit être une chaîne de caractères.',
    'timezone'             => ':attribute doit être une zone valide.',
    'unique'               => ':attribute est déjà utilisé.',
    'uploaded'             => ':attribute a échoué au téléchargement.',
    'url'                  => 'format invalide pour :attribute.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
