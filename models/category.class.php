<?

class Category extends BaseModel
{
    const TABLENAME = '`kategorie`';

    protected $schema = [
        'id'          => [ 'type' => BaseModel::TYPE_INT ],
        'createdAt'   => [ 'type' => BaseModel::TYPE_STRING ],
        'updatedAt'   => [ 'type' => BaseModel::TYPE_STRING ],
        'bezeichnung' => [ 'type' => BaseModel::TYPE_STRING],
    ];
}
?>