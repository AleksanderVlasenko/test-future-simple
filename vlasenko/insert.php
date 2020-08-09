<?php 

$is_ok = true;

//(b) get and check input text 
if (isset($_POST['Text1'])) {
$a1=htmlspecialchars($_POST['Text1'], true);
//echo 'name=[' . $a1 . ']<br/><br/>';
                            }
							
if (isset($_POST['TextArea1'])) {
$a2=htmlspecialchars($_POST['TextArea1'], true);
//echo 'text=['.$a2.']<br/>';
                                }

if (strlen($a1) <= 1) {
$is_ok = false;
echo 'ОШИБКА: поле ``Имя`` не было задано.<br/><br/>';	
                      }	

if (strlen($a1) > 250) {
$is_ok = false;
echo 'ОШИБКА: поле ``Имя`` слишком длинное (оно не должно превышать 250 символов).<br/><br/>';	
                       }	

if (strlen($a2) <= 1) {
$is_ok = false;
echo 'ОШИБКА: поле ``Комментарий`` не было задано.<br/><br/>';	
                      }	
								
//exit; ///999999
//(e) get and check input text 

      if ($is_ok)            {
require_once("dbfuture.php");		  
AlexDB::getInstance()->insert_article($a1, $a2);
	                         }

?>
<p><a href="index.php">Вернуться на главную страницу</a></p>
