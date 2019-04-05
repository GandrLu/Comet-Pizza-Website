<?

class Order extends BaseModel
{
    const TABLENAME = '`bestellungen`';

    protected $schema = [
        'id'                => [ 'type' => BaseModel::TYPE_INT ],
        'createtAt'         => [ 'type' => BaseModel::TYPE_STRING ],
        'updatedAt'         => [ 'type' => BaseModel::TYPE_STRING ],
        'bemerkung'         => [ 'type' => BaseModel::TYPE_STRING ],
        'timeOrdered'       => [ 'type' => BaseModel::TYPE_STRING ],
        'timeReady'         => [ 'type' => BaseModel::TYPE_STRING ],
        'timeDelivered'     => [ 'type' => BaseModel::TYPE_STRING ],
        'paymentMethodsID'  => [ 'type' => BaseModel::TYPE_INT ],
        'kundenID'          => [ 'type' => BaseModel::TYPE_INT ],
        'rabatte_id'        => [ 'type' => BaseModel::TYPE_INT ]
    ];
}
?>