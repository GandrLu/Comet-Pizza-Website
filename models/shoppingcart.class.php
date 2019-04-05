<?

class Cart extends BaseModel
{
    const TABLENAME = '`warenkorb`';

    protected $schema = [
        'id'                => [ 'type' => BaseModel::TYPE_INT ],
        'createtAt'         => [ 'type' => BaseModel::TYPE_STRING ],
        'updatedAt'         => [ 'type' => BaseModel::TYPE_STRING ],
        'groesse'           => [ 'type' => BaseModel::TYPE_STRING ],
        'bestellungenID'    => [ 'type' => BaseModel::TYPE_INT ],
        'produkteID'        => [ 'type' => BaseModel::TYPE_INT ],
    ];
}
?>