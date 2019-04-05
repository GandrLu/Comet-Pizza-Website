<?

abstract class BaseModel
{
    const TYPE_INT = 'int';
    const TYPE_FLOAT = 'float';
    const TYPE_STRING = 'string';

    protected $schema = [];
    protected $data = [];


    function __construct($params = 0)
    {
        if ($params == 0){

        } else {

        foreach ($this->schema as $key => $value) {
            global $data; 
            if(isset($params[$key]))
                {
                    $this->data[$key] = $params[$key];
                }
                else
                {
                    $this->data[$key] = null;
                }    
            }
        }
        //print_r($this->data);
    }

    public static function tablename()
    {
        $class = get_called_class();
        if(defined($class.'::TABLENAME'))
        {
            return $class::TABLENAME;
        }
        return null;
    }

    public function save(&$errors = null)
    {
        if($this->data['id'] === null)
        {
            $this->insert($errors);
        }
        else
        {
            $this->update($errors);
        }
    }

    protected function insert(&$errors)
    {
        require './config/database.php';

        try
        {
            $sql = 'INSERT INTO ' . self::tablename() . ' (';
            $valueString = ' VALUES (';

            foreach ($this->schema as $key => $schemaOptions)
            {
                $sql .= '`'.$key.'`,';
                
                if($this->data[$key] === null)
                {
                    $valueString .= 'NULL,';
                }
                else
                {
                    $valueString .= $conn->real_escape_string($this->data[$key]).',';
                }
            }

            $sql            = trim($sql, ',');
            $valueString    = trim($valueString, ',');
            $sql           .= ')'.$valueString.');';

            $conn->query($sql);
            //$statement->execute();
            $conn->close();
            return true;
        }
        catch(\PDOException $e)
        {
            $error[] = 'Error inserting '.get_called_class();
        }
        return false;
    }

    protected function update(&$errors)
    {
        require './config/database.php';

        try
        {
            $sql = 'UPDATE ' . self::tablename() . ' SET ';

            foreach ($this->schema as $key => $schemaOptions)
            {
                if($this->data[$key] !== null)
                {
                    $sql .= $key . ' = ' . $db->quote($this->data[$key]).',';
                }
            }

            $sql  = trim($sql, ',');
            $sql .= ' WHERE id = ' . $this->data['id'];

            $statement = $db->prepare($sql);
            $statement->execute();

            return true;
        }
        catch(\PDOException $e)
        {
            $errors[] = 'Error updating '.get_called_class();
        }
        return false;
    }


    public static function find($where = '')
    {
        require './config/database.php';
        $result = null;

        $sql = 'SELECT * FROM ' . self::tablename();

        if(!empty($where))
        {
            $sql .= ' WHERE ' . $where . ';';
        }

        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();

        } elseif ($result->num_rows > 0) {
            // output data of each row
            $row = [];

            if(array_push($row, $result->fetch_all(MYSQLI_ASSOC))) {
            } else {
                $row = "No data.";
            }
        } else {
                    $row = "no data";
                }
        return $row;
    } 

    public static function category($where = '')
    {
        require './config/database.php';
        $result = null;

        $sql = 'SELECT * FROM ' . self::tablename() . ' JOIN ' . category::tablename() . ' ON produkte.kategorieID=kategorie.id ';
        //JOIN kategorie ON produkte.kategorieID=kategorie.id WHERE kategorie.bezeichnung='Pizza'
        if(!empty($where))
        {
            $sql .= " WHERE kategorie.bezeichnung='" . $where . "';";
        }

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            $row = [];

            if(array_push($row, $result->fetch_all())) {
            } else {
                $row = "No data.";
            }
        } else {
            $row = "no data";
        }
        return $row;
    }

    public static function shoppingcart($where = '')
    {
        require './config/database.php';
        $result = null;
        
        $sql = 'SELECT * FROM ' . self::tablename() . ' JOIN ' . Order::tablename() 
        . ' ON warenkorb.bestellungenID=bestellungen.id JOIN ' . Product::tablename() 
        . ' ON warenkorb.produkteID = produkte.id';
        if(!empty($where))
        {
            $sql .= " WHERE bestellungen.kundenID='" . $where . "' AND bestellungen.timeReady IS NULL;";
        }
        
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0){
        // output data of each row
            $row = [];
        
            if(array_push($row, $result->fetch_all())){
            } else {
                $row = "No data.";
            }
        } else {
            $row = "no data";
        }
        return $row;
    }

    public function search($where, $how = 'or')
    {
        require './config/database.php';
        $result = null;
        $search = explode(" ", $where);
        
        if($how == 'and'){
            foreach ($search as &$value) {
                $value = "%" . $value . "%";
            }
            unset($value);
            $search = implode($search);
            $search = "'" . $search . "'";
        } elseif($how == 'or'){
            foreach ($search as &$value) {
                $value = "'%" . $value . "%' OR ";
            }
            unset($value);
            $search = implode($search);
            $search = trim($search, " OR ");
        }
            $sql  = 'SELECT * FROM ' . self::tablename() . ' WHERE beschreibung LIKE ' . $search;
            $sql .= ' OR bezeichnung LIKE ' . $search;
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                $row = [];
    
                if(array_push($row, $result->fetch_all())) {
                } else {
                    $row = "No data.";
                }
            } else {
                $row = "no data";
            }
            return $row;
        }
}
?>
