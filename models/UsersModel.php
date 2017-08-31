<?php

/* 
 * #4.1    5 min 13 sec
 Модель для таблицы пользователей (users)
 */
/**
 * registerNewUser() проверяет входящие данные и добавляет запись
 * если данные добавлены, то она возращает ввиде значения
 * @global type $db
 * @param type $email
 * @param type $pwdMD5
 * @param type $name
 * @param type $phone
 * @param type $adress
 */
function registerNewUser($email, $pwdMD5, $name, $phone, $adress){
    // проверяет
   // $email  = mysqli_real_escape_string($email);
    //$pwdMD5 = htmlspecialchars(mysqli_real_escape_string($pwdMD5));
    //$name   = mysqli_real_escape_string($name);
    //$phone  = mysqli_real_escape_string($phone);
   // $adress = mysqli_real_escape_string($adress);
    
    
     $query = "INSERT INTO 
         users(`email`, `pwd`, `name`, `phone`, `adress`)
              VALUE('{$email}', '{$pwdMD5}', '{$name}', '{$phone}', '{$adress}')"; // создает
               
         
         //d($query);
          global $db;
          $result = $db->query($query);
          
          // #4.2  11 min sec 36
          if ($result){ //проверка добавления и выбирает
              $query= "SELECT * FROM users 
                       WHERE(`email` = '{$email}' and `pwd` = '{$pwdMD5}')
                       LIMIT 1";
          //d($query);
                       /*Debug:<br/> <pre>SELECT * FROM users 
                       WHERE(`email` = 'sd02' and `pwd` = 'c4ca4238a0b923820dcc509a6f75849b')
                       LIMIT 1</pre>*/
          global $db;
          $result = $db->query($query);
          $result = createSmartyRsArray($result);    
          
          if(isset($result[0])){
              $result['success'] = 1;
          } else {
              $result['success'] = 0;#4.2  13 min sec 14
          }
    } else {
        $result['success'] = 0;
    }
   // d($result); 
/*
Debug:<br/> <pre>Array
(
    [0] => Array
        (
            [id] => 4
            [email] => 
            [pwd] => 03c7c0ace395d80182db07ae2c30f034
            [name] => 
            [phone] => 
            [adress] => 
        )

    [success] => 1
) */
    return $result;      // возвращает 
}

/**
 *  #4.2  21 min 50 sec
 * @param type $email
 * @param type $pwd1
 * @param type $pwd2
 * @return string
 */
function checkRegisterParams($email, $pwd1, $pwd2) {
    $res = array();
    
    if(! $email) {
        $res['success'] = false;
        $res['message'] = 'Введите email';
        
    }
    
    if(! $pwd1) {// эта форма не срабатывает
        $res['success'] = false;
        $res['message'] = 'Введите пароль';
      
    }
    
//    if(! $pwd2) {
//    $res['success'] = false;
//    $res['message'] = 'Введите повтор пароля';
//    }
                
    if( $pwd1 != $pwd2) {
        $res['success'] = false;
        $res['message'] = 'Пароли не совпадают';
    }
    
    return $res;
}


/**
 * Проверка почты
 */

function checkUserEmail($email){
    
    //$email  = mysqli_real_escape_string($email); // проверка не срабатывает
    $query= "SELECT id FROM users 
                       WHERE email = '{$email}'";//id = email достаем из таблицы
    //d($query);
          global $db;
          $result = $db->query($query);
          $result = createSmartyRsArray($result); // преобразовываем в массив и возращаем в контроллер
          return $result;
}
/**
 * Авторизация пользователя
 * @global type $db
 * @param string $email  почта (логин)
 * @param string $pwd пароль
 * @return array  массив данных пользователя
 */

function loginUser ($email, $pwd) {
    // разобраться с sql иньекциями
    // $email = htmlspecialchars(mysqli_real_escape_string($email));
    //  #4.6     10 min 13 sec
    
    $pwd = md5(trim($pwd));  // рекомендуется более сложный способ шифровки, этот вариант базовый
    
    $query= "SELECT * FROM users 
            WHERE(`email` = '{$email}' and `pwd` = '{$pwd}')
            LIMIT 1";
          //d($query);
          global $db;
          $result = $db->query($query);
          $result = createSmartyRsArray($result);
          
          if(isset($result[0])){
              $result['success'] = 1;
          } else {
              $result['success'] = 0; 
          }
          return $result;    
}

/**
 * Изменение данных пользователя
 * @global type $db база
 * @param string $name    имя пользователя
 * @param string $phone   телефон
 * @param string $adress  адрес
 * @param string $pwd1    новый пароль
 * @param string $pwd2    повтор нового пароля
 * @param string $curPwd  текущий пароль
 * @return boolean TRUE в случае успеха
 */
    function updateUserData ($name, $phone, $adress,$pwd1,$pwd2,$curPwd ){
   // $email = htmlspecialchars(mysqli_real_escape_string($_SESSION['user']['$email']));
   $email = $_SESSION['user']['$email'];
   // $name = htmlspecialchars(mysqli_real_escape_string($name));
   // $phone = htmlspecialchars(mysqli_real_escape_string($phone));
    //$adress = htmlspecialchars(mysqli_real_escape_string($adress));
    $pwd1 = trim($pwd1);
    $pwd2  = trim($pwd2);
    
    $newPwd = null; //новый пароль
    if($pwd1 &&($pwd1 == $pwd2)) {
        $newPwd = md5($pwd1);
    }
    // #4.9  10 min 36 sec
     $query= "UPDATE users 
            SET";
         
     if($newPwd){
         $query .= "`pwd` = '{$newPwd}', ";
     }
     $query .= "`name`   = '{$name}',
                `phone`   = '{$phone}',
                `adress`  = '{$adress}' 
                 WHERE
                `email`   = '{$email}' AND `pwd` = '{$curPwd}'
                 LIMIT 1";
            //d($query);
          global $db;
          $result = $db->query($query);
          return $result;
          
    
}