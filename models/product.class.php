<?

class Product extends BaseModel
{
    const TABLENAME = '`produkte`';

    protected $schema = [
        'id'          => [ 'type' => BaseModel::TYPE_INT ],
        'createdAt'   => [ 'type' => BaseModel::TYPE_STRING ],
        'updatedAt'   => [ 'type' => BaseModel::TYPE_STRING ],
        'bezeichnung' => [ 'type' => BaseModel::TYPE_STRING],
        'beschreibung'=> [ 'type' => BaseModel::TYPE_STRING ],
        'preisKlein'  => [ 'type' => BaseModel::TYPE_FLOAT ],
        'preisNormal' => [ 'type' => BaseModel::TYPE_FLOAT ],
        'preisGroß'   => [ 'type' => BaseModel::TYPE_FLOAT ],
        'bild'        => [ 'type' => BaseModel::TYPE_STRING ],
        'kategorieID' => [ 'type' => BaseModel::TYPE_INT ]
    ];
}
?>