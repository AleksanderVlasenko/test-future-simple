<?php

class AlexDB extends mysqli {

    private static $instance = null;
    // переменные для связи с БД
    private $user = "vlasenko_future";
    private $pass = "";
    private $dbName = "av_future";
    private $dbHost = "localhost";
    private $con = null;

    public static function getInstance() {
        if (!self::$instance instanceof self) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function __clone() {
        trigger_error('Клонирование не разрешено.', E_USER_ERROR);
    }

    public function __wakeup() {
        trigger_error('Десериализация не разрешена.', E_USER_ERROR);
    }

    private function __construct() {
        parent::__construct($this->dbHost, $this->user, $this->pass, $this->dbName);
		
		mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
		
        if (mysqli_connect_error()) {
            exit('Connect Error (' . mysqli_connect_errno() . ') '
                    . mysqli_connect_error());
        }
        parent::set_charset('utf8');
    }

//(h) ;;;;;;;;;;;;;;;;;;;;;;;;
    public function get_articles() : array 
	{
$sql = 'SELECT * FROM articles';
$result = $this->query($sql);
$arts = mysqli_fetch_all($this->query($sql), MYSQLI_ASSOC);
return $arts;
    } //end of get_articles
//(k) ;;;;;;;;;;;;;;;;;;;;;;;;

//(h) ;;;;;;;;;;;;;;;;;;;;;;;;
    public function insert_article($nameadd, $textadd)
    {
	$nameadd = $this->real_escape_string($nameadd);	
	$textadd = $this->real_escape_string($textadd);	
	
$sql = "INSERT INTO articles (name, text, created_at) VALUES ('$nameadd', '$textadd', NOW())";
if ($this->query($sql)) {
echo "<br/>П О З Д Р А В Л Я Е М!<br/><br/>Ваш комментарий был записан успешно.<br/><br/>";
                        }
else echo "Error on write to articles: " . $sql . "<br>" . mysqli_error($link);
    } //end of insert_article	
//(k) ;;;;;;;;;;;;;;;;;;;;;;;;

}

?>