<?

class Customer extends BaseModel
{
    const TABLENAME = '`kunden`';

    protected $schema = [
        'id'          => [ 'type' => BaseModel::TYPE_INT ],
        'createdAt'   => [ 'type' => BaseModel::TYPE_STRING ],
        'updatedAt'   => [ 'type' => BaseModel::TYPE_STRING ],
        'vorname'     => [ 'type' => BaseModel::TYPE_STRING ],
        'nachname'    => [ 'type' => BaseModel::TYPE_STRING ],
        'plz'         => [ 'type' => BaseModel::TYPE_STRING ],
        'ort'         => [ 'type' => BaseModel::TYPE_STRING ],
        'strasse'     => [ 'type' => BaseModel::TYPE_STRING ],
        'hnr'         => [ 'type' => BaseModel::TYPE_STRING ],
        'etage'       => [ 'type' => BaseModel::TYPE_STRING ],
        'geschlecht'  => [ 'type' => BaseModel::TYPE_STRING ],
        'email'       => [ 'type' => BaseModel::TYPE_STRING ],
        'password'    => [ 'type' => BaseModel::TYPE_STRING ],
        'vorwahl'     => [ 'type' => BaseModel::TYPE_STRING ],
        'rufnummer'   => [ 'type' => BaseModel::TYPE_STRING ],
        'firma'       => [ 'type' => BaseModel::TYPE_INT ]
    ];
}
?>